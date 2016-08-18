<?php
    if($post->id){
        $action = '/updatePost/'.$post->id;
        $button = "Mettre à jour";
    }else{
        $action = "/addPost";
        $button = "Ajouter";
    }
?>

<form method="post" action="{{$action}}">
    {!! csrf_field() !!}

    <div class="form-group">
        <label class="text-primary" for="titre">Titre : </label>
        <input type="text" class="form-control" name="titre" id="titre" value="{{$post->titre}}"/>
    </div>

    <div class="form-group">
        <textarea name="textarea" id="textarea">{{$post->body}}</textarea>
    </div>

    <div class="form-group">
        <button class="btn btn-default" type="submit">{{$button}}</button>
    </div>
</form>

<script>
    CKEDITOR.replace( 'textarea', {
        language: 'fr',
        uiColor: '#DADADA',

        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
    });
</script>
