<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
Plugin Name:  VContact Button
Plugin URI:   https://accesspressthemes.com/wordpress-plugins/wp-viber-contact-button-lite/
Description:  VContact Button allows you to easily create chat via Viber in WordPress. 
Version:      2.0.7
Author:       Access Keys
Author URI:   https://access-keys.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wp-viber-contact-button-lite
Domain Path:  /languages
*/

define('wpvcbL_PLUGIN_PATH',plugin_dir_path(__FILE__));

include(wpvcbL_PLUGIN_PATH.'inc/frontend/wpvcbl-mobile-detect.php');

if(!class_exists('wpvcbL_Class')){

	class wpvcbL_Class{

		function __construct(){
            $this->define_constants();
            add_action('plugins_loaded',array($this,'wpvcbL_load_textdomain'));
            add_action('admin_menu',array($this,'wpvcbL_menu'));
            add_action('admin_enqueue_scripts',array($this,'wpvcbL_register_assets'));
            add_action('admin_post_wpvcbL_settings_save',array($this,'save_form_settings'));
            add_shortcode('wp_viber_contact_button', array($this, 'wpvcbL_shortcode'));
            add_action('wp_enqueue_scripts', array($this, 'wpvcbL_register_frontend_assets'));
            add_filter( 'plugin_row_meta', array( $this, 'wpvcbL_plugin_row_meta' ), 10, 2 );
            add_filter( 'admin_footer_text', array( $this, 'wpvcbL_admin_footer_text' ) );
            add_action( 'admin_init', array( $this, 'redirect_to_site' ), 1 );
        }

        function redirect_to_site(){

            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wpvcbL-documentation' ) {
               wp_redirect( WPVCBL_LITE_DOC );
               exit();
            }

            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wpvcbL-premium' ) {
               wp_redirect( WPVCBL_PRO_LINK );
               exit();
            }
       }

       function wpvcbL_plugin_row_meta( $links, $file ){
        if ( strpos( $file, 'viber-contact-button-lite.php' ) !== false ) {
            $new_links = array(
                'demo' => '<a href="'.WPVCBL_LITE_DEMO.'" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>Live Demo</a>',
                'doc' => '<a href="'.WPVCBL_LITE_DOC.'" target="_blank"><span class="dashicons dashicons-media-document"></span>Documentation</a>',
                'support' => '<a href="http://accesspressthemes.com/support" target="_blank"><span class="dashicons dashicons-admin-users"></span>Support</a>',
                'pro' => '<a href="'.WPVCBL_PRO_LINK.'" target="_blank"><span class="dashicons dashicons-cart"></span>Premium version</a>'
            );
            $links = array_merge( $links, $new_links );
        }
        return $links;
    }

    function wpvcbL_admin_footer_text( $text ){
        global $post;
        if (isset($_GET['page']) && $_GET['page'] === 'wp-viber-contact-button-lite' ) {
            $text = 'Enjoyed ' . WPVCBL_LITE_PLUGIN_NAME . '? <a href="' . WPVCBL_LITE_RATING . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version <a href="' . WPVCBL_PRO_LINK . '" target="_blank">' . WPVCBL_PRO_PLUGIN_NAME . '</a> - more features, more power!';
            return $text;
        } else {
            return $text;
        }
    }

    function define_constants(){
        defined('wpvcbL_PLUGIN_URL') or define('wpvcbL_PLUGIN_URL',plugin_dir_url(__FILE__));
        // defined('wpvcbL_PLUGIN_PATH') or define('wpvcbL_PLUGIN_PATH',plugin_dir_path(__FILE__));
        define( 'wpvcbL_IMG_DIR', plugin_dir_url( __FILE__ ) . 'images' );
        define( 'wpvcbL_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' ); 
        define( 'wpvcbL_JS_DIR', plugin_dir_url( __FILE__ ) . 'js/' ); 
        defined('wpvcbL_PLUGIN_VERSION') or define('wpvcbL_PLUGIN_VERSION','2.0.7');
        defined( 'WPVCBL_TD' ) or define( 'WPVCBL_TD', 'wp-viber-contact-button-lite' ); 

        defined('WPVCBL_LITE_PLUGIN_NAME') or define('WPVCBL_LITE_PLUGIN_NAME', 'VContact Button');
        defined('WPVCBL_LITE_DEMO') or define('WPVCBL_LITE_DEMO', 'http://demo.accesspressthemes.com/wordpress-plugins/wp-viber-contact-button-lite');
        defined('WPVCBL_LITE_DOC') or define('WPVCBL_LITE_DOC', 'https://accesspressthemes.com/documentation/vcontact-button/');
        defined('WPVCBL_LITE_DETAIL') or define('WPVCBL_LITE_DETAIL', 'https://accesspressthemes.com/wordpress-plugins/wp-viber-contact-button-lite/');
        defined('WPVCBL_LITE_RATING') or define('WPVCBL_LITE_RATING', 'https://wordpress.org/support/plugin/wp-viber-contact-button-lite/reviews/#new-post');

        defined('WPVCBL_PRO_PLUGIN_NAME') or define('WPVCBL_PRO_PLUGIN_NAME', 'WP Viber Contact Button');
        defined('WPVCBL_PRO_LINK') or define('WPVCBL_PRO_LINK', 'https://accesspressthemes.com/wordpress-plugins/wp-viber-contact-button/');
        defined('WPVCBL_PRO_DEMO') or define('WPVCBL_PRO_DEMO', 'http://demo.accesspressthemes.com/wordpress-plugins/wp-viber-contact-button');
        defined('WPVCBL_PRO_DETAIL') or define('WPVCBL_PRO_DETAIL', 'https://accesspressthemes.com/wordpress-plugins/wp-viber-contact-button/');

    }

    function wpvcbL_load_textdomain(){
     load_plugin_textdomain('wp-viber-contact-button-lite',false,basename(dirname(__FILE__)).'/languages');
 }

 function wpvcbL_menu(){
    add_menu_page(__('VContact Button',WPVCBL_TD),__('VContact Button',WPVCBL_TD),'manage_options',WPVCBL_TD ,array($this,'viber_setting'),'dashicons-phone');

    add_submenu_page('wp-viber-contact-button-lite', __('Documentation', 'wp-viber-contact-button-lite'), __('Documentation', 'wp-viber-contact-button-lite'), 'manage_options', 'wpvcbL-documentation', '__return_false', null, 9);
    add_submenu_page('wp-viber-contact-button-lite', __('Check Premium Version', 'wp-viber-contact-button-lite'), __('Check Premium Version', 'wp-viber-contact-button-lite'), 'manage_options', 'wpvcbL-premium', '__return_false', null, 9);
}

