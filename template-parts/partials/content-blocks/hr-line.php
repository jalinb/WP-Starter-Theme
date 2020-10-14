<?php
/**
 * The template for displaying the Horizontal Line partial
 */

//Advanced Custom Fields 
$hide_block 			= get_sub_field('hide_block');
$show_arrow				= get_sub_field('show_arrow');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom'); 
?>

<?php if( empty($hide_block) ) : ?>

	<?php
	$size = get_sub_field('size');

	if ($size == '25'):
		$size = 'w-25';
	elseif ($size == '50'):
		$size = 'w-50';
	elseif ($size == '75'):
		$size = 'w-75';
	else:
		$size = 'w-100';
	endif;
	?>

	<!-- HR
	========================= -->
	<section class="hr-bar hr-line<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php if($show_arrow): ?>
						<div class="hr-arrow position-absolute d-flex align-items-center justify-content-center">
							<i class="far fa-angle-down"></i>
						</div>
					<?php endif; ?>
					<hr class="hr bg-dark <?php echo $size; ?>">
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>
