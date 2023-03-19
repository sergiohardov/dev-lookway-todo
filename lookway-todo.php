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
    static function activation()
    {
        flush_rewrite_rules();
    }

    static function deactivation()
    {
        flush_rewrite_rules();
    }
}

$Lookway_Todo = new Lookway_Todo();

register_activation_hook(__FILE__, [$Lookway_Todo, 'activation']);
register_deactivation_hook(__FILE__, [$Lookway_Todo, 'deactivation']);
