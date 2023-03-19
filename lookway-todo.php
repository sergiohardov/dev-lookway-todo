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

define('LOOKWAY_TODO_PATH', plugin_dir_path(__FILE__));

class Lookway_Todo
{
    public function __construct()
    {
        // Add link on plugin page in admin sidebar
        add_action('admin_menu', [$this, 'plugin_link_menu']);
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
            'lookway_todo_plugin_main_page',
            [$this, 'plugin_main_page'],
            'dashicons-admin-plugins',
            100
        );
    }
}

$Lookway_Todo = new Lookway_Todo();

register_activation_hook(__FILE__, [$Lookway_Todo, 'activation']);
register_deactivation_hook(__FILE__, [$Lookway_Todo, 'deactivation']);
