@extends('layouts.principal')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear de role
                </div>

                <div class="card-body">
                    
                   @include('custom.message')

                    {{ Form::open(['route' => 'role.store', 'class' => 'form-horizontal']) }}
                        @include('role.partials.form')
                    {{ Form::close() }}
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
