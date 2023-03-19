<div class="card text-bg-warning mt-0 mb-4" data-task-id="<?php echo get_the_ID(); ?>" data-task-post-type="<?php echo get_post_type(); ?>">
    <div class="card-body">
        <h3 class="card-title"><?php the_title(); ?></h3>
        <p class="card-text"> <?php the_content(); ?></p>
    </div>
</div>