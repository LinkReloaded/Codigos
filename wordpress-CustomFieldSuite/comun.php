<!-- imprimir texto plano -->
<?= CFS()->get('NOMBREDELCAMPO'); ?>

<!-- si existen datos a mostrar, los imprime -->
<? $campo = $cfs->get('NOMBREDELCAMPO'); if(!empty($campo)){ ?>
  <?= $campo; ?>
<? } ?>

<!-- imprimir select -->
<? $campo = $cfs->get('NOMBREDELCAMPO'); foreach ($campo as $etiqueta => $label) { echo $etiqueta; } ?>

<!-- Imprimir imagen de forma simple se configura en el plugin como URL -->
<img src="<?= $cfs->get('NOMBREDELCAMPO'); ?>" alt="<? the_title(); ?>">

<!-- Imprimir imagen con recorte de WP aplicado, NOTA: se requiere poner el valor de entorno como "ID del adjunto" -->
<? 	$attachment_id = $cfs->get('NOMBREDELCAMPO'); echo wp_get_attachment_image( $attachment_id, 'img200x200', '', array( "alt" => get_the_title($attachment_id), "class" => "img-responsive" )); ?></figure>

<!-- Si existe la imagen lo imprime -->
<? $imagen = $cfs->get( 'NOMBREDELCAMPOIMG' ); if(!empty($imagen)){ ?>
  <figure><? $attachment_id = $imagen; echo wp_get_attachment_image( $attachment_id, 'img200x200' ); ?></figure>
<? } ?>

<!-- Imprimir imagen como fondo de los div -->
<? 	$elID = get_the_ID(); //obtenemos el ID de la pagina actual
  $recent = new WP_Query("showposts=1&page_id=".$elID); while($recent->have_posts()) : $recent->the_post(); //hacemos un loop de la misma pagina
    $imagen = $cfs->get( 'NOMBREDELCAMPOIMG' ); //llamo a la imagen
    $img_src = wp_get_attachment_image_src( $imagen, 'img1530x415'); //la aplico el recorte
  endwhile;
  if(!empty($imagen)){
?>
<div style="background-image:url(<?= $img_src[0];?>);"></div>
<? 	} ?>
