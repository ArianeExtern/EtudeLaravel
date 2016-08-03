@extends('default')

@section('content')
<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title text-center"><b>Se Connecter !</b></h3>
	  </div>
	  <div class="panel-body">
        <div class="login">
            <div class="heading">
			
				<form role="form" method="POST" action="/auth/login">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="email">Email :</label>
						<input type="email" name="email" class="form-control" value="{{ old('email') }}">
					</div>

					<div class="form-group">
						<label for="password">Mot de passe : </label>
						<input type="password" name="password" class="form-control" id="password" />
					</div>

					<div class="form-group">
						<input type="checkbox" name="remember"> Se souvenir
					</div>

					<div class="form-group">
						<button class="btn btn-primary" type="submit">Se connecter</button>
						<a href="/password/email">Mot de passe oublié ?</a>
					</div>
				</form>
			</div>
        </div>
	 </div>
</div>
@endsection

@section('corner')
	<li><a href="/auth/register">S'enregistrer</a></li>
@endsection