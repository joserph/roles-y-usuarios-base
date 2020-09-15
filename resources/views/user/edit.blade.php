@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar user
                </div>

                <div class="card-body">
                    
                   @include('custom.message')

                    {{ Form::model($user, ['route' => ['user.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PUT']) }}
                        @include('user.partials.formE')
                    {{ Form::close() }}
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
