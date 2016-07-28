@extends('default')

@section('content')
    <h1>Listes des utilisateur enregistrer : </h1>
    <ul>
        @foreach($users as $user)
            <li>
                <div class="">
                    <h3 class="text-info">{{$user->name}} <small>Addresse Email : {{$user->email}}</small></h3>
                </div>
            </li>
        @endforeach
    </ul>
@endsection