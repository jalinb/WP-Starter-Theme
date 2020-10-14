<?php
/**
 * Template part for displaying the events single post
 */

?>

<?php 
$start_date = get_field('start_date');
$end_date = get_field('end_date');
$location = get_field('location');
$cost = get_field('cost');
$add_description = get_field('add_description');
$description = get_field('description');
$registration_url = get_field('registration_url');

// get raw date
$start_date = get_field('start_date', false, false);
$end_date = get_field('end_date', false, false);
// make date object
$start_date = new DateTime($start_date);
$end_date = new DateTime($end_date);
?>

<div class="row page-top mb-2">
	<div class="col-12">
		<h1><?php the_title(); ?></h1>
		<span class="event-meta font-weight-bold"><?php echo $start_date->format('F j'); ?>-<?php echo $end_date->format('j'); ?> <?php echo $end_date->format('Y'); ?></span>
	</div>
</div>


<div class="row">
	<div class="col-12">
        <?php echo $description; ?>
        <div class="blue">
            <p><?php echo $location; ?> <?php echo $cost; ?></p>
        </div>
        <a href="<?php echo $registration_url; ?>" target="_blank" class="btn mb-5">Register</a>
	</div>
</div>


<div class="row mb-5">
	<div class="col-12">
		<?php // Get current page URL 
		$shareURL = urlencode(get_permalink());

		// Get current page title
		$shareTitle = str_replace( ' ', '%20', get_the_title());

		// Get Post Thumbnail for pinterest
		$shareThumbnail = $image['sizes']['swatch-img'];

		$twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle;
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$shareURL.'&amp;media='.$shareThumbnail.'&amp;description='.$shareTitle;
		?>

		<div class="share-social">
			<span class="share-title">Share on:</span>
			<a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
			<a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
			<a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
			<a class="share-link share-pinterest" href="<?php echo $pinterestURL; ?>" data-pin-custom="true" target="_blank">Pinterest</a>
		</div>
	</div>
</div>
