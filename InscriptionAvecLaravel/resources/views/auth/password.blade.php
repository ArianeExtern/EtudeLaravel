@extends('default')

@section('content')

<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title text-center"><b>Adresse mail pour réinitialisation de mot de passe</b></h3>
	  </div>
	  <div class="panel-body">
        <div class="login">
            <div class="heading">
				<form method="POST" action="/password/email">
					{!! csrf_field() !!}

					@if (count($errors) > 0)
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					@endif

					<div class="form-group">
						<label for="email">Email : </label>
						<input type="email" class="form-control" name="email" value="{{ old('email') }}">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default">Envoyer l'email de réinitialisation</button>
					</div>
				</form>
			</div>
        </div>
	 </div>
</div>
@endsection
