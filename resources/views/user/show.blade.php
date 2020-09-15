@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ver user
                    <a href="{{ route('user.edit', $user->id)}}" class="btn btn-warning btn-sm float-right">Editar</a>
                    <a href="{{ route('user.index')}}" class="btn btn-info btn-sm float-right">Atras</a>
                </div>

                <div class="card-body">
                    
                   @include('custom.message')

                    
                    {{ Form::model($user, ['route' => ['user.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PUT']) }}
                        @include('user.partials.formS')
                    {{ Form::close() }}
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
