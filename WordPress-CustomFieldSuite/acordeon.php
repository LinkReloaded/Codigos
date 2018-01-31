<!-- codigo para el CFS -->
[{"post_title":"Acorde\u00f3n","post_name":"acordeon","cfs_fields":[{"id":"1","name":"acordeon01","label":"Acorde\u00f3n v 1.0.1 [2016-12-21]","type":"loop","notes":"","parent_id":0,"weight":0,"options":{"row_display":"0","row_label":"Bucle de filas","button_label":"A\u00f1adir Fila","limit_min":"","limit_max":""}},{"id":"2","name":"acordeon01_titulo","label":"Titulo","type":"text","notes":"Escriba el t\u00edtulo","parent_id":1,"weight":1,"options":{"default_value":"","required":"0"}},{"id":"3","name":"acordeon01_contenido","label":"Contenido","type":"wysiwyg","notes":"Escriba el contenido","parent_id":1,"weight":2,"options":{"formatting":"default","required":"0"}}],"cfs_rules":[],"cfs_extras":{"order":"0","context":"normal","hide_editor":"0"}}]

<!-- acordeon -->
<? 
    $acordeon = "accordion"; //nombre del acordeon
    $campoacordeon = CFS()->get('acordeon01'); if(count($campoacordeon)>0){
?>
<div class="panel-group" id="<?= $acordeon; ?>">
    <? $contador=1; $fields = CFS()->get('acordeon01'); foreach ($fields as $field) { ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#<?= $acordeon; ?>" href="#collapse<?= $contador; ?>"><?= $field['acordeon01_titulo']; ?></a>
            </h4>
        </div>
        <div id="collapse<?= $contador; ?>" class="panel-collapse collapse <? if($contador==1){?>in<? } ?>">
            <div class="panel-body">
                <?= $field['acordeon01_contenido']; ?>
            </div>
        </div>
    </div>       
    <? $contador++; } ?>
</div>
<? } ?>
<!-- acordeon -->