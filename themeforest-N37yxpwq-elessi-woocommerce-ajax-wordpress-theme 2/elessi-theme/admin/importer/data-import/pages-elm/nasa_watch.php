<?php
function nasa_elm_watch() {
    $imgs_1 = elessi_import_upload('/wp-content/uploads/2021/02/watches_light_banner1.jpg', '3117', array(
        'post_title' => 'watches_light_banner1',
        'post_name' => 'watches_light_banner1',
    ));
    
    $imgs_2 = elessi_import_upload('/wp-content/uploads/2021/02/watches_light_banner2.jpg', '3117', array(
        'post_title' => 'watches_light_banner2',
        'post_name' => 'watches_light_banner2',
    ));
    
    $result = array(
        'post' => array(
            'post_title' => 'ELM Watch',
            'post_name' => 'elm-watch'
        ),
        
        'post_meta' => array(
            '_elementor_data' => '[{"id":"6d16fb6c","elType":"section","settings":{"layout":"full_width","gap":"no","margin":{"unit":"px","top":"0","right":0,"bottom":"10","left":0,"isLinked":false},"margin_mobile":{"unit":"px","top":"0","right":0,"bottom":"0","left":0,"isLinked":false}},"elements":[{"id":"1ca6bd38","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"c7fb0d0","elType":"widget","settings":{"revslidertitle":"Slider Watches Light","shortcode":"[rev_slider alias=\"slider-watch-light\" slidertitle=\"Slider Watches Light\"][\/rev_slider]"},"elements":[],"widgetType":"slider_revolution"}],"isInner":false}],"isInner":false},{"id":"7f06d035","elType":"section","settings":{"structure":"20","stretch_section":"section-stretched","padding":{"unit":"px","top":"0","right":"0","bottom":"0","left":"0","isLinked":false},"margin_mobile":{"unit":"px","top":"","right":0,"bottom":"","left":0,"isLinked":true},"margin":{"unit":"px","top":"0","right":0,"bottom":"0","left":0,"isLinked":false}},"elements":[{"id":"68c3d129","elType":"column","settings":{"_column_size":50,"_inline_size":null,"html_tag":"section","padding":{"unit":"px","top":"10","right":"10","bottom":"0","left":"10","isLinked":false}},"elements":[{"id":"b890cb5","elType":"widget","settings":{"wp":{"img_src":"' . $imgs_1 . '","height":"","width":"","link":"","content-width":"","align":"center","move_x":"","valign":"middle","text-align":"text-center","banner_responsive":"yes","content":"<h6 style=\"text-transform: uppercase;line-height:3;letter-spacing: 3px;text-decoration: underline\"><a style=\"font-weight: 700;color: #A6ACB0\" title=\"Shop Now\" href=\"#\">Discover now<\/a><\/h6>\r\n<h4 style=\"font-weight: 800;margin-bottom: 80px\">Special Collection<\/h4>","effect_text":"fadeIn","data_delay":"","hover":"zoom","border_inner":"no","border_outner":"no","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_banner_sc"}],"isInner":false},{"id":"78f16e84","elType":"column","settings":{"_column_size":50,"_inline_size":null,"padding":{"unit":"px","top":"10","right":"10","bottom":"0","left":"10","isLinked":false}},"elements":[{"id":"24e39aa7","elType":"widget","settings":{"wp":{"img_src":"' . $imgs_2 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"middle","text-align":"text-left","banner_responsive":"yes","content":"<h6 style=\"font-weight: 700;letter-spacing: 5px\">SALE UP TO<\/a><\/h6>\r\n<h4 style=\"color: #000000;font-weight: 800;line-height: 1.5\">30% OFF<\/h4>","effect_text":"fadeIn","data_delay":"","hover":"zoom","border_inner":"no","border_outner":"no","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_banner_sc"}],"isInner":false}],"isInner":false},{"id":"49a579f5","elType":"section","settings":{"margin":{"unit":"px","top":"80","right":0,"bottom":"50","left":0,"isLinked":false},"margin_mobile":{"unit":"px","top":"30","right":0,"bottom":"30","left":0,"isLinked":false}},"elements":[{"id":"3417d0be","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"2b14c240","elType":"widget","settings":{"title":"Featured Products","align":"center","title_color":"#333333","typography_typography":"custom","typography_font_family":"Jost","typography_font_weight":"800","header_size":"h3"},"elements":[],"widgetType":"heading"},{"id":"6697a35","elType":"widget","settings":{"wp":{"title":"","desc":"","alignment":"center","style":"2d-radius-dashed","tabs":{"1603386304507":{"tab_title":"BEST SELLER","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"1","arrows":"1","dots":"true","auto_slide":"false","number":"8","auto_delay_time":"6","columns_number":"4","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1603386427250":{"tab_title":"FEATURED","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"0","arrows":"0","dots":"false","auto_slide":"false","number":"8","auto_delay_time":"6","columns_number":"4","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1603386467942":{"tab_title":"MEN","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"1","arrows":"0","dots":"false","auto_slide":"false","number":"8","auto_delay_time":"6","columns_number":"4","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1603386510457":{"tab_title":"ON SALE","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"1","arrows":"0","dots":"false","auto_slide":"false","number":"8","auto_delay_time":"6","columns_number":"4","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1603386554180":{"tab_title":"NEW","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"0","arrows":"0","dots":"false","auto_slide":"false","number":"8","auto_delay_time":"6","columns_number":"4","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""}},"el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_products_tabs_sc"}],"isInner":false}],"isInner":false},{"id":"5fd9878","elType":"section","settings":{"background_background":"classic","background_color":"#FFEBED","margin":{"unit":"px","top":"40","right":0,"bottom":"40","left":0,"isLinked":false}},"elements":[{"id":"1c2f3483","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"4a1a3bdf","elType":"widget","settings":{"wp":{"title":"","text":"<p class=\"color-black text-center\" style=\"letter-spacing: 0.1em; font-weight: bold; display: block; align-items: center; line-height: 1.5; padding: 10px 0; margin-bottom: 0;\">UP TO 70% OFF THE ENTRIRE STORE! - MADE WITH LOVE by\u00a0<span class=\"nasa-underline\">Nasa studio<\/span><\/p>","filter":"on","visual":"on"}},"elements":[],"widgetType":"wp-widget-text"}],"isInner":false}],"isInner":false},{"id":"2e630c5e","elType":"section","settings":{"gap":"no","css_classes":"margin-top-40 margin-bottom-60 mobile-margin-bottom-50"},"elements":[{"id":"2e600fd2","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"1ae1155","elType":"widget","settings":{"wp":{"title_shortcode":"","type":"featured_product","style":"slide_slick_2","style_viewmore":"1","style_row":"1","pos_nav":"top","title_align":"left","shop_url":"0","arrows":"1","dots":"true","auto_slide":"false","number":"3","auto_delay_time":"6","columns_number":"1","columns_number_small":"1","columns_number_small_slider":"1","columns_number_tablet":"1","cat":"","not_in":"","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_products_sc"}],"isInner":false}],"isInner":false},{"id":"d98d57c","elType":"section","settings":[],"elements":[{"id":"135c60df","elType":"column","settings":{"_column_size":100,"_inline_size":null,"padding":{"unit":"px","top":"0","right":"0","bottom":"0","left":"0","isLinked":true}},"elements":[{"id":"401e0f1","elType":"widget","settings":{"wp":{"title":"Latest Posts","title_desc":"The freshest and most exciting news","show_type":"grid_3","auto_slide":"false","arrows":"0","dots":"false","posts":"5","columns_number":"1","columns_number_small":"1","columns_number_small_slider":"1","columns_number_tablet":"2","category":"","cats_enable":"no","date_enable":"no","author_enable":"no","readmore":"no","date_author":"bot","des_enable":"yes","page_blogs":"no","info_align":"left","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_post_sc"}],"isInner":false}],"isInner":false},{"id":"3226e57","elType":"section","settings":{"structure":"20"},"elements":[{"id":"02cf658","elType":"column","settings":{"_column_size":50,"_inline_size":40},"elements":[{"id":"e4016a2","elType":"widget","settings":{"editor":"<h3 class=\"nasa-bold-800\" style=\"color: #333; font-size: 25px; margin: 0; line-height: 1.4;\">Sign up to Newsletter<\/h3>\n<p style=\"color: #b7b7b7; font-size: 15px; margin: 0; line-height: 1.4;\">...and receive $20 coupon for first shopping<\/p>"},"elements":[],"widgetType":"text-editor"}],"isInner":false},{"id":"f57f918","elType":"column","settings":{"_column_size":50,"_inline_size":60,"css_classes":"watch-style-wrap"},"elements":[{"id":"064a382","elType":"widget","settings":{"shortcode":"[contact-form-7 id=\"3481\" title=\"Elessi Newsletter Watch\"]"},"elements":[],"widgetType":"shortcode"}],"isInner":false}],"isInner":false}]',
            '_elementor_controls_usage' => 'a:11:{s:27:"wp-widget-rev-slider-widget";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:6:"column";a:3:{s:5:"count";i:9;s:15:"control_percent";i:1;s:8:"controls";a:2:{s:6:"layout";a:1:{s:6:"layout";a:2:{s:12:"_inline_size";i:9;s:8:"html_tag";i:1;}}s:8:"advanced";a:1:{s:16:"section_advanced";a:2:{s:7:"padding";i:3;s:11:"css_classes";i:1;}}}}s:7:"section";a:3:{s:5:"count";i:7;s:15:"control_percent";i:0;s:8:"controls";a:3:{s:6:"layout";a:2:{s:14:"section_layout";a:3:{s:6:"layout";i:1;s:3:"gap";i:2;s:15:"stretch_section";i:1;}s:17:"section_structure";a:1:{s:9:"structure";i:2;}}s:8:"advanced";a:1:{s:16:"section_advanced";a:4:{s:6:"margin";i:4;s:13:"margin_mobile";i:3;s:7:"padding";i:1;s:11:"css_classes";i:1;}}s:5:"style";a:1:{s:18:"section_background";a:2:{s:21:"background_background";i:1;s:16:"background_color";i:1;}}}}s:24:"wp-widget-nasa_banner_sc";a:3:{s:5:"count";i:2;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:7:"heading";a:3:{s:5:"count";i:1;s:15:"control_percent";i:3;s:8:"controls";a:2:{s:7:"content";a:1:{s:13:"section_title";a:3:{s:5:"title";i:1;s:5:"align";i:1;s:11:"header_size";i:1;}}s:5:"style";a:1:{s:19:"section_title_style";a:4:{s:11:"title_color";i:1;s:21:"typography_typography";i:1;s:22:"typography_font_family";i:1;s:22:"typography_font_weight";i:1;}}}}s:31:"wp-widget-nasa_products_tabs_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:14:"wp-widget-text";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:26:"wp-widget-nasa_products_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:22:"wp-widget-nasa_post_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:11:"text-editor";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:1:{s:7:"content";a:1:{s:14:"section_editor";a:1:{s:6:"editor";i:1;}}}}s:9:"shortcode";a:3:{s:5:"count";i:1;s:15:"control_percent";i:1;s:8:"controls";a:1:{s:7:"content";a:1:{s:17:"section_shortcode";a:1:{s:9:"shortcode";i:1;}}}}}',
            '_elementor_css' => 'a:6:{s:4:"time";i:1639650454;s:5:"fonts";a:1:{i:0;s:4:"Jost";}s:5:"icons";a:0:{}s:20:"dynamic_elements_ids";a:0:{}s:6:"status";s:4:"file";i:0;s:0:"";}',
           //  '_nasa_custom_header' => '1',
            '_nasa_header_transparent' => '1',
            // '_nasa_footer_mode' => 'build-in',
            // '_nasa_footer_build_in' => '3',
            // '_nasa_footer_build_in_mobile' => 'm-1',
            // '_nasa_pri_color_flag' => 'on',
            // '_nasa_pri_color' => '#e80105',
        ),
        
        'globals' => array(
            'header-type' => '1',
            
            // 'site_bg_dark' => '1',
            
            // 'fixed_nav' => '0',
            
            // 'plus_wide_width' => '400',
            'color_primary' => '#e0b17a',
            
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
            'footer_elm' => elessi_elm_fid_by_slug('hfe-footer-light-3'),
            'footer_elm_mobile' => elessi_elm_fid_by_slug('hfe-footer-light-3'),
            // 'category_sidebar' => 'top-2',
            'product_sidebar' => 'no',
            
            // 'product_detail_layout' => 'full',
            // 'full_info_col' => '2',
            'product_image_layout' => 'single',
            // 'product_image_style' => 'slide',
            // 'sp_bgl' => '#f6f6f6',
            // 'tab_style_info' => 'scroll-down',
            
            // 'single_product_thumbs_style' => 'hoz',
            
            'loop_layout_buttons' => 'hoz-buttons',
            
            // 'animated_products' => 'hover-zoom',
            
            // 'nasa_attr_image_style' => 'square',
            // 'nasa_attr_image_single_style' => 'square-caption',
            // 'nasa_attr_color_style' => 'round',
            // 'nasa_attr_label_style' => 'round',
            
            // 'breadcrumb_row' => 'single',
            // 'breadcrumb_type' => 'default',
            // 'breadcrumb_bg_color' => '#f8f8f8',
            // 'breadcrumb_align' => 'text-left',
            // 'breadcrumb_height' => '60',
        ),

        'css' => '.elementor-[inserted_id] .elementor-element.elementor-element-6d16fb6c{margin-top:0px;margin-bottom:10px;}.elementor-[inserted_id] .elementor-element.elementor-element-7f06d035{margin-top:0px;margin-bottom:0px;padding:0px 0px 0px 0px;}.elementor-[inserted_id] .elementor-element.elementor-element-68c3d129 > .elementor-element-populated{padding:10px 10px 0px 10px;}.elementor-[inserted_id] .elementor-element.elementor-element-78f16e84 > .elementor-element-populated{padding:10px 10px 0px 10px;}.elementor-[inserted_id] .elementor-element.elementor-element-49a579f5{margin-top:80px;margin-bottom:50px;}.elementor-[inserted_id] .elementor-element.elementor-element-2b14c240{text-align:center;}.elementor-[inserted_id] .elementor-element.elementor-element-2b14c240 .elementor-heading-title{color:#333333;font-family:"Jost", Sans-serif;font-weight:800;}.elementor-[inserted_id] .elementor-element.elementor-element-5fd9878:not(.elementor-motion-effects-element-type-background), .elementor-[inserted_id] .elementor-element.elementor-element-5fd9878 > .elementor-motion-effects-container > .elementor-motion-effects-layer{background-color:#FFEBED;}.elementor-[inserted_id] .elementor-element.elementor-element-5fd9878{transition:background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;margin-top:40px;margin-bottom:40px;}.elementor-[inserted_id] .elementor-element.elementor-element-5fd9878 > .elementor-background-overlay{transition:background 0.3s, border-radius 0.3s, opacity 0.3s;}.elementor-[inserted_id] .elementor-element.elementor-element-135c60df > .elementor-element-populated{padding:0px 0px 0px 0px;}@media(min-width:768px){.elementor-[inserted_id] .elementor-element.elementor-element-02cf658{width:40%;}.elementor-[inserted_id] .elementor-element.elementor-element-f57f918{width:60%;}}@media(max-width:767px){.elementor-[inserted_id] .elementor-element.elementor-element-6d16fb6c{margin-top:0px;margin-bottom:0px;}.elementor-[inserted_id] .elementor-element.elementor-element-49a579f5{margin-top:30px;margin-bottom:30px;}}'
    );
    
    /* if (function_exists('hfe_init')) {
        unset($result['post_meta']['_nasa_footer_build_in']);
        unset($result['post_meta']['_nasa_footer_build_in_mobile']);
        
        $result['post_meta']['_nasa_footer_mode'] = 'builder-e';
        $result['post_meta']['_nasa_footer_builder_e'] = elessi_elm_fid_by_slug('hfe-footer-light-3');
        $result['post_meta']['_nasa_footer_builder_e_mobile'] = elessi_elm_fid_by_slug('hfe-footer-light-3');
    } */
    
    return $result;
}
