<!-- si EXISTE LA IMAGEN DESTACADA, la muestra, si no muestro el THUMB -->
<? $thumbdefecto = has_post_thumbnail(); if (!empty($thumbdefecto)) {?>
<a href="<? the_permalink(); ?>"><? the_post_thumbnail('imgcat'); ?></a><?  } else { ?><a href="<? the_permalink();?>"><? cim_the_thumb('thumbnail');?></a>
<? } ?>

<!-- busca si en el panel de control esta la imagen predeterminada, si no esta pone la que se inserta dentro del loop (USAR DENTRO DEL LOOP) -->
<? if ( has_post_thumbnail() ) {?><a href="<? the_permalink(); ?>"><? the_post_thumbnail(); ?></a><? } else {cim_the_thumb('medium');} ?>
