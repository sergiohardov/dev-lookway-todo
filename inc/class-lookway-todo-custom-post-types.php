<?php

class Lookway_Todo_Custom_Post_Types
{
    public function __construct()
    {
        add_action('init', [$this, 'custom_post_type']);
    }

    public function custom_post_type()
    {
        register_post_type('task', [
            'public' => false,
            'label' => esc_html__('Task', 'lookway-todo'),
        ]);
    }
}

$Lookway_Todo_Custom_Post_Types = new Lookway_Todo_Custom_Post_Types();
