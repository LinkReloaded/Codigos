<?php 
  // AGREGAR IMAGENES DE ACF RECORTADAS
		$programas_img_ppal = get_field( 'programas_img_ppal' ); 
		if($programas_img_ppal){ 
			$img_src = wp_get_attachment_image_src( $programas_img_ppal, 'img1186x233' );
		}
	?>
  
  style="background-image: url(<?php echo $img_src[0]; ?>)"
