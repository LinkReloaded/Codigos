<!-- prestashop IF si estoy en la pagina de productos -->
{if $page_name == 'product'} <!--ALGO--> {/if}

<!-- prestashop IF si estoy en la home -->
{if $page_name == 'index'} <!--ALGO--> {/if}

<!-- prestashop IF si no quiero que aparezca en el home pero si en otros lasdos-->
{if $page_name == 'index'} <!-- NADA --> {else} <!-- ALGO --> {/if}

<!-- obtener ID de la categoria -->
var mivariable = {$category->id};

<!-- condicional segun parametros -->
{if $smarty.get.id_product == '425'}{/if}

<!--  include de tpl -->
{include file="$tpl_dir./panel_btn_volver.tpl"}

<!-- identificar un producto y poner codigo en el -->
{if Tools::getValue('id_product') == [ID DEL PRODUCTO] }
	soy el producto {Tools::getValue('id_product')|escape:'html':'UTF-8'} [<-- obtiene el id del producto ]
{/if}