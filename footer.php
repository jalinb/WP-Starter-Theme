<?php
/**
 * The template for displaying the footer
 */

?>

	</div><!-- #content -->

	<?php 
	$remove_footer_padding = get_field('remove_footer_padding'); 
	?>
	
	<!-- Footer
    ========================= -->
	<footer id="colophon" class="site-footer<?php if(!$remove_footer_padding): ?> footer-padding<?php endif; ?>">
		<?php get_template_part( 'template-parts/footer/footer', 'content' ); ?>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
<?php the_field('footer_script'); ?>

</body>
</html>
