<script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        tinymce.init({

            selector: '#content',

            height: 500,

            menubar: false,

            plugins: [
                'advlist',
                'autolink',
                'lists',
                'link',
                'image',
                'media',
                'table',
                'code',
                'fullscreen',
                'wordcount'
            ],


            toolbar: 'undo redo | blocks | ' +
                'bold italic underline | ' +
                'bullist numlist | ' +
                'link image media | ' +
                'code',


            branding: false,

            promotion: false,


            setup(editor) {

                editor.on(
                    'change',
                    function() {

                        editor.save();

                    }
                );

            }

        });

    });
</script>