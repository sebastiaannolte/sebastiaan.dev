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
            ['upload'],
            ['fullscreen']
        ],
        plugins: {
            resizimg: {
                minSize: 64,
                step: 2,
            },


            // Add imagur parameters to upload plugin for demo purposes
            upload: {
                serverPath: '/image/upload',
                fileFieldName: 'image',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                urlPropertyName: 'url',
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


    $('.close').on('click', function () {
        $(this).parent().remove();
    });

    $('.alert').delay(5000).fadeOut('slow');

    $('#chooseFile').bind('change', function () {
        var filename = $("#chooseFile").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass('active');
            $("#noFile").text("No file chosen...");
        }
        else {
            $(".file-upload").addClass('active');
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });

});
