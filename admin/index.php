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
                        <form>
                            <div class="mb-3">
                                <label for="todo_title" class="form-label"><?php echo __('Task Title', 'lookway-todo'); ?></label>
                                <input type="text" class="form-control" id="todo_title" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="todo_desc" class="form-label"><?php echo __('Task Text', 'lookway-todo'); ?></label>
                                <textarea class="form-control" id="todo_desc" rows="3" name="desc"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo __('Create', 'lookway-todo'); ?></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="lookway-todo__tasks col-5">
                <div class="card text-bg-warning mt-0 mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Title ToDo 1</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi sed quaerat laudantium quidem similique est tenetur laborum suscipit doloribus consequatur.</p>
                    </div>
                </div>
                <div class="card text-bg-warning mt-0 mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Title ToDo 2</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ipsam animi voluptatibus porro doloremque, dolorum eveniet ullam incidunt maiores omnis.</p>
                    </div>
                </div>
                <div class="card text-bg-warning mt-0 mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Title ToDo 3</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum odio deleniti provident inventore fugiat facilis, numquam accusamus impedit neque vero.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>