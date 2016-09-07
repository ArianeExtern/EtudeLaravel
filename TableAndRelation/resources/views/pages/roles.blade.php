{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('nom', 'Nom:') !!}
			{!! Form::text('nom') !!}
		</li>
		<li>
			{!! Form::label('film_id', 'Film_id:') !!}
			{!! Form::text('film_id') !!}
		</li>
		<li>
			{!! Form::label('acteur_id', 'Acteur_id:') !!}
			{!! Form::text('acteur_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}