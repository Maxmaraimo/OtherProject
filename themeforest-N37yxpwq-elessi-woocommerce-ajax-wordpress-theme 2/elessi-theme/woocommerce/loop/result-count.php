<?php

/**
 * Result Count.
 *
 * @author  NasaTheme
 * @package Elessi-theme/WooCommerce
 * @version 3.7.0
 */
if (!defined('ABSPATH')) :
    exit; // Exit if accessed directly
endif;
?>
<p class="woocommerce-result-count">
    <?php
    if ($total <= $per_page || -1 === $per_page) :
        echo $total == 1 ? sprintf(esc_html__('%s result', 'elessi-theme'), $total) : sprintf(esc_html__('%s results', 'elessi-theme'), $total);
    else :
        $first = ($per_page * $current) - $per_page + 1;
        $last = min($total, $per_page * $current);
        $total = $last - $first + 1;
        
        echo $total == 1 ? sprintf(esc_html__('%s result', 'elessi-theme'), $total) : sprintf(esc_html__('%s results', 'elessi-theme'), $total);
    endif;
    ?>
</p>
