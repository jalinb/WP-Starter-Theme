<?php
/**
 * Template part for displaying the timeline partial
 */

//Advanced Custom Fields 
$hide_block = get_sub_field('hide_block');
?>

<?php if( empty($hide_block) ) : ?>

	<!-- TIMELINE
	========================= -->
    <?php
    $block_title = get_sub_field('block_title');
    ?>

    <section class="timeline bg-blue white py-5">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="medium-header"><?php echo $block_title; ?></h2>
                </div>
            </div>
    
            <div class="row">
                <?php
                if( have_rows('time_marker') ):
                    while ( have_rows('time_marker') ) : the_row();
    
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    ?>
    
                        <div class="col-12 col-md-4 mb-3 mb-md-0 position-relative timeline-marker">
                            <?php echo $description; ?>
                        </div>
    
                    <?php
                    endwhile;
                endif;
                ?>
            </div>

        </div>
    </section>

<?php endif; ?>
