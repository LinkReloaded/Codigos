<!-- con esto se hace un loop de paginas -->
<?php
    $hijas = get_pages(
    array(
        'parent' => 657
    ));
    foreach( $hijas as $post ) {
        setup_postdata( $post );
?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p><?php the_excerpt(); ?></p>
<?php
    }
?>

<!-- PARAMETROS -->
<?
    $parametros = array(
        'sort_order' => 'ASC',
        'sort_column' => 'post_title',
        'hierarchical' => 1,
        'exclude' => '',
        'include' => '',
        'meta_key' => '',
        'meta_value' => '',
        'authors' => '',
        'child_of' => 0,
        'parent' => -1,
        'exclude_tree' => '',
        'number' => '',
        'offset' => 0,
        'post_type' => 'page',
        'post_status' => 'publish'
    );
?>
