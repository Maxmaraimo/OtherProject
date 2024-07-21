<?php
/**
 * Sidebar Shop - Top
 * Archive Products page
 */

if (!defined('ABSPATH')) :
    exit; // Exit if accessed directly
endif;

$type_top = !isset($type) || !$type ? '1' : $type;
$class = 'nasa-relative hidden-tag';
$class .= $type_top == '1' ? ' large-12 columns nasa-top-sidebar' : ' nasa-top-sidebar-' . $type_top;

$attributes = '';
if ($type_top == '2') :
    $attributes .= ' data-columns="' . apply_filters('nasa_top_bar_2_cols', '4') . '"';
    $attributes .= ' data-columns-small="' . apply_filters('nasa_top_bar_2_cols_small', '2') . '"';
    $attributes .= ' data-columns-tablet="' . apply_filters('nasa_top_bar_2_cols_medium', '3') . '"';
    $attributes .= ' data-switch-tablet="' . elessi_switch_tablet() . '"';
    $attributes .= ' data-switch-desktop="' . elessi_switch_desktop() . '"';
endif;

$sidebar_run = 'shop-sidebar';

if (is_tax('product_cat')) :
    global $wp_query;
    
    $query_obj = $wp_query->get_queried_object();
    $sidebar_cats = get_option('nasa_sidebars_cats');

    if (isset($sidebar_cats[$query_obj->slug])) :
        $sidebar_run = $query_obj->slug;
    else :
        $nasa_root_term_id = elessi_get_root_term_id();

        if ($nasa_root_term_id) :
            $root_term = get_term_by('term_id', $nasa_root_term_id, 'product_cat');
            
            if ($root_term && isset($sidebar_cats[$root_term->slug])) :
                $sidebar_run = $root_term->slug;
            endif;
        endif;
    endif;
endif;

if (is_active_sidebar($sidebar_run)) : ?>
    <div class="<?php echo esc_attr($class); ?>"<?php echo $attributes; ?>>
        <?php if ($type_top == '1') : ?>
            <span class="nasa-close-sidebar-wrap hidden-tag">
                <span class="ns-sidebar-heading hidden-tag nasa-bold fs-22">
                    <?php echo esc_html__('Filters', 'elessi-theme'); ?>
                </span>
                
                <a href="javascript:void(0);" title="<?php echo esc_attr__('Close', 'elessi-theme'); ?>" class="hidden-tag nasa-close-sidebar" rel="nofollow">
                    <svg class="nasa-rotate-180" width="15" height="15" viewBox="0 0 512 512" fill="currentColor"><path d="M135 512c3 0 4 0 6 0 15-4 26-21 40-33 62-61 122-122 187-183 9-9 27-24 29-33 3-14-8-23-17-32-67-66-135-131-202-198-11-9-24-27-33-29-18-4-28 8-31 21 0 0 0 2 0 2 1 1 1 6 3 10 3 8 18 20 27 28 47 47 95 93 141 139 19 18 39 36 55 55-62 64-134 129-199 193-8 9-24 21-26 32-3 18 8 24 20 28z"></path></svg>
                </a>
            </span>
        <?php endif; ?>

        <?php dynamic_sidebar($sidebar_run); ?>
    </div>

<?php
endif;
