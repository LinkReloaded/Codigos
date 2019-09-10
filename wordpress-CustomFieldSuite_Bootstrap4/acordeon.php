<? //CODIGO CFS ?>
[{"post_title":"Acorde\u00f3n","post_name":"accordion","cfs_fields":[{"id":"6","name":"cfs_acc","label":"Acorde\u00f3n (v. 20180531)","type":"loop","notes":"","parent_id":0,"weight":0,"options":{"row_display":"0","row_label":"Bloque","button_label":"Agregar bloque","limit_min":"","limit_max":""}},{"id":"7","name":"cfs_acc_titulo","label":"T\u00edtulo","type":"text","notes":"Escriba el t\u00edtulo.","parent_id":6,"weight":1,"options":{"default_value":"","required":"0"}},{"id":"8","name":"cfs_acc_contenido","label":"Contenido","type":"wysiwyg","notes":"Escriba el contenido del bloque","parent_id":6,"weight":2,"options":{"formatting":"none","required":"0"}}],"cfs_rules":[],"cfs_extras":{"order":"0","context":"normal","hide_editor":"0"}}]

<? //CODIGO PHP ?>
<div class="container">
	<div id="acordeon">
		<?php $c=1; $a = CFS()->get('cfs_acc'); foreach ($a as $b) { ?>
  		<div class="card">
    		<div class="card-header">
      			<a class="collapsed card-link" data-toggle="collapse" href="#bloque<?php echo $c; ?>"><?php echo $b['cfs_acc_titulo']; ?></a>
    		</div>
    		<div id="bloque<?php echo $c; ?>" class="collapse <?php if($c==1){ echo "show"; } ?>" data-parent="#acordeon">
      			<div class="card-body"><?php echo $b['cfs_acc_contenido']; ?></div>
    		</div>
  		</div>
		<?php $c++; } ?>
	</div>
</div>
