<?php
/**
 * Template part for displaying the copyright partial
 */

?>

<div class="d-flex flex-wrap justify-content-center justify-content-lg-between align-items-center">

    <div class="col-lg"></div>

    <div class="copyright font-header py-3 text-small white">
        <div class="d-flex flex-wrap justify-content-center">
            <p class="mb-0"><a href="/privacy-policy" class="anchor-secondary-hover">Privacy Policy</a></p>
            <div class="mx-2">|</div>
            <p class="mb-0"><a href="/sitemap" class="anchor-secondary-hover">Sitemap</a></p>
        </div>
        <div class="d-flex flex-wrap justify-content-center">
            <p class="mb-0">&copy;<?php echo date("Y"); ?> <?php get_template_part( 'template-parts/partials/general/brand', 'name' ); ?>. All Rights Reserved</p>
            <div class="mx-2">|</div>
            <p class="mb-0">Grown by <a href="https://www.growmarkentum.com/" target="_blank" class="anchor-secondary-hover">Markentum</a></p>
        </div>
    </div>

    <div class="col-lg d-flex justify-content-center justify-content-lg-end mb-3 mb-lg-0">
        <div class="support-icons">
            <img src="/wp-content/uploads/lgbtq.png" class="lgbtq-icon mr-1" title="LGBTQ-Friendly" />
            <img src="/wp-content/uploads/pet-friendly.png" class="support-icon mr-1" title="Pet-Friendly" />
            <img src="/wp-content/uploads/accessible.png" class="support-icon mr-1" title="Accessible" />
            <img src="/wp-content/uploads/equal-housing-opportunity.png" class="support-icon" title="Equal Housing Opportunity" />
        </div>
    </div>

</div>
 