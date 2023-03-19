<div class="lookway-todo">
    <div class="container-sm">

        <div class="row">
            <h1 class="text-center mt-3 mb-3"><?php echo get_admin_page_title(); ?></h1>
        </div>

        <div class="row">

            <div class="lookway-todo__form col-7">
                <div class="card  mt-0">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo __('Form to create to do tasks', 'lookway-todo'); ?></h2>
                        <p class="card-text"><?php echo __('Put your task in inputs down.', 'lookway-todo'); ?></p>

                        <form id="todoForm" method="post">
                            <div class="mb-3">
                                <label for="todo_title" class="form-label"><?php echo __('Task Title', 'lookway-todo'); ?></label>
                                <input type="text" class="form-control" id="todo_title" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="todo_desc" class="form-label"><?php echo __('Task Text', 'lookway-todo'); ?></label>
                                <textarea class="form-control" id="todo_desc" rows="3" name="desc"></textarea>
                            </div>

                            <button type="submit" id="todoCreateTask" class="btn btn-primary"><?php echo __('Create', 'lookway-todo'); ?></button>
                            <button type="submit" id="deleteAllTask" class="btn btn-danger"><?php echo __('Delete All', 'lookway-todo'); ?></button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="lookway-todo__tasks col-5">
                <?php

                $args = array(
                    'post_type' => 'task',
                    'posts_per_page' => -1
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                ?>
                        <div class="card text-bg-warning mt-0 mb-4">
                            <div class="card-body">
                                <h3 class="card-title"><?php the_title(); ?></h3>
                                <p class="card-text"><?php the_content(); ?></p>
                            </div>
                        </div>
                <?
                    }
                    wp_reset_postdata();
                } else {
                    echo 'Записей не найдено.';
                }
                ?>

            </div>

        </div>
    </div>
</div>