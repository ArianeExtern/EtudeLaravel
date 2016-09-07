@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-offset-1 col-md-7">
            @include('pages.formulaire')
		</div>
	</div>

    @if($film->id)
        @include('pages.ajout_role')
    @endif
@endsection