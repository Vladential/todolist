const profilecontainer = document.querySelector('.profile-container');
const profilelink = document.querySelector('.profile-link');
const iconclose = document.querySelector('.icon-close');
const editbox = document.querySelector('.edit-inputbox');
const editinput = document.querySelector('.edit-text');
const edittodo = document.querySelectorAll('.edit-todo');
const cancel = document.querySelector('.btn-cancel');
const overlay = document.querySelector('.overlay');


profilelink.addEventListener('click', () => {
    profilecontainer.classList.add('active-popup');
});

iconclose.addEventListener('click', () => {
    profilecontainer.classList.remove('active-popup');
});

edittodo.forEach(edittodo => {
    edittodo.addEventListener('click', () => {
        editbox.classList.add('active-popup');
        overlay.classList.add('active-popup');
    })
});

cancel.addEventListener('click', () => {
    editbox.classList.remove('active-popup');
    overlay.classList.remove('active-popup');
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && editbox.classList.contains('active-popup')) {
        editbox.classList.remove('active-popup');
        overlay.classList.remove('active-popup');
    }
});



$(document).ready(function () {
    $('.remove-todo').click(function () {
        const id = $(this).attr('id');

        $.post("./php/interactions/remove.php",
            {
                id: id
            },
            (data) => {
                if (data) {
                    $(this).parent().hide(500);
                }
            }
        );
    });

    $('.edit-todo').click(function () {
        const id = $(this).attr('todo-id');
        const title = $(this).attr('todo-text');
        //alert(id);
        //alert(title);
        $('.btn-save').data('todo-id', id);
        $('.edit-text').val(title);
    });


    $('.btn-save').click(function () {
        const edittext = $(this).closest('.edit-inputbox').find('.edit-text').val();
        const id = $(this).data('todo-id');
        //const title = $(this).data('todo-text');
        //alert(title);
        //alert(id);


        $.post("./php/interactions/update.php",
            {
                id: id,
                edittext: edittext
            },
            (data) => {
                location.reload();
            }
        )
    });


    $(".checkbox").click(function () {
        const id = $(this).attr('data-todo-id');

        $.post("./php/interactions/check.php",
            {
                id: id
            },
            (data) => {
                if (data != 'error') {
                    const h2 = $(this).next();
                    if (data == '1') {
                        h2.removeClass('checked');
                    } else {
                        h2.addClass('checked');
                    }
                }
            }
        );
    });
});



