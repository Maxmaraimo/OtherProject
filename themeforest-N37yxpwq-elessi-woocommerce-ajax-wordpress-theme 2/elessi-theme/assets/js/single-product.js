/**
 * Single Product Page
 */
var _single_loading = false;
var _single_remove_loading;
var _inited_gallery = false;
var _inited_gallery_key = 0;
var _prev_image_id = 0;
var _popstate_reload = true;
var _timeout_changed;
if (typeof _single_variations === 'undefined') {
    var _single_variations = [];
}

/**
 * Document ready
 */
jQuery(document).ready(function($) {
"use strict";

$(window).on('pageshow', function() {
    setTimeout(function() {
        $('.button.loading').removeClass('loading');
        
        if ($('input[name="nasa_buy_now"]').length) {
            $('input[name="nasa_buy_now"]').val('');
        }
    }, 100);
});

$('body').on('nasa_render_next_prev', function() {
    var _inMobile = $('body').hasClass('nasa-in-mobile') ? true : false;
    var _mobileView = $('.nasa-check-reponsive.nasa-switch-check').length && $('.nasa-check-reponsive.nasa-switch-check').width() === 1 ? true : false;

    if (!_inMobile && !_mobileView) {
        if ($('.products-arrow .next-prev-buttons').length && $('.nasa-breadcrumb.style-single .breadcrumb-wrap').length) {
            var _arrow = $('.products-arrow');
            $('.nasa-breadcrumb.style-single .breadcrumb-wrap').append(_arrow);
            
            if ($('.nasa-product-details-page .product-info .entry-title').length) {
                $('.nasa-product-details-page .product-info .entry-title').addClass('nopadding');
            }
        } else {
            $('.products-arrow').addClass('show');
        }
    } else {
        $('.products-arrow').addClass('show');
    }
});

$('body').trigger('nasa_render_next_prev');

/**
 * Default init
 */
if ($('.nasa-product-details-page .nasa-gallery-variation-supported').length) {
    var _df_main = $('.nasa-main-image-default-wrap').clone();
    if ($(_df_main).find('.nasa-single-slider-arrows').length) {
        $(_df_main).find('.nasa-single-slider-arrows').remove();
    }

    _single_variations[0] = {
        'main_image': $(_df_main).html(),
        'thumb_image': $('.nasa-thumbnail-default-wrap').html()
    };
}
    
/**
 * Crazy Loading
 */
if ($('.woocommerce-product-gallery__wrapper').length && !$('.woocommerce-product-gallery__wrapper').hasClass('crazy-loading') && $('#nasa-ajax-store.nasa-crazy-load').length) {
    $('.woocommerce-product-gallery__wrapper').addClass('crazy-loading');
    
    if (typeof _single_remove_loading !== 'undefined') {
        clearInterval(_single_remove_loading);
    }
    
    setTimeout(function() {
        $('body').trigger('nasa_product_gallery_remove_crazy');
    }, 10);
}

if ($('.nasa-crazy-load.crazy-loading').length) {
    $('.nasa-crazy-load.crazy-loading').removeClass('crazy-loading');
}

if ($('.woosb-wrap.woosb-bundled').find('.woosb-total .woocommerce-price-suffix').length) {
   
    var _woosb_save = $('.woosb-wrap.woosb-bundled').find('.woosb-total .woocommerce-price-suffix').text();
    var _nasa_before = $('.woosb-wrap.woosb-bundled').find('.nasa-before-woosb-tbl');
    var text = _woosb_save.replace(/[()saved]/g, '');
    if (text != '' && typeof text != 'undefined') {
        $(_nasa_before).html($(_nasa_before).html().replace('${saved}', text));
        $(_nasa_before).removeClass('hidden-tag');
    }

}

/**
 * Gallery remove Crazy Loading
 */
$('body').on('nasa_product_gallery_remove_crazy', function() {
    setTimeout(function() {
        if ($('.woocommerce-product-gallery__wrapper.crazy-loading').length) {
            $('.woocommerce-product-gallery__wrapper.crazy-loading').removeClass('crazy-loading');
        }
    }, 50);
});

/**
 * Lightbox image Single product page
 */
$('body').on('click', '.easyzoom-flyout', function() {
    if (!$('body').hasClass('nasa-disable-lightbox-image')) {
        var _click = $(this).parents('.easyzoom');
        if ($(_click).length && $(_click).find('a.product-image').length) {
            $(_click).find('a.product-image').trigger('click');
        }
    }
});

/**
 * Change gallery for variation - single
 */
$('body').on('nasa_changed_gallery_variable_single', function() {

    var _video =  $('body').find('.nasa-item-main-video-wrap');

    $('body').trigger('nasa_reload_single_product_slide');
    
    if(typeof window.wp.mediaelement != 'undefined') {
        $( window.wp.mediaelement.initialize );
    }

    if(_video) {
        var _data_key = parseInt($(_video).parents('.item-wrap').prev().find('.nasa-item-main-image-wrap').attr('data-key')) + 1;
        $(_video).attr('data-key',_data_key) ;
        $('.nasa-wrap-item-thumb.ns-video-poster').attr('data-key',_data_key) ;
    }

    load_gallery_popup($);

    $('body').trigger('nasa_compatible_jetpack');

    setTimeout(function() {
        $('.product-gallery').css({'min-height': 'auto'});
        $(window).trigger('resize');
    }, 100);
    
    setTimeout(function() {
        $(window).trigger('resize').trigger('scroll');
    }, 1000);


});

/* Product Gallery Popup */
load_gallery_popup($);

/* Product reivew images */
load_reivew_images_popup($);

/**
 * Single Product
 * Variable change image
 */
nasa_single_product_found_variation($);
nasa_single_product_reset_variation_df($);

$('body').on('nasa_after_loaded_ajax_complete', function() {
    /* Slider */
    $('body').trigger('nasa_load_single_product_slide');

    if (typeof window.wp.mediaelement != 'undefined') {
        $( window.wp.mediaelement.initialize );
    }
    
    /* Product Gallery Popup */
    load_gallery_popup($);
    
    /* Product reivew images */
    load_reivew_images_popup($);
    
    if ($('.woocommerce-product-gallery__wrapper').length && !$('.woocommerce-product-gallery__wrapper').hasClass('crazy-loading')) {
        $('.woocommerce-product-gallery__wrapper').addClass('crazy-loading');
    }
    
    /**
     * Compatible UX variation
     */
    var _forms = $('.nasa-product-details-page .variations_form');
    if ($(_forms).length && typeof wc_add_to_cart_variation_params !== 'undefined') {
        $(_forms).each(function() {
            $(this).wc_variation_form();
        });
        
        /**
         * Default init
         */
        if ($('.nasa-product-details-page .nasa-gallery-variation-supported').length) {
            var _df_main = $('.nasa-main-image-default-wrap').clone();
            if ($(_df_main).find('.nasa-single-slider-arrows').length) {
                $(_df_main).find('.nasa-single-slider-arrows').remove();
            }

            _single_variations[0] = {
                'main_image': $(_df_main).html(),
                'thumb_image': $('.nasa-thumbnail-default-wrap').html()
            };
        }
        
        nasa_single_product_found_variation($);
        nasa_single_product_reset_variation_df($);
    }
    
    setTimeout(function() {
        $('body').trigger('before_init_variations_form');
        $('body').trigger('nasa_init_ux_variation_form');

        /**
         * Fixed Single form add to cart
         */
        if ($('.nasa-add-to-cart-fixed').length) {
            $('.nasa-add-to-cart-fixed').remove();
        }
        
        load_sticky_add_to_cart($);
        
        /**
         * Init #Rating
         */
        $('.wc-tabs-wrapper, .woocommerce-tabs, #rating').trigger('init');
        
        if ($('.nasa-crazy-load.crazy-loading').length) {
            $('.nasa-crazy-load.crazy-loading').removeClass('crazy-loading');
        }
        
        _single_loading = false;
    }, 10);
    
    $('.transparent-window').trigger('click');
    
    $('body').trigger('nasa_product_gallery_remove_crazy');
    
    /**
     * Render Next Prev
     */
    $('body').trigger('nasa_render_next_prev');
    
    /**
     * Comment form
     */
    $('body').trigger('nasa_comment_media_form');
    
    /**
     * Compatible with Contact Form 7
     */
    if (typeof wpcf7 !== 'undefined' && $('.wpcf7 > form').length) {
        var _cf7_forms = document.querySelectorAll(".wpcf7 > form");
        if (typeof _cf7_forms.forEach === 'function') {
            _cf7_forms.forEach(function(e) {
                return wpcf7.init(e);
            });
        }
    }
});

/**
 * Event click single product thumbnail
 */
$('body').on('click', '.nasa-single-product-slide .nasa-single-product-thumbnails .slick-slide', function() {
    var _wrap = $(this).parents('.nasa-single-product-thumbnails');
    var _speed = parseInt($(_wrap).attr('data-speed'));
    _speed = !_speed ? 600 : _speed;
    $(_wrap).append('<div class="nasa-slick-fog"></div>');

    setTimeout(function() {
        $(_wrap).find('.nasa-slick-fog').remove();
    }, _speed);
});

/**
 * Product Gallery Popup
 */
$('body').on('click', '.product-lightbox-btn', function(e) {
    if ($('.nasa-single-product-slide').length) {
        $('.product-images-slider').find('.slick-current.slick-active a').trigger('click');
    }

    else if ($('.nasa-single-product-scroll').length) {
        $('.nasa-wrap-item-thumb[data-key="0"] a').trigger('click');
    }

    e.preventDefault();
});

/**
 * Product Video Popup
 */
$('body').on('click', "a.product-video-popup", function(e) {
    var productVideo = $(this).attr('href');
    
    $('body').trigger('ns_magnific_popup_open_time', [{
        items: {
            src: productVideo
        },
        type: 'iframe',
        tLoading: '<div class="nasa-loader"></div>',
        closeMarkup: '<a class="nasa-mfp-close nasa-stclose" href="javascript:void(0);" title="' + $('input[name="nasa-close-string"]').val() + '"></a>',
        callbacks: {
            beforeOpen: function() {
                this.st.mainClass = this.st.mainClass + ' nasa-left-to-right has-product-video';
                setTimeout(function (){
                    $('.mfp-wrap').addClass('ns-active');
                },100);
            },
            beforeClose: function() {
                this.st.removalDelay = 500;
            }
        }
    }, 0]);
    
    e.preventDefault();
});

/**
 * Next Prev Single Product Slider
 */
$('body').on('click', '.nasa-single-arrow', function() {
    var _this = $(this);
    if (!$(_this).hasClass('nasa-disabled')) {
        var _action = $(_this).attr('data-action');
        var _wrap = $(_this).parents('.product-images-slider');
        var _slides = $(_wrap).find('.nasa-single-product-main-image');
        if ($(_slides).find('.slick-arrow.slick-' + _action).length) {
            var _real = $(_slides).find('.slick-arrow.slick-' + _action);
            
            if ($(_real).length) {
                $(_real).trigger('click');
            }
        }
    }

});

/**
 * Next Prev Single Product Slider add class "nasa-disabled"
 */
$('body').on('nasa_after_single_product_slick_inited', function(ev, _thumbs, _num_ver) {
    $('.nasa-single-product-slide .nasa-single-product-main-image').on('afterChange', function() {
        var _this = $(this);
        var _wrap = $(_this).parents('.product-images-slider');

        if ($(_wrap).find('.nasa-single-arrow').length) {
            var _prev = $(_this).find('.slick-prev');
            var _next = $(_this).find('.slick-next');

            $(_wrap).find('.nasa-single-arrow').removeClass('nasa-disabled');

            if ($(_prev).hasClass('slick-disabled')) {
                $(_wrap).find('.nasa-single-arrow[data-action="prev"]').addClass('nasa-disabled');
            }

            if ($(_next).hasClass('slick-disabled')) {
                $(_wrap).find('.nasa-single-arrow[data-action="next"]').addClass('nasa-disabled');
            }
        }
    });
    
    if (_thumbs) {
        if ($(_thumbs).find('.slick-slide').length <= _num_ver && !$(_thumbs).hasClass('not-full-items')) {
            $(_thumbs).addClass('not-full-items');
        }
    }
    
    ev.preventDefault();
});

/**
 * Tab reviewes
 */
$('body').on('click', '.nasa-product-details-page .woocommerce-review-link', function() {
    if (
        $('.woocommerce-tabs .reviews_tab a').length ||
        $('.woocommerce-tabs .nasa-accordion-reviews').length ||
        $('.woocommerce-tabs .nasa-anchor[data-target="#nasa-anchor-reviews"].active').length ||
        $('.woocommerce-tabs #nasa-scroll-reviews').length
    ) {
        var _obj = $('.woocommerce-tabs .reviews_tab a');
        if ($(_obj).length <= 0) {
            _obj = $('.woocommerce-tabs .nasa-accordion-reviews');
        }
        if ($(_obj).length <= 0) {
            _obj = $('.woocommerce-tabs .nasa-anchor[data-target="#nasa-anchor-reviews"].active');
        }
        if ($(_obj).length <= 0) {
            _obj = $('.woocommerce-tabs #nasa-scroll-reviews');
        }
        
        if ($(_obj).length) {
            $('body').trigger('nasa_animate_scroll_to_top', [$, _obj, 500]);
            setTimeout(function() {
                if (!$(_obj).hasClass('active')) {
                    $(_obj).trigger('click');
                    $(_obj).mousemove();
                }
            }, 500);
        }
    }
    
    return false;
});

/**
 * Scroll single product
 */
var _main_images = load_scroll_single_product($);
$(window).on('resize', function() {
    var _responsive = $('.nasa-check-reponsive.nasa-switch-check').length && $('.nasa-check-reponsive.nasa-switch-check').width() === 1 ? true : false;
    var _inMobile = $('body').hasClass('nasa-in-mobile') ? true : false;

    if (!_responsive && !_inMobile) {
        /* Fix scroll single product */
        _main_images = load_scroll_single_product($);
        $(window).trigger('scroll');
    }

});

/**
 * Click thumbnail scroll
 * 
 * @type type
 */
var _timeOutThumbItem;
$('body').on('click', '.nasa-thumb-wrap .nasa-wrap-item-thumb', function() {
    if (typeof _timeOutThumbItem !== 'undefined') {
        clearTimeout(_timeOutThumbItem);
    }
    
    if ($(this).parents('.nasa-single-product-scroll').length) {
        var _key = $(this).attr('data-key');
        
        if ($('.nasa-item-main-image-wrap[data-key="' + _key + '"]').length) {
            
            var _main = $('.nasa-item-main-image-wrap[data-key="' + _key + '"]');

            var _topfix = 0;
            if ($('.fixed-already').length) {
                _topfix += $('.fixed-already').outerHeight();
            }

            if ($('#wpadminbar').length) {
                _topfix += $('#wpadminbar').outerHeight();
            }

            var _pos_top = $(_main).offset().top - _topfix;

            _timeOutThumbItem = setTimeout(function() {
                $('html, body').animate({scrollTop: _pos_top - 10}, 300);
            }, 100);
        }
    }
});

/**
 * Sticky info and thumbnails
 * 
 * @type Number|scrollTop
 */
var lastScrollTop = 0;
$(window).on('scroll', function() {
    var scrollTop = $(this).scrollTop();
    var _responsive = $('.nasa-check-reponsive.nasa-switch-check').length && $('.nasa-check-reponsive.nasa-switch-check').width() === 1 ? true : false;
    var _inMobile = $('body').hasClass('nasa-in-mobile') ? true : false;
    
    /**
     * Scroll Sticky Info
     */
    if ($('.nasa-single-product-scroll').length && $('.nasa-product-info-scroll').length) {
        var _info_scroll_wrap = $('.nasa-product-info-scroll').parents('.product-info');

        if (!_responsive && !_inMobile && $(_info_scroll_wrap).length) {
            var _hasThumbs = $('.nasa-single-product-thumbnails').length ? true : false,
                _col_main = parseInt($('.nasa-single-product-scroll').attr('data-num_main')),
                _bodyHeight = $(window).height(),
                _down = scrollTop > lastScrollTop ? true : false,
                _pos = $('.nasa-main-wrap').offset(),
                _topfix = 0,
                _info_height = $(_info_scroll_wrap).outerHeight(),
                _thumb_height = _hasThumbs ? $('.nasa-single-product-thumbnails').outerHeight() : 0;

            lastScrollTop = scrollTop;

            if ($('.fixed-already').length === 1) {
                var _fixed_height = $('.fixed-already').outerHeight();
                _topfix += _fixed_height;
            }

            if ($('#wpadminbar').length === 1) {
                var _admbar_height = $('#wpadminbar').outerHeight();
                _topfix += _admbar_height;
            }

            var _higherInfo = true;
            if (_info_height > (_bodyHeight - _topfix)) {
                _higherInfo = false;
            }

            var _higherThumb = true;
            if (_thumb_height > 0 && _thumb_height > (_bodyHeight - _topfix)) {
                _higherThumb = false;
            }

            var _start_top = _pos.top - _topfix,
                _topbar = scrollTop - _start_top;

            if (_topbar >= 0) {
                if (!$(_info_scroll_wrap).hasClass('ns-sticky-scroll-sidebar')) {
                    $(_info_scroll_wrap).addClass('ns-sticky-scroll-sidebar nasa-transition-700');
                }

                if (_down && !_higherInfo) {
                    $(_info_scroll_wrap).css({'top': _bodyHeight - _info_height + 10});
                } else {
                    $(_info_scroll_wrap).css({'top': _topfix + 10});
                }
               
            } else {
                $(_info_scroll_wrap).removeClass('ns-sticky-scroll-sidebar').removeAttr('style');
            }
            
            /**
             * Scroll Thumbnails
             */
            if (_hasThumbs) {
                if (_topbar >= 0) {
                    var _thumb_wrap = $('.nasa-single-product-thumbnails').parents('.nasa-thumb-wrap'),
                        _thump_active = $(_thumb_wrap).find('.nasa-wrap-item-thumb.nasa-active');

                    if (!$(_thumb_wrap).hasClass('ns-sticky-scroll-sidebar')) {
                        $(_thumb_wrap).addClass('ns-sticky-scroll-sidebar nasa-transition-700');
                    }

                    var _swap = false;
                    if ($(_thump_active).index() >= 3) {
                        _swap = true;
                    }
    
                    if (!_higherThumb && _swap) {
                        $(_thumb_wrap).css({'top': _topfix + 10 - ($(_thump_active).index()-3)*$(_thump_active).outerHeight(true)});
                        
                    } else {
                        $(_thumb_wrap).css({'top': _topfix + 10});
                    }
    
                } else {
                    $(_thumb_wrap).removeClass('ns-sticky-scroll-sidebar').removeAttr('style');
                }
            }

            // Active image scroll
            var i = _main_images.length;
            
            if (i) {
                for (i; i>0; i--) {
                    if (_main_images[i-1].pos <= scrollTop + _topfix + 50) {
                        
                        var _key = _main_images[i-1].key;
                        
                        $('.nasa-thumb-wrap .nasa-wrap-item-thumb').removeClass('nasa-active');
                        $('.nasa-thumb-wrap .nasa-wrap-item-thumb[data-key="' + _key + '"]').addClass('nasa-active');
                        
                        if (_col_main % 2 === 0) {
                            var _before_key = (parseInt(_key) - 1).toString();
                            
                            if ($('.nasa-thumb-wrap .nasa-wrap-item-thumb[data-key="' + _before_key + '"]').length) {
                                $('.nasa-thumb-wrap .nasa-wrap-item-thumb[data-key="' + _before_key + '"]').addClass('nasa-active');
                            }
                        }

                        break;
                    }
                }
            }
        } else {
            $('.nasa-product-info-scroll').removeAttr('style');
            if (_hasThumbs) {
                $('.nasa-single-product-thumbnails').removeAttr('style');
            }
            $('.nasa-thumb-wrap .nasa-wrap-item-thumb').removeClass('nasa-active');
            $('.nasa-thumb-wrap .nasa-wrap-item-thumb[data-key="0"]').addClass('nasa-active');
        }
    }
    
    /**
     * Scroll sticky add to cart
     */
    var _mobile_fixed_addToCart = 'no';
    if ($('input[name="nasa_fixed_mobile_single_add_to_cart_layout"]').length) {
        _mobile_fixed_addToCart = $('input[name="nasa_fixed_mobile_single_add_to_cart_layout"]').val();
    }
    
    var has_fixed = _inMobile && _mobile_fixed_addToCart === 'no' ? false : true;
    
    if (has_fixed) {
        if ($('input[name="nasa_fixed_single_add_to_cart"]').length && $('.nasa-product-details-page button[type="submit"].single_add_to_cart_button').length) {
            var _start_fixed = $('.nasa-product-details-page #nasa-single-product-tabs') || $('.nasa-product-details-page button[type="submit"].single_add_to_cart_button');

            if ($('#nasa-start-fixed').length) {
                _start_fixed = $('#nasa-start-fixed');
            }

            if ($(_start_fixed).length) {
                var _offset = $(_start_fixed).offset();

                if (scrollTop >= _offset.top) {
                    if (!$('body').hasClass('has-nasa-cart-fixed')) {
                        $('body').addClass('has-nasa-cart-fixed');
                    }
                } else {
                    $('body').removeClass('has-nasa-cart-fixed');
                }
            }
        }
    }

    if ($('.nasa-bc-details-page-wrap .nasa-bc-details-step').length) {
        var _step = $('.nasa-bc-details-page-wrap .nasa-bc-details-step');
        var _nasa_ajax_store = $('#nasa-ajax-store');

        $(_step).each(function() {
            var _this =$(this);
            var _target = $(_this).attr('data-target');
            var _row = $(_nasa_ajax_store).find(_target);

            if($(_row).length) {
                var _pos_top = $(_row).offset().top;
            }

            if (_pos_top) {
                if ($('body').find('.nasa-header-sticky').length && $('.sticky-wrapper').length) {
                    _pos_top = _pos_top - 100;
                }
    
                if ($('#wpadminbar').length) {
                    _pos_top = _pos_top - $('#wpadminbar').height();
                }
                
                _pos_top = _pos_top - 10;
            }
    
            $(_this).attr('data-pos-top', Math.floor(_pos_top));
        });

        if ($('.nasa-bc-details-step.on-scrolling').length <= 0) {
            var _bc_active = $('.nasa-bc-details-step.nasa-active');
            var _just_active =null;
    
            if ($('.nasa-bc-details-step.nasa-active').length ) {
    
                var _bc_active_next = $(_bc_active).next();
                var _bc_active_pre = $(_bc_active).prev();
    
                var _pos_active = $(_bc_active).attr('data-pos-top');
                var _pos_active_next = $(_bc_active_next).attr('data-pos-top');
    
                if (Math.round(_pos_active_next-100) < Math.round(scrollTop)) {
                    $(_bc_active).removeClass('nasa-active');
                    $(_bc_active_next).addClass('nasa-active').siblings().removeClass('nasa-active');
                    _just_active = $(_bc_active_next);
                }
    
                if (Math.round(_pos_active-100) > Math.round(scrollTop)) {
                    $(_bc_active).removeClass('nasa-active');
                    $(_bc_active_pre).addClass('nasa-active').siblings().removeClass('nasa-active');
                    _just_active = $(_bc_active_pre);
                }
    
            }
    
            if ($(_just_active).length) {
                var _first = $('.nasa-bc-details-page-wrap').find('.nasa-bc-details-step:first');
                var p_w = $('.nasa-bc-details-page-wrap').outerWidth();
                var c_w = $(_just_active).outerWidth();
                var _pos_left = $(_just_active).offset().left;
                var _f_pos = $(_first).offset().left;
        
                $('.nasa-bc-details-page-wrap').animate({scrollLeft: _pos_left - _f_pos -(p_w - c_w)/2}, 200);
            }
        }
    }

    var _nasa_scroll_titles_sticky = $('.woocommerce-tabs .nasa-scroll-titles');
    if ($(_nasa_scroll_titles_sticky).length) {            
        var fix_top = $('#wpadminbar').length ? $('#wpadminbar').height() : 0;
        var on_scrolling = $(_nasa_scroll_titles_sticky).hasClass('on-scrolling') ? true : false;

        if (!$(_nasa_scroll_titles_sticky).hasClass('nasa-lock-pos')) {
            $(_nasa_scroll_titles_sticky).attr({'data-offset-top':Math.round($(_nasa_scroll_titles_sticky).offset().top)});
        }

        var off_top = $(_nasa_scroll_titles_sticky).attr('data-offset-top') - Math.round(fix_top);

        if (off_top >0) {
            if (scrollTop >= off_top) { 
                if (!$(_nasa_scroll_titles_sticky).hasClass('nasa-lock-pos')) {
                    $(_nasa_scroll_titles_sticky).addClass('nasa-lock-pos nasa-box-shadow-default');
                    
                    if (!on_scrolling) {
                        $(_nasa_scroll_titles_sticky).find('.nasa-anchor-scroll-item:first-child').addClass('active');
                    }
                    $('.fixed-already').addClass('nasa-box-shadow-none');
                }
                $(_nasa_scroll_titles_sticky).next().css({ 'margin-top': $(_nasa_scroll_titles_sticky).outerHeight() + 35 });
            } else {
                $(_nasa_scroll_titles_sticky).next().removeAttr('style');
                
                $(_nasa_scroll_titles_sticky).removeClass('nasa-lock-pos nasa-box-shadow-default');

                if (!on_scrolling) {
                    $(_nasa_scroll_titles_sticky).find('.nasa-anchor-scroll-item.active').removeClass('active');;
                }

                $('.fixed-already').removeClass('nasa-box-shadow-none');
            }
        }

        if (fix_top > 0) {
            $(_nasa_scroll_titles_sticky).css({ top: fix_top });
        }

        var id_item_active = $(_nasa_scroll_titles_sticky).find('.nasa-anchor-scroll-item.active').attr('data-target'),
            scroll_item_active = $('.woocommerce-tabs.nasa-scroll-content').find(id_item_active),
            _space = 100 + fix_top + $(_nasa_scroll_titles_sticky).outerHeight();
            
        if ($(scroll_item_active).length && !on_scrolling) {
            var scroll_item_active_pre = $(scroll_item_active).prev(),
                scroll_item_active_next = $(scroll_item_active).next(),
                _item_active_heght = $(scroll_item_active).outerHeight();

            if ( Math.round(scrollTop) >= Math.round($(scroll_item_active).offset().top + _item_active_heght - _space) ) {
                var id = $(scroll_item_active_next).attr('id');
                $(_nasa_scroll_titles_sticky).find('.nasa-anchor-scroll-item[data-target="#' + id + '"]').addClass('active').siblings().removeClass('active');
            }

            if ( Math.round(scrollTop) <= Math.round($(scroll_item_active).offset().top - _space - 35) ) {
                var id = $(scroll_item_active_pre).attr('id');
                $(_nasa_scroll_titles_sticky).find('.nasa-anchor-scroll-item[data-target="#' + id + '"]').addClass('active').siblings().removeClass('active');
            }
        } else if ($(scroll_item_active).length <= 0) { 
            $(_nasa_scroll_titles_sticky).find('.nasa-anchor-scroll-item:first-child').addClass('active');
        }
    }
});

/**
 * Fixed Single form add to cart
 */
if ($('input[name="nasa_fixed_single_add_to_cart"]').length && $('.nasa-product-details-page').length) {
    setTimeout(function() {
        load_sticky_add_to_cart($);
    }, 1000);
}

/**
 * Change Ux
 */
$('body').on('click', '.nasa-attr-ux', function() {
    var _target = $(this).attr('data-target');
    if ($(_target).length) {
        var _wrap = $(_target).parents('.nasa-attr-ux_wrap-clone');
        $(_wrap).find('.nasa-attr-ux-clone').removeClass('selected');
        if ($(this).hasClass('selected')) {
            $(_target).addClass('selected');
        }

        if ($('.nasa-fixed-product-btn').length) {
            setTimeout(function() {
                var _button_wrap = nasa_clone_add_to_cart($);
                $('.nasa-fixed-product-btn').html(_button_wrap);
                var _val = $('.nasa-product-details-page form.cart input[name="quantity"]').val();
                $('.nasa-single-btn-clone input[name="quantity"]').val(_val);
            }, 250);
        }

        setTimeout(function() {
            if ($('.nasa-attr-ux').length) {
                $('.nasa-attr-ux').each(function() {
                    var _this = $(this);
                    var _targetThis = $(_this).attr('data-target');

                    if ($(_targetThis).length) {
                        var _disable = $(_this).hasClass('nasa-disable') ? true : false;
                        if (_disable) {
                            if (!$(_targetThis).hasClass('nasa-disable')) {
                                $(_targetThis).addClass('nasa-disable');
                            }
                        } else {
                            $(_targetThis).removeClass('nasa-disable');
                        }
                    }
                });
            }
        }, 250);
    }
});

/**
 * Change Ux clone
 */
$('body').on('click', '.nasa-attr-ux-clone', function() {
    var _target = $(this).attr('data-target');
    if ($(_target).length) {
        $(_target).trigger('click');
    }
});

/**
 * Change select
 */
$('body').on('change', '.nasa-attr-select', function() {
    var _this = $(this);
    var _target = $(_this).attr('data-target');
    var _value = $(_this).val();

    if ($(_target).length) {
        setTimeout(function() {
            var _html = $(_this).html();
            $(_target).html(_html);
            $(_target).val(_value);
        }, 100);

        setTimeout(function() {
            var _button_wrap = nasa_clone_add_to_cart($);
            $('.nasa-fixed-product-btn').html(_button_wrap);
            var _val = $('.nasa-product-details-page form.cart input[name="quantity"]').val();
            $('.nasa-single-btn-clone input[name="quantity"]').val(_val);

            if ($('.nasa-attr-ux').length) {
                $('.nasa-attr-ux').each(function() {
                    var _this = $(this);
                    var _targetThis = $(_this).attr('data-target');

                    if ($(_targetThis).length) {
                        var _disable = $(_this).hasClass('nasa-disable') ? true : false;
                        if (_disable) {
                            if (!$(_targetThis).hasClass('nasa-disable')) {
                                $(_targetThis).addClass('nasa-disable');
                            }
                        } else {
                            $(_targetThis).removeClass('nasa-disable');
                        }
                    }
                });
            }
        }, 250);
    }
});

/**
 * Change select clone
 */
$('body').on('change', '.nasa-attr-select-clone', function() {
    var _target = $(this).attr('data-target');
    var _value = $(this).val();
    if ($(_target).length) {
        $(_target).val(_value).trigger('change');
    }
});

/**
 * Reset variations
 */
$('body').on('click', '.nasa-product-details-page .reset_variations', function() {
    if ($('.nasa-add-to-cart-fixed .nasa-wrap-content .selected').length) {
        $('.nasa-add-to-cart-fixed .nasa-wrap-content .selected').removeClass('selected');
    }

    setTimeout(function() {
        var _button_wrap = nasa_clone_add_to_cart($);
        $('.nasa-fixed-product-btn').html(_button_wrap);
        var _val = $('.nasa-product-details-page form.cart input[name="quantity"]').val();
        $('.nasa-single-btn-clone input[name="quantity"]').val(_val);

        if ($('.nasa-product-details-page .nasa-attr-ux').length) {
            $('.nasa-product-details-page .nasa-attr-ux').each(function() {
                var _this = $(this);
                var _targetThis = $(_this).attr('data-target');

                if ($(_targetThis).length) {
                    var _disable = $(_this).hasClass('nasa-disable') ? true : false;
                    if (_disable) {
                        if (!$(_targetThis).hasClass('nasa-disable')) {
                            $(_targetThis).addClass('nasa-disable');
                        }
                    } else {
                        $(_targetThis).removeClass('nasa-disable');
                    }
                }
            });
        }
    }, 250);
});

/**
 * Plus, Minus button
 */
$('body').on('click', '.nasa-product-details-page .cart .quantity .plus, .nasa-product-details-page .cart .quantity .minus', function() {
    if ($('.nasa-single-btn-clone input[name="quantity"]').length) {
        var _val = $('.nasa-product-details-page .cart input[name="quantity"]').val();
        $('.nasa-single-btn-clone input[name="quantity"]').val(_val);
    }
});

/**
 * Plus clone button
 */
$('body').on('click', '.nasa-single-btn-clone .plus', function() {
    if ($('.nasa-product-details-page .cart .quantity .plus').length) {
        $('.nasa-product-details-page .cart .quantity .plus').trigger('click');
    }
});

/**
 * Minus clone button
 */
$('body').on('click', '.nasa-single-btn-clone .minus', function() {
    if ($('.nasa-product-details-page .cart .quantity .minus').length) {
        $('.nasa-product-details-page .cart .quantity .minus').trigger('click');
    }
});

/**
 * Quantily input
 */
$('body').on('keyup', '.nasa-product-details-page form.cart input[name="quantity"]', function() {
    var _val = $(this).val();
    $('.nasa-single-btn-clone input[name="quantity"]').val(_val);
});

/**
 * Quantily input clone
 */
$('body').on('keyup', '.nasa-single-btn-clone input[name="quantity"]', function() {
    var _val = $(this).val();
    $('.nasa-product-details-page .cart input[name="quantity"]').val(_val);
});

/**
 * Add to cart click
 */
$('body').on('click', '.nasa-single-btn-clone button[type="submit"].single_add_to_cart_button', function() {
    if ($('.nasa-product-details-page .cart button[type="submit"].single_add_to_cart_button').length) {
        $('.nasa-product-details-page .cart button[type="submit"].single_add_to_cart_button').trigger('click');
    }
});

$('body').on('nasa_before_click_single_add_to_cart', function() {
    if ($('.nasa-single-btn-clone button[type="submit"].single_add_to_cart_button').length && !$('.nasa-single-btn-clone button[type="submit"].single_add_to_cart_button').hasClass('disabled')) {
        if (!$('.nasa-single-btn-clone button[type="submit"].single_add_to_cart_button').hasClass('loading')) {
            $('.nasa-single-btn-clone button[type="submit"].single_add_to_cart_button').addClass('loading');
        }
    }
});

$('body').on('added_to_cart', function() {
    $('.nasa-single-btn-clone button[type="submit"].single_add_to_cart_button').removeClass('loading');
});

/**
 * Buy Now click
 */
$('body').on('click', '.nasa-single-btn-clone .nasa-buy-now', function() {
    if ($('.nasa-product-details-page .cart .nasa-buy-now').length) {
        $('.nasa-product-details-page .cart .nasa-buy-now').trigger('click');
    }
});

/**
 * Toggle Select Options
 */
$('body').on('click', '.nasa-toggle-variation_wrap-clone', function() {
    if ($('.nasa-fixed-product-variations-wrap').length) {
        $('.nasa-fixed-product-variations-wrap').toggleClass('nasa-active');
    }
});

$('body').on('click', '.nasa-close-wrap', function() {
    if ($('.nasa-fixed-product-variations-wrap').length) {
        $('.nasa-fixed-product-variations-wrap').removeClass('nasa-active');
    }
});

/**
 * Toggle Woo Tabs in mobile
 */
$('body').on('click', '.nasa-toggle-woo-tabs', function() {
    if ($('.mobile-tabs-off-canvas').length) {
        $('.mobile-tabs-off-canvas').toggleClass('nasa-active');
    }
});

/**
 * Load Ajax single product
 * 
 * @param {type} $
 * @returns {String}
 */
$('body').on('click', '.nasa-ajax-call', function(e) {
    if ($('#nasa-single-product-ajax').length) {
        e.preventDefault();

        if (!_single_loading) {
            _single_loading = true;

            var _this = $(this);
            var _url = $(_this).attr('href');
            var _data = {};

            var $crazy_load = $('#nasa-ajax-store').length && $('#nasa-ajax-store').hasClass('nasa-crazy-load') ? true : false;

            $.ajax({
                url: _url,
                type: 'get',
                dataType: 'html',
                data: _data,
                cache: true,
                beforeSend: function() {
                    $('body').trigger('nasa_before_load_ajax');
                    
                    if (typeof _single_remove_loading !== 'undefined') {
                        clearInterval(_single_remove_loading);
                    }

                    if ($crazy_load && $('#nasa-ajax-store').length && !$('#nasa-ajax-store').hasClass('crazy-loading')) {
                        $('#nasa-ajax-store').addClass('crazy-loading');
                    }

                    if ($('.nasa-progress-bar-load-shop').length) {
                        $('.nasa-progress-bar-load-shop .nasa-progress-per').removeClass('nasa-loaded');
                        $('.nasa-progress-bar-load-shop').addClass('nasa-loading');
                    }

                    var _pos_obj = $('#nasa-ajax-store');
                    $('body').trigger('nasa_animate_scroll_to_top', [$, _pos_obj, 700]);
                },
                success: function (res) {
                    var $html = $.parseHTML(res);

                    var $mainContent = $('#nasa-ajax-store', $html);

                    if ($('#header-content').length) {
                        var $headContent = $('#header-content', $html);
                        /**
                         * Replace Header
                         */
                        $('#header-content').replaceWith($headContent);
                    } else if ($('#nasa-breadcrumb-site').length) {
                        /**
                         * Replace Breadcrumb
                         */
                        var $breadcrumb = $('#nasa-breadcrumb-site', $html);
                        $('#nasa-breadcrumb-site').replaceWith($breadcrumb);
                    } else if ($('#nasa-breadcrumb-site').length < 1 && $('#header-content').length) {
                        /**
                         * Appent Breadcrumb
                         */
                        var $breadcrumb = $('#nasa-breadcrumb-site', $html);
                        if ($breadcrumb) {
                            $('#header-content').append($breadcrumb);
                        }
                    }

                    /**
                     * Replace Archive
                     */
                    $('#nasa-ajax-store').replaceWith($mainContent);

                    /**
                     * Replace Footer
                     */
                    if ($('#nasa-footer').length) {
                        var $footContent = $('#nasa-footer', $html);
                        
                        if ($footContent.find('.elementor-toggle').length <= 0) {
                            $('#nasa-footer').replaceWith($footContent);
                        }
                    }
                    
                    /**
                     * Set viewed product
                     */
                    if ($('#ns-viewed-wrap-cfg').length) {
                        var $viewed_cfg = $('#ns-viewed-wrap-cfg', $html);
                        
                        $('#ns-viewed-wrap-cfg').replaceWith($viewed_cfg);
                        $('body').trigger('ns_viewed_product_init');
                    }

                    /**
                     * Title Page
                     */
                    var matches = res.match(/<title>(.*?)<\/title>/);
                    var _title = typeof matches[1] !== 'undefined' ? matches[1] : '';
                    if (_title) {
                        $('title').html(_title);
                    }

                    $('body').trigger('nasa_after_loaded_ajax_complete');

                    /**
                     * Fix lazy load
                     */
                    setTimeout(function() {
                        if ($('img[data-lazy-src]').length) {
                            $('img[data-lazy-src]').each(function() {
                                var _img = $(this);
                                var _src_real = $(_img).attr('data-lazy-src');
                                var _srcset = $(_img).attr('data-lazy-srcset');
                                var _size = $(_img).attr('data-lazy-sizes');
                                $(_img).attr('src', _src_real);
                                $(_img).removeAttr('data-lazy-src');

                                if (_srcset) {
                                    $(_img).attr('srcset', _srcset);
                                    $(_img).removeAttr('data-lazy-srcset');
                                }

                                if (_size) {
                                    $(_img).attr('sizes', _size);
                                    $(_img).removeAttr('data-lazy-sizes');
                                }
                            });
                        }
                    }, 100);
                },
                error: function () {
                    $('#nasa-ajax-store').removeClass('crazy-loading');

                    if ($('.nasa-progress-bar-load-shop').length) {
                        $('.nasa-progress-bar-load-shop').removeClass('nasa-loading');
                    }

                    _single_loading = false;
                }
            });

            window.history.pushState(_url, '', _url);
        }
    }
});

/**
 * Compatible with FancyProductDesigner
 */
$('body').on('modalDesignerClose', function() {
    setTimeout(function() {
        if ($('.nasa-single-product-thumbnails .nasa-wrap-item-thumb').length) {
            var _src = $('.woocommerce-product-gallery__image img').attr('src');
            $('.nasa-single-product-thumbnails .nasa-wrap-item-thumb:first-child img').attr('src', _src);
            $('.nasa-single-product-thumbnails .nasa-wrap-item-thumb:first-child img').removeAttr('srcset');
        }
    }, 100);
});

/**
 * Change pagination comments
 */
$('body').on('click', '.woocommerce-Reviews a.page-numbers', function(e) {
    e.preventDefault();
    
    var _url = $(this).attr('href');
    
    $.ajax({
        url: _url,
        type: 'get',
        dataType: 'html',
        data: {},
        cache: true,
        beforeSend: function() {
            $('body').trigger('nasa_before_load_comments');
            
            if (!$('#comments').hasClass('nasa-loading')) {
                $('#comments').addClass('nasa-loading');
            }
        },
        success: function (res) {
            var $html = $.parseHTML(res);
            var $comments = $('#comments', $html);
            $('#comments').replaceWith($comments);
            
            $('body').trigger('nasa_animate_scroll_to_top', [$, '#comments', 500]);
            
            $('body').trigger('nasa_loaded_comments');
        },
        error: function () {
            $('#comments').removeClass('nasa-loading');
        }
    });
});

/**
 * Comment form
 */
$('body').on('nasa_comment_media_form', function() {
    if ($('#nasa-comment-media[type="file"]').length) {
        var _form = $('#nasa-comment-media[type="file"]').parents('form');
        
        $(_form).attr('enctype', 'multipart/form-data');
    }
}).trigger('nasa_comment_media_form');

/**
 * Back url with Ajax Call
 * 
 * @param {type} $
 * @returns {String}
 */
$(window).on('popstate', function() {
    if ($('#nasa-single-product-ajax').length && _popstate_reload) {
        location.reload(true);
    }
});

$('body').on('click','.item-wrap.slick-cloned .product-image',function(e){
    var data_key = $(this).parents('.item-wrap.slick-cloned .nasa-item-main-image-wrap').attr('data-key');
    $('body').find('.main-images .item-wrap:not(.slick-cloned) .nasa-item-main-image-wrap[data-key="'+data_key+'"] .product-image').trigger('click');
    e.preventDefault();
});

$('body').on('click','.item-wrap.slick-cloned .mejs-overlay-play, .item-wrap.slick-cloned .mejs-mediaelement .wp-video-shortcode',function() {
    var _this = this;
    var _pa =  $(_this).parents('.mejs-inner');
    var _overlay_play = $(_pa).find('.mejs-overlay-play');
    var _video = $(_pa).find('video.wp-video-shortcode');

    if (!$(_overlay_play).hasClass('video-play')) {
        $(_overlay_play).addClass('video-play');
        $(_video).get(0).play();
    } else {
        $(_overlay_play).removeClass('video-play');
        $(_video).get(0).pause();
    }
});

/* End Document Ready */
});

