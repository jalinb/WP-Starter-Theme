<?php
/**
 * Template part for displaying the HubSpot blog partial
 */

$hide_block             = get_sub_field('hide_block');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');
$title_color            = get_sub_field('title_color');
$title                  = get_sub_field('title');
$sub_title              = get_sub_field('sub_title');
$api_key                = get_field('hubspot_api_key', 'option');
$filter_by_tags         = get_sub_field('filter_by_tags');
$hubspot_tags           = get_sub_field('hubspot_tags');
$post_title_color       = get_sub_field('post_title_color');
$image_border_color     = get_sub_field('image_border_color');
$button_style           = get_sub_field('button_style');
$button_hover           = get_sub_field('button_hover');
$button_position        = get_sub_field('button_position');
$button_text            = get_sub_field('button_text');
$blog_limit             = get_sub_field('blog_limit');
$blog_link_title        = get_sub_field('blog_link_title');
$blog_url               = get_sub_field('blog_url');
$apiKey                 = get_field('hubspot_api_key', 'option');

// Title Color
if($title_color == 'primary'):
    $ttl_color = 'color-primary';
elseif($title_color == 'secondary'):
    $ttl_color = 'color-secondary';
elseif($title_color == 'tertiary'):
    $ttl_color = 'color-tertiary';
elseif($title_color == 'quaternary'):
    $ttl_color = 'color-quaternary';               
elseif($title_color == 'white'):
    $ttl_color = 'color-white';
elseif($title_color == 'dark'):
    $ttl_color = 'color-dark';
elseif($title_color == 'black'):
    $ttl_color = 'color-black';
elseif($title_color == 'default'):
    $ttl_color = '';
endif;


// Single Post Title Color
if($post_title_color == 'primary'):
    $post_ttl_color = 'color-primary';
elseif($post_title_color == 'secondary'):
    $post_ttl_color = 'color-secondary';
elseif($post_title_color == 'tertiary'):
    $post_ttl_color = 'color-tertiary';
elseif($post_title_color == 'quaternary'):
    $post_ttl_color = 'color-quaternary';               
elseif($post_title_color == 'white'):
    $post_ttl_color = 'color-white';
elseif($post_title_color == 'dark'):
    $post_ttl_color = 'color-dark';
elseif($post_title_color == 'black'):
    $post_ttl_color = 'color-black';
elseif($post_title_color == 'default'):
    $post_ttl_color = '';
endif;


// Image Border Color
if($image_border_color == 'primary'):
    $img_border_color = 'color-primary';
elseif($image_border_color == 'secondary'):
    $img_border_color = 'color-secondary';
elseif($image_border_color == 'tertiary'):
    $img_border_color = 'color-tertiary';
elseif($image_border_color == 'quaternary'):
    $img_border_color = 'color-quaternary';               
elseif($image_border_color == 'white'):
    $img_border_color = 'color-white';
elseif($image_border_color == 'dark'):
    $img_border_color = 'color-dark';
elseif($image_border_color == 'black'):
    $img_border_color = 'color-black';
endif;


// Button Color
if($button_style == 'primary'):
    $btn_style = 'color-primary';
elseif($button_style == 'secondary'):
    $btn_style = 'color-secondary';
elseif($button_style == 'tertiary'):
    $btn_style = 'color-tertiary';
elseif($button_style == 'quaternary'):
    $btn_style = 'color-quaternary';               
elseif($button_style == 'white'):
    $btn_style = 'white';
elseif($button_style == 'dark'):
    $btn_style = 'dark';
endif;

// Button Hover Color
if($button_hover == 'primary'):
    $btn_hover = 'color-primary-hover';
elseif($button_hover == 'secondary'):
    $btn_hover = 'color-secondary-hover';
elseif($button_hover == 'tertiary'):
    $btn_hover = 'color-tertiary-hover';
elseif($button_hover == 'quaternary'):
    $btn_hover = 'color-quaternary-hover';               
elseif($button_hover == 'white'):
    $btn_hover = 'color-white-hover';
elseif($button_hover == 'dark'):
    $btn_hover = 'color-dark-hover';
endif;

// Button Position
if($button_position == 'center'):
    $btn_position = 'text-center';
elseif($button_position == 'right'):
    $btn_position = 'text-right';
else:
    $btn_position = 'text-left';
endif;


if($filter_by_tags):
    $tags = "&topic_id=$hubspot_tags";
else:
    $tags = '';
endif;
?>

