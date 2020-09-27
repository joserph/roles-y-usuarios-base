@extends('layouts.principal')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ver role
                    <a href="{{ route('role.edit', $role->id)}}" class="btn btn-warning btn-sm float-right">Editar</a>
                    <a href="{{ route('role.index')}}" class="btn btn-info btn-sm float-right">Atras</a>
                </div>

                <div class="card-body">
                    
                   @include('custom.message')

                    
                    {{ Form::model($role, ['route' => ['role.update', $role->id], 'class' => 'form-horizontal', 'method' => 'PUT']) }}
                        @include('role.partials.formS')
                    {{ Form::close() }}
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
