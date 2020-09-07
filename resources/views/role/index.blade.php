@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de roles
                    <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm float-right">Crear</a>
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
                                        <td>{{ $role['full-access'] }}</td>
                                        <td>
                                            <a href="{{ route('role.show', $role->id) }}" class="btn btn-info btn-sm">Ver</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
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
