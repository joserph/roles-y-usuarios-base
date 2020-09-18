@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Permisos
                    @can('haveaccess', 'permission.create')
                        <a href="{{ route('permission.create') }}" class="btn btn-primary btn-sm float-right">Crear</a>
                    @endcan
                </div>

                <div class="card-body">
                    
                @include('custom.message')   
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Nombre</th>
                                    <th class="text-center" scope="col">Slug</th>
                                    <th class="text-center" scope="col">Descripción</th>
                                    <th class="text-center" colspan="3">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->slug }}</td>
                                        <td>{{ $permission->description }}</td>
                                        <td>
                                            @can('haveaccess', 'permission.show')
                                                <a href="{{ route('permission.show', $permission->id) }}" class="btn btn-info btn-sm">Ver</a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('haveaccess', 'permission.edit')
                                                <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('haveaccess', 'permission.destroy')
                                                {{ Form::open(['route' => ['permission.destroy', $permission->id], 'method' => 'DELETE']) }}
                                                    {{ Form::button('<i class="fas fa-trash-alt"></i> ' . 'Eliminar', ['type' => 'submit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Eliminar cliente', 'class' => 'btn btn-sm btn-danger', 'onclick' => 'return confirm("¿Seguro de eliminar el permission?")']) }}
                                                {{ Form::close() }}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        {{ $permissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
