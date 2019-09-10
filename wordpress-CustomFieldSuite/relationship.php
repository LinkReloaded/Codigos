<? $fields = CFS()->get('NOMBREDELCAMPO'); foreach ($fields as $field) { ?>
    <?= date( 'j / m / Y', strtotime( $field['NOMBRECAMPOLOOP'])); ?>
    <?
        $values = $field['agenda_post'];
        foreach ( $values as $post_id ) {
            $the_post = get_post( $post_id );
            $el_titulo = $the_post->post_title;
            $la_url = $the_post->guid;
        }
    ?>
<? } ?>
