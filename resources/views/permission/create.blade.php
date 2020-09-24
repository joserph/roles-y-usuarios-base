@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear de permiso
                </div>

                <div class="card-body">
                    
                   @include('custom.message')

                    {{ Form::open(['route' => 'permission.store', 'class' => 'form-horizontal']) }}
                        @include('permission.partials.form')
                    {{ Form::close() }}
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
