<?php
/**
 * The header for our theme
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />

	<!-- Header Scripts -->
	<?php 
	if (is_singular('communities')):
		$header_scripts = get_field('header_scripts', 'community_' . $terms_string[0]);
	else:
		$header_scripts = get_field('header_scripts', 'option');
	endif;

	if($header_scripts):
		echo $header_scripts; 
	endif; 
	?>

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<?php if(is_front_page()): ?>
		<!-- Google Site Verification -->
		<meta name="google-site-verification" content="fs8s5uF7ZblqNNhdrPe5JxmPIbtucZ9Lza6ZbhkkFPY" />
	<?php endif; ?>

	<?php wp_head(); ?>

	<?php // Page Scripts
		the_field('header_script'); 
	?>

	<?php // Theme/Community Options
		get_template_part( 'options/theme', 'styles' );
	?>

</head>

<?php // ACF Page ID
$page_id = get_field('page_id'); 
?>

<body <?php if($page_id): echo 'id="' . $page_id . '" '; endif; ?><?php body_class($page_id . '-page'); ?>>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

		<header id="masthead" class="bg-white">
			<?php get_template_part( 'template-parts/header/header' ); ?>
		</header><!-- #masthead -->

		<?php // Header Padding
		$remove_header_padding = get_field('remove_header_padding');

		if($remove_header_padding):
			$header_class = 'header-padding-sm';
		else:
			$header_class = 'header-padding-md';
		endif;
		?>
		
		<div id="content" class="<?php echo $header_class; ?>">
