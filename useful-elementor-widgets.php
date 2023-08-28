<?php

/*
 * Plugin Name:       Useful Elementor Widgets
 * Plugin URI:        https://www.admirecreation.com
 * Description:       This Plugin will provides custom elementor widgets.
 * Version:           1.0.0
 * Requires at least: 6.1
 * Requires PHP:      7.2
 * Author:            Admire Creations
 * Author URI:        https://www.admirecreation.com
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.en.html
 * Update URI:        https://www.admirecreation.com
 * Text Domain:       admire-widgets
 * 
 * Elementor tested up to: 3.15.0
 * Elementor pro tested  up to: 3.15.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register Video Card Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */

function register_widgets($widgets_manager)
{

    require_once(__DIR__ . '/widgets/video-card-widget.php');
    require_once(__DIR__ . '/widgets/text-editor.php');

    $widgets_manager->register(new \Elementor_Video_Card_Widget());
    $widgets_manager->register(new \Widget_Text_Editor());
}
add_action('elementor/widgets/register', 'register_widgets');


/**
 * Register Custom Category For Admire Widgets.
 *
 * Create a new widget class for all the widgets.
 *
 * @since 1.0.0
 * @param  $elements_manager.
 * @return void
 */
function add_elementor_widget_categories($elements_manager)
{

    $elements_manager->add_category(
        'admire',
        [
            'title' => esc_html__('Useful Widgets', 'admire_widgets'),
            'icon' => 'fa fa-hand-peace-o',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');
