	<!-- 
    listar categorias, separar args con un & ('arg=1&arg=2'). explicacion de los args conocidos.
    title_li=0 // 
    use_desc_for_title=1 // 
    exclude=1 // esto saca del listado a la categorias mencionadas, 1 en este caso es la categoria "sin categoria"
    -->
    <? wp_list_categories('');?>
	
    <!-- categorias listadas, configuracion por defecto: sin titulo, sin descripcion para las categorias, saca la categoria 1 (sin categoria)-->
    <ul>
        <? wp_list_categories('title_li=0&use_desc_for_title=1&exclude=1'); ?>
    </ul>

    <!-- categorias listadas, configuracion por defecto: saca la categoria 1 (sin categoria) y MARCA LA CATEGORIA ACTUAL-->
    <ul>
        <? wp_list_categories('exclude=1&current_category=1'); ?>
    </ul>
    
    <!-- listado de archivos, limitado a los ultimos 12 meses -->
    <ul>
        <? wp_get_archives('type=monthly&limit=12&title_li=');?>
    </ul>
    
    <!-- listado de archivos con restriccion de padres e hijos -->
    <ul>
        <? wp_list_categories('orderby=id&show_count=1&use_desc_for_title=0&child_of=32'); ?>
    </ul>
        
    <!-- listado de categorias con selector de la categoria actual en el single   -->
    <ul>
    <? 	
        $catsy = get_the_category(); $myCat = $catsy[0]->cat_ID; //obtengo la categoria actual y extraigo su ID
        if(is_single()){ 
            wp_list_categories('title_li=0&use_desc_for_title=1&exclude=1&child_of=4&current_category='.$myCat); //imprimo su id para poder manejarla por css
        }else{ 
            wp_list_categories('title_li=0&use_desc_for_title=1&exclude=1&child_of=4'); 
        }
    ?>
    </ul>

	<!-- obtener el nombre de la categoria -->
	<?
		$category = get_the_category(); //obtengo la info de las categorias
		$i=0; 
		$nombreCat=''; //vacio la variable
		for($i;$i<=count($category);$i++){ 
			$nombreCat .= $category[$i]->slug; $nombreCat .= " ";
		} 
		echo $nombreCat; //imprimo el resultado
	?>		
	
	<!-- listado de categorias hijo de cierta categoria XXX se usa para repetir la variable en la misma pagina -->
	<? 	
		$catPadreXXX = 255; //defino la categoria padre 
		$args = array('child_of' => $catPadreXXX); //obtengo sus hijos 
		$categories = get_categories( $args ); 
		foreach ($categories as $cat){ 
			$arrayCatYYY[] = $cat->cat_ID; 
		}
		$arrayCatYYY[]=$catPadreXXX; //agrego al listado de categorias hijo la propia categoria padre
	?>
	<? if(is_category($arrayCatYYY)){ echo"contenido"; } //el resultado se imprime como un array y sirve para hacer condicionales ?>
	
	<!-- obtener ID de la cierta categoria dentro de un LOOP (SOLO OBTIENE LA PRIMERA CATEGORIA DEL POST, INDEPENDIENTE DEL ORDEN)-->
	<? 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); //comienzo del loop
			$category = get_the_category(); //obtengo el listado de categorias 
			$prodActual = $category[0]->cat_ID; //a la primera categoria le obtengo el ID
			echo $prodActual; //imprimo la categoria resultante
		endwhile; endif; //fin del loop
	?>
	
	<!-- obtengo el nombre de cierta categoria y la imprimo como un enlace -->
	<? 
		$category = get_the_category(); //obtengo la informacion por defecto de la categoria 
		$i=0; //indice del arreglo
		$nombreCat=''; // variable del nombre de la categoria
		$el_enlace_de_la_categoria=''; //variable contenedora de la categoria
		
		for($i;$i<=count($category);$i++){ //reccorro mi arreglo hasta el numero de objetos predefinidos en el, luego sumo 1 a mi indice para obtener los datos del objeto siguiente
			$nombreCat .= $category[$i]->slug; // obtener el slug de la categoria y ponerlo en la variable nombre
			$nombreCat .= " "; //concatena un espacio al final del nombre de la categoria
			// ESCRIBO EL ID DE LAS CATEGORIA QUE NO QUIERO QUE APAREZCAN
			if($i!=0&&$i!=2){ //para agregar mas categoria que no quiero que aparezcan uso &&$1!=XX 
				if($category[$i]->name!=""){ //solo imprime si el nombre del category tiene informacion
					$category_id = get_cat_ID($category[$i]->name); // obten el ID del nombre de la categoria seleccionada
					$category_link = get_category_link( $category_id ); //obten la URL del nombre de la categoria seleccionada
					$el_enlace_de_la_categoria .='<a href="'.esc_url( $category_link ).'" title="'.$category[$i]->name.'" class="'.$category[$i]->name.'">'.$category[$i]->name.'</a>, '; 
					//creo el contenedor de la categoria concatenando el nombre y la URL previamente definidos
				}
			}
		}
		
		$el_enlace_de_la_categoria= substr($el_enlace_de_la_categoria, 0, strlen($el_enlace_de_la_categoria)-2); //elimino el espacio y la coma del ultimo nombre impreso
		echo $el_enlace_de_la_categoria; //IMPRIMO EL RESULTADO
	?>

	<!-- Imprimir la descripcion de la categoria con una imagen asociada: requiere imprimir el plugin "Categories Images" -->
	IMAGEN: <img src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>"/>
	DESCRIPCION: <?php echo category_description( $category_id ); ?>
	

	<!-- imprimir SOLO LA URL de la categoria-->
	<?	
		$the_cat = get_the_category();
		$category_name = $the_cat[0]->cat_name;
		$category_description = $the_cat[0]->category_description;
		$category_link = get_category_link( $the_cat[0]->cat_ID );
	?>
	<a href="<?= $category_link; ?>"><p>NOMBRE</p></a>

	<!-- obtener el nombre de una taxonomia -->	
	<? 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); //hago un loop simple
		
		$terms = get_the_terms($post->ID, 'cliente'); //llamo a los valores de una taxonomia determinada 
		foreach ($terms as $term) { //hago un loop con los resultados
			$miterm = $term->name;  //obtengo el nombre de la taxonomia name, slug
			echo "<br/>NOMBRE: ".$miterm; //imprimo el nombre
		} 
		
		endwhile; endif; //cierro el loop
	?>

	<!-- lista la categoria a la que pertenece el post... si hay mas de una las separa con una coma y un espacio (USAR DENTRO DEL LOOP) -->
	<? the_category(', '); ?>

	<!-- lista la categoria pero imprime solo los nombres de ella, sin link ni nada  (USAR DENTRO DEL LOOP) -->
	<? $category = get_the_category(); $i=0; $nombreCat=''; for($i;$i<=count($category);$i++){ $nombreCat .= $category[$i]->name; $nombreCat .= " ";} ?>
	<?= $nombreCat; //ubicar donde se desea imprimir la informacion?>
	
	<?  $category = get_the_category(); //obtengo la info de las categorias
		$i=0; 
		$aCat = array();// creo un nuevo arreglo
		for($i;$i<=count($category);$i++){ 
			$aCat[]= $category[$i]->slug; //obtengo el slug en el ciclo
		} 
		$boolPertenece= false; //creo una variable falsa
		foreach($aCat as $categoriasArreglo){
			if($categoriasArreglo=="privada"){ //busco el elemento a evaluar
				$boolPertenece = true; //si la condicion se cumple la variable es verdadera
			}
		}
		if($boolPertenece) {?>
		<!-- el contenido -->
	<? } ?>

	
	
	
	


	
	
	
		
		
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

	<!-- lista la fecha en que fue publicado el post-->
	<? the_time('d/m/y'); ?>

	<!-- coloca un numero de palabras determinadas en el extracto (USAR DENTRO DEL LOOP) y usar esta funcion tambien en functions.php -->
	<?= excerpt(35); ?>

	<!-- cabecera de wordpress en paginas no wordpress -->    
	<?	require_once("../wp-config.php");
        $wp->init();$wp->parse_request();$wp->query_posts();
        $wp->register_globals();$wp->send_headers();
    ?>  

	<!-- imprimir el nombre de una plantilla -->
	<? 	$plantilla =  str_replace(".php", "", get_page_template_slug( $post->ID ) );echo $plantilla;  ?>		

	<!-- llamar datos de una pagina en duro a la cabecera de wordpress -->
		<!-- en la pagina en duro (antes de llamar a la cabecera de wordpress ) -->
		<? $_GET['DATOPARAWP'] = 'este es el dato para WP'; ?>
		
		<!-- en la cabecera de wordpress -->
		<? if(isset( $_GET['DATOPARAWP'])){ echo $_GET['DATOPARAWP'];}?>


	<!-- menu editable, explicacion de uso conocido. 'container_class' => 'clase del div contenedor', 'theme_location' => 'nombre del menu, debe ser = al nombre que lleva en el function' -->
    <? wp_nav_menu( array( 'container_class' => 'menu_ppal', 'theme_location' => 'topmenu' ) ); ?>	


    <!-- llama al campo especial dentro del loop -->
	<?= get_post_meta($post->ID, 'PREFIJO_NOMBREDELCAMPOESPECIAL', true); ?>	
	
	<!-- validador si el campo esta vacio, primero genero una variable que contiene el elemento a imprimir, y despues le hago una condicion a la variable -->
	<? $postPortada = get_post_meta($post->ID, 'p_url_portada'); //en este caso estoy llamando a un campo especial 
		if (!empty($postPortada)) { //si la variable no esta vacia, imprime el contenido ?>                
		 <!-- el contenido -->
	<? }?>
	
	
		<!-- CONTACT FORM: ejemplo en el panel "Formulario" de WP -->
	<p>Nombre*:<br />[text*  your-nombre]</p> 
	<p>Teléfono:<br />[text  your-telefono] </p>
	<p>Mail*:<br />[email* your-email] </p>
	<p>Consulta<br />[textarea your-consulta] </p>
	<p>[submit "Enviar"]</p>
	<p 	style="font-size: 10px;"><i>* Campos requeridos</i></p>

	<!-- CONTACT FORM: ejemplo en el panel "E-mail" de WP -->
	Para: cesar@4sale.cl
	De: Sitio  Web Changan <noreply@4sale.cl>
	Asunto: formulario de contacto CHANGAN
	Encabezados adicionales: reply-to:  [your-nombre]<[your-email]>
	
	Cuerpo del mensaje: 
		Datos enviados:
			Nombre: [your-nombre]
			Teléfono: [your-telefono]
			E-mail: [your-email]
			Cuerpo del mensaje:
			your-consulta]
			--
			Este e-mail se ha enviado vía formulario de contacto desde Changan http://desarrollo.4sale.cl/~clientes/changan.cl
			
	<!-- DATOS EN EL PLUGIN SMTP -->
	From Email: noreply@4sale.cl
	From Name: <!-- ACA SE PUEDE PONER EL NOMBRE DEL REMITENTE -->
	Mailer: (X) Send all Wordpress emails via SMTP.
	SMTP Host: email-smtp.us-east-1.amazonaws.com
	SMTP Port: 25
	Encryption : (X) Use TLS encryption. This is not the same as STARTTLS. For most servers SSL is the recommended option.
	Authentication: (X) Yes: Use SMTP authentication.
	Username: *****
	Password: *****
	
		<!-- IF: si estoy en el home -->
	<? if(is_home()){ echo "estoy en el home"; } else { echo "estoy en otra pagina"; }; ?>

	<!-- IF: si estoy en alguna pagina -->
	<? if(is_page()){ echo "estoy en una pagina"; } else { echo "no estoy en una pagina"; }; ?>

	<!-- IF: si estoy en algun post -->
	<? if(is_post()){ echo "estoy en un post"; } else { echo "no estoy en un post"; }; ?>

	<!-- IF: si estoy en alguna categoria -->
	<? if(is_category()){ echo "estoy en una categoria"; } else { echo "no estoy en una categoria"; }; ?>

	<!-- si NO ESTAS en las páginas cuyos ID esten dentro del array... imprime el contenido -->
	<? if (!is_page(array(01,02,03))){ ?><!-- contenido--><? }; ?>

	<!-- SI ESTAS en las páginas cuyos ID esten dentro del array... imprime el contenido -->
	<? if (is_page(array(01,02,03))){?><!-- contenido--><? }; ?>

	<!-- SI EXISTEN LOS POST muestra el contenido 01 si no, muestra el contenido 02 (esto es util en el search.php) -->
	<? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- contenido 01 -->              
	<? endwhile; else : ?>
		<!-- contenido 02 -->
	<? endif; ?>

	<!-- asignar variable dependiendo de la pagina en donde este -->
	<? 
		$paginaActual = get_the_ID();
		switch ($paginaActual) {
			case "10":
				$variable = "nombre1"; 
				break;
			case "12":
				$variable = "nombre2";
				break;
			case "14":
				$variable = "nombre3";
				break;
			default:
				$variable = "nombre por defecto";
				break;
		}
	?> 
	
	
		<!-- si EXISTE LA IMAGEN DESTACADA, la muestra, si no muestro el THUMB -->
	<? $thumbdefecto = has_post_thumbnail(); if (!empty($thumbdefecto)) {?>
	<a href="<? the_permalink(); ?>"><? the_post_thumbnail('imgcat'); ?></a><?  } else { ?><a href="<? the_permalink();?>"><? cim_the_thumb('thumbnail');?></a>
	<? } ?>
	
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

	
	
