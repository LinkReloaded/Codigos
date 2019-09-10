<!-- llama al campo especial dentro del loop -->
<?= get_post_meta($post->ID, 'PREFIJO_NOMBREDELCAMPOESPECIAL', true); ?>

<!-- validador si el campo esta vacio, primero genero una variable que contiene el elemento a imprimir, y despues le hago una condicion a la variable -->
<? $postPortada = get_post_meta($post->ID, 'p_url_portada'); //en este caso estoy llamando a un campo especial
	if (!empty($postPortada)) { //si la variable no esta vacia, imprime el contenido ?>
	<!-- el contenido -->
<? }?>
