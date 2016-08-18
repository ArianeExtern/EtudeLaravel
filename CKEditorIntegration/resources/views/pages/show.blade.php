@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <h1 class="text-primary">{{$post->titre}}</h1>
            {!! $post->body !!}
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <h1>Discussion</h1>
            <form method="post" action="addComment/{{$post->id}}">
                {!! csrf_field()!!}
                <div class="form-group">
                    <textarea class="form-control" name="comment" placeholder="Commenter" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-default" type="submit">Commenter</button>
                </div>
            </form>

            <ul class="list-group">
                @forelse($post->comments()->get() as $comment)
                    <li class="list-group-item">
                        <img src="http://lorempixel.com/50/50" />
                        <p>{{$comment->content}}</p>

                        @forelse($comment->reponses()->get() as $rep)
                            <blockquote><p>{{$rep->content}}</p></blockquote>
                        @empty
                            <blockquote><p>aucune reponse.</p></blockquote>
                        @endforelse

                        <form method="post" action="addReponse/{{$comment->id}}">
                            {!! csrf_field()!!}
                            <input type="text" name="rep" class="form-control"/>
                            <button class="btn btn-default" type="submit">Repondre</button>
                        </form>

                    </li>
                @empty
                    <li class="list-group-item">Pas de commentaire.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection