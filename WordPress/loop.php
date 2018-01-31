	<!-- Loop simple -->
	<? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<? the_content(); ?>              
	<? endwhile; endif; ?>

	<!-- Loop con condiciones, en este caso muestra "2" post de la categoria "3" -->
	<? $recent = new WP_Query("showposts=2&cat=3"); while($recent->have_posts()) : $recent->the_post();?>  
	<? endwhile; ?>
	
	<!-- loop de post especiales post_type=NOMBREDELPOSTESPECIAL -->
	<? $recent = new WP_Query("post_type=opinion&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
	<? endwhile; ?>

	<!-- loop con un contador para diferenciar los divs y que ingresa datos cada x ciclo -->
	<? $couter=1; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="art-<? echo $couter; ?>" class="art"></article>
		<? if($couter==3 || $couter==6 || $couter==9){echo '<div class="clear"></div>';}?>      
	<? $couter++; endwhile; endif; ?>

	<!--loop con contador y un condicional para que realice algo cada X ciclos  -->
	<? $counter=1; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div <? if($counter==3){ echo "class='ult'";} ?>></div>
    <? if($counter==3){$counter=1;} else {$counter++;} endwhile; endif; ?> 
	
	<!-- busca si en el panel de control esta la imagen predeterminada, si no esta pone la que se inserta dentro del loop (USAR DENTRO DEL LOOP) -->
    <? if ( has_post_thumbnail() ) {?><a href="<? the_permalink(); ?>"><? the_post_thumbnail(); ?></a><? } else {cim_the_thumb('medium');} ?>	
	
	<!-- loop de una pagina en especifico -->
	<? $recent = new WP_Query("showposts=1&page_id=13"); while($recent->have_posts()) : $recent->the_post();?>
      	<? the_content(); ?>
	<? endwhile; ?> 
	
	<!-- loop de acuerdo a la taxonomia del articulo -->
	<? $recent = new WP_Query("showposts=1&destacado=articulo-destacado"); while($recent->have_posts()) : $recent->the_post();?>
	<? endwhile; ?>	
	
	<!-- resetear el loop de WP, poner esa funcion despues de cerrar el loop -->
	<? endwhile; wp_reset_query(); ?>
	
	
	