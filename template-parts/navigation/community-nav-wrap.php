<?php
/**
 * The template for displaying the nav wrap
 */
?>

<!-- Desktop Nav -->
<div class="d-none d-md-flex flex-wrap desktop-navigation align-items-center justify-content-center justify-content-lg-between w-100 py-2">
    <!-- Community Main Navigation -->
    <?php get_template_part( 'template-parts/navigation/community-main', 'nav' ); ?>
</div>

<!-- Mobile Nav -->
<div class="d-md-none mobile-navigation w-100">
    <div class="row nav-wrap align-items-center justify-content-between">
        <!-- Main Navigation -->
        <?php get_template_part( 'template-parts/navigation/community-mobile', 'nav' ); ?>
        <!-- Logo -->
        <?php get_template_part( 'template-parts/partials/general/logo' ); ?>
    </div>
</div>
