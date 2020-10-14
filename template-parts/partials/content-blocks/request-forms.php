<?php
/**
 * Template part for request forms
 */

$hide_block    = get_sub_field('hide_block');
$hero_image    = get_sub_field('hero_image');
$title         = get_sub_field('title');
?>

<?php if( empty($hide_block) ) : ?>

	<!-- REQUEST FORMS HERO
	========================= -->
    <section class="request-forms-hero position-relative bg-black mb-5">
        <div class="position-absolute h-100 w-100 bg-img bg-opaque" style="background-image: url('<?php echo $hero_image['url']; ?>')"></div>
        <div class="container">
            <div class="row requests-form-hero-title">
                <div class="col-12 text-center">
                    <h1 class="white"><?php echo $title; ?></h1>
                </div>
            </div>
        </div>
    </section>
    
    <!-- REQUEST FORMS
	========================= -->
	<section class="request-forms">
	    <div class="container">
	
            <?php 
            if( have_rows('form_section') ):
                while ( have_rows('form_section') ) : the_row(); 

                    $title 	= get_sub_field('title');
                    ?>

                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2 class="color-primary"><?php echo $title; ?></h2>
                            <hr class="mb-4 bg-primary">
                        </div>

                        <?php 
                        if( have_rows('request_form') ):
                            while ( have_rows('request_form') ) : the_row(); 

                                $title 	        = get_sub_field('title');
                                $description 	= get_sub_field('description');
                                ?>

                                <div class="col-12 col-md-6 mb-5">
                                    <div class="request-form-single bg-light p-4 h-100 text-center">
                                        <h3 class="color-primary"><?php echo $title; ?></h3>
                                        <hr class="bg-primary mt-1 mb-3">
                                        <?php echo $description; ?>
                                        <?php get_template_part( 'template-parts/partials/general/button' ); ?>
                                    </div>
                                </div>

                            <?php
                            endwhile;
                        endif;
                        ?>

                    </div>


                <?php
                endwhile;
            endif;
            ?>
	
	    </div>
	
	</section>
	
<?php endif; ?>
