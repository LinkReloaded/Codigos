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

<!-- lista las categorias que tiene post como <a>XXXX</a><br/> -->
<?php wp_list_categories('orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of=1&hierarchical=0&style=none&hide_empty=1');  ?>
