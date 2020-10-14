<?php
/**
 * Template part for displaying post archives and search results
 */

?>

<?php
// News
$image = get_field('image');
$description = get_field('description');
// Upcoming Events
$start_date = get_field('start_date');
$end_date = get_field('end_date');
$registration_url = get_field('registration_url');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="mt-4">

	<div class="row">
		<div class="col-12 col-md-4">
			<a href="<?php if($registration_url): echo $registration_url; else: the_permalink(); endif; ?>"<?php if($registration_url): ?> target="_blank"<?php endif; ?>>
				<?php if($image): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" />
				<?php elseif(has_post_thumbnail()): ?>
					<?php the_post_thumbnail('medium', array('class' => 'mb-3')); ?>
				<?php else: ?>
					<img src="/wp-content/uploads/default-img.jpg" alt="<?php the_title(); ?>" />
				<?php endif; ?>
			</a>
		</div>
		<div class="col-12 col-md-8">
			<div class="blog-roll-content">
				<a href="<?php if($registration_url): echo $registration_url; else: the_permalink(); endif; ?>"<?php if($registration_url): ?> target="_blank"<?php endif; ?>>
					<h2 class="mb-1"><?php the_title(); ?></h2>
				</a>
				<?php if($date): ?>
					<span class="postdate intro-text"><?php echo $date->format('F j, Y g:i a'); ?></span>
				<?php else: ?>
					<span class="postdate intro-text"><?php the_time('F jS, Y'); ?></span> 
				<?php endif; ?>
				<?php if($description): ?>
					<p><?php echo wp_trim_words( $description, 40, '...' ); ?></p>
				<?php else: ?>
					<p><?php the_excerpt(); ?></p>
				<?php endif; ?>

				<?php if($registration_url): ?>
					<a href="<?php echo $registration_url; ?>" target="_blank" class="btn">Read More</a>
				<?php else: ?>
					<a href="<?php the_permalink(); ?>" class="btn">Read More</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

</article>
<hr class="my-5">
