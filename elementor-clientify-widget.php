<?php
/*
Plugin Name: Form Clientify
Description: Un widget personalizado de Elementor para incrustar formularios de Clientify sin problemas.
Version: 0.0.1
Author: Yasiel Hernández Portal
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function add_elementor_widget_categories($elements_manager) {
    $elements_manager->add_category(
        'clientify-forms',
        [
            'title' => 'Clientify Forms',
            'icon' => 'fa fa-plug', // Consider updating this icon if needed
        ]
    );
}

add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');

function register_clientify_widget($widgets_manager) {
    require_once(__DIR__ . '/widgets/clientify-widget.php');
    $widgets_manager->register(new \Elementor_Clientify_Widget());
}

add_action('elementor/widgets/register', 'register_clientify_widget');
