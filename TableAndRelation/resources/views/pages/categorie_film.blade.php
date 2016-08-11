{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('categorie_id', 'Categorie_id:') !!}
			{!! Form::text('categorie_id') !!}
		</li>
		<li>
			{!! Form::label('film_id', 'Film_id:') !!}
			{!! Form::text('film_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}