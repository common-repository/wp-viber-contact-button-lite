<?php 
defined('ABSPATH') or die('No script kiddies please!');
$wpvcbL_settings = get_option('wpvcbL_settings');
?>
<div class="wrap wpvcbL-warp">
    <div class="wpvcbL-head-main">
        <img src="<?php echo esc_attr(wpvcbL_IMG_DIR) . '/logo.png' ?>"/>
        <div>Version <?php echo esc_attr(wpvcbL_PLUGIN_VERSION); ?></div>
    </div>
    <div class="wpvcbL-menu-wrapper">
        <ul class="wpvcbL-menu-tab">
            <li data-menu="wpvcbL-general-settings" class="wpvcbL-tab-tigger wpvcbL-active">
                <span class="dashicons dashicons-welcome-write-blog"></span>
                <?php _e( 'General Settings', WPVCBL_TD ); ?>
            </li>
            <li data-menu="wpvcbL-about" class="wpvcbL-tab-tigger">
                <span class="dashicons dashicons-layout"></span>
                <?php _e( 'More WordPress Stuff', WPVCBL_TD ); ?>
            </li>
            <li data-menu="wpvcbL-how-to-use" class="wpvcbL-tab-tigger">
                <span class="dashicons dashicons-admin-generic"></span>
                <?php _e( 'How To Use', WPVCBL_TD ); ?>
            </li>
        </ul>
    </div>

    <div class= "wpvcbL-settings-container">
        <div class="wpvcbL-left">
            <div class ="wpvcbL-settings-wrap wpvcbL-active-container" data-menu-ref="wpvcbL-general-settings">
                <?php include(wpvcbL_PLUGIN_PATH . 'inc/backend/wpvcbl-general-setting.php'); ?>

            </div>
            <div class ="wpvcbL-settings-wrap " data-menu-ref="wpvcbL-about">
                <?php include(wpvcbL_PLUGIN_PATH . 'inc/backend/wpvcbl-about.php'); ?>
            </div>
            <div class ="wpvcbL-settings-wrap" data-menu-ref="wpvcbL-how-to-use">
                <?php include(wpvcbL_PLUGIN_PATH . 'inc/backend/wpvcbl-how-to-use.php'); ?>
            </div>
        </div>

        <div class="wpvcbL-upgrade-wrapper">
            <a href="<?php echo esc_attr(WPVCBL_PRO_LINK); ?>" target="_blank">
                <img src="<?php echo esc_attr(wpvcbL_IMG_DIR) . '/upgrade-to-pro/upgrade-to-pro.png' ?>" style="width:100%;">
            </a>

            <div class="wpvcbL-upgrade-button-wrap-backend">

                <a href="<?php echo esc_attr(WPVCBL_PRO_DEMO); ?>" class="smls-demo-btn" target="_blank">Demo</a>

                <a href="<?php echo esc_attr(WPVCBL_PRO_LINK); ?>" target="_blank" class="smls-upgrade-btn">Upgrade</a>

                <a href="<?php echo esc_attr(WPVCBL_PRO_DETAIL); ?>" target="_blank" class="smls-upgrade-btn">Plugin Information</a>

            </div>

            <a href="<?php echo esc_attr(WPVCBL_PRO_LINK); ?>" target="_blank">
                <img src="<?php echo esc_attr(wpvcbL_IMG_DIR). '/upgrade-to-pro/upgrade-to-pro-feature.png' ?>" alt="<?php _e( 'WP Viber Contact Button', WPVCBL_TD ); ?>" style="width:100%;">
            </a>
        </div>
    </div>
</div>