/**
 ******************************
 * Functions ******************
 ******************************
 */

/**
 * clone add to cart button fixed
 * 
 * @param {type} $
 * @returns {String}
 */
function nasa_clone_add_to_cart($) {
    var _ressult = '';
    
    if ($('.nasa-product-details-page').length) {
        var _wrap = $('.nasa-product-details-page');
        
        /**
         * Variations
         */
        if ($(_wrap).find('.single_variation_wrap').length) {
            var _price = $(_wrap).find('.single_variation_wrap .woocommerce-variation .woocommerce-variation-price').length && $(_wrap).find('.single_variation_wrap .woocommerce-variation').css('display') !== 'none' ? $(_wrap).find('.single_variation_wrap').find('.woocommerce-variation-price').html() : '';
            
            /**
             * Clone form
             */
            var _addToCart = $(_wrap).find('.single_variation_wrap').find('.woocommerce-variation-add-to-cart').clone();
            
            /**
             * Remove Buy Now
             */
            if ($(_addToCart).find('.nasa-buy-now').length && !$(_addToCart).find('.nasa-buy-now').hasClass('has-sticky-in-desktop')) {
                $(_addToCart).find('.nasa-buy-now').remove();
            }
            
            /**
             * Remove tags not use in sticky
             */
            if ($(_addToCart).find('.nasa-not-in-sticky').length) {
                $(_addToCart).find('.nasa-not-in-sticky').remove();
            }
            
            /**
             * Remove Wapo
             */
            if ($(_addToCart).find('#yith-wapo-container').length) {
                $(_addToCart).find('#yith-wapo-container').remove();
            }
            
            /**
             * Remove WooCommerce Product Bundle
             */
            if ($(_addToCart).find('.bundled_products, .extendons_table_bundle').length) {
                $(_addToCart).find('.bundled_products, .extendons_table_bundle').remove();
            }
            
            /**
             * Remove Yith WooCommerce Bundle
             */
            if ($(_addToCart).find('.yith-wcpb-product-bundled-items').length) {
                $(_addToCart).find('.yith-wcpb-product-bundled-items').remove();
            }
            
            /**
             * Compatible with Uni CPO/Rangeslider.ion Plugin
             */
            if ($(_addToCart).find('.uni-builderius-container').length) {
                $(_addToCart).find('.uni-builderius-container').remove();
            }
            
            /**
             * Remove Checkout Plugins - Stripe for WooCommerce
             */
            if ($(_addToCart).find('.cpsw-payment-request-main-wrapper').length) {
                $(_addToCart).find('.cpsw-payment-request-main-wrapper').remove();
            }
            
            /**
             * Remove WC - Stripe for WooCommerce
             */
            if ($(_addToCart).find('[class^="wc-stripe-"], [class*=" wc-stripe-"]').length) {
                $(_addToCart).find('[class^="wc-stripe-"], [class*=" wc-stripe-"]').remove();
            }
            
            /**
             * Remove id
             */
            $(_addToCart).find('*').removeAttr('id');
            
            /**
             * Remove Style
             */
            if ($(_addToCart).find('.single_add_to_cart_button').length) {
                $(_addToCart).find('.single_add_to_cart_button').removeAttr('style');
            }
            
            var _btn = $(_addToCart).html();
            
            var _disable = $(_wrap).find('.single_variation_wrap').find('.woocommerce-variation-add-to-cart-disabled').length ? ' nasa-clone-disable' : '';

            _ressult = '<div class="nasa-single-btn-clone single_variation_wrap-clone' + _disable + '">' + _price + '<div class="woocommerce-variation-add-to-cart-clone">' + _btn + '</div></div>';
            
            var _options_txt = $('input[name="nasa_select_options_text"]').length ? $('input[name="nasa_select_options_text"]').val() : 'Select options';
            
            _ressult = '<a class="nasa-toggle-variation_wrap-clone" href="javascript:void(0);">' + _options_txt + '</a>' + _ressult;
        }

        /**
         * Simple
         */
        else if ($(_wrap).find('.cart').length) {
            /**
             * Clone form
             */
            var _addToCart = $(_wrap).find('.cart').clone();
            
            /**
             * Remove Buy Now
             */
            if ($(_addToCart).find('.nasa-buy-now').length && !$(_addToCart).find('.nasa-buy-now').hasClass('has-sticky-in-desktop')) {
                $(_addToCart).find('.nasa-buy-now').remove();
            }
            
            /**
             * Remove tags not use in sticky
             */
            if ($(_addToCart).find('.nasa-not-in-sticky').length) {
                $(_addToCart).find('.nasa-not-in-sticky').remove();
            }
            
            /**
             * Remove Wapo
             */
            if ($(_addToCart).find('#yith-wapo-container').length) {
                $(_addToCart).find('#yith-wapo-container').remove();
            }
            
            /**
             * Remove WooCommerce Product Bundle
             */
            if ($(_addToCart).find('.bundled_products, .extendons_table_bundle').length) {
                $(_addToCart).find('.bundled_products, .extendons_table_bundle').remove();
            }
            
            /**
             * Remove Yith WooCommerce Bundle
             */
            if ($(_addToCart).find('.yith-wcpb-product-bundled-items').length) {
                $(_addToCart).find('.yith-wcpb-product-bundled-items').remove();
            }
            
            /**
             * Compatible with Uni CPO/Rangeslider.ion Plugin
             */
            if ($(_addToCart).find('.uni-builderius-container').length) {
                $(_addToCart).find('.uni-builderius-container').remove();
            }
            
            /**
             * Remove Checkout Plugins - Stripe for WooCommerce
             */
            if ($(_addToCart).find('.cpsw-payment-request-main-wrapper').length) {
                $(_addToCart).find('.cpsw-payment-request-main-wrapper').remove();
            }
            
            /**
             * Remove WC - Stripe for WooCommerce
             */
            if ($(_addToCart).find('[class^="wc-stripe-"], [class*=" wc-stripe-"]').length) {
                $(_addToCart).find('[class^="wc-stripe-"], [class*=" wc-stripe-"]').remove();
            }
            
            /**
             * Remove id
             */
            $(_addToCart).find('*').removeAttr('id');
            
            /**
             * Remove Style
             */
            if ($(_addToCart).find('.single_add_to_cart_button').length) {
                $(_addToCart).find('.single_add_to_cart_button').removeAttr('style');
            }
            
            var _btn = $(_addToCart).html();
            
            _ressult = '<div class="nasa-single-btn-clone">' + _btn + '</div>';
        }
    }
    
    return _ressult;
}

