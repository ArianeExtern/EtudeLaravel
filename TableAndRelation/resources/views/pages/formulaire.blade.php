<?php
    //Permet de spécifier la bonne route
    if($film->id){
        $option = array('route' => ['film.update', $id], 'method' => 'PUT');
    }else{
        $option = array('route' => 'film.store', 'method' => 'POST');
    }
?>

{!! Form::model($film, $option) !!}
<div class="form-group">
    {!! Form::label('titre', 'Titre:', ['class' => 'text-danger']) !!}
    {!! Form::text('titre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('categorie', 'Categorie:', ['class' => 'text-danger']) !!}

    <select name="cat_id" class="form-control">
        @foreach($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->nom}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('mes', 'Metteur en scène:', ['class' => 'text-danger']) !!}

    <select name="mes_id" class="form-control">
        @foreach($mess as $mes)
            <option value="{{$mes->personne()->first()->id}}">{{$mes->personne()->first()->nom}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('annee', 'Annee:', ['class' => 'text-danger']) !!}
    {!! Form::number('annee', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'cols' => '35', 'rows' => '3']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Ajouter', ['class' => 'btn btn-danger']) !!}
</div>
{!! Form::close() !!}
