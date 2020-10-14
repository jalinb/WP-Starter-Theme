<?php
/**
 * The template for displaying the header
 */
?>

<div class="d-none d-sm-block bg-primary border-bottom border-width border-secondary">
    <div class="container top-bar">
        <div class="row">
            <div class="col-12">
                <?php get_template_part( 'template-parts/header/top', 'bar' ); ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row nav-bar align-items-center">
        <div class="col-12">
            <?php
            if (is_singular('communities')):
                get_template_part( 'template-parts/navigation/community-nav', 'wrap' );
            else:
                get_template_part( 'template-parts/navigation/corporate-nav', 'wrap' );
            endif;
            ?>
        </div>
    </div>
</div>
