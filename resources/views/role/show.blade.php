@extends('layouts.principal')

@section('content')
<section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1>{{ $role->name}}
                
             </h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
             <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Role(s)</a></li>
             <li class="breadcrumb-item active">{{ $role->name}}</li>
             </ol>
          </div>
       </div>
    </div><!-- /.container-fluid -->
 </section>


 <section class="content">
    <div class="container-fluid">
       <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                
                <i class="fas fa-text-width"></i>
                Detalle del role
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <dl class="row">
                <dt class="col-sm-4">Nombre</dt>
                <dd class="col-sm-8">{{ $role->name }}</dd>
                <dt class="col-sm-4">Slug</dt>
                <dd class="col-sm-8">{{ $role->slug }}</dd>
                <dt class="col-sm-4">Descripcción</dt>
                <dd class="col-sm-8">{{ $role->description }}</dd>
                <dt class="col-sm-4">Full acceso</dt>
                <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
                    sit amet risus.
                </dd>
                </dl>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
       </div>
    </div>
 </section>


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
