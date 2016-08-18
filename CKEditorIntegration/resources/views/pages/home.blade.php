@extends('welcome')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-8">

            <h1>Ajouter un article</h1>

            @include('pages.form')

        </div>

        <div class="col-md-3">
            <ul class="list-group">
                @forelse($posts as $post)
                    <li class="list-group-item">
                        <a href="/getPost?id={{$post->id}}">{{$post->titre}}</a>
                        <form method="post" action="/deletePost/{{$post->id}}">
                            {!! csrf_field() !!}
                            <button class="btn btn-default" type="submit">X</button>
                        </form>

                        <form method="get" action="/editPost">
                            <input type="hidden" value="{{$post->id}}" name="id"/>
                            <button class="btn btn-default" type="submit">Edit</button>
                        </form>
                    </li>
                @empty

                    <span>Aucun post pour le moment.</span>
                @endforelse
            </ul>
        </div>
    </div>
@endsection