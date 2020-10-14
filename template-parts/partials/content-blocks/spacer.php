<?php
/**
 * Template part for displaying the spacer partial
 */

//Advanced Custom Fields 
$hide_block = get_sub_field('hide_block');
?>

<?php if( empty($hide_block) ) : ?>

	<!-- SPACER
	========================= -->
	<?php
		// Large Size
		$show_lg_spacer = get_sub_field('show_lg_spacer');
		$lg_amount = get_sub_field('lg_amount');
		
		// Medium Size
		$show_md_spacer = get_sub_field('show_md_spacer');
		$md_amount = get_sub_field('md_amount');
		
		// Small Size
		$show_sm_spacer = get_sub_field('show_sm_spacer');
		$sm_amount = get_sub_field('sm_amount');
		
		// Default Size
		$default_amount = get_sub_field('default_amount');
	?>
	
	<section class="spacer">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="<?php if($default_amount): ?>my-<?php echo $default_amount; endif; ?> <?php if($show_sm_spacer): ?>my-sm-<?php echo $sm_amount; endif; ?> <?php if($show_md_spacer): ?>my-md-<?php echo $md_amount; endif; ?> <?php if($show_lg_spacer): ?>my-lg-<?php echo $lg_amount; endif; ?>"></div>
	        </div>
	    </div>
	</section>

<?php endif; ?>