function viber_setting(){
 include(wpvcbL_PLUGIN_PATH.'inc/backend/wpvcbl-setting.php');
}

function wpvcbL_register_assets(){
    if(isset($_GET['page']) && $_GET['page'] == WPVCBL_TD){
        wp_enqueue_style('wpvcbL-backend-style',wpvcbL_PLUGIN_URL.'css/backend/wpvcbl-backend.css',array(),wpvcbL_PLUGIN_VERSION);
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script('wpvcbL-backend-script',wpvcbL_PLUGIN_URL.'js/wpvcbl-backend.js',array('jquery','jquery-ui-sortable', 'wp-color-picker'),wpvcbL_PLUGIN_VERSION);
        wp_enqueue_style('wpvcbL-socicon',  wpvcbL_CSS_DIR . '/backend/socicon/style.css', false, wpvcbL_PLUGIN_VERSION);
    }
}

function wpvcbL_register_frontend_assets(){
    wp_enqueue_style('wpvcbL-socicon',  wpvcbL_CSS_DIR . '/frontend/socicon/style.css', false, wpvcbL_PLUGIN_VERSION);
//    wp_enqueue_script('wpvcbL-frontend-script', wpvcbL_JS_DIR.'wpvcbl-frontend.js', array('jquery'), wpvcbL_PLUGIN_VERSION);
}

function print_array($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function wpvcbL_shortcode($atts) {
    ob_start();
    include('inc/frontend/wpvcbl_shortcode.php' );
    $html = ob_get_contents();
    ob_get_clean();
    return $html;
}

}

new wpvcbL_Class();

}