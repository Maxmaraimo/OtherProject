<?php
function nasa_elm_baby() {
    $imgs_1 = elessi_import_upload('/wp-content/uploads/2018/11/baby-banner-1.jpg', '3094', array(
        'post_title' => 'baby-banner-1',
        'post_name' => 'baby-banner-1',
    ));
    
    $imgs_2 = elessi_import_upload('/wp-content/uploads/2018/11/baby-banner-2.jpg', '3115', array(
        'post_title' => 'baby-banner-2',
        'post_name' => 'baby-banner-2',
    ));
    
    $imgs_3 = elessi_import_upload('/wp-content/uploads/2018/11/baby-banner-3.jpg', '3115', array(
        'post_title' => 'baby-banner-3',
        'post_name' => 'baby-banner-3',
    ));
    
    $imgs_4 = elessi_import_upload('/wp-content/uploads/2018/11/baby-banner-4.jpg', '3117', array(
        'post_title' => 'baby-banner-4',
        'post_name' => 'baby-banner-4',
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
            'post_title' => 'ELM Baby',
            'post_name' => 'elm-baby'
        ),
        
        'post_meta' => array(
            '_elementor_data' => '[{"id":"2cfd3df0","elType":"section","settings":{"layout":"full_width","gap":"no"},"elements":[{"id":"535c78d2","elType":"column","settings":{"_column_size":100,"_inline_size":null,"css_classes":"nasa-crazy-box"},"elements":[{"id":"b4af202","elType":"widget","settings":{"revslidertitle":"Slider Baby","shortcode":"[rev_slider alias=\"slider-baby\" slidertitle=\"Slider Baby\"][\/rev_slider]"},"elements":[],"widgetType":"slider_revolution"}],"isInner":false}],"isInner":false},{"id":"2babdf4c","elType":"section","settings":{"structure":"20","stretch_section":"section-stretched"},"elements":[{"id":"2eeb59c","elType":"column","settings":{"_column_size":50,"_inline_size":50,"padding":{"unit":"px","top":"20","right":"10","bottom":"0","left":"10","isLinked":false},"padding_mobile":{"unit":"px","top":"10","right":"10","bottom":"10","left":"10","isLinked":true}},"elements":[{"id":"487d15a8","elType":"widget","settings":{"wp":{"img_src":"' . $imgs_1 . '","height":"531px","width":"","link":"#","content-width":"","align":"right","move_x":"10","valign":"bottom","text-align":"text-right","banner_responsive":"yes","content":"<div><strong style=\"font-size: 200%;font-weight: 900;line-height: 1.7;color: #3ab3e8\">Family Outfits<\/strong><strong style=\"font-weight: 900;font-size: 130%\">Sale Off 50%<\/strong><\/div>","effect_text":"fadeIn","data_delay":"300ms","hover":"fade","border_inner":"no","border_outner":"no","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_banner_sc"}],"isInner":false},{"id":"3e91acad","elType":"column","settings":{"_column_size":50,"_inline_size":50,"html_tag":"section","padding":{"unit":"px","top":"20","right":"20","bottom":"0","left":"10","isLinked":false},"padding_mobile":{"unit":"px","top":"0","right":"10","bottom":"10","left":"10","isLinked":false}},"elements":[{"id":"5deda8","elType":"section","settings":{"structure":"20"},"elements":[{"id":"da4d0b2","elType":"column","settings":{"_column_size":50,"_inline_size":null,"padding":{"unit":"px","top":"0","right":"10","bottom":"0","left":"0","isLinked":false},"padding_mobile":{"unit":"px","top":"0","right":"0","bottom":"10","left":"0","isLinked":false}},"elements":[{"id":"3b32c950","elType":"widget","settings":{"wp":{"img_src":"' . $imgs_2 . '","height":"250px","width":"","link":"#","content-width":"","align":"center","move_x":"","valign":"middle","text-align":"text-center","banner_responsive":"yes","content":"","effect_text":"fadeIn","data_delay":"","hover":"zoom","border_inner":"yes","border_outner":"yes","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_banner_sc"}],"isInner":true},{"id":"1642f9c8","elType":"column","settings":{"_column_size":50,"_inline_size":null,"padding":{"unit":"px","top":"0","right":"0","bottom":"0","left":"10","isLinked":false},"padding_mobile":{"unit":"px","top":"0","right":"0","bottom":"10","left":"0","isLinked":false}},"elements":[{"id":"196e2644","elType":"widget","settings":{"wp":{"img_src":"' . $imgs_3 . '","height":"250px","width":"","link":"#","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"fadeIn","data_delay":"","hover":"zoom","border_inner":"no","border_outner":"no","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_banner_sc"}],"isInner":true}],"isInner":true},{"id":"61b11422","elType":"section","settings":[],"elements":[{"id":"7f90e866","elType":"column","settings":{"_column_size":100,"_inline_size":null,"padding":{"unit":"px","top":"20","right":"0","bottom":"0","left":"0","isLinked":false},"padding_mobile":{"unit":"px","top":"0","right":"0","bottom":"0","left":"0","isLinked":false}},"elements":[{"id":"71974eee","elType":"widget","settings":{"wp":{"img_src":"' . $imgs_4 . '","height":"272px","width":"580","link":"","content-width":"10","align":"left","move_x":"","valign":"middle","text-align":"text-left","banner_responsive":"yes","content":"<div><strong style=\"font-size: 200%;font-weight: 900;line-height: 1.7;color: #f06091\">Cute Babies<\/strong><br><strong style=\"font-weight: 900;font-size: 130%\">New Collection<\/strong><\/div>","effect_text":"fadeIn","data_delay":"","hover":"fade","border_inner":"no","border_outner":"no","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_banner_sc"}],"isInner":true}],"isInner":true}],"isInner":false}],"isInner":false},{"id":"5d2ae788","elType":"section","settings":{"css_classes":"margin-top-60"},"elements":[{"id":"5fa45f6a","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"6b9ea969","elType":"widget","settings":{"wp":{"title":"","list_cats":"haircare-woman, makeup-woman, nails-woman, bracelets-woman, earrings-woman, necklaces-woman","number":"10","disp_type":"Horizontal4","parent":"false","root_cat":"kid","hide_empty":"0","columns_number":"6","columns_number_small":"2","columns_number_tablet":"4","number_vertical":"4","auto_slide":"false","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_product_categories_sc"}],"isInner":false}],"isInner":false},{"id":"13a1d312","elType":"section","settings":{"padding":{"unit":"px","top":"0","right":"0","bottom":"0","left":"0","isLinked":false},"css_classes":"margin-top-60 tablet-margin-top-40 mobile-margin-top-30"},"elements":[{"id":"79f08892","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"374fc871","elType":"widget","settings":{"title":"Trendy item","size":"large","align":"center","title_color":"#333333","typography_typography":"custom","typography_font_family":"Jost","typography_font_weight":"800","_css_classes":"margin-bottom-10 mobile-margin-bottom-0","header_size":"h3"},"elements":[],"widgetType":"heading"},{"id":"275f353a","elType":"widget","settings":{"wp":{"title":"","desc":"","alignment":"center","style":"2d-no-border","tabs":{"1602751895938":{"tab_title":"ALL","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"1","arrows":"0","dots":"false","auto_slide":"false","number":"10","auto_delay_time":"6","columns_number":"5","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1602751981881":{"tab_title":"FEATURED","type":"recent_product","style":"carousel","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"1","arrows":"0","dots":"false","auto_slide":"false","number":"10","auto_delay_time":"6","columns_number":"5","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1602752233078":{"tab_title":"NEW","type":"recent_product","style":"carousel","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"1","arrows":"0","dots":"false","auto_slide":"false","number":"10","auto_delay_time":"6","columns_number":"5","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1602752236154":{"tab_title":"ON SALE","type":"recent_product","style":"carousel","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"1","arrows":"0","dots":"false","auto_slide":"false","number":"10","auto_delay_time":"6","columns_number":"5","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""},"1602752238627":{"tab_title":"DEAL","type":"recent_product","style":"grid","style_viewmore":"1","style_row":"2","pos_nav":"top","title_align":"left","shop_url":"1","arrows":"0","dots":"false","auto_slide":"false","number":"10","auto_delay_time":"6","columns_number":"5","columns_number_small":"2","columns_number_small_slider":"2","columns_number_tablet":"3","cat":"","not_in":"","el_class":""}},"el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_products_tabs_sc"}],"isInner":false}],"isInner":false},{"id":"50d87bc","elType":"section","settings":{"css_classes":"desktop-margin-top-30 margin-bottom-10"},"elements":[{"id":"c453108","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"2efbcdec","elType":"widget","settings":{"title":"Latest blog","size":"large","header_size":"h3","align":"center","title_color":"#000000","typography_typography":"custom","typography_font_family":"Jost","typography_font_weight":"800","_css_classes":"margin-bottom-20"},"elements":[],"widgetType":"heading"},{"id":"4f8145f9","elType":"widget","settings":{"wp":{"title":"","show_type":"grid_2","auto_slide":"false","arrows":"0","dots":"false","posts":"4","columns_number":"2","columns_number_small":"1","columns_number_small_slider":"1","columns_number_tablet":"2","category":"","cats_enable":"yes","date_enable":"yes","author_enable":"yes","readmore":"yes","date_author":"bot","des_enable":"no","page_blogs":"no","info_align":"left","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_post_sc"}],"isInner":false}],"isInner":false},{"id":"60a71522","elType":"section","settings":{"layout":"full_width","gap":"no","css_classes":"padding-top-30 desktop-margin-top-40"},"elements":[{"id":"34d8c4de","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"37705e60","elType":"widget","settings":{"title":"Elessi Lifes","size":"large","header_size":"h3","align":"center","title_color":"#333333","typography_typography":"custom","typography_font_family":"Jost","typography_font_weight":"800","_css_classes":"margin-bottom-20"},"elements":[],"widgetType":"heading"},{"id":"2db70ac4","elType":"widget","settings":{"wp":{"username_show":"STORE STYLE","instagram_link":"#","img_size":"full","disp_type":"default","auto_slide":"false","limit_items":"6","columns_number":"6","columns_number_tablet":"3","columns_number_small":"3","el_class_img":"","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_instagram_feed_sc"}],"isInner":false}],"isInner":false},{"id":"a28fa46","elType":"section","settings":{"css_classes":"margin-top-30 margin-bottom-50"},"elements":[{"id":"9b66f69","elType":"column","settings":{"_column_size":100,"_inline_size":null},"elements":[{"id":"eee041a","elType":"widget","settings":{"wp":{"title":"","align":"center","sliders":{"1605886645649":{"img_src":"' . $brand_1 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""},"1605886663901":{"img_src":"' . $brand_2 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""},"1605886673562":{"img_src":"' . $brand_3 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""},"1605886691185":{"img_src":"' . $brand_4 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""},"1605886702478":{"img_src":"' . $brand_5 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""},"1605886713208":{"img_src":"' . $brand_6 . '","height":"","width":"","link":"","content-width":"","align":"left","move_x":"","valign":"top","text-align":"text-left","banner_responsive":"yes","content":"","effect_text":"none","data_delay":"","hover":"","border_inner":"no","border_outner":"no","el_class":""}},"bullets":"false","bullets_pos":"","bullets_align":"center","navigation":"true","column_number":"6","column_number_small":"3","column_number_tablet":"4","padding_item":"","padding_item_small":"","padding_item_medium":"","autoplay":"false","paginationspeed":"300","el_class":""}},"elements":[],"widgetType":"wp-widget-nasa_sliders_sc"}],"isInner":false}],"isInner":false}]',
            '_elementor_controls_usage' => 'a:10:{s:27:"wp-widget-rev-slider-widget";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:6:"column";a:3:{s:5:"count";i:11;s:15:"control_percent";i:0;s:8:"controls";a:2:{s:6:"layout";a:1:{s:6:"layout";a:2:{s:12:"_inline_size";i:11;s:8:"html_tag";i:1;}}s:8:"advanced";a:1:{s:16:"section_advanced";a:2:{s:7:"padding";i:5;s:14:"padding_mobile";i:5;}}}}s:7:"section";a:3:{s:5:"count";i:9;s:15:"control_percent";i:0;s:8:"controls";a:2:{s:6:"layout";a:2:{s:14:"section_layout";a:3:{s:6:"layout";i:2;s:3:"gap";i:2;s:15:"stretch_section";i:1;}s:17:"section_structure";a:1:{s:9:"structure";i:2;}}s:8:"advanced";a:1:{s:16:"section_advanced";a:2:{s:11:"css_classes";i:5;s:7:"padding";i:1;}}}}s:24:"wp-widget-nasa_banner_sc";a:3:{s:5:"count";i:4;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:36:"wp-widget-nasa_product_categories_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:7:"heading";a:3:{s:5:"count";i:3;s:15:"control_percent";i:4;s:8:"controls";a:3:{s:7:"content";a:1:{s:13:"section_title";a:4:{s:5:"title";i:3;s:4:"size";i:3;s:5:"align";i:3;s:11:"header_size";i:3;}}s:5:"style";a:1:{s:19:"section_title_style";a:4:{s:11:"title_color";i:3;s:21:"typography_typography";i:3;s:22:"typography_font_family";i:3;s:22:"typography_font_weight";i:3;}}s:8:"advanced";a:1:{s:14:"_section_style";a:1:{s:12:"_css_classes";i:3;}}}}s:31:"wp-widget-nasa_products_tabs_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:22:"wp-widget-nasa_post_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:32:"wp-widget-nasa_instagram_feed_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}s:25:"wp-widget-nasa_sliders_sc";a:3:{s:5:"count";i:1;s:15:"control_percent";i:0;s:8:"controls";a:0:{}}}',
            '_elementor_css' => 'a:6:{s:4:"time";i:1639648163;s:5:"fonts";a:1:{i:0;s:4:"Jost";}s:5:"icons";a:0:{}s:20:"dynamic_elements_ids";a:0:{}s:6:"status";s:4:"file";i:0;s:0:"";}',
            // '_nasa_custom_header' => '1',
            '_nasa_el_class_header' => 'nasa-top-bar-baby',
            // '_nasa_pri_color_flag' => 'on',
            // '_nasa_pri_color' => '#3bb5e8',
            // '_nasa_type_font_select' => 'google',
            // '_nasa_type_headings' => 'Dosis',
            // '_nasa_type_texts' => 'Dosis',
            // '_nasa_type_nav' => 'Dosis',
            // '_nasa_type_banner' => 'Dosis',
            // '_nasa_type_price' => 'Dosis',
            // '_nasa_font_weight' => '900',
        ),
        
        'globals' => array(
            'header-type' => '1',
            
            // 'plus_wide_width' => '100',
            'color_primary' => '#3bb5e8',
            
            // 'fullwidth_main_menu' => '1',
            
            // 'bg_color_main_menu' => '#e4272c',
            // 'text_color_main_menu' => '#ffffff',
            
            // 'bg_color_v_menu' => '#000000',
            // 'text_color_v_menu' => '#ffffff',
            
            'footer_mode' => 'builder-e',
            'footer_elm' => elessi_elm_fid_by_slug('hfe-footer-light-2'),
            'footer_elm_mobile' => elessi_elm_fid_by_slug('hfe-footer-mobile'),
            
            // 'category_sidebar' => 'top-2',
            
            // 'product_detail_layout' => 'modern-1',
            'product_image_layout' => 'single',
            'tab_style_info' => 'ver-2',
            
            'loop_layout_buttons' => 'modern-5',
            
            'animated_products' => 'hover-flip',
            
            // 'nasa_attr_image_style' => 'square'
        ),

        'css' => '.elementor-[inserted_id] .elementor-element.elementor-element-2eeb59c > .elementor-element-populated{padding:20px 10px 0px 10px;}.elementor-[inserted_id] .elementor-element.elementor-element-3e91acad > .elementor-element-populated{padding:20px 20px 0px 10px;}.elementor-[inserted_id] .elementor-element.elementor-element-da4d0b2 > .elementor-element-populated{padding:0px 10px 0px 0px;}.elementor-[inserted_id] .elementor-element.elementor-element-1642f9c8 > .elementor-element-populated{padding:0px 0px 0px 10px;}.elementor-[inserted_id] .elementor-element.elementor-element-7f90e866 > .elementor-element-populated{padding:20px 0px 0px 0px;}.elementor-[inserted_id] .elementor-element.elementor-element-13a1d312{padding:0px 0px 0px 0px;}.elementor-[inserted_id] .elementor-element.elementor-element-374fc871{text-align:center;}.elementor-[inserted_id] .elementor-element.elementor-element-374fc871 .elementor-heading-title{color:#333333;font-family:"Jost", Sans-serif;font-weight:800;}.elementor-[inserted_id] .elementor-element.elementor-element-2efbcdec{text-align:center;}.elementor-[inserted_id] .elementor-element.elementor-element-2efbcdec .elementor-heading-title{color:#000000;font-family:"Jost", Sans-serif;font-weight:800;}.elementor-[inserted_id] .elementor-element.elementor-element-37705e60{text-align:center;}.elementor-[inserted_id] .elementor-element.elementor-element-37705e60 .elementor-heading-title{color:#333333;font-family:"Jost", Sans-serif;font-weight:800;}@media(max-width:767px){.elementor-[inserted_id] .elementor-element.elementor-element-2eeb59c > .elementor-element-populated{padding:10px 10px 10px 10px;}.elementor-[inserted_id] .elementor-element.elementor-element-3e91acad > .elementor-element-populated{padding:0px 10px 10px 10px;}.elementor-[inserted_id] .elementor-element.elementor-element-da4d0b2 > .elementor-element-populated{padding:0px 0px 10px 0px;}.elementor-[inserted_id] .elementor-element.elementor-element-1642f9c8 > .elementor-element-populated{padding:0px 0px 10px 0px;}.elementor-[inserted_id] .elementor-element.elementor-element-7f90e866 > .elementor-element-populated{padding:0px 0px 0px 0px;}}@media(min-width:768px){.elementor-[inserted_id] .elementor-element.elementor-element-2eeb59c{width:50%;}.elementor-[inserted_id] .elementor-element.elementor-element-3e91acad{width:50%;}}'
    );
}
