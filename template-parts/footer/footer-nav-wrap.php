<?php
/**
 * The template for displaying the footer nav wrap
 */

?>

<div class="footer-nav row w-100 flex-wrap justify-content-center justify-content-md-between">
    <div class="col footer-nav-c1 px-3 pl-md-0 text-center text-lg-left">
        <?php 
        if (is_singular('communities')): 
            get_template_part( 'template-parts/footer/community-footer', 'nav-c1' );
        else: 
            get_template_part( 'template-parts/footer/corporate-footer', 'nav-c1' );
        endif; 
        ?>
    </div>

    <div class="col footer-nav-c2 px-3 px-md-0 text-center text-lg-left">
        <?php 
        if (is_singular('communities')): 
            get_template_part( 'template-parts/footer/community-footer', 'nav-c2' );
        else: 
            get_template_part( 'template-parts/footer/corporate-footer', 'nav-c2' );
        endif; 
        ?>
    </div>

    <div class="col footer-nav-c3 px-3 px-md-0 text-center text-lg-left">
        <?php 
        if (is_singular('communities')): 
            get_template_part( 'template-parts/footer/community-footer', 'nav-c3' );
        else: 
            get_template_part( 'template-parts/footer/corporate-footer', 'nav-c3' );
        endif; 
        ?>
    </div>
</div>
