<!-- formato para formulario de busqueda -->
<form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo("url"); ?>">
  <div>
      <label class="screen-reader-text" for="s">Buscar:</label>
        <input type="text" value="" name="s" id="s" placeholder="Buscar...">
        <input type="submit" id="searchsubmit" value=''>
  </div>
</form>
