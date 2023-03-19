jQuery(document).ready(function ($) {
  const form = document.querySelector("#todoForm");
  const createBtn = document.querySelector("#todoCreateTask");
  const deleteBtn = document.querySelector("#deleteAllTask");

  createBtn.addEventListener("click", (e) => {
    e.preventDefault();

    const taskEmpty = document.querySelector(".task-empty");

    $.ajax({
      url: todo_controlls_obj.ajaxurl,
      type: "post",
      data: {
        action: "create_new_task",
        nonce: todo_controlls_obj.nonce,
        title: form.querySelector('[name="title"]').value,
        desc: form.querySelector('[name="desc"]').value,
      },
      success: function (data) {
        console.log(data);
        if (taskEmpty) {
          taskEmpty.remove();
        }
        document
          .querySelector(".lookway-todo__tasks")
          .insertAdjacentHTML("afterbegin", data);
      },
      error: function (errorThrown) {
        console.log(errorThrown);
      },
    });
  });

  deleteBtn.addEventListener("click", (e) => {
    e.preventDefault();

    $.ajax({
      url: todo_controlls_obj.ajaxurl,
      type: "post",
      data: {
        action: "delete_all_task",
        nonce: todo_controlls_obj.nonce,
      },
      success: function (data) {
        console.log(data);
        document.querySelector(".lookway-todo__tasks").innerHTML = "";
        document
          .querySelector(".lookway-todo__tasks")
          .insertAdjacentHTML("afterbegin", data);
      },
      error: function (errorThrown) {
        console.log(errorThrown);
      },
    });
  });
});
