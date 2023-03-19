<?php
class Lookway_Todo_Controls
{
    static function create_new_task($title, $desc)
    {
        $args = [
            'post_title' => $title,
            'post_content' => $desc,
            'post_status' => 'publish',
            'post_type' => 'task'
        ];

        $post_id = wp_insert_post($args);

        if ($post_id > 0) {
            return $post_id;
        } else {
            return false;
        }
    }

    static function delete_all_task()
    {
        $tasks = get_posts([
            'post_type' => 'task', 'numberposts' => -1
        ]);

        foreach ($tasks as $task) {
            wp_delete_post($task->ID, true);
        }

        return true;
    }
}

// $Lookway_Todo_Controls = new Lookway_Todo_Controls();