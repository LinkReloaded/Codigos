<!-- Paginador AtrÃ¡s/Siguiente -->
<?php if(get_query_var('paged')){ $paged = get_query_var('paged'); } elseif(get_query_var('page')){ $paged = get_query_var('page');} else { $paged = 1; } query_posts("posts_per_page=3&cat=3&paged=".$paged); ?>

<!-- paginador de post -->
<section id="paginador">
	<? previous_posts_link('<span class="prev">Anterior</span>'); ?>
	<? next_posts_link('<span class="next">Siguiente</span>'); ?>
</section>

<!-- categoria -->
<?  if(function_exists('utom_pagenavi')) { utom_pagenavi(); } ?>
