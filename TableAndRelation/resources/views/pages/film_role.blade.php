{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('film_id', 'Film_id:') !!}
			{!! Form::text('film_id') !!}
		</li>
		<li>
			{!! Form::label('role_id', 'Role_id:') !!}
			{!! Form::text('role_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}