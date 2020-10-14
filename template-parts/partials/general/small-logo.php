<?php
/**
 * The template for displaying the small logo
 */

?>

<?php 
$small_logo = get_field('small_logo', 'option'); 
?>

<a href="<?php echo get_site_url(); ?>"><?php echo file_get_contents($small_logo); ?></a>
