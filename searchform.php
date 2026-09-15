<?php
$action = esc_url( home_url( '/' ) );
$value  = isset($_GET['s']) ? esc_attr( $_GET['s'] ) : '';
$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>';
?>
<form role="search" method="get" class="search-form-box" action="<?php echo $action; ?>">
    <label for="search-field">[BUSCA] &gt; Procurar no arquivo:</label>
    <div style="display: flex; gap: 0.5rem;">
        <input type="search" id="search-field" class="search-field" name="s" value="<?php echo $value; ?>" placeholder="Digite um termo de busca..." required style="flex: 1;">
        <button type="submit" class="search-icon-btn"><?php echo $icon; ?> BUSCAR</button>
    </div>
</form>