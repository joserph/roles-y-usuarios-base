@extends('layouts.principal')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de roles
                    @can('haveaccess', 'role.create')
                        <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm float-right">Crear</a>
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
                                    <th class="text-center" scope="col">Full Acceso</th>
                                    <th class="text-center" colspan="3">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->slug }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>{{ $role->full_access }}</td>
                                        <td>
                                            @can('haveaccess', 'role.show')
                                                <a href="{{ route('role.show', $role->id) }}" class="btn btn-info btn-sm">Ver</a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('haveaccess', 'role.edit')
                                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            @endcan
                                        </td>
                                        <td>
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
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
