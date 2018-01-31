	<!-- Paginador Atrás/Siguiente -->
	<?php if(get_query_var('paged')){ $paged = get_query_var('paged'); } elseif(get_query_var('page')){ $paged = get_query_var('page');} else { $paged = 1; } query_posts("posts_per_page=3&cat=3&paged=".$paged); ?>

	<!--MUETRA 3 POSTS POR PÁGINA DE LA CATEGORÍA 3-->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="article"><!--ESTRUCTURA ARTICULO --></div>
	<?php endwhile; ?>
	<div class="paginador"><?php posts_nav_link(' &#183; ', 'P&aacute;gina anterior', 'P&aacute;gina siguiente'); ?></div>
	<?php endif; wp_reset_query(); ?>

	<!-- paginador de post -->
	<section id="paginador">
		<? previous_posts_link('<span class="prev">Anterior</span>'); ?>
		<? next_posts_link('<span class="next">Siguiente</span>'); ?>
	</section>

	<!-- categoria -->
	<?  if(function_exists('utom_pagenavi')) { utom_pagenavi(); } ?>

	
	
