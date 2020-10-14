<?php
/**
 * Template part for displaying the default page content
 */

?>

<?php
// Flexible Content
if( have_rows('content_blocks') ):
    while ( have_rows('content_blocks') ) : the_row();
        get_template_part( 'template-parts/partials/all', 'partials' );
    endwhile;
endif;


// Default WordPress Page Content
the_content();

wp_link_pages(
    array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
        'after'  => '</div>',
    )
);
?>
