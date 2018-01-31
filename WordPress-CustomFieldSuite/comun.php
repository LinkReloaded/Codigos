<!-- imprimir texto plano -->
<?= CFS()->get('NOMBREDELCAMPO'); ?>

<!-- si existen datos a mostrar, los imprime -->
<? $campo = $cfs->get('NOMBREDELCAMPO'); if(!empty($campo)){ ?>
	<?= $campo; ?>
<? } ?>

<!-- imprimir select -->
<? $campo = $cfs->get('NOMBREDELCAMPO'); foreach ($campo as $etiqueta => $label) { echo $etiqueta; } ?>
