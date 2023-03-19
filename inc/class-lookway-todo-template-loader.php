<?php

class Lookway_Todo_Template_Loader
{
    public static function get_template($template_name, $post_id = null, $args = array())
    {
        ob_start();

        if ($post_id) {

            $args = array(
                'post_type' => 'task',
                'p' => $post_id,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();

                    include(LOOKWAY_TODO_PATH . 'templates/' . $template_name . '.php');
                }
            } else {
                echo 'Ошибка.';
            }
        } else {
            include(LOOKWAY_TODO_PATH . 'templates/' . $template_name . '.php');
        }

        $html = ob_get_clean();

        wp_reset_postdata();

        return $html;
    }
}
