<?php
/**
 * Template part for displaying the news single post
 */

?>

<?php 
$image = get_field('image');
$location = get_field('location');
$link_post_offsite = get_field('link_post_offsite');
$excerpt = get_field('excerpt');
$post_url = get_field('post_url');
$description = get_field('description');
?>

<div class="row page-top mb-2">
	<div class="col-12 col-md-8">
		<h1><?php the_title(); ?></h1>
		<span class="event-meta text-medium font-weight-bold"><?php echo $location; ?> - <?php the_date('F j, Y'); ?></span>
	</div>
	<div class="col-12 col-md-4">
		<img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" />
	</div>
</div>


<div class="row">
	<div class="col-12">
		<?php if($link_post_offsite): ?>
			<?php echo $excerpt; ?>
			<a href="<?php echo $post_url; ?>" target="_blank" class="orange font-weight-bold mr-3">Read More</a>
		<?php else: ?>
			<?php echo $description; ?>
		<?php endif; ?>
	</div>
</div>


<div class="row mb-5">
	<div class="col-12">
		<?php // Get current page URL 
		$shareURL = urlencode(get_permalink());

		// Get current page title
		$shareTitle = str_replace( ' ', '%20', get_the_title());

		// Get Post Thumbnail for pinterest
		$shareThumbnail = $image['url'];

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
