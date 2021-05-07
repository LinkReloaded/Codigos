<!-- Paginador AtrÃ¡s/Siguiente -->
<?php if(get_query_var('paged')){ $paged = get_query_var('paged'); } elseif(get_query_var('page')){ $paged = get_query_var('page');} else { $paged = 1; } query_posts("posts_per_page=3&cat=3&paged=".$paged); ?>

<!-- paginador de post -->
<section id="paginador">
	<? previous_posts_link('<span class="prev">Anterior</span>'); ?>
	<? next_posts_link('<span class="next">Siguiente</span>'); ?>
</section>

<!-- categoria -->
<?  if(function_exists('utom_pagenavi')) { utom_pagenavi(); } ?>

<!-- paginador numerico -->
<div class="paginador">
	<?php the_posts_pagination( array(
	    'mid_size'  => 2,
	    'prev_text' => __( 'label next', 'textdomain' ),
	    'next_text' => __( 'label prev', 'textdomain' ),
	) ); ?>
</div>
