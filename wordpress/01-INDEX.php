<!-- titulo del blog -->
<?php wp_title(); ?>

<!-- titulo de una pagina o single -->
<?php the_title(); ?>
<!-- el titulo cortado a 45 caracteres -->
<?php echo substr(get_the_title(),0,45).'...'; ?>

<!-- titulo de la categoria -->
<?php single_cat_title();?>

<!-- llama al archivo "header.php" dentro del theme -->
<?php get_header(); ?>

<!-- llama al archivo "footer.php" dentro del theme -->
<?php get_footer(); ?>

<!-- llama al archivo "sidebar.php" dentro del theme -->
<?php get_sidebar(); ?>

<!-- ruta del thmeme: wp-content/theme/mi theme/ -->
<?php bloginfo('template_url'); ?>
<?php include(TEMPLATEPATH . '/NOMBRE-DEL-ARCHIVO.php'); //caso php ?>

<!-- incluir archivos: modo normal -->
<?php include('RUTADELARCHIVO'); ?>

<!-- incluir archivos: modo wordpress: aca se incluye la ruta desde la raiz del theme, el archivo debe tener el nombre part-loquesea.php -->
<?php get_template_part('assets/inc/part','menulat'); ?>

<!-- ruta de donde esta instalado el wordpress -->
<?php bloginfo('url');?>

<!-- ruta de donde esta instalado el theme -->
<?php bloginfo('template_url');?>

<!-- Enlace permanente: enlaza una pagina en especifico y se convierte en amigable, XX se reemplaza por el ID de la pagina de destino -->
<?php echo get_permalink(XX); ?>

<!-- IMPRIMIR UN SHORCUT DEL PANEL -->
<?php echo do_shortcode('[NOMBREDELSHORTCUT]'); ?>

<!-- WP URL: en caso de las paginas -->
http://www.website.com/?page_id=XX

<!-- WP URL:  en caso de los post -->
http://www.website.com/?p=XX

<!-- WP URL:  en caso de las categorias -->
http://www.website.com/?cat=XX

<!-- WP URL:  en caso de listar post especiales -->
http://www.website.com/?post_type=XXX

<!-- cabecera para llamar una pagina especial en el template -->
<?php
	/*
	Template Name: PONER NOMBRE DEL TEMPLATE AQUI
	*/
?>

<!-- imprimir el nombre de una plantilla -->
<?php 	$plantilla = str_replace(".php", "", get_page_template_slug( $post->ID ) );echo $plantilla;  ?>

<!-- llamar datos de una pagina en duro a la cabecera de wordpress -->
<!-- en la pagina en duro (antes de llamar a la cabecera de wordpress ) -->
<?php $_GET['DATOPARAWP'] = 'este es el dato para WP'; ?>

<!-- en la cabecera de wordpress -->
<?php if(isset( $_GET['DATOPARAWP'])){ echo $_GET['DATOPARAWP'];}?>

<!-- cabecera de wordpress en paginas no wordpress -->
<?php
	require_once("../wp-config.php");
	$wp->init();$wp->parse_request();$wp->query_posts();
	$wp->register_globals();$wp->send_headers();
?>


<!-- menu editable, explicacion de uso conocido. 'container_class' => 'clase del div contenedor', 'theme_location' => 'nombre del menu, debe ser = al nombre que lleva en el function' -->
<?php wp_nav_menu( array( 'container_class' => 'menu_ppal', 'theme_location' => 'topmenu' ) ); ?>

<!-- enviar mensaje a WA -->
https://wa.me/56992398598?text=Hola%20me%20gustaría%20saber%20más%20información
