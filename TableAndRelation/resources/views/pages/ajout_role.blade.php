
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-5">
        {{Form::open(['method' => 'POST', 'action' => 'FilmController@addRole'])}}

            <div class="form-group">
                <h3>Ajouter role</h3>
                <input name="idFilm" type="hidden" value="{{$id}}"/>
            </div>

            <div class="form-group">
                {{Form::label('Role', 'Role', ['class' => 'text-primary'])}}
                {{Form::text('role', null, ['class' => 'form-control', 'placeholder' => 'Role'])}}
            </div>

            <div class="form-group">
                {{Form::submit('Ajouter Role', ['class' => 'btn btn-danger'])}}
            </div>
        {{Form::close()}}
        </div>

        <div class="col-md-5">
            {{Form::open(['method' => 'POST', 'action' => 'FilmController@roleToActeur'])}}

            <div class="form-group">
                <h3>Associer un acteur à un role</h3>
                <input name="idFilm" type="hidden" value="{{$id}}"/>
            </div>

            <!-- Liste des roles films -->
            <div class="form-group">
                <select name="role_id" class="form-control">
                    @forelse($film->roles()->get() as $role)
                        <option value="{{$role->id}}">{{$role->nom}}</option>
                    @empty
                        <option value="-11">Pas de role</option>
                    @endforelse
                </select>
            </div>

            <!--Liste des acteurs-->
            <div class="form-group">
                <select name="acteur_id" class="form-control">
                    @forelse($acteurs as $acteur)
                        <option value="{{$acteur->personne()->first()->id}}">{{$acteur->personne()->first()->nom}}</option>
                    @empty
                        <option value="-12">Pas d'acteur</option>
                    @endforelse
                </select>
            </div>

            <div class="form-group">
                {{Form::submit('Role => Acteur', ['class' => 'btn btn-primary'])}}
            </div>
        </div>
    </div>
</div>