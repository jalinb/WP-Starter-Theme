<?php
/**
 * Template part for routing posts
 */

?>

<?php
// News Category ID
// $news_cat = 2;
// Blog Category
// blog_cat = 43;


// News Category
// if(in_category($news_cat)):
// 	get_template_part( 'template-parts/content/news', 'post' );
// Events Post Type
// elseif(is_singular('events')):
// 	get_template_part( 'template-parts/content/events', 'post' );
// else:
//	get_template_part( 'template-parts/content/default', 'post' );
// endif;

get_template_part( 'template-parts/content/default', 'post' );
?>
