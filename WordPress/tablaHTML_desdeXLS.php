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