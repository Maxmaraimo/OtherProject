<?php
function nasa_wpb_watch() {
    $imgs_1 = elessi_import_upload('/wp-content/uploads/2021/02/watches_light_banner1.jpg', '3117', array(
        'post_title' => 'watches_light_banner1',
        'post_name' => 'watches_light_banner1',
    ));
    
    $imgs_2 = elessi_import_upload('/wp-content/uploads/2021/02/watches_light_banner2.jpg', '3117', array(
        'post_title' => 'watches_light_banner2',
        'post_name' => 'watches_light_banner2',
    ));
    
    return array(
        'post' => array(
            'post_title' => 'WPB Watch',
            'post_name' => 'wpb-watch',
            'post_content' => '[vc_row fullwidth="1" el_class="margin-bottom-30"][vc_column][nasa_rev_slider alias="slider-watch-light"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][nasa_banner align="center" valign="middle" text-align="text-center" hover="zoom" img_src="' . $imgs_1 . '"]
<h6 style="text-transform: uppercase; line-height: 3; letter-spacing: 3px; text-decoration: underline;"><a style="font-weight: bold; color: #a6acb0;" title="Shop Now" href="#">Discover now</a></h6>
<h4 style="font-weight: 800; margin-bottom: 80px;">Special Collection</h4>
[/nasa_banner][/vc_column][vc_column width="1/2"][nasa_banner valign="middle" hover="zoom" img_src="' . $imgs_2 . '"]
<h6 style="font-weight: bold; letter-spacing: 5px;">SALE UP TO</h6>
<h4 style="color: #000000; font-weight: 800; line-height: 1.5;">30% OFF</h4>
[/nasa_banner][/vc_column][/vc_row][vc_row css=".vc_custom_1509772778240{margin-top: 50px !important;margin-bottom: 50px !important;}"][vc_column][nasa_title title_text="Featured Products" title_type="h3" font_size="xl" title_align="text-center"][vc_tta_tabs alignment="center"][vc_tta_section hr="1" title="BEST SELLER" tab_id="1509680382542-1cd79545-bdae"][nasa_products columns_number="4" columns_number_tablet="2"][/vc_tta_section][vc_tta_section hr="1" title="FEATURED" tab_id="1509680382515-609c6f4d-fd0e"][nasa_products columns_number="4" columns_number_tablet="2"][/vc_tta_section][vc_tta_section hr="1" title="MEN" tab_id="1509771354416-4988be9f-2227"][nasa_products columns_number="4" columns_number_tablet="2"][/vc_tta_section][vc_tta_section hr="1" title="ON SALE" tab_id="1509957049380-e38870ed-5797"][nasa_products columns_number="4" columns_number_tablet="2"][/vc_tta_section][vc_tta_section hr="1" title="NEW" tab_id="1509957137879-8aa83829-3ba3"][nasa_products columns_number="4" columns_number_tablet="2"][/vc_tta_section][/vc_tta_tabs][/vc_column][/vc_row][vc_row css=".vc_custom_1614424461738{background-color: #ffebed !important;}" el_class="mobile-margin-bottom-20 margin-bottom-30 padding-top-15 padding-bottom-15"][vc_column][nasa_slider bullets="false" navigation="false" autoplay="true"][vc_column_text]
<p class="color-black text-center" style="letter-spacing: 0.1em; font-weight: bold; display: block; align-items: center; line-height: 1.5; padding: 10px 0; margin-bottom: 0;">UP TO 70% OFF THE ENTRIRE STORE! - MADE WITH LOVE by <span class="nasa-underline">Nasa studio</span></p>
[/vc_column_text][vc_column_text]
<p class="color-black text-center" style="letter-spacing: 0.1em; font-weight: bold; display: block; align-items: center; line-height: 1.5; padding: 10px 0; margin-bottom: 0;">UP TO 70% OFF THE ENTRIRE STORE! - MADE WITH LOVE by <span class="nasa-underline">Nasa studio</span></p>
[/vc_column_text][/nasa_slider][/vc_column][/vc_row][vc_row el_class="margin-bottom-60"][vc_column][nasa_products type="featured_product" style="slide_slick_2" dots="true" number="3"][/vc_column][/vc_row][vc_row][vc_column][nasa_post title="Latest Posts" title_desc="The freshest and most exciting news" show_type="grid_3" cats_enable="no" date_enable="no" author_enable="no" readmore="no" page_blogs="no"][/vc_column][/vc_row][vc_row el_class="watch-style-wrap margin-bottom-30"][vc_column width="5/12" el_class="rtl-right"][vc_column_text]
<h3 class="nasa-bold-800" style="font-size: 25px; margin: 0; line-height: 1.4;">Sign up to Newsletter</h3>
<p style="color: #b7b7b7; font-size: 15px; margin: 0; line-height: 1.4;">…and receive $20 coupon for first shopping</p>
[/vc_column_text][/vc_column][vc_column width="7/12" el_class="rtl-left"][contact-form-7 id="3552"][/vc_column][/vc_row]'
        ),
        'post_meta' => array(
            // '_nasa_custom_header' => '1',
            '_nasa_header_transparent' => '1',
            // '_nasa_footer_mode' => 'builder',
            // '_nasa_custom_footer' => 'footer-light-3',
            // '_nasa_custom_footer_mobile' => 'footer-light-3',
            // '_nasa_pri_color_flag' => 'on',
            // '_nasa_pri_color' => '#e80105',
            '_wpb_shortcodes_custom_css' => '.vc_custom_1509772778240{margin-top: 50px !important;margin-bottom: 50px !important;}.vc_custom_1614424461738{background-color: #ffebed !important;}'
        ),
        
        'globals' => array(
            'header-type' => '1',
            
            // 'site_bg_dark' => '1',
            
            // 'fixed_nav' => '0',
            
            // 'plus_wide_width' => '400',
            'color_primary' => '#e80105',
            
            // 'bg_color_topbar' => '28aeb1',
            // 'text_color_topbar' => '#ffffff',
            
            // 'fullwidth_main_menu' => '1',
            
            // 'bg_color_main_menu' => '#e4272c',
            // 'text_color_main_menu' => '#ffffff',
            
            // 'v_root' => '1',
            // 'v_root_limit' => '10',
            
            // 'bg_color_v_menu' => '#000000',
            // 'text_color_v_menu' => '#ffffff',
            
            'footer_mode' => 'builder',
            'footer-type' => 'footer-light-3',
            'footer-mobile' => 'footer-light-3',
            
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
    );
}
