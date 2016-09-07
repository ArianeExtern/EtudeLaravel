{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('titre', 'Titre:') !!}
			{!! Form::text('titre') !!}
		</li>
		<li>
			{!! Form::label('annee', 'Annee:') !!}
			{!! Form::text('annee') !!}
		</li>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description') !!}
		</li>
		<li>
			{!! Form::label('mes_id', 'Mes_id:') !!}
			{!! Form::text('mes_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}