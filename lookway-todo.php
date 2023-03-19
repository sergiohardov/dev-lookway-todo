<?php

/**
 * Plugin Name: Lookway ToDo
 * Description: Plugin for tasks.
 * Version: 1.0
 * Author: Sergio Hardov
 * Author URI: https://t.me/sergiohardov
 * License: GPLv2 or later
 * Text Domain: lookway-todo
 * Domain Path: /lang
 */

if (!defined('ABSPATH')) die;

// Defines
define('LOOKWAY_TODO_PATH', plugin_dir_path(__FILE__));
define('LOOKWAY_TODO_URL', plugins_url('', __FILE__));
define('LOOKWAY_TODO_MAIN_PAGE_SLUG', 'lookway_todo_plugin_main_page');

// Classes
require LOOKWAY_TODO_PATH . 'inc/class-lookway-todo-custom-post-types.php';
require LOOKWAY_TODO_PATH . 'inc/class-lookway-todo-controls.php';
require LOOKWAY_TODO_PATH . 'inc/class-lookway-todo-handler.php';
require LOOKWAY_TODO_PATH . 'inc/class-lookway-todo-template-loader.php';

// Main Class
class Lookway_Todo
{
    public function __construct()
    {
        // Add link on plugin page in admin sidebar
        add_action('admin_menu', [$this, 'plugin_link_menu']);

        // Enqueue styles & scripts
        add_action('admin_enqueue_scripts', [$this, 'enqueue_styles_scripts']);
    }

    static function activation()
    {
        flush_rewrite_rules();
    }

    static function deactivation()
    {
        flush_rewrite_rules();
    }

    public function plugin_main_page()
    {
        require_once LOOKWAY_TODO_PATH . 'admin/index.php';
    }

    public function plugin_link_menu()
    {
        add_menu_page(
            esc_html__('Lookway ToDo Page', 'lookway-todo'),
            esc_html__('Lookway ToDo', 'lookway-todo'),
            'manage_options',
            LOOKWAY_TODO_MAIN_PAGE_SLUG,
            [$this, 'plugin_main_page'],
            'dashicons-admin-plugins',
            100
        );
    }

    public function enqueue_styles_scripts()
    {
        $screen = get_current_screen();

        if ($screen->id === 'toplevel_page_' . LOOKWAY_TODO_MAIN_PAGE_SLUG) {
            // Enqueue styles
            wp_enqueue_style('lookway-todo-bootstrap', LOOKWAY_TODO_URL . '/libs/bootstrap/bootstrap.min.css');
            wp_enqueue_style('lookway-todo-style', LOOKWAY_TODO_URL . '/assets/css/style.css');

            // Enqueue scripts
            wp_enqueue_script('lookway-todo-bootstrap', LOOKWAY_TODO_URL . '/libs/bootstrap/bootstrap.min.js', '', '', true);
        }
    }
}

$Lookway_Todo = new Lookway_Todo();

register_activation_hook(__FILE__, [$Lookway_Todo, 'activation']);
register_deactivation_hook(__FILE__, [$Lookway_Todo, 'deactivation']);
