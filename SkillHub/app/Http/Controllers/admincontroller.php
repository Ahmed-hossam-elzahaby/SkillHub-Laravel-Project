<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class admincontroller extends Controller
{
    public function index()
    {

        return view('admin.index');
    }
    public function admin()
    {
        $superAdminRole = Role::where('name', 'superadmin')->first();
        $AdminRole = Role::where('name', 'admin')->first();


        $data['admins'] = User::whereIn('role_id', [$superAdminRole->id, $AdminRole->id])->orderby('id', 'DESC')->paginate(10);

        return view('admin.admins.index')->with($data);
    }


    public function createadmin()
    {

        return view('admin.admins.create');
    }

    public function createadminstore(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',

        ]);



        $role = Role::where('name', 'admin')->first();

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role->id,

        ]);
        return redirect(url('dashbord/admins'));
    }


    public function promot($id)
    {
        $admin = User::findorfail($id);

        $admin->update([

            'role_id' => Role::select('id')->where('name', 'superadmin')->first()->id,

        ]);
        return back();
    }




    public function demot($id)
    {
        $superadmin = User::findorfail($id);

        $superadmin->update([

            'role_id' => Role::select('id')->where('name', 'admin')->first()->id,

        ]);
        return back();
    }



}
