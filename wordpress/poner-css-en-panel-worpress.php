<?
	add_action( 'admin_head', 'admin_css' );
	function admin_css(){
?>
   	<style>
		/* solucion al bug de CCTM */
		body.modal-open {
			overflow:visible !important;
		}
	</style>
<?
	}
?>
