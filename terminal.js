/**
 * Tactical Terminal Console v4.0 — Unificado
 * Comandos + cache API + indicador de processamento + toggle de tema
 */
(function() {
    'use strict';

    var commandHistory = [], historyIndex = -1, isProcessing = false;
    var cache = {}, CACHE_TTL = 60000;

    function cacheKey(cmd, args) { return cmd + ':' + (args || ''); }
    function cacheGet(key) {
        var e = cache[key];
        if (!e) return null;
        if (Date.now() - e.timestamp > CACHE_TTL) { delete cache[key]; return null; }
        return e.data;
    }
    function cacheSet(key, data) { cache[key] = { data: data, timestamp: Date.now() }; }
    function cacheClear() { cache = {}; }
    function $(id) { return document.getElementById(id); }
    function printToTerminal(text, type) {
        var o = $('terminal-output'); if (!o) return;
        var d = document.createElement('div');
        d.className = 'terminal-line ' + (type || '');
        d.textContent = text;
        o.appendChild(d); o.scrollTop = o.scrollHeight;
    }
    function printMultiLine(text, type) { text.split('\n').forEach(function(l){ if (l.trim()) printToTerminal(l, type); }); }
    function showLoading() {
        var o = $('terminal-output'); if (!o) return null;
        var d = document.createElement('div');
        d.className = 'terminal-loading'; d.id = 'terminal-loading-indicator';
        d.textContent = '[PROCESSANDO...]';
        o.appendChild(d); o.scrollTop = o.scrollHeight; return d;
    }
    function hideLoading() { var i = $('terminal-loading-indicator'); if (i) i.remove(); }
    function stripTags(html) { return html ? html.replace(/<[^>]*>/g, '') : ''; }

    function initTerminal() {
        var o = $('terminal-output');
        if (o && o.innerHTML === '') o.innerHTML = '<div class="terminal-line" style="opacity:0.65;font-style:italic;color:inherit;">aguardando instruções...</div>';
    }

    function initThemeToggle() {
        if (window.__mtToggleBound) return; // já vinculado pelo script inline do header
        window.__mtToggleBound = true;
        var btn = $('toggle-tema'), icon = $('theme-icon'), label = $('theme-label');
        if (!btn) return;
        function update() {
            var dark = document.documentElement.getAttribute('data-tema') === 'dark';
            if (icon) icon.innerHTML = dark ? '&#9788;' : '&#9789;';
            if (label) label.textContent = dark ? 'CLARO' : 'ESCURO';
        }
        btn.addEventListener('click', function() {
            var h = document.documentElement, c = h.getAttribute('data-tema');
            if (c === 'dark') { h.removeAttribute('data-tema'); document.cookie = 'mt_theme=light; path=/; max-age=31536000'; }
            else { h.setAttribute('data-tema', 'dark'); document.cookie = 'mt_theme=dark; path=/; max-age=31536000'; }
            update();
        });
        update();
    }

    var commands = {
        help: function() { return 'Comandos disponiveis:\n  help          — Mostrar esta ajuda\n  ls            — Listar posts do arquivo\n  cat <id>      — Ver conteudo do post\n  search <q>    — Buscar no arquivo\n  cd <ano>      — Navegar para ano\n  whoami        — Identidade do usuario\n  uptime        — Tempo de atividade\n  tema          — Alternar claro/escuro\n  clear         — Limpar console\n  cacheclear    — Limpar cache API\n  exit          — Sair do sistema'; },
        tema: function() {
            var btn = $('toggle-tema'); if (btn) btn.click();
            return 'Alternando tema...';
        },
        whoami: function() { return 'ativista_digital_brazuca\nuid=2004(midiatatica) gid=100(ativismo) grupos=100(ativismo),42(resistencia)'; },
        uptime: function() {
            var s = new Date('2004-01-01'), n = new Date(),
                d = Math.floor((n - s) / 86400000),
                h = String(n.getHours()).padStart(2, '0'),
                m = String(n.getMinutes()).padStart(2, '0'),
                sec = String(n.getSeconds()).padStart(2, '0');
            return d + ' days, ' + h + ':' + m + ':' + sec + '\n1 usuario, load average: 0.71, 0.85, 0.92';
        },
        ls: function() {
            var key = cacheKey('ls'), cached = cacheGet(key);
            if (cached) return Promise.resolve('[CACHE] ' + cached);
            return new Promise(function(resolve) {
                fetch('/wp-json/wp/v2/posts?per_page=10&_fields=id,date,title,link')
                    .then(function(r){ return r.json(); })
                    .then(function(posts){
                        if (!posts.length) { resolve('Nenhum post encontrado.'); return; }
                        var lines = posts.map(function(p){
                            var date = p.date ? p.date.substring(0,10) : '????-??-??';
                            var title = p.title && p.title.rendered ? stripTags(p.title.rendered) : 'Sem titulo';
                            return '-rw-r--r--  ' + date + '  #' + p.id + '  ' + title;
                        });
                        var result = lines.join('\n'); cacheSet(key, result); resolve(result);
                    })
                    .catch(function(){ resolve('Erro ao carregar posts.'); });
            });
        },
        search: function(query) {
            if (!query) return 'Uso: search <termo>';
            var key = cacheKey('search', query), cached = cacheGet(key);
            if (cached) return Promise.resolve('[CACHE] ' + cached);
            return new Promise(function(resolve) {
                fetch('/wp-json/wp/v2/posts?search=' + encodeURIComponent(query) + '&per_page=5&_fields=id,date,title,link')
                    .then(function(r){ return r.json(); })
                    .then(function(posts){
                        if (!posts.length) { resolve('Nenhum resultado encontrado.'); return; }
                        var lines = posts.map(function(p){
                            var date = p.date ? p.date.substring(0,10) : '????-??-??';
                            var title = p.title && p.title.rendered ? stripTags(p.title.rendered) : 'Sem titulo';
                            return '[' + date + '] ' + title + '\n  -> ' + p.link;
                        });
                        var result = lines.join('\n\n'); cacheSet(key, result); resolve(result);
                    })
                    .catch(function(){ resolve('Erro na busca.'); });
            });
        },
        cd: function(year) { if (!year) return 'Uso: cd <ano>'; window.location.href = '/' + year + '/'; return 'Navegando para /' + year + '/...'; },
        cat: function(id) {
            if (!id) return 'Uso: cat <id>';
            return new Promise(function(resolve) {
                fetch('/wp-json/wp/v2/posts/' + id + '?_fields=id,title,content,date,link')
                    .then(function(r){ if (!r.ok) throw new Error('não encontrado'); return r.json(); })
                    .then(function(post){
                        var title = post.title && post.title.rendered ? stripTags(post.title.rendered) : 'Sem titulo';
                        var date = post.date ? post.date.substring(0,10) : '????-??-??';
                        var text = post.content && post.content.rendered ? stripTags(post.content.rendered).substring(0,500) : '';
                        resolve('=== ' + title + ' ===\nData: ' + date + '\n\n' + text + (text.length >= 500 ? '...' : '') + '\n\n-> ' + post.link);
                    })
                    .catch(function(){ resolve('cat: ' + id + ': Post nao encontrado'); });
            });
        },
        clear: function() { cacheClear(); var o = $('terminal-output'); if (o) o.innerHTML = ''; return null; },
        cacheclear: function() { cacheClear(); return 'Cache API limpo.'; },
        exit: function() { return 'Sessao encerrada. Recarregue a pagina para reiniciar.'; }
    };

    function executeCommand(input) {
        if (isProcessing) return;
        var parts = input.trim().split(' '), cmd = parts[0].toLowerCase(), args = parts.slice(1).join(' ');
        printToTerminal('> ' + input, 'cmd');
        if (commands[cmd]) {
            var result = commands[cmd](args);
            if (result instanceof Promise) {
                isProcessing = true; showLoading();
                result.then(function(res){
                    hideLoading(); isProcessing = false;
                    if (res !== null) {
                        if (typeof res === 'string' && res.indexOf('[CACHE] ') === 0) res = res.substring(8);
                        printMultiLine(res, 'success');
                    }
                }).catch(function(){ hideLoading(); isProcessing = false; printToTerminal('Erro inesperado.', 'error'); });
            } else if (result !== null) { printMultiLine(result, 'success'); }
        } else {
            printToTerminal(cmd + ': comando nao encontrado. Digite \'help\' para ajuda.', 'error');
        }
    }

    function attachTerminalListener() {
        var input = $('terminal-input'); if (!input) return;
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                var value = input.value.trim();
                if (value) { commandHistory.push(value); historyIndex = commandHistory.length; executeCommand(value); input.value = ''; }
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (historyIndex > 0) { historyIndex--; input.value = commandHistory[historyIndex]; }
            } else if (e.key === 'ArrowDown') {
                e.preventDefault();
                if (historyIndex < commandHistory.length - 1) { historyIndex++; input.value = commandHistory[historyIndex]; }
                else { historyIndex = commandHistory.length; input.value = ''; }
            }
        });
        // Sem autofocus: evita o scroll automático para o console no carregamento
        // e não "sequestra" as teclas de rolagem. O usuário clica no input para usar.
    }

    function boot() { attachTerminalListener(); initTerminal(); initThemeToggle(); }
    if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', boot); } else { boot(); }
})();