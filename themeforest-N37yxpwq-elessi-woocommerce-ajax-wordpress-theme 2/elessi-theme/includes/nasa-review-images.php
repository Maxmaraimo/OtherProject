<?php
defined('ABSPATH') || exit;

$attachment_ids = get_comment_meta($comment->comment_ID, 'nasa_review_images', true);

if (!empty($attachment_ids)) : ?>
    <div class="nasa-wrap-review-thumb nasa-flex" id="nasa-wrap-review-<?php echo esc_attr($comment->comment_ID); ?>">
        
        <?php foreach ($attachment_ids as $attachment_id) :
            $image = wp_get_attachment_image($attachment_id, apply_filters('nasa_reivew_product_thumbnail_size', 'thumbnail'), false, array('class' => 'skip-lazy attachment-thumbnail size-thumbnail'));
            if ($image) :
                $url = wp_get_attachment_image_url($attachment_id, 'full');
                ?>
                <a title="<?php echo esc_attr__('Review Product by Images', 'elessi-theme'); ?>" class="nasa-item-review-thumb" href="<?php echo esc_url($url); ?>">
                    <?php echo apply_filters('nasa_reivew_product_thumbnail_html', $image, $attachment_id); ?>
                    <span class="svg-wrap">
                        <svg fill="currentColor" width="18" height="18" viewBox="0 0 32 32">
                            <path d="M11.202 4.271v-1.066h-7.997v7.997h1.066v-6.177l7.588 7.588 0.754-0.754-7.588-7.588z"/>
                            <path d="M20.798 3.205v1.066h6.177l-7.588 7.588 0.754 0.754 7.588-7.588v6.177h1.066v-7.997z"/>
                            <path d="M11.859 19.387l-7.588 7.588v-6.177h-1.066v7.997h7.997v-1.066h-6.177l7.588-7.588z"/>
                            <path d="M27.729 26.975l-7.588-7.588-0.754 0.754 7.588 7.588h-6.177v1.066h7.997v-7.997h-1.066z"/>
                        </svg>
                    </span>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
<?php
endif;
