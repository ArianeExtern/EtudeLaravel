@extends('default')

@section('content')

<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title text-center"><b>S'enregistrer !</b></h3>
	  </div>
	  <div class="panel-body">
        <div class="login">
            <div class="heading">
				<form method="POST" action="{{url('auth/register')}}">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="name">Nom Complet :</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}">
					</div>

					<div class="form-group">
						<label for="email">Email : </label>
						<input type="email" name="email" class="form-control" value="{{ old('email') }}">
					</div>

					<div class="form-group">
						<label for="password">Mot de passe : </label>
						<input type="password" name="password" class="form-control" />
					</div>

					<div class="form-group">
						<label for="password_confirmation">Confirmer le mot de passe : </label>
						<input type="password" name="password_confirmation" class="form-control" />
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">S'enregister</button>
					</div>
				</form>
            </div>
        </div>
	  </div>
</div>

@endsection
