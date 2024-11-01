<?php defined('ABSPATH') or die('No script kiddies please!'); ?>

<div class="wpvcbL-content-wrap">
    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
        <input type="hidden" name="action" value="wpvcbL_settings_save"/>
        <div class="wpvcbL-tab-contents">
            <h3><?php _e('Show/hide Contents', WPVCBL_TD); ?></h3>
        </div>
        <div class="wpvcbL-field-wrap">
            <label><?php _e('Enable Button ?', WPVCBL_TD); ?></label>
            <div class="wpvcbL-field">
                <label>
                    <input type="checkbox" name="wpvcbL_enable_button" class="wpvcbL-enable-button" value="<?php if(isset($atts['enable_button'])) { echo esc_attr($atts['enable_button']); } ?>" <?php if ( isset( $atts['enable_button'] ) && $atts['enable_button'] == 'show' ) {    ?>checked="checked"<?php } ?>/>   
                        <?php _e('Show/Hide', WPVCBL_TD); ?>
                </label>
            </div>
        </div>
        <div class="wpvcbL-field-wrap">
            <label><?php _e('Enable In Desktop ?', WPVCBL_TD); ?></label>
            <div class="wpvcbL-field">
                <label>
                    <input type="checkbox" name="wpvcbL_enable_desktop_button" class="wpvcbL-enable-desktop" value="<?php if(isset($atts['enable_desktop'])) { echo esc_attr($atts['enable_desktop']); } ?>" <?php if ( isset( $atts['enable_desktop'] ) && $atts['enable_desktop'] == 'show' ) {    ?>checked="checked"<?php } ?>/>   
                        <?php _e('Show/Hide', WPVCBL_TD); ?>
                </label>
            </div>
        </div>
        <div class="wpvcbL-field-wrap">
            <label><?php _e('Enable In Mobile ?', WPVCBL_TD); ?></label>
            <div class="wpvcbL-field">
                <label>
                    <input type="checkbox" class="wpvcbL-enable-mobile" id="wpvcbL-enable-mobile" name="wpvcbL_settings[enable_mobile_button]" value="<?php if(isset($wpvcbL_settings['enable_mobile_button'])) { echo esc_attr($wpvcbL_settings['enable_mobile_button']); } ?>" <?php if ( isset( $wpvcbL_settings['enable_mobile_button'] ) && $wpvcbL_settings['enable_mobile_button'] == 'show' ) {    ?>checked="checked"<?php } ?>/>   
                        <?php _e('Show/Hide', WPVCBL_TD); ?>
                </label>
            </div>
        </div>
        <div class="wpvcbL-field-wrap">
            <label><?php _e('Enable Button Text ?', WPVCBL_TD); ?></label>
            <div class="wpvcbL-field">
                <label for="wpvcbL_button_text">
                    <input type="checkbox" name="wpvcbL_button_text_enable" class="wpvcbL_button_text" id="wpvcbL_button_text" value="<?php if(isset($atts['button_enable_text'])) { echo esc_attr($atts['button_enable_text']); } ?>" <?php if ( isset( $atts['button_enable_text'] ) && $atts['button_enable_text'] == 'show' ) {    ?>checked="checked"<?php } ?>  />   
                        <?php _e('Show/Hide', WPVCBL_TD); ?>
                </label>
            </div>
        </div>
        <div id="wpvcbL_show_button_text" <?php if(isset($atts['button_enable_text']) && $atts['button_enable_text']=='show') { ?> style="display: block;" <?php } else { ?> style="display:none;" <?php } ?>>
        <div class="wpvcbL-field-wrap">
            
                <label><?php _e('Button Text', WPVCBL_TD); ?></label>
                <div class="wpvcbL-field">
                  <input type="text" name="wpvcbLbutton_name" id="wpvcbL_button_text_value"  placeholder="<?php _e('Insert Button Text', WPVCBL_TD ) ?>"/>
                </div> 
        </div>
        <div class="wpvcbL-field-wrap">
            <label><?php _e('Text Position','WPVCB_TD');?></label>
            <div class="wpvcbL-field">
                <label><input type="radio" name="radio" value="first" class="text_position" checked><?php _e( 'First', WPVCBL_TD ) ?></label>
                <label><input type="radio" name="radio" value="last" class="text_position" ><?php _e( 'Last', WPVCBL_TD ) ?></label>
            </div>
        </div>
        </div>
        <div class="wpvcbL-tab-contents">
            <h3><?php _e('Color Setting', WPVCBL_TD); ?></h3>
        </div>
        <div class="wpvcbL-field-wrap">    
            <label><?php _e( 'Button Color', WPVCBL_TD ) ?></label>
            <div class="wpvcbL-field">
                <input type="text" name="wpvcbL_button_color" value=" " id="wpvcbL_button_color" class="cpa-color-picker" />
                <p class="description"><?php _e( 'Select Button Color.', WPVCBL_TD ) ?></p>
            </div>
        </div>
        <div class="wpvcbL-field-wrap">
            <label><?php _e('Icon Color', WPVCBL_TD); ?></label>
            <div class="wpvcbL-field">
                <input type="text" id="wpvcbL_icon_color" name="wpvcbL_icon_color" value=" " class="cpa-color-picker" />
                <p class="description"><?php _e( 'Select Icon Color.', WPVCBL_TD ) ?></p>
            </div>
        </div>
        <div class="wpvcbL-tab-contents">
            <h3><?php _e('General Setting', WPVCBL_TD); ?></h3>
        </div>
        <div class="wpvcbL-field-wrap">
            <label><?php _e('Template Layout', WPVCBL_TD); ?></label>
            <div class="wpvcbL-field">
                <select name="wpvcbL_button_template" id="wpvcbL-button-template">
                    <?php for ( $k = 1; $k <= 4; $k ++ ) { ?>
                        <option  value="template-<?php echo $k; ?>" >
                            <?php _e( 'Template ',WPVCBL_TD ) ?><?php echo $k; ?>
                        </option>
                    <?php } ?>    
                </select>
                <p class="description"><?php _e( 'Note: Four different templates available for button.', WPVCBL_TD ) ?> </p>
                <div class="wpvcbL-grid-demo wpvcbL-preview-image">
                   <?php
                   for ( $cnt = 1; $cnt <= 4; $cnt ++ ) { ?>
                        <div class="wpvcbL-grid-common" id="wpvcbL-grid-demo-<?php echo $cnt; ?>" <?php echo (($cnt == 1 )? "style='display:block;'": "style='display:none;'") ?>>
                            <h4><?php _e( 'Template', WPVCBL_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPVCBL_TD ); ?></h4>
                            <img src="<?php echo esc_attr(wpvcbL_IMG_DIR) . '/button/'.'template-' . $cnt . '.jpg' ?>"/>
                       </div>
                   <?php } ?>
                </div>
            </div>
        </div>
        <div class="wpvcbL-field-wrap">
            <label><?php _e('Button Position', WPVCBL_TD); ?></label>
            <div class="wpvcbL-field">
                <select name="wpvcbL-button-location" id="wpvcbL-button-location">
                    <option value="default" ><?php _e('Default', WPVCBL_TD);?></option>
                    <option value="top_left"><?php _e('Top Left', WPVCBL_TD);?></option>
                    <option value="top_right" ><?php _e('Top Right', WPVCBL_TD);?></option>
                    <option value="bottom_left" ><?php _e('Bottom Left', WPVCBL_TD); ?></option>
                    <option value="bottom_right"><?php _e('Bottom Right', WPVCBL_TD)?></option>
                </select>
            </div>
        </div>
        <div class="wpvcbL-field-wrap">
            <label><?php _e('Contact Number', WPVCBL_TD); ?></label>
            <div class="wpvcbL-field">
                <input type="tel" id="wpvcbL_contact_number" name="wpvcbL_settings[phone_number]" placevalue="<?php echo esc_attr( $wpvcbL_settings['phone_number'] ); ?>" placeholder="<?php _e('Insert Contact Number', WPVCBL_TD)?>"/>
            </div>
        </div>
        <div class="wpvcbL-field-wrap">
            <input type="button"  class="wpvcbL-shortcode-button" value="<?php _e('Generate Shortcode', WPVCBL_TD); ?>"/>
        </div>
        <div class="wpvcbL-field">
            <?php _e('You can copy generated shortcode anywhere either post, page or widget.', WPVCBL_TD); ?>
            <textarea  class="wpvcb_short_codeDisp" name="wpvcbL_generate_shortcode" id="wpvcbL_generated_shortcode" readonly="readonly" ></textarea>
            <span style="display:none;" class="wpvcb_copied-msg"> Shortcode copied in clipboard </span>
        </div>
    </form>
</div>