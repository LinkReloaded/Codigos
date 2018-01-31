	<!-- si EXISTE LA IMAGEN DESTACADA, la muestra, si no muestro el THUMB -->
	<? $thumbdefecto = has_post_thumbnail(); if (!empty($thumbdefecto)) {?>
	<a href="<? the_permalink(); ?>"><? the_post_thumbnail('imgcat'); ?></a><?  } else { ?><a href="<? the_permalink();?>"><? cim_the_thumb('thumbnail');?></a>
	<? } ?>