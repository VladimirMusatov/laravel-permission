<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
      $users = User::orderBy('created_at')->get();
      $roles = Role::orderBy('name')->get();

      return view('users.index',(['users'=>$users,'roles'=>$roles]));  
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        $roles = Role::all();

        return view('users.edit_user',['user'=>$user,'roles'=>$roles]);
    }


    public function update(Request $request, User $user)
    {
        $request ->validate([
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $user->update([

            'role_id' => $request->role_id,

        ]);

        $role = Role::find($request->role_id);
        $user->syncRoles([$role->name]);

        return redirect()->back()->with('status','user update');


    }

    public function destroy($id){

        User::where('id',$id)->delete();

        return redirect()->back()->with('status','user delete');

    }
}
