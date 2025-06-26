<?php
/**
 * Plugin Name: FunnelCraft GOD MODE
 * Description: Visual funnel builder with drag & drop powered by Elementor integration.
 * Version: 0.1.0
 * Author: viniarte
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class FunnelCraft_God_Mode {
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'register_admin_page' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
        add_action( 'elementor/init', [ $this, 'elementor_init' ] );
    }

    public function register_admin_page() {
        add_menu_page( 'FunnelCraft', 'FunnelCraft', 'manage_options', 'funnelcraft', [ $this, 'builder_page' ] );
    }

    public function builder_page() {
        echo '<div id="funnelcraft-builder" class="wrap"><h1>FunnelCraft Builder</h1></div>';
    }

    public function enqueue_assets( $hook ) {
        if ( $hook !== 'toplevel_page_funnelcraft' ) {
            return;
        }
        // Tailwind via CDN for prototype.
        wp_enqueue_style( 'funnelcraft-tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css' );
        wp_enqueue_style( 'funnelcraft-builder', plugins_url( 'assets/css/builder.css', __FILE__ ), [], '0.1.0' );
        wp_enqueue_script( 'funnelcraft-builder', plugins_url( 'assets/js/builder.js', __FILE__ ), [ 'jquery' ], '0.1.0', true );
    }

    public function elementor_init() {
        // Placeholder for Elementor widgets registration.
    }
}

new FunnelCraft_God_Mode();
