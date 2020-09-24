<div class="form-group">
    {{ Form::label('name', 'Nombre', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-12">
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('slug', 'Slug', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-12">
        {{ Form::text('slug', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('description', 'Descricción', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-12">
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>
</div>

<hr>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>