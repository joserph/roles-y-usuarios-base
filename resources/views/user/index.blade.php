@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de users</div>

                <div class="card-body">
                    
                @include('custom.message')   
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Nombre</th>
                                    <th class="text-center" scope="col">Email</th>
                                    <th class="text-center" scope="col">Role(s)</th>
                                    <th class="text-center" colspan="3">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @isset($user->roles[0]->name)
                                                {{ $user->roles[0]->name }}
                                            @endisset
                                        </td>
                                        <td>
                                            @can('view', [$user, ['user.show', 'userown.show']])
                                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">Ver</a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('update', [$user, ['user.edit', 'userown.edit']])
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('haveaccess', 'user.destroy')
                                                {{ Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) }}
                                                    {{ Form::button('<i class="fas fa-trash-alt"></i> ' . 'Eliminar', ['type' => 'submit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Eliminar usuario', 'class' => 'btn btn-sm btn-danger', 'onclick' => 'return confirm("¿Seguro de eliminar el user?")']) }}
                                                {{ Form::close() }}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
