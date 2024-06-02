<?php
/*
 *
 * @package nasatheme - elessi-theme
 */

defined('NASA_VERSION') or define('NASA_VERSION', '6.0.8');

/* Define DIR AND URI OF THEME */
define('ELESSI_THEME_PATH', get_template_directory());
define('ELESSI_CHILD_PATH', get_stylesheet_directory());
define('ELESSI_THEME_URI', get_template_directory_uri());

/* Global $content_width */
if (!isset($content_width)) {
    $content_width = 1200; /* pixels */
}

/**
 * Options theme
 */
require ELESSI_THEME_PATH . '/options/nasa-options.php';

/**
 * After Setup theme
 */
add_action('after_setup_theme', 'elessi_setup');
if (!function_exists('elessi_setup')) :
    function elessi_setup() {
        global $nasa_opt;
        
        /**
         * Load Text Domain - "elessi-theme"
         */
        $locale = apply_filters('theme_locale', determine_locale(), 'elessi-theme');
        $mofile = sprintf('%1$s-%2$s.mo', 'elessi-theme', $locale);

        // /wp-content/languages/themes/elessi-theme-{locale}.mo => Support Languages Locate
        $mofile1 = WP_LANG_DIR . '/themes/' . $mofile;

        // /wp-content/languages/loco/themes/elessi-theme-{locale}.mo => Support Loco Locate
        $mofile2 = WP_LANG_DIR . '/loco/themes/' . $mofile;

        // /wp-content/languages/themes/elessi-theme/elessi-theme-{locale}.mo => Support Languages/themes/elessi-theme Locate
        $mofile3 = WP_LANG_DIR . '/themes/elessi-theme/' . $mofile;

        // /wp-content/themes/elessi-theme/languages/elessi-theme-{locale}.mo => Support Language Author Locate
        $mofile4 = ELESSI_THEME_PATH . '/languages/' . $mofile;

        unload_textdomain('elessi-theme');
        
        /**
         * Load textdomain
         */
        if (file_exists($mofile1)) {
            load_textdomain('elessi-theme', $mofile1);
        } elseif (file_exists($mofile2)) {
            load_textdomain('elessi-theme', $mofile2);
        } elseif (file_exists($mofile3)) {
            load_textdomain('elessi-theme', $mofile3);
        } elseif (file_exists($mofile4)) {
            load_textdomain('elessi-theme', $mofile4);
        } else {
            /**
             * Default template
             */
            load_theme_textdomain('elessi-theme', ELESSI_THEME_PATH . '/languages');
        }
        
        /**
         * Theme Support
         */
        add_theme_support('woocommerce');
        add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('custom-background');
        // add_theme_support('custom-header');
        
        /**
         * Remove Theme Support
         */
        remove_theme_support('wc-product-gallery-lightbox');
        remove_theme_support('wc-product-gallery-zoom');
        remove_theme_support('wc-product-gallery-slider');
        
        /**
         * For WP 5.8
         */
        if (!isset($nasa_opt['block_editor_widgets']) || !$nasa_opt['block_editor_widgets']) {
            remove_theme_support('widgets-block-editor');
        }

        /**
         * Register Menu locations
         */
        register_nav_menus(
            array(
                'primary' => esc_html__('Main Menu', 'elessi-theme'),
                'vetical-menu' => esc_html__('Vertical Menu', 'elessi-theme'),
                'topbar-menu' => esc_html__('Top Menu - Only show level 1', 'elessi-theme')
            )
        );
        
        /**
         * Set Theme Options
         */
        if (!did_action('nasa_set_options')) {
            do_action('nasa_set_options');
        }
        
        /**
         * Register Font family
         */
        require ELESSI_THEME_PATH . '/cores/nasa-register-fonts.php';

        /**
         * Libraries of theme
         */
        require ELESSI_THEME_PATH . '/cores/nasa-custom-wc-ajax.php';
        require ELESSI_THEME_PATH . '/cores/nasa-dynamic-style.php';
        require ELESSI_THEME_PATH . '/cores/nasa-widget-functions.php';
        require ELESSI_THEME_PATH . '/cores/nasa-theme-options.php';
        require ELESSI_THEME_PATH . '/cores/nasa-theme-functions.php';
        require ELESSI_THEME_PATH . '/cores/nasa-woo-functions.php';
        require ELESSI_THEME_PATH . '/cores/nasa-woo-actions.php';
        require ELESSI_THEME_PATH . '/cores/nasa-shop-ajax.php';
        require ELESSI_THEME_PATH . '/cores/nasa-theme-headers.php';
        require ELESSI_THEME_PATH . '/cores/nasa-theme-footers.php';
        require ELESSI_THEME_PATH . '/cores/nasa-yith-wcwl-ext.php';
        require ELESSI_THEME_PATH . '/cores/nasa-wishlist.php';
        
        /**
         * Dokan support
         */
        if (defined('NASA_WOO_ACTIVED') && NASA_WOO_ACTIVED && defined('NASA_DOKAN_ACTIVED') && NASA_DOKAN_ACTIVED) {
            require ELESSI_THEME_PATH . '/cores/nasa-dokan-functions.php';
        }
        
        /**
         * Outdate functions
         */
        require ELESSI_THEME_PATH . '/cores/nasa-outdate-functions.php';

        /**
         * Includes widgets
         */
        require ELESSI_THEME_PATH . '/widgets/wg-nasa-recent-posts.php';
        require ELESSI_THEME_PATH . '/widgets/wg-nasa-product-categories.php';
        require ELESSI_THEME_PATH . '/widgets/wg-nasa-product-filter-multi-categories.php';
        require ELESSI_THEME_PATH . '/widgets/wg-nasa-product-brands.php';
        require ELESSI_THEME_PATH . '/widgets/wg-nasa-product-filter-price.php';
        require ELESSI_THEME_PATH . '/widgets/wg-nasa-product-filter-price-list.php';
        require ELESSI_THEME_PATH . '/widgets/wg-nasa-product-filter-variations.php';
        require ELESSI_THEME_PATH . '/widgets/wg-nasa-tag-cloud.php';
        require ELESSI_THEME_PATH . '/widgets/wg-nasa-product-filter-status.php';
        require ELESSI_THEME_PATH . '/widgets/wg-nasa-product-filter-multi-tags.php';
        require ELESSI_THEME_PATH . '/widgets/wg-nasa-reset-filter.php';
    }
endif;
