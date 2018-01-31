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
	