<!-- tabla HTML a partir de un .XLS -->
<?     
	$archivo = "URL-DEL-ARCHIVO"; // campo donde esta el .xls 
	$urlbaseWP = get_bloginfo('url');    // ruta base del WP     
	$archivo2 =  str_replace( $urlbaseWP."/","", $archivo ); 

	$respXls = "";
	require_once 'classes/excel_reader2.php'; //SE DEBE OBTENER EL ARCHIVO 
	$xls = new Spreadsheet_Excel_Reader( $archivo2);
	$rows = $xls->rowcount();
	$cols = $xls->colcount();
	$tabla = "<table>";
	$sheet = 0;
	for ($row = 1; $row <= $xls->rowcount($sheet); $row++) {                
	$tabla.="<tr>";                
		for ($col = 1; $col <= $xls->colcount($sheet); $col++) {    

			$valor = $xls->val($row, $col, $sheet);                                                                          
			$numColSpan = $xls->colspan($row, $col, $sheet);
			$numRowSpan = $xls->rowspan($row, $col, $sheet);  

			if ($numColSpan > 1) {
				$colspan = " colspan=" . $numColSpan;
				for ($i = $col; $i <= ($col + $numColSpan - 1); $i++) {
					$casillasOmitidas[$row][$i] = true;
				}
				$col+=($numColSpan - 1);
			} else {
				$colspan = "";
			}
			if ($numRowSpan > 1) {
				$rowspan = " rowspan=" . $numRowSpan;
				for ($r = $row; $r <= ($row + $numRowSpan - 1); $r++) {
					$casillasOmitidas[$r][$col] = true;
				}
			} else {
				$rowspan = "";
			} 

			if($row == 1){
					$tabla.="<th" . $colspan . $rowspan . ">" . $valor;
				$tabla.="</th>";
			}else{
				$tabla.="<td" . $colspan . $rowspan . ">" . $valor;
				$tabla.="</td>"; 
			}                    
				   
		}  
		$tabla.="</tr>";                
	}
	$tabla.="</table>";
	echo $respXls . $tabla;
?>	