@extends('default')

@section('content')

<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title text-center"><b>Formulaire réinitialisation de mot de passe</b></h3>
	  </div>
	  <div class="panel-body">
        <div class="login">
            <div class="heading">
			
				<form method="POST" action="/password/reset">
					{!! csrf_field() !!}
					<input type="hidden" name="token" value="{{ $token }}">

					@if (count($errors) > 0)
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					@endif

					<div class="form-group">
						<label for="email">Email : </label>
						<input type="email" name="email" class="form-control" value="{{ old('email') }}">
					</div>

					<div>
						<label for="password">Mot de passe : </label>
						<input type="password" name="password" class="form-control" />
					</div>

					<div class="form-group">
						<label for="password_confirmation">Confirmation du mot de passe : </label>
						<input type="password" name="password_confirmation" class="form-control">
					</div>

					<div>
						<button type="submit" class="btn btn-default">Reinitialiser mot de passe</button>
					</div>
				</form>

			</div>
        </div>
	 </div>
</div>
@endsection