<?php
/**
 * The template for displaying the FAQs partial
 */

?>

<?php
$hide_block             = get_sub_field('hide_block');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');
?>

<?php if( empty($hide_block) ) : ?>

    <!-- FAQS
	========================= -->
    <section class="faqs<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="accordion" id="faqsAccordion">
    
                        <?php if( have_rows('faq') ):
                            $i = 0;
                            while( have_rows('faq') ): the_row(); 
                                $question = get_sub_field('question');
                                $answer = get_sub_field('answer');
                                $i++;
                            ?>
                            
                                <div class="faq-single mb-4">
                                    <div class="faq-header bg-medium-blue" id="faq-heading-<?php echo $i; ?>">
                                        <div id="faq-btn-<?php echo $i; ?>" class="faq-btn d-flex justify-content-between align-items-center cursor-pointer collapsed" data-toggle="collapse" data-target="#faq-<?php echo $i; ?>" aria-expanded="false" aria-controls="faq-<?php echo $i; ?>">
                                            <h3 class="white px-3 py-2 mb-0"><?php echo $question; ?></h3>
                                            <div class="faq-icon d-flex justify-content-center align-items-center bg-dark-blue white">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div id="faq-<?php echo $i; ?>" class="collapse" aria-labelledby="faq-heading-<?php echo $i; ?>" data-parent="#faqsAccordion">
                                        <div class="faq-body bg-light p-3">
                                            <?php echo $answer; ?>
                                        </div>
                                    </div>
                                </div>
        
                            <?php endwhile; ?>
                        <?php endif; ?>
    
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>
