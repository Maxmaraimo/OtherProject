<?php
add_action('init', 'elessi_product_page_heading');
if (!function_exists('elessi_product_page_heading')) {
    function elessi_product_page_heading() {
        // Set the Options Array
        global $of_options;
        if (empty($of_options)) {
            $of_options = array();
        }
        
        $of_options[] = array(
            "name" => __("Archive Products Page", 'elessi-theme'),
            "target" => 'product-page',
            "type" => "heading",
        );
        
        $of_options[] = array(
            "name" => __("Archive Options", 'elessi-theme'),
            "std" => "<h4>" . __("Archive Options", 'elessi-theme') . "</h4>",
            "type" => "info",
            'class' => 'first'
        );
        
        $of_options[] = array(
            "name" => __("Shop Sidebar Layout", 'elessi-theme'),
            "id" => "category_sidebar",
            "std" => "top",
            "type" => "select",
            "options" => array(
                "top" => __("Top Bar", 'elessi-theme'),
                "top-2" => __("Top Bar Type 2", 'elessi-theme'),
                "top-3" => __("Top Bar Type 3", 'elessi-theme'),
                "left" => __("Left Sidebar - Off-canvas", 'elessi-theme'),
                "right" => __("Right Sidebar - Off-canvas", 'elessi-theme'),
                "left-classic" => __("Left Sidebar - Classic", 'elessi-theme'),
                "right-classic" => __("Right Sidebar - Classic", 'elessi-theme'),
                "no" => __("No Sidebar", 'elessi-theme'),
            ),
            
            // 'class' => 'nasa-theme-option-parent'
        );

        $of_options[] = array(
            "name" => __("Sidebar Classic - Sticky", 'elessi-theme'),
            "id" => "archive_sticky_sidebar_classic",
            "std" => "0",
            "type" => "switch",
            'class' => 'nasa-category_sidebar',
            'child_of' => 'category_sidebar',
            'm_target' => array('left-classic', 'right-classic'),
        );
        
        $of_options[] = array(
            "name" => __("Toggle Sidebar", 'elessi-theme'),
            "id" => "toggle_sidebar_classic",
            "std" => "1",
            "type" => "switch",
            'class' => 'nasa-category_sidebar',
            'child_of' => 'category_sidebar',
            'm_target' => array('left-classic', 'right-classic'),
        );
        
        $of_options[] = array(
            "name" => __("Top Bar Limit widgets to Show More", 'elessi-theme'),
            "id" => "limit_widgets_show_more",
            "desc" => __('Limit widgets to show more. (Input "All" will be show all widgets)', 'elessi-theme'),
            "std" => "4",
            "type" => "text",
            'class' => 'nasa-category_sidebar',
            'child_of' => 'category_sidebar',
            'm_target' => array('top'),
        );
        
        $of_options[] = array(
            "name" => __("Position Filter Categories", 'elessi-theme'),
            "id" => "top_bar_cat_pos",
            "std" => "left-bar",
            "type" => "select",
            "options" => array(
                "top" => __("Top", 'elessi-theme'),
                "left-bar" => __("Side", 'elessi-theme')
            ),
            'class' => 'nasa-category_sidebar',
            'child_of' => 'category_sidebar',
            'm_target' => array('top'),
        );

        $of_options[] = array(
            "name" => __("Position Filter Categories - Type 3", 'elessi-theme'),
            "id" => "top_bar_cat_pos_type_3",
            "std" => "side-classic",
            "type" => "select",
            "options" => array(
                "side-classic" => __("Side Classic", 'elessi-theme'),
                "side-canvas" => __("Side Canvas", 'elessi-theme')
            ),
            'class' => 'nasa-category_sidebar',
            'child_of' => 'category_sidebar',
            'm_target' => array('top-3'),
        );
        
        $of_options[] = array(
            "name" => __("Nasa - Product Categories in Sidebar Off-Canvas of Mobile layout", 'elessi-theme'),
            "id" => "ns_pcat_off",
            "type" => "switch",
            'class' => 'nasa-category_sidebar',
            'child_of' => 'category_sidebar',
            'm_target' => array('top'),
        );

        $of_options[] = array(
            "name" => __("Type View", 'elessi-theme'),
            "id" => "products_type_view",
            "std" => "grid",
            "type" => "select",
            "options" => array(
                "grid" => __("Grid View Mode", 'elessi-theme'),
                "list" => __("List View Mode", 'elessi-theme')
            )
        );

         $of_options[] = array(
            "name" => __("Change View Mode (Only Desktop Mode)", 'elessi-theme'),
            "id" => "enable_change_view",
            "std" => "1",
            "type" => "switch"
        );
        
        $of_options[] = array(
            "name" => __("Change View Mode (Only Mobile Layout Mode)", 'elessi-theme'),
            "id" => "enable_change_view_mobile",
            "std" => "0",
            "type" => "switch"
        );

        $of_options[] = array(
            "name" => __("Columns", 'elessi-theme'),
            "id" => "products_per_row",
            "std" => "4-cols",
            "type" => "select",
            "options" => array(
                "2-cols" => __("2 columns", 'elessi-theme'),
                "3-cols" => __("3 columns", 'elessi-theme'),
                "4-cols" => __("4 columns", 'elessi-theme'),
                "5-cols" => __("5 columns", 'elessi-theme'),
                "6-cols" => __("6 columns", 'elessi-theme'),
            )
        );
        
        $of_options[] = array(
            "name" => __("Mobile Columns", 'elessi-theme'),
            "id" => "products_per_row_small",
            "std" => "1-col",
            "type" => "select",
            "options" => array(
                "1-cols" => __("1 column", 'elessi-theme'),
                "2-cols" => __("2 columns", 'elessi-theme')
            )
        );
        
        $of_options[] = array(
            "name" => __("Tablet Columns", 'elessi-theme'),
            "id" => "products_per_row_tablet",
            "std" => "2-cols",
            "type" => "select",
            "options" => array(
                "2-cols" => __("2 columns", 'elessi-theme'),
                "3-cols" => __("3 columns", 'elessi-theme'),
                "4-cols" => __("4 columns", 'elessi-theme')
            )
        );

        $of_options[] = array(
            "name" => __("Limit Products Per Page", 'elessi-theme'),
            "id" => "products_pr_page",
            "std" => "16",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Option 2 Columns", 'elessi-theme'),
            "id" => "option_2_cols",
            "std" => "0",
            "type" => "switch"
        );
        
        $of_options[] = array(
            "name" => __("Option 6 Columns", 'elessi-theme'),
            "id" => "option_6_cols",
            "std" => "0",
            "type" => "switch"
        );
        
        $of_options[] = array(
            "name" => __("Results info in top", 'elessi-theme'),
            "id" => "showing_info_top",
            "desc" => __("Note: don't using for Sidebar Off-canvas and Toggle Sidebar Classic", 'elessi-theme'),
            "std" => "1",
            "type" => "switch"
        );
        
        $of_options[] = array(
            "name" => __("Layout Style", 'elessi-theme'),
            "id" => "products_layout_style",
            "std" => "grid_row",
            "type" => "select",
            "options" => array(
                "grid-row" => __("Grid Rows", 'elessi-theme'),
                "masonry-isotope" => __("Masonry Isotope", 'elessi-theme')
            ),
            'class' => 'nasa-theme-option-parent'
        );
        
        $of_options[] = array(
            "name" => __("Isotope Layout Mode", 'elessi-theme'),
            "id" => "products_masonry_mode",
            "std" => "masonry",
            "type" => "select",
            "options" => array(
                "masonry" => __("Masonry", 'elessi-theme'),
                "fitRows" => __("Fit Rows", 'elessi-theme')
            ),
            
            'class' => 'nasa-products_layout_style nasa-products_layout_style-masonry-isotope nasa-theme-option-child'
        );

        $of_options[] = array(
            "name" => __("Pagination Layout", 'elessi-theme'),
            "id" => "pagination_style",
            "std" => 'style-2',
            "type" => "select",
            "options" => array(
                "style-2" => __("Simple", 'elessi-theme'),
                "style-1" => __("Full", 'elessi-theme'),
                "infinite" => __("Infinite - Only using for Ajax", 'elessi-theme'),
                "load-more" => __("Load More - Only using for Ajax", 'elessi-theme')
            )
        );
        
        $of_options[] = array(
            "name" => __("Disable Ajax Shop", 'elessi-theme'),
            "id" => "disable_ajax_product",
            // "desc" => __("Yes, Please!", 'elessi-theme'),
            "on" => __("Yes", 'elessi-theme'),
            "off" => __("No", 'elessi-theme'),
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array(
            "name" => __("Advance Content Options", 'elessi-theme'),
            "std" => "<h4>" . __("Advance Content Options", 'elessi-theme') . "</h4>",
            "type" => "info"
        );
        
        $arr_blocks = elessi_admin_get_static_blocks();

        $of_options[] = array(
            "name" => __("Category top content", 'elessi-theme'),
            "id" => "cat_header_content",
            "type" => "select2id",
            "options" => $arr_blocks,
            'class' => 'ns-block-type',
            'select_class' => 'nasa-ad-select2',
            "desc" => __("Please create Static Blocks (or Custom Block of Elementor Header & Footer Builder) and select here.", 'elessi-theme') . '<br /><a class="nsblk-edit hidden-tag" href="#" data-stb-href="' . esc_url(admin_url('post.php?post=ns_blk_id&action=edit')) . '" data-ctb-href="' . esc_url(admin_url('post.php?post=ns_blk_id&action=elementor')) . '">' . esc_html__('Click here to Edit', 'elessi-theme') . '</a>'
        );
        
        $of_options[] = array(
            "name" => __("Category bottom content", 'elessi-theme'),
            "id" => "cat_footer_content",
            "type" => "select2id",
            "options" => $arr_blocks,
            'class' => 'ns-block-type',
            'select_class' => 'nasa-ad-select2',
            "desc" => __("Please create Static Blocks (or Custom Block of Elementor Header & Footer Builder) and select here.", 'elessi-theme') . '<br /><a class="nsblk-edit hidden-tag" href="#" data-stb-href="' . esc_url(admin_url('post.php?post=ns_blk_id&action=edit')) . '" data-ctb-href="' . esc_url(admin_url('post.php?post=ns_blk_id&action=elementor')) . '">' . esc_html__('Click here to Edit', 'elessi-theme') . '</a>'
        );
        
        $of_options[] = array(
            "name" => __("After Breadcrumb - Only for Shop Page", 'elessi-theme'),
            "id" => "shop_brdc_blk",
            "type" => "select2id",
            "options" => $arr_blocks,
            'class' => 'ns-block-type',
            'select_class' => 'nasa-ad-select2',
            "desc" => __("Please create Static Blocks (or Custom Block of Elementor Header & Footer Builder) and select here.", 'elessi-theme') . '<br /><a class="nsblk-edit hidden-tag" href="#" data-stb-href="' . esc_url(admin_url('post.php?post=ns_blk_id&action=edit')) . '" data-ctb-href="' . esc_url(admin_url('post.php?post=ns_blk_id&action=elementor')) . '">' . esc_html__('Click here to Edit', 'elessi-theme') . '</a>'
        );
        
        $of_options = apply_filters('nasa_theme_opts_archive_product_page', $of_options);
    }
}
