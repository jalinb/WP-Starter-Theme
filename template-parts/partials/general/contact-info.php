<?php
/**
 * The template for displaying the contact info partial
 */

?>

<?php
$phone_number = get_field('phone_number', 'option');
//$display_number = str_replace('-', '.', $phone_number);
?>

<div class="contact-info text-center mb-2">
    <a class="footer-number d-block font-weight-black dark anchor-primary-hover" href="tel:<?php get_template_part( 'template-parts/partials/general/phone', 'number' ); ?>"><?php get_template_part( 'template-parts/partials/general/phone', 'number' ); ?></a>
    <div class="text-medium">
        <?php get_template_part( 'template-parts/partials/general/brand', 'address' ); ?>
    </div>
</div>
