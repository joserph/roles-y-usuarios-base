<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\PermissionFolder\Models\Permission;
use App\Http\Requests\AddPermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess', 'permission.index');

        $permissions = Permission::orderBy('id', 'DESC')->paginate(6);
        //dd($permissions);

        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess', 'permission.create');

        $permissions = Permission::get();

        return view('permission.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPermissionRequest $request)
    {
        Gate::authorize('haveaccess', 'permission.create');

        $permission = Permission::create($request->all());

        return redirect()->route('permission.index')
            ->with('status_success', 'Permiso guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('haveaccess', 'permission.show');

        $permission = Permission::find($id);

        return view('permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('haveaccess', 'permission.edit');

        $permission = Permission::find($id);
        
        return view('permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
        Gate::authorize('haveaccess', 'permission.edit');

        $permission = Permission::find($id);
        $permission->update($request->all());

        return redirect()->route('permission.index')
            ->with('status_success', 'Permiso actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        Gate::authorize('haveaccess', 'permission.destroy');

        $permission->delete();

        return back()->with('status_success', 'Eliminado correctamente');
    }
}
