<?php
/**
 * Template part for displaying the upcoming events partial
 */

?>

<section class="upcoming-events mb-5">
    <div class="container">
        <div class="row">

        <?php 
        $today = date('Ymd');

        query_posts(array(
            'post_type' => 'events',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => 'end_date',
                    'value' => $today,
                    'compare' => '>=',
                    'type' => 'DATE'
                ),
            ),
            'meta_key' => 'end_date',
            'orderby' => 'meta_value',
            'order' => 'ASC'
        ));

        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); 
                $start_date = get_field('start_date');
                $end_date = get_field('end_date');
                $location = get_field('location');
                $cost = get_field('cost');
                $add_description = get_field('add_description');
                $description = get_field('description');
                $registration_url = get_field('registration_url');
                $add_meet_up = get_field('add_meet_up');

                // get raw date
                $start_date = get_field('start_date', false, false);
                $end_date = get_field('end_date', false, false);
                // make date object
                $start_date = new DateTime($start_date);
                $end_date = new DateTime($end_date);
                ?>

                <div class="col-12 col-sm-6 col-lg-3 event-single mb-4">
                    <div class="event-content bg-white h-100 position-relative">

                        <div class="row">
                            <div class="col-12 d-flex">
                                <div class="event-date bg-blue p-2 white text-center text-medium">
                                    <span class="month-day font-weight-bold d-block">
                                        <?php echo $start_date->format('F j'); ?>-<?php echo $end_date->format('j'); ?>
                                    </span>
                                    <span class="year">
                                        <?php echo $end_date->format('Y'); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center p-3<?php if($add_meet_up): ?> pb-5<?php endif; ?>">
                            <div class="col-12 text-center">
                                <h3><a href="<?php echo $registration_url; ?>" target="_blank"><?php the_title(); ?></a></h3>

                                <?php if($add_description): ?>
                                    <div class="event-description mb-3">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>

                                <span class="text-medium blue">
                                    <?php echo $location; ?><br />
                                    <?php echo $cost; ?>
                                </span>
                            </div>
                        </div>

                        <?php // Facebook link
                        if($add_meet_up): ?>
                            <div class="position-absolute w-100 fixed-bottom">
                                <a href="/schedule-a-meetup" class="btn font-weight-normal text-small d-flex align-items-center justify-content-center">
                                    Visit Us Here!
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

            <?php 
            endwhile;
        endif;
        wp_reset_query(); 
        ?>
    
        </div>
    </div>
</section>
