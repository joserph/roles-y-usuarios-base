<div class="form-group">
    {{ Form::label('name', 'Nombre', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-12">
        {{ Form::text('name', null, ['class' => 'form-control', 'readonly' => 'readonly']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('slug', 'Slug', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-12">
        {{ Form::text('slug', null, ['class' => 'form-control', 'readonly' => 'readonly']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('description', 'Descricción', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-12">
        {{ Form::textarea('description', null, ['class' => 'form-control', 'readonly' => 'readonly']) }}
    </div>
</div>
<hr>
<h3>Full Acceso</h3>
<div class="form-group">
    <label>{{ Form::radio('full_access', 'yes', true, ['disabled']) }} Si</label>
    <label>{{ Form::radio('full_access', 'no', true, ['disabled']) }} No</label>
</div>
<h3>Lista de Permisos</h3>

<div class="form-group">
    @foreach($permissions as $permission)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" disabled value="{{ $permission->id }}" id="permission_{{ $permission->id }}" name="permission[]" 
        
        @if(is_array(old('permission')) && in_array("$permission->id", old('permission'))) checked 
        @elseif(is_array($permission_role) && in_array("$permission->id", $permission_role)) checked
        @endif
        >
        <label class="form-check-label" for="permission_{{ $permission->id }}">
            {{ $permission->id }} - {{ $permission->name }} <em>{{ $permission->description }}</em>
        </label>
    </div>
    @endforeach
</div>

<hr>
