@extends('layouts.principal')

@section('content')
<section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1>{{ $permission->name}}
                
             </h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
             <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">Permisos</a></li>
             <li class="breadcrumb-item active">{{ $permission->name}}</li>
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
                
                <i class="fas fa-user-lock"></i>
                Detalle del permiso
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <dl class="row">
                <dt class="col-sm-4">Nombre</dt>
                <dd class="col-sm-8">{{ $permission->name }}</dd>
                <dt class="col-sm-4">Slug</dt>
                <dd class="col-sm-8">{{ $permission->slug }}</dd>
                <dt class="col-sm-4">Descripcción</dt>
                <dd class="col-sm-8">{{ $permission->description }}</dd>
                </dl>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
       </div>
    </div>
 </section>


@endsection
