<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    const editors = document.querySelectorAll( '.d-editor' );
    editors.forEach((el) => {
        ClassicEditor
            .create( el,{
                ckfinder: {
                    uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}',
                }
            })
            .catch( error => {

            } );
    });

</script>
