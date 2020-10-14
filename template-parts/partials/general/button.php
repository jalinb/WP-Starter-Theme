<?php
/**
 * Template part for displaying the button partial
 */

?>

<?php
$add_button         = get_sub_field('button_add_button');
$button_type        = get_sub_field('button_type');
$button_style       = get_sub_field('button_style');
$button_hover       = get_sub_field('button_hover');
$button_position    = get_sub_field('button_position');
$button_text        = get_sub_field('button_button_text');
$button_link_type   = get_sub_field('button_button_link_type');
$button_select_link = get_sub_field('button_button_select_link');
$button_custom_link = get_sub_field('button_button_custom_link');
$new_window         = get_sub_field('button_new_window');

// Button Type
if($button_type == 'border'):
    $button_type = ' btn-stroke btn-hover-nostroke';
else:
    $button_type = '';
endif;

// Button Color
if($button_style == 'primary'):
    $btn_style = 'btn-primary';
elseif($button_style == 'secondary'):
    $btn_style = 'btn-secondary';
elseif($button_style == 'tertiary'):
    $btn_style = 'btn-tertiary';
elseif($button_style == 'quaternary'):
    $btn_style = 'btn-quaternary';               
elseif($button_style == 'white'):
    $btn_style = 'btn-white';
elseif($button_style == 'dark'):
    $btn_style = 'btn-dark';
endif;

// Button Hover Color
if($button_hover == 'primary'):
    $btn_hover = 'btn-primary-hover';
elseif($button_hover == 'secondary'):
    $btn_hover = 'btn-secondary-hover';
elseif($button_hover == 'tertiary'):
    $btn_hover = 'btn-tertiary-hover';
elseif($button_hover == 'quaternary'):
    $btn_hover = 'btn-quaternary-hover';               
elseif($button_hover == 'white'):
    $btn_hover = 'btn-white-hover';
elseif($button_hover == 'dark'):
    $btn_hover = 'btn-dark-hover';
endif;

// Button Position
if($button_position == 'center'):
    $btn_position = 'text-center';
elseif($button_position == 'right'):
    $btn_position = 'text-right';
else:
    $btn_position = 'text-left';
endif;
?>

<?php if($add_button): ?>
    <div class="<?php echo $btn_position; ?>">
        <a href="<?php if ($button_link_type == 'Select Link'): echo $button_select_link; else: echo $button_custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?> class="btn<?php echo $button_type; ?> <?php echo $btn_style; ?> <?php echo $btn_hover; ?>"><?php echo $button_text; ?></a>
    </div>
<?php endif; ?>
