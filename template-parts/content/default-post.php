<?php
/**
 * Template part for displaying default posts
 */
 
?>
 <?php
 if (is_singular('communities')):
	$wrap_class = 'community-content';
 else:
	$wrap_class = 'post-content';
 endif;
 ?>

<div class="<?php echo $wrap_class; ?>">
	<?php
	// Flexible Content
	if( have_rows('content_blocks') ):
		while ( have_rows('content_blocks') ) : the_row();
			get_template_part( 'template-parts/partials/all', 'partials' );
		endwhile;
	endif;

	the_content(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		)
	);

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
			'after'  => '</div>',
		)
	);
	?>

</div>
