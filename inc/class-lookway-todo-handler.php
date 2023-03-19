<?php

class Lookway_Todo_Handler
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_script']);
        add_action('wp_ajax_create_new_task', [$this, 'ajax_create_new_task']);
        add_action('wp_ajax_delete_all_task', [$this, 'ajax_delete_all_task']);
    }

    public function enqueue_script()
    {
        wp_enqueue_script('lookway-todo-controlls', LOOKWAY_TODO_URL . '/assets/js/controlls.js', '', '', true);

        wp_localize_script('lookway-todo-controlls', 'todo_controlls_obj', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('_wpnonce'),
        ]);
    }

    public function ajax_create_new_task()
    {
        check_ajax_referer('_wpnonce', 'nonce');

        if (!empty($_POST)) {

            if (isset($_POST['title'])) {
                $title = sanitize_text_field($_POST['title']);
            }

            if (isset($_POST['desc'])) {
                $desc = sanitize_text_field($_POST['desc']);
            }

            $result = Lookway_Todo_Controls::create_new_task($title, $desc);

            echo $result;
        }

        wp_die();
    }

    public function ajax_delete_all_task()
    {
        check_ajax_referer('_wpnonce', 'nonce');
        $result = Lookway_Todo_Controls::delete_all_task();
        echo $result;
        wp_die();
    }
}

$Lookway_Todo_Handler = new Lookway_Todo_Handler();