/**
 * Lightbox image single product page
 * 
 * @param {type} $
 * @returns {undefined}
 */
function load_gallery_popup($) {
    if ($('.main-images').length && !$('body').hasClass('nasa-in-mobile')) {
        if (!$('body').hasClass('nasa-disable-lightbox-image')) {
            $('body').trigger('ns_magnific_popup_init', ['.main-images', {
                delegate: '.item-wrap:not(.slick-cloned) a.product-image',
                type: 'image',
                fixContentPos: true,
                tLoading: '<div class="nasa-loader"></div>',
                removalDelay: 300,
                closeOnContentClick: true,
                closeMarkup: '<a class="nasa-mfp-close nasa-stclose" href="javascript:void(0);" title="' + $('input[name="nasa-close-string"]').val() + '"></a>',
                gallery: {
                    enabled: true,
                    navigateByImgClick: false,
                    preload: [0,1],
                    tCounter: '<div class="mfp-counter">%curr% / %total%</div>'
                },
                image: {
                    verticalFit: false,
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                },
                callbacks: {
                    beforeOpen: function() {
                        var productVideo = $('.product-video-popup').attr('href');
                        var productVideoPost = $('video.wp-video-shortcode').attr('src');
                        this.st.mainClass += ' nasa-left-to-right';

                        setTimeout(function (){
                            $('.mfp-wrap').addClass('ns-active');
                        },100);

                        if (productVideoPost && !$('body').hasClass('nasa-mobile-app')) {
                            // Add product video post to gallery 
                            this.st.mainClass += ' has-product-video';
                            var galeryPopup = $.magnificPopup.instance;
                            galeryPopup.items.push({
                                src: productVideoPost,
                                type: 'iframe'
                            });

                            galeryPopup.updateItemHTML();
                        }

                        if (productVideo && !$('body').hasClass('nasa-mobile-app')) {
                            // Add product video to gallery popup
                            this.st.mainClass += ' has-product-video';
                            var galeryPopup = $.magnificPopup.instance;
                            galeryPopup.items.push({
                                src: productVideo,
                                type: 'iframe'
                            });

                            galeryPopup.updateItemHTML();
                        }

                        // this.st.mainClass = this.st.mainClass + ' ' + mainClass;
                    },
                    open: function() {
                      
                    },
                    beforeClose: function() {
                        this.st.removalDelay = 500;
                    }
                }
            }]);
        }
        
        /**
         * Disable lightbox image
         */
        else {
            $('body').on('click', '.main-images a.woocommerce-additional-image, .main-images a.product-image', function() {
                return false;
            });
        }
    }
}

