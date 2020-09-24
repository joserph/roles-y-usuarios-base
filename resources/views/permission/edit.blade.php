@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar permiso
                </div>

                <div class="card-body">
                    
                   @include('custom.message')

                    {{ Form::model($permission, ['route' => ['permission.update', $permission->id], 'class' => 'form-horizontal', 'method' => 'PUT']) }}
                        @include('permission.partials.formE')
                    {{ Form::close() }}
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
