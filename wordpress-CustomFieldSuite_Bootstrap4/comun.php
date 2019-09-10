<!-- imprimir texto plano -->
<?= CFS()->get('NOMBREDELCAMPO'); ?>

<!-- si existen datos a mostrar, los imprime -->
<? $campo = $cfs->get('NOMBREDELCAMPO'); if(!empty($campo)){ ?>
   <?= $campo; ?>
<? } ?>

<!-- Imprimir imagen con recorte de WP aplicado, NOTA: se requiere poner el valor de entorno como "ID del adjunto" -->
<? $attachment_id = $cfs->get('NOMBREDELCAMPO'); echo wp_get_attachment_image( $attachment_id, 'full', '', array( "alt" => get_the_title($attachment_id), "class" => "PONER_CLASE_ACA" )); ?>

<!-- Si existe la imagen lo imprime -->
<? $imagen = $cfs->get( 'NOMBREDELCAMPOIMG' ); if(!empty($imagen)){ ?>
   <figure><?= wp_get_attachment_image( $imagen, 'full', '', array( "alt" => get_the_title($imagen), "class" => "PONER_CLASE_ACA" )); ?></figure>
<? } ?>




    
