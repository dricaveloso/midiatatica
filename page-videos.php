<?php
/**
 * Template Name: Vídeos Táticos
 * Vídeos Táticos — Playlists PeerTube
 */
get_header();
?>

    <div class="container">

        <div class="protocol-box">
            [PROTOCOL: VIDEO_RECOVERY_v4.2]
        </div>

        <header>
            <div class="logo-main">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Mídia Tática</a>
            </div>
            <div class="tagline-main">ARQUIVO-MEMÓRIA DE ATIVISMO DIGITAL</div>
        </header>

        <div class="mt-system-line">
            <span>[SISTEMA DE ARQUIVOS TÁTICOS v4.2]</span>
            <a href="<?php echo esc_url( home_url( '/sobre/' ) ); ?>">Saiba mais</a>
        </div>


        <div class="breadcrumb">[DIRECTORY: /VIDEOS_TATICOS]</div>
        <h1>Vídeos Táticos</h1>

        <div class="intro-text">
            Uma deriva áudio-visual pela Net. Cultura brasileira. Pesquisa investigativa entre acervos dispersos mas conectados.
        </div>

        <div class="status-box">
            ESTADO: ONLINE<br>
            INSTÂNCIA: <a href="https://videos.midiatatica.net/" target="_blank">videos.midiatatica.net</a>
        </div>

        <div class="info-section">
            <p>Vídeos Táticos propõe a visualização de material audiovisual coletivo, para que suas cronologias e materiais digitais sejam mantidos e eventualmente atingam uma nova geração digital.</p>
            <div class="tag-row">
                <span class="tag">#ATIVISMO</span>
                <span class="tag">#REDE_LIVRE</span>
                <span class="tag">#MEMORIA</span>
            </div>
        </div>

        <div class="presentation-block">
            <h2>APRESENTAÇÃO: PEERTUBE</h2>
            <p>O material do acervo foi estruturado utilizando <a href="https://videos.midiatatica.net/" target="_blank">PeerTube</a>, uma plataforma descentralizada, de código aberto e federada que garante maior liberdade de expressão, privacidade e ausência de algoritmos ocultos.</p>
        </div>

        <div class="playlist-header">
            <span>&#128193;</span>
            <h2 style="margin: 0; border: none; padding: 0;">PLAYLISTS_ACERVO</h2>
        </div>

        <?php
        $playlists = array(
            array('CMI — Centro de Mídia Independente', '11 vídeos', 'Rede internacional de ativistas e produtores de mídia independente, criada em 1999 no contexto dos protestos antiglobalização de Seattle. Pioneiro no modelo "open publishing" e jornalismo cidadão no Brasil.', 'https://videos.midiatatica.net/w/p/opzVEYjeHJ2G9pNyRsVaKY'),
            array('Metareciclagem', '4 vídeos', 'Rede auto-organizada que propôs a desconstrução da tecnologia para transformação social. Criada pelo Metá:Fora (2002) em parceria com a ONG Agente Cidadão.', 'https://videos.midiatatica.net/w/p/mVdmV3aeA64gJWwWpEuR88'),
            array('Mídia Tática', '25 vídeos', 'Ações de mídia tática no começo dos anos 2000: MTB - Laboratório de Mídia Tática Brasil, Upgrade! Salvador, ações ativistas de rua em Belém, coletivo Media Sana de Pernambuco, rádios e TVs livres.', 'https://videos.midiatatica.net/w/p/euY7g8MQFpSn5kWxBfbvsy'),
            array('Comunicação', '13 vídeos', 'O direito à comunicação como eixo central das demandas ativistas. Letramento midiático descentralizado, software livre, políticas públicas de cultura e comunicação.', 'https://videos.midiatatica.net/w/p/p28MjyXh9CyJ1r1iRgQsUA'),
            array('Conhecimentos Livres', '9 vídeos', 'Encontros de Cultura Digital e Conhecimentos Livres (2004-2010): 82 encontros que fortaleceram a Rede Nacional de Cultura Digital do MINC na gestão Gilberto Gil.', 'https://videos.midiatatica.net/w/p/hGKVLbETcsGMd5KZjj2Unf'),
            array('Submidialogia', '8 vídeos', '7 festivais (2005-2010) abertos e colaborativos em Campinas-SP, com palestras, laboratórios de produção, transmissão de rádio FM, televisão, VJ, Internet e mídia independente.', 'https://videos.midiatatica.net/w/p/7MPgDqCn9tUcA3uL5R1Gjr'),
            array('mimoSA', '5 vídeos', 'Oficinas de metareciclagem, software livre e mídia independente (2005-2009) para criação de uma máquina que alterasse o cenário de produção midiática no Brasil.', 'https://videos.midiatatica.net/w/p/g35qMxG9QCQpA6Rb9d4kUq'),
        );
        foreach ( $playlists as $pl ) :
        ?>
        <div class="playlist-item">
            <div class="playlist-title">
                <?php echo esc_html( $pl[0] ); ?>
                <span class="playlist-count"><?php echo esc_html( $pl[1] ); ?></span>
            </div>
            <div class="playlist-desc"><?php echo esc_html( $pl[2] ); ?></div>
            <a href="<?php echo esc_url( $pl[3] ); ?>" target="_blank" class="access-link">&gt; ACESSAR_PLAYLIST_PEERTUBE</a>
        </div>
        <?php endforeach; ?>

        <div class="total-count">
            TOTAL NO ACERVO: <span>~100 VÍDEOS</span>
        </div>

        <?php get_footer(); ?>

    </div>

</body>
</html>