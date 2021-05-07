<!-- titulo del blog -->
<? wp_title(); ?>

<!-- titulo de una pagina o single -->
<? the_title(); ?>
<!-- el titulo cortado a 45 caracteres -->
<? echo substr(get_the_title(),0,45).'...'; ?>

<!-- titulo de la categoria -->
<? single_cat_title();?>

<!-- llama al archivo "header.php" dentro del theme -->
<? get_header(); ?>

<!-- llama al archivo "footer.php" dentro del theme -->
<? get_footer(); ?>

<!-- llama al archivo "sidebar.php" dentro del theme -->
<? get_sidebar(); ?>

<!-- ruta del thmeme: wp-content/theme/mi theme/ -->
<? bloginfo('template_url'); ?>
<? include(TEMPLATEPATH . '/NOMBRE-DEL-ARCHIVO.php'); //caso php ?>

<!-- incluir archivos: modo normal -->
<? include('RUTADELARCHIVO'); ?>

<!-- incluir archivos: modo wordpress: aca se incluye la ruta desde la raiz del theme, el archivo debe tener el nombre part-loquesea.php -->
<? get_template_part('assets/inc/part','menulat'); ?>

<!-- ruta de donde esta instalado el wordpress -->
<? bloginfo('url');?>

<!-- ruta de donde esta instalado el theme -->
<? bloginfo('template_url');?>

<!-- Enlace permanente: enlaza una pagina en especifico y se convierte en amigable, XX se reemplaza por el ID de la pagina de destino -->
<?= get_permalink(XX); ?>

<!-- IMPRIMIR UN SHORCUT DEL PANEL -->
<?= do_shortcode('[NOMBREDELSHORTCUT]'); ?>

<!-- WP URL: en caso de las paginas -->
http://www.website.com/?page_id=XX

<!-- WP URL:  en caso de los post -->
http://www.website.com/?p=XX

<!-- WP URL:  en caso de las categorias -->
http://www.website.com/?cat=XX

<!-- WP URL:  en caso de listar post especiales -->
http://www.website.com/?post_type=XXX

<!-- cabecera para llamar una pagina especial en el template -->
<?
	/*
	Template Name: PONER NOMBRE DEL TEMPLATE AQUI
	*/
?>

<!-- imprimir el nombre de una plantilla -->
<? 	$plantilla =  str_replace(".php", "", get_page_template_slug( $post->ID ) );echo $plantilla;  ?>

<!-- llamar datos de una pagina en duro a la cabecera de wordpress -->
<!-- en la pagina en duro (antes de llamar a la cabecera de wordpress ) -->
<? $_GET['DATOPARAWP'] = 'este es el dato para WP'; ?>

<!-- en la cabecera de wordpress -->
<? if(isset( $_GET['DATOPARAWP'])){ echo $_GET['DATOPARAWP'];}?>

<!-- cabecera de wordpress en paginas no wordpress -->
<?
	require_once("../wp-config.php");
	$wp->init();$wp->parse_request();$wp->query_posts();
	$wp->register_globals();$wp->send_headers();
?>


<!-- menu editable, explicacion de uso conocido. 'container_class' => 'clase del div contenedor', 'theme_location' => 'nombre del menu, debe ser = al nombre que lleva en el function' -->
<? wp_nav_menu( array( 'container_class' => 'menu_ppal', 'theme_location' => 'topmenu' ) ); ?>

<!-- enviar mensaje a WA -->
https://wa.me/56992398598?text=Hola%20me%20gustaría%20saber%20más%20información
