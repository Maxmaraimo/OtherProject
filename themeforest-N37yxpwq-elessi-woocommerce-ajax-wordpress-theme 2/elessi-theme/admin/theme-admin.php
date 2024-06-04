<?php
defined('ABSPATH') or die();

define('ELESSI_ADMIN_PATH', ELESSI_THEME_PATH . '/admin/');
define('ELESSI_ADMIN_DIR_URI', ELESSI_THEME_URI . '/admin/');
defined('ELESSI_ADMIN_PAGE_SLUG_OLD') or define('ELESSI_ADMIN_PAGE_SLUG_OLD', 'optionsframework');
defined('NASA_ADMIN_PAGE_SLUG') or define('NASA_ADMIN_PAGE_SLUG', 'nasa-theme-options');

/**
 * 
 * @return string
 */
function elessi_latest_nasa_core_version() {
    return '6.0.8';
}

/**
 * List Plugins
 */
function elessi_list_required_plugins() {
    return array(
        array(
            'name' => 'WPBakery Page Builder',
            'slug' => 'js_composer',
            'source' => ELESSI_ADMIN_PATH . 'plugins/js_composer.zip',
            'version' => '7.5',
            'auto' => true,
            'unchecked' => true,
            'buider' => true
        ),
        
        array(
            'name' => 'Elementor',
            'slug' => 'elementor',
            'auto' => true,
            'unchecked' => true,
            'buider' => true
        ),
        
        array(
            'name' => 'Elementor Header & Footer Builder',
            'slug' => 'header-footer-elementor',
            'auto' => true,
            'unchecked' => true,
            'parent' => 'elementor'
        ),
        
        array(
            'name' => 'YITH WooCommerce Compare',
            'slug' => 'yith-woocommerce-compare',
            'auto' => true
        ),
        
        array(
            'name' => esc_html__('Contact Form 7', 'elessi-theme'),
            'slug' => 'contact-form-7',
            'auto' => true
        ),
        
        /* array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'source' => ELESSI_ADMIN_PATH . 'plugins/contact-form-7.zip',
            'version' => '6.6.4',
            'auto' => true
        ), */
        
        array(
            'name' => 'Smash Balloon Instagram Feed',
            'slug' => 'instagram-feed',
            'auto' => true
        ),
        
        array(
            'name' => 'Revolution Slider',
            'slug' => 'revslider',
            'source' => ELESSI_ADMIN_PATH . 'plugins/revslider.zip',
            'version' => '6.7.1',
            'auto' => true
        ),
        
        array(
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
            'required' => true,
            'auto' => true
        ),
        
        array(
            'name' => 'Nasa Core',
            'slug' => 'nasa-core',
            'source' => ELESSI_ADMIN_PATH . 'plugins/nasa-core.zip',
            'required' => true,
            'version' => elessi_latest_nasa_core_version(),
            'auto' => true
        ),
    );
}

/**
 * Theme check Update Nasa Core
 */
add_action('admin_init', 'elessi_check_update_core');
function elessi_check_update_core() {
    if (isset($_REQUEST['page']) && 'install-required-plugins' === $_REQUEST['page']) {
        return;
    }
    
    /**
     * Check actived nasa-core Plugin
     */
    if (defined('NASA_CORE_ACTIVED') && NASA_CORE_ACTIVED) {
        $core_version = defined('NASA_CORE_VERSION') ? NASA_CORE_VERSION : '1.0';

        /**
         * Check version nasa-core Plugin
         */
        if (version_compare(elessi_latest_nasa_core_version(), $core_version, ">")) {
            add_action('admin_footer', 'elessi_footer_admin_update_core');
        }
    }
}

/**
 * Template footer admin update core
 * 
 * @param type $text
 * @return type
 */
function elessi_footer_admin_update_core() {
    include ELESSI_ADMIN_PATH . 'ns-need-update-core.php';
}

/**
 * Required Plugins use in theme
 * 
 * In Admin
 */
require_once ELESSI_ADMIN_PATH . 'classes/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'elessi_register_required_plugins');
function elessi_register_required_plugins() {
    $plugins = elessi_list_required_plugins();
    $config = array(
        'domain' => 'elessi-theme', // Text domain - likely want to be the same as your theme.
        'default_path' => '', // Default absolute path to pre-packaged plugins
        'parent_slug' => NASA_ADMIN_PAGE_SLUG, // Default parent menu slug
        'menu' => 'install-required-plugins', // Menu slug
        'has_notices' => true, // Show admin notices or not
        'is_automatic' => false, // Automatically activate plugins after installation or not
        'message' => '', // Message to output right before the plugins table
    );

    tgmpa($plugins, $config);
}

/**
 * Update VC
 */
if (function_exists('vc_set_as_theme')) {
    add_action('vc_before_init', 'elessi_vc_set_as_theme');
    function elessi_vc_set_as_theme() {
        vc_set_as_theme();
    }
}

/*
 * Title	: SMOF
 * Description	: Slightly Modified Options Framework
 * Version	: 1.5.2
 * Author	: Syamil MJ
 * Author URI	: http://aquagraphite.com
 * License	: GPLv3 - http://www.gnu.org/copyleft/gpl.html

 * define( 'SMOF_VERSION', '1.5.2' );
 * Definitions
 *
 * @since 1.4.0
 */
