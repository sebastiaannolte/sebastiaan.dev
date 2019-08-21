$(function () {
    $('#editor').trumbowyg({
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['link'],
            ['insertImage'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['horizontalRule'],
            ['removeformat'],
            ['foreColor', 'backColor'],
            ['highlight'],
            ['fullscreen']
        ],
        plugins: {
            resizimg: {
                minSize: 64,
                step: 2,
            }
        }

    });

    $('#title').bind('keyup', function () {
        var items = $(this).val().split(', ');
        var keywords_value = items[Math.floor(Math.random() * items.length)];
        var slug = keywords_value.replace(/[^a-zA-Z0-9-]/g, '-').toLowerCase().replace(/--+/g, '-');
        $('#slug').val(slug);
    });

    $('.delete-button').on('click', function () {
        return confirm('Are you sure you want to delete this item?');
    });
});
