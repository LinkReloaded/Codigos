<? //CODIGO CFS ?>
[{"post_title":"Tabulaci\u00f3n","post_name":"tabulacion","cfs_fields":[{"id":"14","name":"cfs_tabs","label":"Tabulaci\u00f3n (v. 20180604)","type":"loop","notes":"","parent_id":0,"weight":0,"options":{"row_display":"0","row_label":"Tab","button_label":"Agregar Tab","limit_min":"","limit_max":""}},{"id":"15","name":"cfs_tabs_titulo","label":"T\u00edtulo","type":"text","notes":"Escriba el t\u00edtulo.","parent_id":14,"weight":1,"options":{"default_value":"","required":"0"}},{"id":"16","name":"cfs_tabs_contenido","label":"Contenido","type":"wysiwyg","notes":"Escriba el contenido del bloque","parent_id":14,"weight":2,"options":{"formatting":"none","required":"0"}}],"cfs_rules":{"page_templates":{"operator":"==","values":["page-portada.php"]}},"cfs_extras":{"order":"0","context":"normal","hide_editor":"0"}}]

<? //CODIGO PHP ?>

<? // tabs metodo 1 ?>
<div class="container">
	<ul class="nav nav-tabs" role="tablist">
   		<?php $c=1; $a = CFS()->get('cfs_tabs'); foreach ($a as $b) { ?>
		<li class="nav-item"><a class="nav-link <?php if($c==1){ echo "active"; } ?>" data-toggle="tab" href="#bl<?php echo $c; ?>"><?php echo $b['cfs_tabs_titulo']; ?></a></li>
    		<?php $c++; } ?>
	</ul>
	<div class="tab-content">
	    <?php $c=1; foreach ($a as $b) { ?>
		<div id="bl<?php echo $c; ?>" class="container tab-pane <?php if($c==1){ echo "active"; } ?>">
      		<?php echo $b['cfs_tabs_contenido']; ?>
    	</div>
    	<?php $c++; } ?>
    </div>
</div>

<? // tabs metodo 2 ?>
<div class="container">
    <div class="row">
  	    <div class="col-3">
    	    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      		    <?php $c=1; $a = CFS()->get('cfs_tabs'); foreach ($a as $b) { ?>
      			<a class="nav-link <?php if($c==1){ echo "active"; } ?>" id="vtabs<?php echo $c; ?>" data-toggle="pill" href="#vtab-dest<?php echo $c; ?>" role="tab" aria-controls="vtabs<?php echo $c; ?>" aria-selected="<?php if($c==1){ echo "true"; } else { echo "false"; }; ?>"><?php echo $b['cfs_tabs_titulo']; ?></a>
      			<?php $c++; } ?>
      		</div>
  		</div>
  		<div class="col-9">
    	    <div class="tab-content" id="v-pills-tabContent">
    		    <?php $c=1; foreach ($a as $b) { ?>
      			<div class="tab-pane fade <?php if($c==1){ echo "show active"; } ?>" id="vtab-dest<?php echo $c; ?>" role="tabpanel" aria-labelledby="vtabs<?php echo $c; ?>"><?php echo $b['cfs_tabs_contenido']; ?></div>
				<?php $c++; } ?>
    		</div>
  		</div>
	</div>
</div>

<? // tabs metodo 3 ?>
<div class="container">
    <div class="row">
	    <ul class="nav nav-pills">
  		    <?php $c=1; $a = CFS()->get('cfs_tabs'); foreach ($a as $b) { ?>
  			<li class="nav-item"><a class="nav-link <?php if($c==1){ echo "active"; } ?>" data-toggle="pill" href="#pill<?php echo $c; ?>"><?php echo $b['cfs_tabs_titulo']; ?></a></li>
  				<?php $c++; } ?>
		</ul>
		<div class="tab-content">
  			<?php $c=1; foreach ($a as $b) { ?>
  			<div class="tab-pane container <?php if($c==1){ echo "show active"; } ?>" id="pill<?php echo $c; ?>"><?php echo $b['cfs_tabs_contenido']; ?></div>
  			<?php $c++; } ?>
		</div>
	</div>
</div>
	
