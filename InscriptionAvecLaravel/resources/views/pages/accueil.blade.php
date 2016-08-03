@extends('default')

@section('content')
	<h2 class="text-primary">Bienvenue sur votre espace, Vous êtes bien connecté !</h2>
@endsection

@section('corner')
	<li><form action="/auth/logout" method="GET"><button class="btn btn-default" type="submit">Deconnecté</button></form></li>
@endsection