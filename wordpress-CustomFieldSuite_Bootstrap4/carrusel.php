<? //CODIGO CFS ?>
[{"post_title":"Carrusel","post_name":"carrousel-home","cfs_fields":[{"id":"1","name":"cfs_bnr","label":"Carrusel (v. 20180530)","type":"loop","notes":"","parent_id":0,"weight":0,"options":{"row_display":"0","row_label":"Slide","button_label":"Agregar slide","limit_min":"","limit_max":""}},{"id":"2","name":"cfs_bnr_imgD","label":"Imagen desktop","type":"file","notes":"Suba la imagen desktop, tama\u00f1o XXX x XXX pixeles.","parent_id":1,"weight":1,"options":{"file_type":"image","return_value":"id","required":"0"}},{"id":"3","name":"cfs_bnr_imgM","label":"Imagen mobile","type":"file","notes":"Suba la imagen mobile, tama\u00f1o XXX x XXX pixeles.","parent_id":1,"weight":2,"options":{"file_type":"image","return_value":"id","required":"0"}},{"id":"4","name":"cfs_bnr_url","label":"V\u00ednculo","type":"text","notes":"Escriba la URL como se indica,  http:\/\/www.nombredelaurl.com","parent_id":1,"weight":3,"options":{"default_value":"","required":"0"}},{"id":"5","name":"cfs_bnr_blank","label":"V\u00ednculo en ventana nueva?","type":"true_false","notes":"Seleccione si quiere que el v\u00ednculo habra en ventana nueva.","parent_id":1,"weight":4,"options":{"message":"","required":"0"}}],"cfs_rules":[],"cfs_extras":{"order":"0","context":"normal","hide_editor":"0"}}]

<? //CODIGO PHP ?>
<div class="container-fluid">
	<div id="cfsbnr" class="carousel slide" data-ride="carousel">
	   	<ol class="carousel-indicators"><?php $c=0; $a = CFS()->get('cfs_bnr'); foreach ($a as $b) { ?><li data-target="#cfsbnr" data-slide-to="<?php echo $c; ?>" class="<?php if($c==0){ ?>active <?php } ?>"></li><?php $c++; } ?></ol>
	   		<div class="carousel-inner">
	        	<?php $c=0; foreach ($a as $b) { ?>
	        	<div class="carousel-item <?php if($c==0){ ?>active <?php } ?>">
	            	<?php
						$d = 'img1280x400'; // Recorte imagen desktop
						$m = 'img500x500'; // Recorte imagen mobile
					?>
	            <div class="d-none d-md-block"><?php $u = $b['cfs_bnr_url']; if(!empty($u)){ ?><a href="<? echo $u; ?>" <?php $n = $b['cfs_bnr_blank']; if(!empty($n)){ echo 'target="_blank"'; } ?>><?php } echo wp_get_attachment_image( $b['cfs_bnr_imgD'] , $d , '', array( "alt" => get_the_title($b['cfs_bnr_imgD']), "class" => "img-fluid w-100" )); if(!empty($u)){ ?></a><?php } ?></div>
				<div class="d-block d-md-none"><?php if(!empty($u)){ ?><a href="<? echo $u; ?>" <?php if(!empty($n)){ echo 'target="_blank"'; } ?>><?php } echo wp_get_attachment_image( $b['cfs_bnr_imgM'] , $m , '', array( "alt" => get_the_title($b['cfs_bnr_imgM']), "class" => "img-fluid w-100" )); if(!empty($u)){ ?></a><?php } ?></div>
	        </div>
	    	<?php $c++; } ?>
	    </div>
	    <a class="carousel-control-prev" href="#cfsbnr" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
		<a class="carousel-control-next" href="#cfsbnr" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
	</div>
</div>
