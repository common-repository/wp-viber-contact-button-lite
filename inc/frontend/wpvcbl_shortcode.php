<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

$wpvcbL_screen_detector = new wpvcbL_Mobile_Detect();
$enable_button = (isset($atts['enable_button'])) ? $atts['enable_button'] : 'enable_button'; 
$enable_desktop = (isset($atts['enable_desktop'])) ? $atts['enable_desktop'] : 'show'; 
$enable_mobile = (isset($atts['enable_mobile'])) ? $atts['enable_mobile'] : ''; 
$button_template = (isset($atts['button_template'])) ? $atts['button_template'] : 'template-1';
$button_text_enable = (isset($atts['button_enable_text'])) ? $atts['button_enable_text'] : 'hide';
$button_text = (isset($atts['button_text'])) ? $atts['button_text'] : '';
$contact_number = (isset($atts['contact_number'])) ? $atts['contact_number'] : '';
$button_color = (isset($atts['button_color'])) ? $atts['button_color'] : '';
$icon_color = (isset($atts['icon_color'])) ? $atts['icon_color'] : '';
$button_position = (isset($atts['button_location'])) ? $atts['button_location'] : '';
$text_position = (isset($atts['text_position'])) ? $atts['text_position'] : 'last';
$btn_class = explode('_', $button_position);
$button_text_position = 'right';

if(!empty($btn_class[0])) {
    $first= "wpvcbL-".$btn_class[0];
}

if(!empty($btn_class[1])) {
    $last= "wpvcbL-".$btn_class[1];
}

(!empty($last) ? $last : $last = "");

$new_class = $first." ".$last;

$href_link = "viber://chat?number=$contact_number";

?>
<?php if($enable_button == 'show'){ ?>
    <div class="wpvcbL-button-wrap wpvcbL-button-<?php echo esc_attr($button_template);  ?> <?php echo esc_attr($new_class) ?>" > 
          <?php
        if($wpvcbL_screen_detector->isMobile()){
            if($enable_mobile =='show'){
                if($button_text_enable == 'hide'){ ?>
                    <a href="<?php echo $href_link; ?>">
                        <i class="socicon-viber"></i>
                    </a>
                    <?php
                }else if($button_text_position == 'right') { ?>
                    <a href="<?php echo $href_link; ?>">
                        <?php echo esc_attr($button_text);?>
                        <i class="socicon-viber"></i>
                    </a>
                    <?php
                }else if ($button_text_position == 'left') { ?>
                    <a href="<?php echo $href_link; ?>">
                        <i class="socicon-viber"></i>
                        <?php echo esc_attr($button_text);?>
                    </a>
                        <?php
                }
            }
        }else{
            if( $enable_desktop =='show' ){
                if($button_text_enable == 'hide'){ ?>
                    <a href="<?php echo $href_link; ?>">
                        <i class="socicon-viber"></i>
                    </a>
                    <?php
                }else if($button_text_position == 'right') { ?>
                    <a href="<?php echo $href_link; ?>">
                        <?php echo esc_attr($button_text);?>
                        <i class="socicon-viber"></i>
                    </a>
                    <?php
                }else {?>
                    <a href="<?php echo $href_link; ?>">
                        <i class="socicon-viber"></i>
                        <?php echo esc_attr($button_text);?>
                    </a>
                    <?php
                }
            }
        } ?>
    </div>
    <style>
        .wpvcbL-button-<?php echo esc_attr($button_template);?> a {
            background-color:<?php echo esc_attr($button_color); ?>;
            color: <?php echo esc_attr($icon_color); ?>;
        }
    </style>
    
<?php } 