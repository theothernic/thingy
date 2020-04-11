@section('css')

@append

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/tidwwve4v602bp5v8lhefqw7ek7p3lh98mg99ejzuecyb9le/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@append


<textarea id="{{ $id }}" name="{{ $name }}"></textarea>
<script>
    tinymce.init({
        selector: 'textarea',
        menubar: false,
        statusbar: false,
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>


