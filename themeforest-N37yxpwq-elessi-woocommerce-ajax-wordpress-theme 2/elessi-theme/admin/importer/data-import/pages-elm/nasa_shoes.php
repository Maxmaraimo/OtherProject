<?php
function nasa_elm_shoes() {
    $imgs_1 = elessi_import_upload('/wp-content/uploads/2018/06/h9-banner-1.jpg', '3139', array(
        'post_title' => 'h9-banner-1',
        'post_name' => 'h9-banner-1',
    ));
    
    $imgs_2 = elessi_import_upload('/wp-content/uploads/2018/06/h9-banner-3.jpg', '3139', array(
        'post_title' => 'h9-banner-3',
        'post_name' => 'h9-banner-3',
    ));
    
    $imgs_3 = elessi_import_upload('/wp-content/uploads/2018/06/h9-banner-2.jpg', '3139', array(
        'post_title' => 'h9-banner-2',
        'post_name' => 'h9-banner-2',
    ));
    
    $brand_1 = elessi_import_upload('/wp-content/uploads/2017/09/brand-1.jpg', '3074', array(
        'post_title' => 'Brand IMG 1',
        'post_name' => 'brand-1',
    ));
    $brand_2 = elessi_import_upload('/wp-content/uploads/2017/09/brand-2.jpg', '3074', array(
        'post_title' => 'Brand IMG 2',
        'post_name' => 'brand-2',
    ));
    $brand_3 = elessi_import_upload('/wp-content/uploads/2017/09/brand-3.jpg', '3074', array(
        'post_title' => 'Brand IMG 3',
        'post_name' => 'brand-3',
    ));
    $brand_4 = elessi_import_upload('/wp-content/uploads/2017/09/brand-4.jpg', '3074', array(
        'post_title' => 'Brand IMG 4',
        'post_name' => 'brand-4',
    ));
    $brand_5 = elessi_import_upload('/wp-content/uploads/2017/09/brand-5.jpg', '3074', array(
        'post_title' => 'Brand IMG 5',
        'post_name' => 'brand-5',
    ));
    $brand_6 = elessi_import_upload('/wp-content/uploads/2017/09/brand-6.jpg', '3074', array(
        'post_title' => 'Brand IMG 6',
        'post_name' => 'brand-6',
    ));
    
    return array(
        'post' => array(
            'post_title' => 'ELM Shoes',
            'post_name' => 'elm-shoes'
        ),
        
        'post_meta' => array(
            '_elementor_data' => '[{"id":"5942266a","elType":"section","settings":{"layout":"full_width","gap":"no","css_classes":"margin-top-50 margin-bottom-50 padding-bottom-40 mobile-padding-bottom-10"},"elements":[{"id":"da17a2c","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"18acec9","elType":"widget","settings":{"wp":{"title_shortcode":"","type":"recent_product","style":"slide_slick","style_viewmore":"1","style_row":"1","pos_nav":"top","title_align":"left","shop_url":"0","arrows":"0","dots":"false","auto_slide":"false","number":"4","auto_delay_time":"6","columns_number":"1","columns_number_small":"1","columns_number_small_slider":"1","columns_number_tablet":"1","cat":"","not_in":"","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_products_sc"}],"isInner":false}],"isInner":false},{"id":"791999d","elType":"section","settings":{"structure":"30"},"elements":[{"id":"4bfa788","elType":"column","settings":{"_column_size":33,"_inline_size":null,"padding_mobile":{"unit":"px","top":"0","right":"10","bottom":"10","left":"10","isLinked":false}},"elements":[{"id":"2f22352b","elType":"widget","settings":{"wp":{"img_src":"' . $imgs_1 . '","height":"243px","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"bottom","text-align":"text-left","banner_responsive":"yes","content":"<h5 style=\"font-weight: 800\">New\r\nseason 2020<\/h5>\r\n<h6 style=\"color: #999;font-size: 120%\">Shoes &amp; Accessories<\/h6>","effect_text":"fadeInLeft","data_delay":"500ms","hover":"zoom","border_inner":"no","border_outner":"no","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_banner_sc"}],"isInner":false},{"id":"2b1ac8e8","elType":"column","settings":{"_column_size":33,"_inline_size":null,"padding_mobile":{"unit":"px","top":"0","right":"10","bottom":"10","left":"10","isLinked":false}},"elements":[{"id":"5d814b61","elType":"widget","settings":{"wp":{"img_src":"' . $imgs_2 . '","height":"243px","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"middle","text-align":"text-left","banner_responsive":"yes","content":"<h5 style=\"font-weight: 800;color: #fff\">Spring\r\nArrivals<\/h5>\r\n<h6 style=\"color: #fff;font-size: 120%\">Shoes Collections<\/h6>","effect_text":"fadeInLeft","data_delay":"500ms","hover":"zoom","border_inner":"no","border_outner":"no","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_banner_sc"}],"isInner":false},{"id":"43f1c768","elType":"column","settings":{"_column_size":33,"_inline_size":null,"padding_mobile":{"unit":"px","top":"0","right":"10","bottom":"10","left":"10","isLinked":false}},"elements":[{"id":"157dee24","elType":"widget","settings":{"wp":{"img_src":"' . $imgs_3 . '","height":"243px","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"<h5 style=\"font-weight: 800\">Classic Colections<\/h5>\r\n<h6 style=\"color: #999;font-size: 120%\">Sale off 50%<\/h6>","effect_text":"fadeInLeft","data_delay":"500ms","hover":"zoom","border_inner":"no","border_outner":"no","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_banner_sc"}],"isInner":false}],"isInner":false},{"id":"732b51d0","elType":"section","settings":{"css_classes":"desktop-margin-top-60 margin-top-50"},"elements":[{"id":"7fb9e64b","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"32e8f41e","elType":"widget","settings":{"title":"Trendy item","size":"large","align":"center","title_color":"#333333","typography_typography":"custom","typography_font_family":"Jost","typography_font_weight":"800","text_shadow_text_shadow_type":"yes","text_shadow_text_shadow":{"horizontal":0,"vertical":0,"blur":0,"color":"rgba(0,0,0,0.3)"},"header_size":"h3","_css_classes":"margin-bottom-10"},"elements":[],"widgetType":"heading"},{"id":"20df3248","elType":"widget","settings":{"wp":{"title":"","desc":"","alignment":"center","style":"2d-no-border","tabs":{"1603386304507":{"tab_title":"ALL","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"1","arrows":"1","dots":"false","auto_slide":"false","number":"10","auto_delay_time":"6","columns_number":"5","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1603386427250":{"tab_title":"FEATURED","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"0","arrows":"0","dots":"false","auto_slide":"false","number":"10","auto_delay_time":"6","columns_number":"5","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1603386467942":{"tab_title":"BEST SELLING","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"1","arrows":"0","dots":"false","auto_slide":"false","number":"10","auto_delay_time":"6","columns_number":"5","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1603386510457":{"tab_title":"TOP RATED","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"1","arrows":"0","dots":"false","auto_slide":"false","number":"10","auto_delay_time":"6","columns_number":"5","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1603386554180":{"tab_title":"TRENDS","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"0","arrows":"0","dots":"false","auto_slide":"false","number":"10","auto_delay_time":"6","columns_number":"5","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""}},"el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_products_tabs_sc"}],"isInner":false}],"isInner":false},{"id":"3e171646","elType":"section","settings":{"structure":"21"},"elements":[{"id":"7f29a028","elType":"column","settings":{"_column_size":33,"_inline_size":38.354,"css_classes":"margin-top-30 padding-top-100 padding-bottom-40 desktop-padding-left-150 mobile-padding-top-0 mobile-margin-top-10"},"elements":[{"id":"5704a12d","elType":"widget","settings":{"wp":{"title":"","text":"<h2 style=\"font-weight: 400; font-size: 30px;\"><a href=\"http:\/\/elessi.nasatheme.com\/elementor\/product-category\/men\/shoes-men\/\">Pink Platform Sneakers<\/a><\/h2>","filter":"on","visual":"on"}},"elements":[],"widgetType":"wp-widget-text"},{"id":"29a74f4d","elType":"widget","settings":{"editor":"<div class=\"margin-top-0 margin-bottom-20 price\" style=\"font-size: 200%;\">$29 <del style=\"font-size: 90%;\">$39<\/del><\/div>"},"elements":[],"widgetType":"text-editor"},{"id":"3af0b59","elType":"widget","settings":{"wp":{"date":"2024-12-30","style":"digital","align":"left","size":"small","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_countdown_sc"},{"id":"27e6a7f1","elType":"widget","settings":{"editor":"<a class=\"button nasa-button-banner margin-top-20\" title=\"Shop now\" href=\"#\">SHOP NOW<\/a>"},"elements":[],"widgetType":"text-editor"}],"isInner":false},{"id":"1ee00b3a","elType":"column","settings":{"_column_size":66,"_inline_size":61.312},"elements":[{"id":"2974fe8e","elType":"widget","settings":{"wp":{"pin_slug":"pin-products-home-9","marker_style":"price","full_price_icon":"no","show_img":"no","show_price":"no","pin_effect":"no","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_pin_products_banner_sc"}],"isInner":false}],"isInner":false},{"id":"6e2cdb0f","elType":"section","settings":{"css_classes":"desktop-margin-top-60 mobile-margin-top-40"},"elements":[{"id":"4d8ec32d","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"6fc54895","elType":"widget","settings":{"title":"Latest blog","size":"large","align":"center","title_color":"#333333","typography_typography":"custom","typography_font_family":"Jost","typography_font_weight":"800","header_size":"h3","_css_classes":"margin-bottom-20"},"elements":[],"widgetType":"heading"},{"id":"67f23b79","elType":"widget","settings":{"wp":{"title":"","show_type":"slide","auto_slide":"false","arrows":"1","dots":"false","posts":"5","columns_number":"4","columns_number_small":"1","columns_number_small_slider":"1","columns_number_tablet":"2","category":"","cats_enable":"yes","date_enable":"yes","author_enable":"yes","readmore":"yes","date_author":"bot","des_enable":"no","page_blogs":"no","info_align":"left","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_post_sc"}],"isInner":false}],"isInner":false},{"id":"daa5d9c","elType":"section","settings":{"css_classes":"margin-top-30 margin-bottom-50"},"elements":[{"id":"42e274b","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"c944daa","elType":"widget","settings":{"wp":{"title":"","align":"center","sliders":{"1605886645649":{"img_src":"' . $brand_1 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""},"1605886663901":{"img_src":"' . $brand_2 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""},"1605886673562":{"img_src":"' . $brand_3 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""},"1605886691185":{"img_src":"' . $brand_4 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""},"1605886702478":{"img_src":"' . $brand_5 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""},"1605886713208":{"img_src":"' . $brand_6 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""}},"bullets":"false","bullets_pos":"","bullets_align":"center","navigation":"true","column_number":"6","column_number_small":"3","column_number_tablet":"4","padding_item":"","padding_item_small":"","padding_item_medium":"","autoplay":"false","paginationspeed":"300","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_sliders_sc"}],"isInner":false}],"isInner":false}]',
            '_elementor_controls_usage' => 'a:12:{s:26:"wp-widget-nasa_products_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:6:"column";a:3:{s:5:"count";i:9;s:15:"control_percent";i:0;s:8:"controls";a:2:{s:6:"layout";a:1:{s:6:"layout";a:1:{s:12:"_inline_size";i:9;}}s:8:"advanced";a:1:{s:16:"section_advanced";a:2:{s:14:"padding_mobile";i:3;s:11:"css_classes";i:1;}}}}s:7:"section";a:3:{s:5:"count";i:6;s:15:"control_percent";i:0;s:8:"controls";a:2:{s:6:"layout";a:2:{s:14:"section_layout";a:2:{s:6:"layout";i:1;s:3:"gap";i:1;}s:17:"section_structure";a:1:{s:9:"structure";i:2;}}s:8:"advanced";a:1:{s:16:"section_advanced";a:1:{s:11:"css_classes";i:4;}}}}s:24:"wp-widget-nasa_banner_sc";a:3:{s:5:"count";i:3;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:7:"heading";a:3:{s:5:"count";i:2;s:15:"control_percent";i:4;s:8:"controls";a:3:{s:7:"content";a:1:{s:13:"section_title";a:4:{s:5:"title";i:2;s:4:"size";i:2;s:5:"align";i:2;s:11:"header_size";i:2;}}s:5:"style";a:1:{s:19:"section_title_style";a:6:{s:11:"title_color";i:2;s:21:"typography_typography";i:2;s:22:"typography_font_family";i:2;s:22:"typography_font_weight";i:2;s:28:"text_shadow_text_shadow_type";i:1;s:23:"text_shadow_text_shadow";i:1;}}s:8:"advanced";a:1:{s:14:"_section_style";a:1:{s:12:"_css_classes";i:2;}}}}s:31:"wp-widget-nasa_products_tabs_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:14:"wp-widget-text";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:11:"text-editor";a:3:{s:5:"count";i:2;s:15:"control_percent";i:0;s:8:"controls";a:1:{s:7:"content";a:1:{s:14:"section_editor";a:1:{s:6:"editor";i:2;}}}}s:27:"wp-widget-nasa_countdown_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:37:"wp-widget-nasa_pin_products_banner_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:22:"wp-widget-nasa_post_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:25:"wp-widget-nasa_sliders_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}}',
            '_elementor_css' => 'a:6:{s:4:"time";i:1606467311;s:5:"fonts";a:1:{i:0;s:4:"Jost";}s:5:"icons";a:0:{}s:20:"dynamic_elements_ids";a:0:{}s:6:"status";s:4:"file";i:0;s:0:"";}',
            // '_nasa_custom_header' => '1',
            // '_nasa_plus_wide_option' => '1',
            // '_nasa_plus_wide_width' => '400',
        ),
        
        'globals' => array(
            'header-type' => '1',
            
            // 'fixed_nav' => '0',
            
            'plus_wide_width' => '400',
            // 'color_primary' => '#d69200',
            
            // 'bg_color_topbar' => '28aeb1',
            // 'text_color_topbar' => '#ffffff',
            
            // 'fullwidth_main_menu' => '1',
            
            // 'bg_color_main_menu' => '#e4272c',
            // 'text_color_main_menu' => '#ffffff',
            
            // 'v_root' => '1',
            // 'v_root_limit' => '10',
            
            // 'bg_color_v_menu' => '#000000',
            // 'text_color_v_menu' => '#ffffff',
            
            'footer_mode' => 'builder-e',
            'footer_elm' => elessi_elm_fid_by_slug('hfe-footer-light-2-width-1600'),
            'footer_elm_mobile' => elessi_elm_fid_by_slug('hfe-footer-mobile'),
            
            'category_sidebar' => 'top-2',
            
            'product_detail_layout' => 'full',
            'full_info_col' => '2',
            // 'product_image_layout' => 'single',
            // 'product_image_style' => 'slide',
            // 'sp_bgl' => '#f6f6f6',
            // 'tab_style_info' => 'scroll-down',
            
            // 'single_product_thumbs_style' => 'hoz',
            
            // 'loop_layout_buttons' => 'modern-5',
            
            // 'animated_products' => 'hover-carousel',
            
            // 'nasa_attr_image_style' => 'square',
            // 'nasa_attr_image_single_style' => 'extends',
            'nasa_attr_color_style' => 'round',
            'nasa_attr_label_style' => 'small-square-1',
            
            // 'breadcrumb_row' => 'single',
            // 'breadcrumb_type' => 'default',
            // 'breadcrumb_bg_color' => '#f8f8f8',
            // 'breadcrumb_align' => 'text-left',
            // 'breadcrumb_height' => '60',
        ),

        'css' => '.elementor-[inserted_id] .elementor-element.elementor-element-32e8f41e{text-align:center;}.elementor-[inserted_id] .elementor-element.elementor-element-32e8f41e .elementor-heading-title{color:#333333;font-family:"Jost", Sans-serif;font-weight:800;text-shadow:0px 0px 0px rgba(0,0,0,0.3);}.elementor-[inserted_id] .elementor-element.elementor-element-6fc54895{text-align:center;}.elementor-[inserted_id] .elementor-element.elementor-element-6fc54895 .elementor-heading-title{color:#333333;font-family:"Jost", Sans-serif;font-weight:800;}@media(min-width:768px){.elementor-[inserted_id] .elementor-element.elementor-element-7f29a028{width:38.354%;}.elementor-[inserted_id] .elementor-element.elementor-element-1ee00b3a{width:61.312%;}}@media(max-width:767px){.elementor-[inserted_id] .elementor-element.elementor-element-4bfa788 > .elementor-element-populated{padding:0px 10px 10px 10px;}.elementor-[inserted_id] .elementor-element.elementor-element-2b1ac8e8 > .elementor-element-populated{padding:0px 10px 10px 10px;}.elementor-[inserted_id] .elementor-element.elementor-element-43f1c768 > .elementor-element-populated{padding:0px 10px 10px 10px;}}'
    );
}