/**
 * Lightbox image single product page
 * 
 * @param {type} $
 * @returns {undefined}
 */
function load_reivew_images_popup($) {
    if ($('.nasa-wrap-review-thumb').length) {
        if (! $('body').hasClass('nasa-disable-lightbox-image')) {
            $('.nasa-wrap-review-thumb').each(function() {
                var _wrap = $(this);
                
                $('body').trigger('ns_magnific_popup_init', [_wrap, {
                    delegate: 'a',
                    type: 'image',
                    tLoading: '<div class="nasa-loader"></div>',
                    removalDelay: 300,
                    closeOnContentClick: true,
                    closeMarkup: '<a class="nasa-mfp-close nasa-stclose" href="javascript:void(0);" title="' + $('input[name="nasa-close-string"]').val() + '"></a>',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: false,
                        preload: [0,1],
                        tCounter: '<div class="mfp-counter">%curr% / %total%</div>'
                    },
                    image: {
                        verticalFit: false,
                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                    },
                    callbacks: {
                        beforeOpen: function() {
                            this.st.mainClass = this.st.mainClass + ' ' + 'nasa-left-to-right';

                            setTimeout(function (){
                                $('.mfp-wrap').addClass('ns-active');
                            }, 100);
                        },
                        open: function() {

                        },
                        beforeClose: function() {
                            this.st.removalDelay = 500;
                        }
                    }
                }]);
            });
        }
        
        /**
         * Disable lightbox image
         */
        else {
            $('body').on('click', '.nasa-wrap-review-thumb a', function() {
                return false;
            });
        }
    }
}