<?php if( empty($hide_block) ) : ?>

    <!-- HubSpot Blog Roll
	========================= -->
    <section class="hubspot-blog bg-light<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?> py-5">
        <div class="container">

            <div id="blog-header" class="row">
                <div class="col-12 text-center">
                    <?php if($sub_title): ?>
                        <h2 class="mb-1 <?php echo $ttl_color; ?>"><?php echo $title; ?></h2>
                        <p class="mb-3"><?php echo $sub_title; ?></p>
                    <?php else: ?>
                        <h2 class="mb-3 <?php echo $ttl_color; ?>"><?php echo $title; ?></h2>
                    <?php endif; ?>
                </div>
            </div>

            <div id="blog-link" class="row">
                <div class="col-12 text-center mb-5">
                    <a class="btn btn-secondary btn-primary-hover" href="https://<?php echo $blog_url; ?>"><?php echo $blog_link_title; ?></a>
                </div>
            </div>

            <div id="blog-roll" class="row">
                <?php

                if($apiKey):

                    $url = "https://api.hubapi.com/content/api/v2/blog-posts?hapikey=$apiKey$tags&state=PUBLISHED&limit=$blog_limit"; // path to your JSON file
                    $data = file_get_contents($url); // put the contents of the file into a variable
                    $tags = json_decode($data,true); // decode the JSON feed

                    foreach( $tags['objects'] as $tag ) : 

                        $blog_url           = $tag['live_domain'];
                        $post_id            = $tag['id'];
                        $title              = $tag['html_title'];
                        $excerpt            = $tag['meta_description'];
                        $image_url          = $tag['featured_image'];
                        $image_alt          = $tag['featured_image_alt_text'];
                        $post_url           = $tag['url'];
                        $raw_date           = $tag['publish_date'];
                        $author             = $tag['blog_author']['display_name'];
                        $author_slug        = $tag['blog_author']['slug'];
                        $author_url         = "https://$blog_url/author/$author_slug";
                        //$formatted_date     = date('M d, Y g:sA',$raw_date/1000);
                        $formatted_date     = date('M d, Y',$raw_date/1000);
                        
                        if($blog_limit == 1): ?>

                            <div id="blogID-<?php echo $post_id; ?>" class="col-12 text-center mb-4">
                                <div class="h-100 bg-white shadow row">
                                    <div class="col-12 col-sm-6 px-0">
                                        <div class="blog-img">
                                            <a href="<?php echo $post_url; ?>">
                                                <img class="featured-img img-fluid img-border <?php echo $img_border_color; ?>" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 p-3 d-flex align-items-center">
                                        <div class="blog-meta-wrap">
                                            <div class="blog-meta mb-3">
                                                <h4 class="blog-title font-body font-weight-normal mb-0 <?php echo $post_ttl_color; ?>"><?php echo $title; ?></h4>
                                                <div class="author-data text-small text-uppercase">
                                                    <span class="blog-date"><?php echo $formatted_date; ?></span> | By <a href="<?php echo $author_url; ?>" class="author-name anchor-primary-hover"><?php echo $author; ?></a>
                                                </div>
                                            </div>
                                            <div class="blog-description">
                                                <p><?php echo $excerpt; ?></p>
                                                <div class="<?php echo $btn_position; ?>">
                                                    <a class="font-header font-weight-bold text-uppercase <?php echo $btn_style; ?> <?php echo $btn_hover; ?>" href="<?php echo $post_url; ?>"><?php echo $button_text; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php elseif($blog_limit == 2): ?>

                            <div id="blogID-<?php echo $post_id; ?>" class="col-12 col-md-6 blog-single mb-4">
                                <div class="h-100 shadow bg-white">
                                    <div class="blog-img">
                                        <a href="<?php echo $post_url; ?>">
                                            <img class="featured-img img-fluid img-border <?php echo $img_border_color; ?>" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" />
                                        </a>
                                    </div>
                                    <div class="blog-content-wrap p-3">
                                        <div class="blog-meta mb-3">
                                            <h4 class="blog-title font-body font-weight-normal mb-0 <?php echo $post_ttl_color; ?>"><?php echo $title; ?></h4>
                                            <div class="author-data text-small text-uppercase">
                                                <span class="blog-date"><?php echo $formatted_date; ?></span> | By <a href="<?php echo $author_url; ?>" class="author-name anchor-primary-hover"><?php echo $author; ?></a>
                                            </div>
                                        </div>
                                        <div class="blog-description">
                                            <p><?php echo $excerpt; ?></p>
                                            <div class="<?php echo $btn_position; ?>">
                                                <a class="font-header font-weight-bold text-uppercase <?php echo $btn_style; ?> <?php echo $btn_hover; ?>" href="<?php echo $post_url; ?>"><?php echo $button_text; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        <?php else: ?>

                            <div id="blogID-<?php echo $post_id; ?>" class="col-12 col-md-6 col-lg-4 blog-single mb-4">
                                <div class="h-100 shadow bg-white">
                                    <div class="blog-img">
                                        <a href="<?php echo $post_url; ?>">
                                            <img class="featured-img img-fluid img-border <?php echo $img_border_color; ?>" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" />
                                        </a>
                                    </div>
                                    <div class="blog-content-wrap p-3">
                                        <div class="blog-meta mb-3">
                                            <h4 class="blog-title font-body font-weight-normal mb-0 <?php echo $post_ttl_color; ?>"><?php echo $title; ?></h4>
                                            <div class="author-data text-small text-uppercase">
                                                <span class="blog-date"><?php echo $formatted_date; ?></span> | By <a href="<?php echo $author_url; ?>" class="author-name anchor-primary-hover"><?php echo $author; ?></a>
                                            </div>
                                        </div>
                                        <div class="blog-description">
                                            <p><?php echo $excerpt; ?></p>
                                            <div class="<?php echo $btn_position; ?>">
                                                <a class="font-header font-weight-bold text-uppercase <?php echo $btn_style; ?> <?php echo $btn_hover; ?>" href="<?php echo $post_url; ?>"><?php echo $button_text; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                    <?php endforeach; 

                endif; ?>

            </div>

        </div>
    </section>
  
<?php endif; ?>