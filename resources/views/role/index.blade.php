@extends('layouts.principal')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Role(s)
            @can('haveaccess', 'role.create')
            <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm">Crear</a>
        @endcan
          </h1>
          
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Simple Tables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

<!-- /.col -->
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Lista de roles
            
        </h3>

        <div class="card-tools">
            
          {{ $roles->links() }}
          
        </div>
      </div>
      @include('custom.message')   
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table">
          <thead>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Nombre</th>
                <th class="text-center" scope="col">Slug</th>
                <th class="text-center" scope="col">Descripción</th>
                <th class="text-center" scope="col">Full Acceso</th>
                <th class="text-center" colspan="3">&nbsp;</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($roles as $role)
            <tr>
                <td class="text-center">{{ $role->id }}</td>
                <td class="text-center">{{ $role->name }}</td>
                <td class="text-center">{{ $role->slug }}</td>
                <td class="text-center">{{ $role->description }}</td>
                <td class="text-center">{{ $role->full_access }}</td>
                <td width="100px" class="text-center">
                    @can('haveaccess', 'role.show')
                        <a href="{{ route('role.show', $role->id) }}" class="btn btn-info btn-sm">Ver</a>
                    @endcan
                </td>
                <td width="100px" class="text-center">
                    @can('haveaccess', 'role.edit')
                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    @endcan
                </td>
                <td width="120px" class="text-center">
                    @can('haveaccess', 'role.destroy')
                        {{ Form::open(['route' => ['role.destroy', $role->id], 'method' => 'DELETE']) }}
                            {{ Form::button('<i class="fas fa-trash-alt"></i> ' . 'Eliminar', ['type' => 'submit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Eliminar cliente', 'class' => 'btn btn-sm btn-danger', 'onclick' => 'return confirm("¿Seguro de eliminar el role?")']) }}
                        {{ Form::close() }}
                    @endcan
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
      </div>
    </div>
   </section>



@endsection
