@extends("default")

@section('content')
    <div class="row">
        <h1>Welcome {{$name}}</h1>
    </div>
@endsection

@section('sidebar')
    <!-- @parent --> <!-- A decommenter pour voir le contenue par defaut du parent -->
    <p>Les blablas à ecrire à Droite</p>
@endsection
