<?php
/**
 * Change view Layout
 * Archive Products page
 */

if (!defined('ABSPATH')) :
    exit; // Exit if accessed directly
endif;

$type_view = !isset($nasa_opt['products_type_view']) ?
    'grid' : ($nasa_opt['products_type_view'] == 'list' ? 'list' : 'grid');

$products_per_row = isset($nasa_opt['products_per_row']) && in_array($nasa_opt['products_per_row'], array(2, 3, 4, 5, 6)) ? $nasa_opt['products_per_row'] : 4;

$type_show = $type_view == 'grid' ? ($type_view . '-' . $products_per_row) : 'list';
$setup = $type_show;

if (isset($_GET['view-layout']) && in_array($_GET['view-layout'], array('grid-2', 'grid-3', 'grid-4', 'grid-5', 'grid-6', 'list'))) {
    $type_show = $_GET['view-layout'];
}

$classic = in_array($nasa_sidebar, array('left-classic', 'right-classic', 'top-push-cat'));
echo $classic ? '<input type="hidden" name="nasa-data-sidebar" value="' . esc_attr($nasa_sidebar) . '" />' : '';

$col_2 = isset($nasa_opt['option_2_cols']) && $nasa_opt['option_2_cols'] ? true : false;
$col_6 = isset($nasa_opt['option_6_cols']) && $nasa_opt['option_6_cols'] ? true : false;
$class_wrap = 'filter-tabs nasa-change-view';
$number_view = $col_2 || $col_6 ? true : false;
$class_wrap .= $number_view ? ' nasa-show-number' : '';

$list_view = isset($nasa_opt['products_layout_style']) && $nasa_opt['products_layout_style'] == 'masonry-isotope' ? false : true;
?>
<div class="<?php echo $class_wrap; ?>">
    <?php if ($number_view) : ?>
        <span class="nasa-label-change-view margin-right-10 rtl-margin-right-0 rtl-margin-left-10 nasa-bold-700">
            <?php echo esc_html__('See', 'elessi-theme'); ?>
        </span>
    <?php endif; ?>

    <?php if (isset($nasa_opt['option_6_cols']) && $nasa_opt['option_6_cols']) : ?>
        <a href="javascript:void(0);" class="nasa-change-layout productGrid grid-6<?php echo ($type_show == 'grid-6') ? ' active' : ''; ?><?php echo ($setup == 'grid-6') ? ' df' : ''; ?>" data-value="grid-6" data-columns="6" rel="nofollow">
            <span class="nasa-text-number hidden-tag">
                <?php echo esc_html__('6', 'elessi-theme'); ?>
            </span>
        </a>
    <?php endif; ?>

    <a href="javascript:void(0);" class="nasa-change-layout productGrid grid-5<?php echo ($type_show == 'grid-5') ? ' active' : ''; ?><?php echo ($setup == 'grid-5') ? ' df' : ''; ?>" data-columns="5" rel="nofollow">
        <?php if ($number_view) : ?>
            <span class="nasa-text-number hidden-tag">
                <?php echo esc_html__('5', 'elessi-theme'); ?>
            </span>
        <?php endif; ?>

        <svg width="22" height="22" viewBox="0 0 512 512" fill="currentColor">
            <path d="M203 53l0 408-67 0 0-410 67 0z m-86-2l0 410-67 0 0-410c0 0 67 0 67 0z m174 2l0 409-69 0 0-409z m87 0l0 409-69 0 0-409z m88 0l0 409-69 0 0-409z"/>
        </svg>
        <?php /*i class="icon-nasa-5column"></i */?>
    </a>

    <a href="javascript:void(0);" class="nasa-change-layout productGrid grid-4<?php echo ($type_show == 'grid-4') ? ' active' : ''; ?><?php echo ($setup == 'grid-4') ? ' df' : ''; ?>" data-columns="4" rel="nofollow">
        <?php if ($number_view) : ?>
            <span class="nasa-text-number hidden-tag">
                <?php echo esc_html__('4', 'elessi-theme'); ?>
            </span>
        <?php endif; ?>

        <svg width="22" height="22" viewBox="0 0 512 512" fill="currentColor">
            <path d="M250 53l0 408-69 0 0-410 69 0z m-87-2l0 410-69 0 0-410c0 0 69 0 69 0z m173 2l0 409-69 0 0-409z m86 0l0 409-68 0 0-409z"/>
        </svg>
        <?php /*i class="icon-nasa-4column"></i */?>
    </a>

    <a href="javascript:void(0);" class="nasa-change-layout productGrid grid-3<?php echo ($type_show == 'grid-3') ? ' active' : ''; ?><?php echo ($setup == 'grid-3') ? ' df' : ''; ?>" data-columns="3" rel="nofollow">
        <?php if ($number_view) : ?>
            <span class="nasa-text-number hidden-tag">
                <?php echo esc_html__('3', 'elessi-theme'); ?>
            </span>
        <?php endif; ?>

        <svg width="22" height="22" viewBox="0 0 512 512" fill="currentColor">
            <path d="M298 53l0 408-69 0 0-410 69 0z m-87 0l0 408-69 0 0-410 69 0z m173 0l0 409-69 0 0-409z"/>
        </svg>
        <?php /*i class="icon-nasa-3column"></i */?>
    </a>

    <?php if (isset($nasa_opt['option_2_cols']) && $nasa_opt['option_2_cols']) : ?>
        <a href="javascript:void(0);" class="nasa-change-layout productGrid grid-2<?php echo ($type_show == 'grid-2') ? ' active' : ''; ?><?php echo ($setup == 'grid-2') ? ' df' : ''; ?>" data-columns="2" rel="nofollow">
            <?php if ($number_view) : ?>
                <span class="nasa-text-number hidden-tag">
                    <?php echo esc_html__('2', 'elessi-theme'); ?>
                </span>
            <?php endif; ?>
            
            <svg width="22" height="22" viewBox="0 0 512 512" fill="currentColor">
                <path d="M333 53l0 408-67 0 0-410 67 0z m-87-2l0 410-67 0 0-410c0 0 67 0 67 0z"/>
            </svg>
            <?php /*i class="icon-nasa-2column"></i */?>
        </a>
    <?php endif; ?>

    <?php if ($list_view) : ?>
        <a href="javascript:void(0);" class="nasa-change-layout productList list<?php echo ($type_show == 'list') ? ' active' : ''; ?><?php echo ($setup == 'list') ? ' df' : ''; ?>" data-columns="1" rel="nofollow">
            <?php if ($number_view) : ?>
                <span class="nasa-text-number hidden-tag">
                    <?php echo esc_html__('List', 'elessi-theme'); ?>
                </span>
            <?php endif; ?>

            <svg width="22" height="22" viewBox="0 0 512 512" fill="currentColor">
                <path d="M462 202l-300 0 0-68 302 0z m0-87l-300 0 0-67 302 0c0 0 0 67-2 67z m0 175l-300 0 0-69 300 0z m0 86l-300 0 0-69 300 0z m0 88l-300 0 0-69 300 0z m-321-262l-88 0 0-68 88 0z m0-87l-88 0 0-67 88 0c0 0 0 67 0 67z m0 175l-90 0 0-69 88 0 0 69z m0 86l-90 0 0-69 88 0 0 69z m0 88l-90 0 0-69 88 0 0 69z"/>
            </svg>
            <?php /* i class="icon-nasa-list"></i */?>
        </a>
    <?php endif; ?>
</div>
