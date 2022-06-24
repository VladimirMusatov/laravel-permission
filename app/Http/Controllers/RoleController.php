<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::orderBy('name')->get();

        return view('roles.index',compact('roles'));
    }

    public function create()
    {

        $permissions = Permission::all();

        return view('roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $request ->validate([

            'name' => 'required|max:255',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id',

        ]);

            $newRole = Role::create([
                'name' => $request->name,
            ]);

            $permissions = Permission::whereIn('id',$request->permissions)->get();
            $newRole->syncPermissions($permissions);

            return redirect()->back()->with('status', 'Role added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        $role = Role::where('name', '!=','super-user')->findOrFail($role->id);
        $permissions = Permission::orderBy('name')->get();

        return view('roles.edit',compact('permissions','role'));
    }

    public function update(Request $request, Role $role)
    {
        $request ->validate([

            'name' => 'required|max:255',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id',

        ]);

            $role->update([
                'name' => $request->name,
            ]);

            $permissions = Permission::whereIn('id',$request->permissions)->get();
            $role->syncPermissions($permissions);

            return redirect()->back()->with('status', 'Role update!');        
    }


    public function destroy($id)
    {
        Role::where('id',$id)->delete();

        return redirect()->back()->with('status', 'Role deleted!'); 
    }
}
