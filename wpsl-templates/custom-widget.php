<?php
// Button Color
if($button_style == 'primary'):
    $btn_style = 'btn-primary';
elseif($button_style == 'secondary'):
    $btn_style = 'btn-secondary';
elseif($button_style == 'tertiary'):
    $btn_style = 'btn-tertiary';
elseif($button_style == 'quaternary'):
    $btn_style = 'btn-quaternary';               
elseif($button_style == 'white'):
    $btn_style = 'btn-white';
elseif($button_style == 'dark'):
    $btn_style = 'btn-dark';
endif;

// Button Hover Color
if($button_hover == 'primary'):
    $btn_hover = 'btn-primary-hover';
elseif($button_hover == 'secondary'):
    $btn_hover = 'btn-secondary-hover';
elseif($button_hover == 'tertiary'):
    $btn_hover = 'btn-tertiary-hover';
elseif($button_hover == 'quaternary'):
    $btn_hover = 'btn-quaternary-hover';               
elseif($button_hover == 'white'):
    $btn_hover = 'btn-white-hover';
elseif($button_hover == 'dark'):
    $btn_hover = 'btn-dark-hover';
endif;

$search_widget = new WPSL_Search_Widget();

if ( $template_data['category_filter'] ) {
    $category = $search_widget->create_category_filter( $template_data );
}
?>
<form action="<?php echo get_permalink( $template_data['page_id'] ); ?>" method="post" id="wpsl-widget-form">
    <?php do_action( 'wpsl_before_widget_input' ); ?>
    <p>
        <label for="wpsl-widget-search"><?php echo esc_html( $template_data['search_label'] ); ?></label>
        <input type="text" name="wpsl-widget-search" placeholder="<?php echo esc_attr( $template_data['search_placeholder'] ); ?>" id="wpsl-widget-search" value="" >
    </p>
    <?php
    do_action( 'wpsl_after_widget_input' );

    if ( isset( $category ) ) {
        echo $category;

        do_action( 'wpsl_after_widget_category' );
    }
    ?>
    <p>
        <input id="wpsl-widget-submit" type="submit" value="<?php _e( 'Search', 'wpsl-widget' ); ?>" class="<?php echo $btn_style; ?> <?php echo $btn_hover; ?>">
        <?php if ( $template_data['manually_locate'] ) { ?>
            <span class="wpsl-icon-direction" title="<?php _e( 'Use your current location', 'wpsl-widget' ); ?>">&#xe800;</span>
        <?php } ?>
    </p>
</form>