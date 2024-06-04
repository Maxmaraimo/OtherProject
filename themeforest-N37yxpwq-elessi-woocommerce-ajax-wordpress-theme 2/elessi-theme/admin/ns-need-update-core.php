<?php
defined('ABSPATH') or die(); // Exit if accessed directly

global $tgmpa;

if (!isset($tgmpa)) {
    if (!class_exists('TGM_Plugin_Activation')) {
        require_once ELESSI_ADMIN_PATH . 'classes/class-tgm-plugin-activation.php';
    }
    
    $tgmpa = TGM_Plugin_Activation::get_instance();
}

$nonce_url = wp_nonce_url(
    add_query_arg(
        array(
            'plugin' => urlencode('nasa-core'),
            'tgmpa-update' => 'update-plugin',
        ),
        $tgmpa->get_tgmpa_url()
    ),
    'tgmpa-update',
    'tgmpa-nonce'
);
?>
<div class="ns-need-update-core-notice ns-show-less-wrap">
    <span class="ns-ct-notices red-color">Your site needs to be updated for Nasa Core Plugin to the latest version, Click <a href="<?php echo esc_url($nonce_url); ?>">Here</a> to update - Never mind, It's completely free.</span>
    
    <p>For the best website performance, please update the Nasa Core plugin to the latest version now: <a href="<?php echo esc_url($nonce_url); ?>"><strong class="red-color">v<?php echo elessi_latest_nasa_core_version(); ?></strong></a></p>
    
    <a href="javascript:void(0);" class="ns-show-less nasa-flex"><svg fill="currentColor" width="30" height="30" viewBox="0 0 100 100"><g><path d="M78.466,35.559L50.15,63.633L22.078,35.317c-0.777-0.785-2.044-0.789-2.828-0.012s-0.789,2.044-0.012,2.827L48.432,67.58   c0.365,0.368,0.835,0.563,1.312,0.589c0.139,0.008,0.278-0.001,0.415-0.021c0.054,0.008,0.106,0.021,0.16,0.022   c0.544,0.029,1.099-0.162,1.515-0.576l29.447-29.196c0.785-0.777,0.79-2.043,0.012-2.828S79.249,34.781,78.466,35.559z"/></g></svg></a>
</div>
