<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PermissionFolder\Models\Permission;
use App\PermissionFolder\Models\Role;
use App\Http\Requests\AddRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(2);

        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRoleRequest $request)
    {
        $role = Role::create($request->all());

        if($request->get('permission'))
        {
            $role->permissions()->sync($request->get('permission'));
        }
        return redirect()->route('role.index')
            ->with('status_success', 'Role guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permission_role = [];
        foreach($role->permissions as $permission)
        {
            $permission_role[] = $permission->id;
        }
        
        $permissions = Permission::get();

        return view('role.edit', compact('permissions', 'role', 'permission_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::find($id);
        $role->update($request->all());

        if($request->get('permission'))
        {
            $role->permissions()->sync($request->get('permission'));
        }
        return redirect()->route('role.index')
            ->with('status_success', 'Role actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