$smof_output = '';
if (function_exists('wp_get_theme')) {
    if (is_child_theme()) {
        $temp_obj = wp_get_theme();
        $theme_obj = wp_get_theme($temp_obj->get('Template'));
    } else {
        $theme_obj = wp_get_theme();
    }

    $theme_name = $theme_obj->get('Name');
} else {
    $theme_data = wp_get_theme(ELESSI_THEME_PATH . '/style.css');
    $theme_name = $theme_data['Name'];
}

define('ELESSI_ADMIN_THEMENAME', $theme_name);
// define('ELESSI_ADMIN_SUPPORT_FORUMS', 'https://elessi.nasatheme.com/documentation/');
define('ELESSI_ADMIN_DOCS', 'https://elessi-docs.nasatheme.com');
define('ELESSI_ADMIN_BACKUPS', 'backups');

/**
 * Functions Load
 *
 * @package     WordPress
 * @subpackage  SMOF
 * @since       1.4.0
 * @author      Syamil MJ
 */
require_once ELESSI_ADMIN_PATH . 'dynamic-style.php';
require_once ELESSI_ADMIN_PATH . 'functions/functions.interface.php';
require_once ELESSI_ADMIN_PATH . 'functions/functions.options.php';
require_once ELESSI_ADMIN_PATH . 'functions/functions.admin.php';

add_action('admin_head', 'optionsframework_admin_message');
add_action('admin_init', 'optionsframework_admin_init_redirect');
add_action('admin_init', 'optionsframework_admin_init');
add_action('admin_menu', 'optionsframework_add_admin');

/**
 * Required Files
 *
 * @since 1.0.0
 */
require_once ELESSI_ADMIN_PATH . 'classes/class.options_machine.php';

/**
 * AJAX Saving Options
 *
 * @since 1.0.0
 */
add_action('wp_ajax_of_ajax_post_action', 'of_ajax_callback');

/**
 * Add editor style
 */
// add_editor_style();

/**
 * IMPORTER
 */
require_once ELESSI_ADMIN_PATH . 'importer/nasa-importer.php';

/**
 * Images in review product
 */
add_action('add_meta_boxes_comment', 'elessi_admin_review_images_comment', 10, 1);
function elessi_admin_review_images_comment($comment) {
    global $nasa_opt;
    
    if (!isset($nasa_opt['comment_media']) || !$nasa_opt['comment_media']) {
        return;
    }
        
    $attachment_ids = get_comment_meta($comment->comment_ID, 'nasa_review_images', true);
    
    if (!empty($attachment_ids)) { ?>
        <div class="stuffbox">
            <div class="inside">
                <h2><?php echo esc_html__('Review Product By Images', 'elessi-theme'); ?></h2>
                
                <div class="nasa-wrap-review-thumb nasa-flex" id="nasa-wrap-review-<?php echo esc_attr($comment->comment_ID); ?>">

                    <?php foreach ($attachment_ids as $attachment_id) {
                        $image = wp_get_attachment_image($attachment_id, apply_filters('nasa_reivew_product_thumbnail_size', 'thumbnail'), false, array('class' => 'skip-lazy attachment-thumbnail size-thumbnail')); ?>
                        <div class="nasa-item-review-thumb">
                            <?php echo apply_filters('nasa_reivew_product_thumbnail_html', $image, $attachment_id); ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    <?php
    }
}

/**
 * Search Products in theme options
 */
add_filter('woocommerce_json_search_found_products', 'elessi_theme_options_search_products');
function elessi_theme_options_search_products($products){
    
    if (!isset($_REQUEST['rule_opt']) || $_REQUEST['rule_opt'] !== 'elessi-options') {
        return $products;
    }

    $products_new = array();
    
    if ($products){
        $image_size = apply_filters('nasa_product_sale_notification_size', 'thumbnail');
        
        foreach($products as $k => $v) {
            $product_object = wc_get_product($k);
            
            $products_new[$k]   = array(
                'permalink' => $product_object->get_permalink(),
                'title'     => $product_object->get_title(),
                'img_url'   => wp_get_attachment_image_url($product_object->get_image_id(), $image_size)
            );
        }

        $products = $products_new;
    }
    
    return $products;
}

/**
 * Add Column Type of Elementor - Header and Footer Builder
 */
add_filter('manage_elementor-hf_posts_columns', 'elessi_admin_hf_column_type');
function elessi_admin_hf_column_type($columns) {
    $columns['type'] = __('Type of Template', 'elessi-theme');
    
    if (isset($columns['date'])) {
        $date_column = $columns['date'];
        unset($columns['date']);
        $columns['date'] = $date_column;
    }
    
    return $columns;
}

/**
 * Type of Elementor - Header and Footer Builder
 */
add_action('manage_elementor-hf_posts_custom_column', 'elessi_admin_hf_column_type_content', 10, 2);
function elessi_admin_hf_column_type_content($column, $post_id) {
    if ($column !== 'type') {
        return;
    }
    
    $type = get_post_meta($post_id, 'ehf_template_type', true);
    
    switch ($type) {
        case 'type_header':
            echo esc_html__('Header', 'elessi-theme');
            break;
        
        case 'type_footer':
            echo esc_html__('Footer', 'elessi-theme');
            break;
        
        case 'type_before_footer':
            echo esc_html__('Before Footer', 'elessi-theme');
            break;
        
        case 'custom':
            echo esc_html__('Custom Block', 'elessi-theme');
            break;
        
        default:
            echo esc_html__('Unknown', 'elessi-theme');
            break;
    }
}