/**
 * Gallery for variation of Single Product
 * 
 * @param {type} $
 * @param {type} _form
 * @param {type} variation
 * @returns {undefined}
 */
function change_gallery_variable_single_product($, _form, variation) {
    var _crazy = false;

    if ($('body').hasClass('nasa-crazy-load')) {
        _crazy = true;
        
        if (_prev_image_id && variation && variation.image_id) {
            _crazy = _prev_image_id === variation.image_id ? false : true;
        }
    }

    var _video =  $('body').find('.nasa-item-main-video-wrap').parents('.item-wrap:not(.slick-cloned)');
    var _video_thumb =  $('body').find('.nasa-wrap-item-thumb.ns-video-poster');
    
    if (variation && variation.image && variation.image.src && variation.image.src.length > 1) {
        var _countSelect = $(_form).find('.variations .value select').length;
        var _selected = 0;
        if (_countSelect) {
            $(_form).find('.variations .value select').each(function() {
                if ($(this).val() !== '') {
                    _selected++;
                }
            });
        }

        if (_countSelect && _selected === _countSelect) {
            _inited_gallery = false;
            _inited_gallery_key = 1;

            var _data = {
                'variation_id': variation.variation_id,
                'main_id': (variation.image_id ? variation.image_id : 0),
                'gallery': variation.nasa_gallery_variation
            };

            if (typeof _single_variations[variation.variation_id] === 'undefined') {
                if (
                    typeof nasa_ajax_params !== 'undefined' &&
                    typeof nasa_ajax_params.wc_ajax_url !== 'undefined'
                ) {
                    var _urlAjax = nasa_ajax_params.wc_ajax_url.toString().replace('%%endpoint%%', 'nasa_get_gallery_variation');

                    $.ajax({
                        url: _urlAjax,
                        type: 'post',
                        dataType: 'json',
                        cache: false,
                        data: {
                            data: _data
                        },
                        beforeSend: function () {
                            if (!$(_form).hasClass('nasa-processing')) {
                                $(_form).addClass('nasa-processing');
                            }

                            if (_crazy && !$('.nasa-product-details-page').hasClass('crazy-loading')) {
                                $('.nasa-product-details-page').addClass('crazy-loading');
                            }
                            
                            $('.product-gallery').css({'min-height': $('.product-gallery').outerHeight()});
                        },
                        success: function (result) {
                            $(_form).removeClass('nasa-processing');
                            
                            if (_crazy) {
                                $('.nasa-product-details-page').removeClass('crazy-loading');
                            }

                            _single_variations[variation.variation_id] = result;



                            /**
                             * Main image
                             */
                            if (typeof result.main_image !== 'undefined') {
                                $('.nasa-main-image-default').replaceWith(result.main_image);

                                if(_video) {
                                    $('.nasa-main-image-default').append(_video);
                                }
                            }

                            /**
                             * Thumb image
                             */
                            if ($('.nasa-thumbnail-default').length && typeof result.thumb_image !== 'undefined') {
                                $('.nasa-thumbnail-default').replaceWith(result.thumb_image);

                                if ($('.nasa-thumb-clone img').length && $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"] img').length) {
                                    $('.nasa-thumb-clone img').attr('src', $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"] img').attr('src'));
                                }

                                if(_video_thumb) {
                                    $('.nasa-thumbnail-default').append(_video_thumb);
                                }

                            } else if ($('.nasa-thumb-clone img').length && typeof result.main_image !== 'undefined') {
                                $('.nasa-thumb-clone img').attr('src', $('.main-images .item-wrap.first img').attr('src'));
                            }

                            /**
                             * Trigger after changed Gallery for Single product
                             */
                            $('body').trigger('nasa_changed_gallery_variable_single');
                        },
                        error: function() {
                            $(_form).removeClass('nasa-processing');
                            $('.nasa-product-details-page').removeClass('crazy-loading');
                        }
                    });
                }
            } else {
                var result = _single_variations[variation.variation_id];

                /**
                 * Main image
                 */
                if (typeof result.main_image !== 'undefined') {
                    // if (_crazy && !$('.nasa-product-details-page').hasClass('crazy-loading')) {
                    //     $('.nasa-product-details-page').addClass('crazy-loading');
                    // }

                    $('.product-gallery').css({'min-height': $('.product-gallery').outerHeight()});
                    $('.nasa-main-image-default').replaceWith(result.main_image);

                    if(_video) {
                        $('.nasa-main-image-default').append(_video);
                    }

                    if (typeof _timeout_changed !== 'undefined') {
                        clearTimeout(_timeout_changed);
                    }

                    _timeout_changed = setTimeout(function() {
                        $('.nasa-product-details-page .product-gallery').find('.nasa-loader, .nasa-loading').remove();
                        $('.nasa-product-details-page').removeClass('crazy-loading');

                        $('.product-gallery').css({'min-height': 'auto'});
                    }, 200);
                }

                /**
                 * Thumb image
                 */
                if ($('.nasa-thumbnail-default').length && typeof result.thumb_image !== 'undefined') {
                    $('.nasa-thumbnail-default').replaceWith(result.thumb_image);

                    if ($('.nasa-thumb-clone img').length && $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"] img').length) {
                        $('.nasa-thumb-clone img').attr('src', $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"] img').attr('src'));
                    }

                    if(_video_thumb) {
                        $('.nasa-thumbnail-default').append(_video_thumb);
                    }

                } else if ($('.nasa-thumb-clone img').length && typeof result.main_image !== 'undefined') {
                    $('.nasa-thumb-clone img').attr('src', $('.main-images .item-wrap.first img').attr('src'));
                }

                /**
                 * Trigger after changed Gallery for Single product
                 */
                $('body').trigger('nasa_changed_gallery_variable_single');
            }
        }
    }

    /**
     * Default
     */
    else {
        if (!_inited_gallery) {

            _inited_gallery = true;

            var result = _single_variations[0];
            if ($('.nasa-detail-product-deal-countdown').length) {
                $('.nasa-detail-product-deal-countdown').removeClass('nasa-show').html('');
            }
            
            if ($('.nasa-detail-product-deal-countdown-label').length && !$('.nasa-detail-product-deal-countdown-label').hasClass('hidden-tag')) {
                $('.nasa-detail-product-deal-countdown-label').addClass('hidden-tag');
            }

            /**
             * Main image
             */
            if (typeof result.main_image !== 'undefined') {
                $('.nasa-main-image-default').replaceWith(result.main_image);
            }

            /**
             * Thumb image
             */
            if (typeof result.thumb_image !== 'undefined') {
                $('.nasa-thumbnail-default').replaceWith(result.thumb_image);

                if ($('.nasa-thumb-clone img').length && $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"] img').length) {
                    $('.nasa-thumb-clone img').attr('src', $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"] img').attr('src'));
                }
            }

            /**
             * Trigger after changed Gallery for Single product
             */
            $('body').trigger('nasa_changed_gallery_variable_single');
        }
    }
    
    _prev_image_id = variation && variation.image_id ? variation.image_id : null;
    
    /**
     * Deal time
     */
    if ($('.nasa-detail-product-deal-countdown').length) {
        $('.nasa-detail-product-deal-countdown').html('');
        $('.nasa-detail-product-deal-countdown').removeClass('nasa-show');
        
        if ($('.nasa-detail-product-deal-countdown-label').length && !$('.nasa-detail-product-deal-countdown-label').hasClass('hidden-tag')) {
            $('.nasa-detail-product-deal-countdown-label').addClass('hidden-tag');
        }
        
        if (variation && variation.variation_id && variation.is_in_stock && variation.is_purchasable) {
            var now = Date.now();
            
            if (typeof variation.deal_time !== 'undefined' && variation.deal_time && variation.deal_time.html && variation.deal_time.to > now && (typeof variation.deal_time.from === 'undefined' || variation.deal_time.from < now)) {
                $('.nasa-detail-product-deal-countdown').html(variation.deal_time.html);
                
                $('body').trigger('nasa_load_countdown');
                
                if (!$('.nasa-detail-product-deal-countdown').hasClass('nasa-show')) {
                    $('.nasa-detail-product-deal-countdown').addClass('nasa-show');
                }

                $('.nasa-detail-product-deal-countdown-label').removeClass('hidden-tag');
            }
        }
    }
}

/**
 * Change image variable Single product
 * 
 * @param {type} $
 * @param {type} _form
 * @param {type} variation
 * @returns {undefined}
 */
function change_image_variable_single_product($, _form, variation) {
    /**
     * Trigger Easy Zoom
     */
    $('body').trigger('nasa_before_changed_src_main_img');
    
    /**
     * Change gallery for single product variation
     */
    if (variation && variation.image && variation.image.src && variation.image.src.length > 1) {
        var _countSelect = $(_form).find('.variations .value select').length;
        var _selected = 0;
        if (_countSelect) {
            $(_form).find('.variations .value select').each(function() {
                if ($(this).val() !== '') {
                    _selected++;
                }
            });
        }

        if (_countSelect && _selected === _countSelect) {
            var src_thumb = false;

            /**
             * Support Bundle product
             */
            if ($('.nasa-product-details-page .woosb-product').length) {
                if (variation.image.thumb_src !== 'undefined' || variation.image.gallery_thumbnail_src !== 'undefined') {
                    src_thumb = variation.image.gallery_thumbnail_src ? variation.image.gallery_thumbnail_src :  variation.image.thumb_src;
                }

                if (src_thumb) {
                    $(_form).parents('.woosb-product').find('.woosb-thumb-new').html('<img src="' + src_thumb + '" />');
                    $(_form).parents('.woosb-product').find('.woosb-thumb-ori').hide();
                    $(_form).parents('.woosb-product').find('.woosb-thumb-new').show();
                }
            }

            else {
                var _src_large = typeof variation.image_single_page !== 'undefined' ?
                    variation.image_single_page : variation.image.url;

                $('.main-images .nasa-item-main-image-wrap[data-key="0"] img').attr('src', _src_large);
                $('.main-images .nasa-item-main-image-wrap[data-key="0"] a').attr('href', variation.image.url);

                /**
                 * Trigger Easy Zoom
                 */
                $('body').trigger('nasa_after_changed_src_main_img', [_src_large, variation.image.url]);

                $('.main-images .nasa-item-main-image-wrap[data-key="0"] img').removeAttr('srcset');

                /**
                 * For thumnail
                 */
                if ($('.product-thumbnails').length) {
                    if (variation.image.thumb_src !== 'undefined') {
                        src_thumb = variation.image.thumb_src;
                    } else {
                        var thumb_wrap = $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"]');
                        if (typeof $(thumb_wrap).attr('data-thumb_org') === 'undefined') {
                            $(thumb_wrap).attr('data-thumb_org', $(thumb_wrap).find('img').attr('src'));
                        }

                        src_thumb = $(thumb_wrap).attr('data-thumb_org');
                    }

                    if (src_thumb) {
                        $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"] img').attr('src', src_thumb).removeAttr('srcset');
                        if ($('body').hasClass('nasa-focus-main-image')) {
                            if ($('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"]').length) {
                                $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"]').trigger('click');
                            }
                        }

                        if ($('.nasa-thumb-clone img').length) {
                            $('.nasa-thumb-clone img').attr('src', src_thumb);
                        }
                    }
                }

                else if ($('.nasa-thumb-clone img').length && _src_large) {
                    $('.nasa-thumb-clone img').attr('src', _src_large);
                }
                
                if ($('body').hasClass('nasa-focus-main-image') && $('.product-thumbnails').length <= 0) {
                    var _main_slide = $('.main-images');
                    $('body').trigger('slick_go_to_0', [_main_slide]);
                }
            }
        }

    } else {
        /**
         * Support Bundle product
         */
        if ($('.nasa-product-details-page .woosb-product').length) {
            $(_form).parents('.woosb-product').find('.woosb-thumb-ori').show();
            $(_form).parents('.woosb-product').find('.woosb-thumb-new').hide();
        } else {
            var image_link = typeof $('.nasa-product-details-page .woocommerce-main-image').attr('data-full_href') !== 'undefined' ?
                $('.nasa-product-details-page .woocommerce-main-image').attr('data-full_href') :
                $('.nasa-product-details-page .woocommerce-main-image').attr('data-o_href');
            var image_large = $('.nasa-product-details-page .woocommerce-main-image').attr('data-o_href');

            $('.main-images .nasa-item-main-image-wrap[data-key="0"] img').attr('src', image_large).removeAttr('srcset');
            $('.main-images .nasa-item-main-image-wrap[data-key="0"] a').attr('href', image_link);

            /**
             * Trigger Easy Zoom
             */
            $('body').trigger('nasa_after_changed_src_main_img', [image_large, image_link]);

            if ($('.product-thumbnails').length) {
                var thumb_wrap = $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"]');
                if (typeof $(thumb_wrap).attr('data-thumb_org') === 'undefined') {
                    $(thumb_wrap).attr('data-thumb_org', $(thumb_wrap).find('img').attr('src'));
                }

                var src_thumb = $(thumb_wrap).attr('data-thumb_org');
                if (src_thumb) {
                    $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"] img').attr('src', src_thumb);
                    if ($('body').hasClass('nasa-focus-main-image')) {
                        if ($('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"]').length) {
                            $('.product-thumbnails .nasa-wrap-item-thumb[data-key="0"]').trigger('click');
                        }
                    }

                    if ($('.nasa-thumb-clone img').length) {
                        $('.nasa-thumb-clone img').attr('src', src_thumb);
                    }
                }
            } else if ($('.nasa-thumb-clone img').length && image_large) {
                $('.nasa-thumb-clone img').attr('src', image_large);
            }
            
            if ($('body').hasClass('nasa-focus-main-image') && $('.product-thumbnails').length <= 0) {
                var _main_slide = $('.main-images');
                $('body').trigger('slick_go_to_0', [_main_slide]);
            }
        }
    }

    /**
     * Deal time
     */
    if ($('.nasa-detail-product-deal-countdown').length) {
        $('.nasa-detail-product-deal-countdown').html('');
        $('.nasa-detail-product-deal-countdown').removeClass('nasa-show');
        
        if ($('.nasa-detail-product-deal-countdown-label').length && !$('.nasa-detail-product-deal-countdown-label').hasClass('hidden-tag')) {
            $('.nasa-detail-product-deal-countdown-label').addClass('hidden-tag');
        }
        
        if (variation && variation.variation_id && variation.is_in_stock && variation.is_purchasable) {
            var now = Date.now();
            
            if (typeof variation.deal_time !== 'undefined' && variation.deal_time && variation.deal_time.html && variation.deal_time.to > now && (typeof variation.deal_time.from === 'undefined' || variation.deal_time.from < now)) {
                $('.nasa-detail-product-deal-countdown').html(variation.deal_time.html);
                
                $('body').trigger('nasa_load_countdown');
                
                if (!$('.nasa-detail-product-deal-countdown').hasClass('nasa-show')) {
                    $('.nasa-detail-product-deal-countdown').addClass('nasa-show');
                }

                $('.nasa-detail-product-deal-countdown-label').removeClass('hidden-tag');
            }
        }
    }
}

/**
 * Found variation
 * 
 * @param {type} $
 * @returns {undefined}
 */
function nasa_single_product_found_variation($) {
    $('.nasa-product-details-page .variations_form').on('found_variation', function(e, variation) {
        var _form = $(this);
        
        if ($('.nasa-product-details-page .nasa-gallery-variation-supported').length) {
            change_gallery_variable_single_product($, _form, variation);
        } else {
            setTimeout(function() {
                load_gallery_popup($);
                change_image_variable_single_product($, _form, variation);
            }, 10);
        }
        
        /**
         * Badge Out-of-stock
         */
        if ($('.focus-info .out-of-stock-label').length) {
            if ($('.woocommerce-variation-availability .out-of-stock').length <= 0) {
                $('.focus-info .out-of-stock-label').hide();
            } else {
                $('.focus-info .out-of-stock-label').show();
            }
        }
    });
}

/**
 * Found variation
 * 
 * @param {type} $
 * @returns {undefined}
 */
function nasa_single_product_reset_variation_df($) {
    $('.nasa-product-details-page form.variations_form').on('reset_data', function() {
        var _form = $(this);
        if ($('.nasa-product-details-page .nasa-gallery-variation-supported').length) {
            change_gallery_variable_single_product($, _form, null);
        } else {
            setTimeout(function() {
                load_gallery_popup($);
                change_image_variable_single_product($, _form, null);
            }, 10);
        }
        
        /**
         * Badge Out-of-stock
         */
        if ($('.focus-info .out-of-stock-label').length) {
            $('.focus-info .out-of-stock-label').show();
        }
    });
}

/**
 * Scroll Single Product sticky info and thumbnails
 * 
 * @param {type} $
 * @returns {Array|load_scroll_single_product._main_images}
 */
function load_scroll_single_product($) {
    var _main_images = [];
    var _responsive = $('.nasa-check-reponsive.nasa-switch-check').length && $('.nasa-check-reponsive.nasa-switch-check').width() === 1 ? true : false;
    var _inMobile = $('body').hasClass('nasa-in-mobile') ? true : false;
    if (!_responsive && !_inMobile && $('.nasa-single-product-scroll').length) {        
        $('.nasa-item-main-image-wrap').each(function() {
            var p = {
                key: $(this).attr('data-key'),
                pos: $(this).offset().top
            };
            
            _main_images.push(p);
        });
    }
    
    return _main_images;
}

/**
 * Sticky Add to cart
 * 
 * @param {type} $
 * @returns {undefined}
 */
function load_sticky_add_to_cart($) {
    if (
        $('input[name="nasa_fixed_single_add_to_cart"]').length &&
        $('.nasa-product-details-page').length
    ) {
        var _nasa_in_mobile = $('body').hasClass('nasa-in-mobile') ? true : false;

        var _mobile_fixed_addToCart = 'no';
        if ($('input[name="nasa_fixed_mobile_single_add_to_cart_layout"]').length) {
            _mobile_fixed_addToCart = $('input[name="nasa_fixed_mobile_single_add_to_cart_layout"]').val();
        }
        var _can_render = true;
        if (_nasa_in_mobile && (_mobile_fixed_addToCart === 'no' || _mobile_fixed_addToCart === 'btn')) {
            _can_render = false;
            $('body').addClass('nasa-cart-fixed-desktop');
        }
        if (_mobile_fixed_addToCart === 'btn') {
            $('body').addClass('nasa-cart-fixed-mobile-btn');

            if ($('.nasa-buy-now').length) {
                $('body').addClass('nasa-has-buy-now');
            }
        }
        
        if (_nasa_in_mobile && _mobile_fixed_addToCart === 'no') {
            $('body').removeClass('has-nasa-cart-fixed');
        }

        /**
         * Render in desktop
         */
        if (_can_render && $('.nasa-add-to-cart-fixed').length <= 0) {
            $('body').append('<div class="nasa-add-to-cart-fixed"><div class="nasa-wrap-content-inner"><div class="nasa-wrap-content"></div></div></div>');

            if (_mobile_fixed_addToCart === 'no' || _mobile_fixed_addToCart === 'btn') {
                $('.nasa-add-to-cart-fixed').addClass('nasa-not-show-mobile');
                $('body').addClass('nasa-cart-fixed-desktop');
            }

            var _addToCartWrap = $('.nasa-add-to-cart-fixed .nasa-wrap-content');

            /**
             * Main Image clone
             */
            $(_addToCartWrap).append('<div class="nasa-fixed-product-info"></div>');
            var _src = '';
            
            if ($('.nasa-product-details-page .product-thumbnails').length) {
                _src = $('.nasa-product-details-page .product-thumbnails .nasa-wrap-item-thumb[data-key="0"]').attr('data-thumb_org') || $('.nasa-product-details-page .product-thumbnails .nasa-wrap-item-thumb[data-key="0"] img').attr('src');
            } else {
                _src = $('.nasa-product-details-page .main-images .item-wrap.first a.product-image').attr('data-o_href') || $('.nasa-product-details-page .main-images .item-wrap.first img').attr('src');
            }

            if (_src !== '') {
                $('.nasa-fixed-product-info').append('<div class="nasa-thumb-clone"><img src="' + _src + '" /></div>');
            }

            /**
             * Title clone
             */
            if ($('.nasa-product-details-page .product-info .product_title').length) {
                var _title = $('.nasa-product-details-page .product-info .product_title').html();

                $('.nasa-fixed-product-info').append('<div class="nasa-title-clone"><h3>' + _title +'</h3></div>');
            }

            /**
             * Price clone
             */
            if ($('.nasa-product-details-page .product-info .price.nasa-single-product-price').length) {
                var _price = $('.nasa-product-details-page .product-info .price.nasa-single-product-price').html();
                if ($('.nasa-title-clone').length) {
                    $('.nasa-title-clone').append('<span class="price">' + _price + '</span>');
                }
                else {
                    $('.nasa-fixed-product-info').append('<div class="nasa-title-clone"><span class="price">' + _price + '</span></div>');
                }
            }

            /**
             * Variations clone
             */
            if ($('.nasa-product-details-page .variations_form').length) {
                $(_addToCartWrap).append('<div class="nasa-fixed-product-variations-wrap"><div class="nasa-fixed-product-variations"></div><a class="nasa-close-wrap" href="javascript:void(0);"></a></div>');

                /**
                 * Variations
                 * 
                 * @type type
                 */
                var _k = 1,
                    _item = 1;
                $('.nasa-product-details-page .variations_form .variations .value').each(function() {
                    var _this = $(this);
                    var _classWrap = 'nasa-attr-wrap-' + _k.toString();
                    var _type = $(_this).find('select').attr('data-attribute_name') || $(_this).find('select').attr('name');

                    if ($(_this).find('.nasa-attr-ux_wrap').length) {
                        $('.nasa-fixed-product-variations').append('<div class="nasa-attr-ux_wrap-clone ' + _classWrap + '"></div>');

                        $(_this).find('.nasa-attr-ux').each(function() {
                            var _obj = $(this);
                            var _classItem = 'nasa-attr-ux-' + _item.toString();
                            var _classItemClone = 'nasa-attr-ux-clone-' + _item.toString();
                            var _classItemClone_target = _classItemClone;

                            if ($(_obj).hasClass('nasa-attr-ux-image')) {
                                _classItemClone += ' nasa-attr-ux-image-clone';
                            }

                            if ($(_obj).hasClass('nasa-attr-ux-color')) {
                                _classItemClone += ' nasa-attr-ux-color-clone';
                            }

                            if ($(_obj).hasClass('nasa-attr-ux-label')) {
                                _classItemClone += ' nasa-attr-ux-label-clone';
                            }

                            var _selected = $(_obj).hasClass('selected') ? ' selected' : '';
                            var _contentItem = $(_obj).html();

                            $(_obj).addClass(_classItem);
                            $(_obj).attr('data-target', '.' + _classItemClone_target);

                            $('.nasa-attr-ux_wrap-clone.' + _classWrap).append('<a href="javascript:void(0);" class="nasa-attr-ux-clone' + _selected + ' ' + _classItemClone + ' nasa-' + _type + '" data-target=".' + _classItem + '">' + _contentItem + '</a>');

                            _item++;
                        });
                    } else {
                        $('.nasa-fixed-product-variations').append('<div class="nasa-attr-select_wrap-clone ' + _classWrap + '"></div>');

                        var _obj = $(_this).find('select');

                        var _label = $(_this).find('.label').length ? $(_this).find('.label').html() : '';

                        var _classItem = 'nasa-attr-select-' + _item.toString();
                        var _classItemClone = 'nasa-attr-select-clone-' + _item.toString();

                        var _contentItem = $(_obj).html();

                        $(_obj).addClass(_classItem).addClass('nasa-attr-select');
                        $(_obj).attr('data-target', '.' + _classItemClone);

                        $('.nasa-attr-select_wrap-clone.' + _classWrap).append(_label + '<select name="' + _type + '" class="nasa-attr-select-clone ' + _classItemClone + ' nasa-' + _type + '" data-target=".' + _classItem + '">' + _contentItem + '</select>');

                        _item++;
                    }

                    _k++;
                });
            }
            /**
             * Class wrap simple product
             */
            else {
                $(_addToCartWrap).addClass('nasa-fixed-single-simple');
            }

            /**
             * Add to cart button
             */
            setTimeout(function() {
                var _button_wrap = nasa_clone_add_to_cart($);
                $(_addToCartWrap).append('<div class="nasa-fixed-product-btn"></div>');
                $('.nasa-fixed-product-btn').html(_button_wrap);
                var _val = $('.nasa-product-details-page form.cart input[name="quantity"]').val();
                $('.nasa-single-btn-clone input[name="quantity"]').val(_val);
            }, 250);

            setTimeout(function() {
                if ($('.nasa-attr-ux').length) {
                    $('.nasa-attr-ux').each(function() {
                        var _this = $(this);
                        var _targetThis = $(_this).attr('data-target');

                        if ($(_targetThis).length) {
                            var _disable = $(_this).hasClass('nasa-disable') ? true : false;
                            if (_disable) {
                                if (!$(_targetThis).hasClass('nasa-disable')) {
                                    $(_targetThis).addClass('nasa-disable');
                                }
                            } else {
                                $(_targetThis).removeClass('nasa-disable');
                            }
                        }
                    });
                }
            }, 550);
        }
    }
}
