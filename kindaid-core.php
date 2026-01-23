<?php

/**
 * Plugin Name: KindAid Elementor Addon
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.33.5
 * Elementor Pro tested up to: 3.25.0
 */
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once(__DIR__ . '/include/kindaid-core-helper.php');

function register_kindaid_elementor_widget($widgets_manager)
{
    require_once(__DIR__ . '/widgets/kindaid_hero.php');
    require_once(__DIR__ . '/widgets/kindaid_facts.php');
}
add_action('elementor/widgets/register', 'register_kindaid_elementor_widget');
