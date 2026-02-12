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

// plugin function
require_once(__DIR__ . '/include/kindaid-core-helper.php');

// wp custom widget
function register_kindaid_elementor_widget($widgets_manager)
{
    require_once(__DIR__ . '/widgets/kindaid_Blog_Post.php');
    require_once(__DIR__ . '/widgets/kindaid_hero.php');
    require_once(__DIR__ . '/widgets/kindaid_facts.php');
    require_once(__DIR__ . '/widgets/kindaid_services_list.php');
    require_once(__DIR__ . '/widgets/Kindaid_Community.php');
    require_once(__DIR__ . '/widgets/Kindaid_Faq.php');
    require_once(__DIR__ . '/widgets/Kindaid_Team_Section.php');
    require_once(__DIR__ . '/widgets/Kindaid_Work_Info.php');
    require_once(__DIR__ . '/widgets/Kindaid_Call_Us.php');
}
add_action('elementor/widgets/register', 'register_kindaid_elementor_widget');

// Elementor custom category
function kindaid_elementor_widget_categories($elements_manager)
{
    $elements_manager->add_category(
        'kindaid-core',
        [
            'title' => esc_html__('Kindaid Core', 'textdomain'),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'kindaid_elementor_widget_categories');
