<div class="form-group row">
    {{ Form::label('name', 'Nombre', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('email', 'Correo', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Correo']) }}
    </div>
</div>

{{ Form::hidden('roles', $user->roles[0]->id)}}


<hr>
<div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
        {{ Form::submit('Actualizar', ['class' => 'btn btn-sm btn-warning']) }}
    </div>
</div>