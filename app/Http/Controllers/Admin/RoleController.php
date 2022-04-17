<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use App\Models\User;

class RoleController extends Controller
{

    public function Index(){
        $roles = DB::table('roles')->get();
        $permissions = DB::table('permissions')->get();
        return view('admin.pages.role_permission.role.index', compact('roles','permissions'));
    }






    public function Store(Request $request){
        $validation = $request->validate(['name' => 'required']);

        if ($validation == true){
            $data = new Role();

            $data->name = $request->name;
            $data->guard_name = Auth::getDefaultDriver();
            $data->save();

            $permissions = $request->permission;
            $data->syncPermissions($permissions);

        if($data == true){
            $message = Alert::success('Success', 'permission saved');
            return redirect('admin/all-roles')->with('message',$message);
        }else{
            $message = Alert::error('Error', 'something went wrong');
            return redirect('admin/all-roles')->with('message', $message);
        }
        }
    }




    public function Edit($id){
        $roles = DB::table('roles')->find($id);
        $permissions = DB::table('permissions')->get();
        $permissions_checked = DB::table('role_has_permissions')->where('role_id',$roles->id)->get('permission_id');
        return view('admin.pages.role_permission.role.edit', compact('roles','permissions','permissions_checked'));
    }







    public function UpdateRole(Request $request, $id){
        $validation = $request->validate(['name' => 'required']);
        if ($validation == true){
            $data = Role::find($id);

            $data->name = $request->name;
            $data->guard_name = Auth::getDefaultDriver();
            $data->save();

            $permissions = $request->permission;
            $data->syncPermissions($permissions);

        if($data == true){
            $message = Alert::success('Success', 'permission saved');
            return redirect('admin/all-roles')->with('message',$message);
        }else{
            $message = Alert::error('Error', 'something went wrong');
            return redirect('admin/all-roles')->with('message', $message);
        }
        }
    }


    public function Destroy($id){
        // find the data row
        $delete = DB::table('roles')->where('id', $id)->delete();
        if($delete == true){
            $message = Alert::success('Success', 'permission deleted');
            return redirect('admin/all-roles')->with('message',$message);
        }else{
            $message = Alert::error('Error', 'something went wrong');
            return redirect('admin/all-roles')->with('message', $message);
        }

    }







    public function RoleAsignIndex(){
        $users = User::latest()->paginate(25);
        $user_roles = Role::all();
        return view('admin.pages.role_permission.role.asign_role',compact('users','user_roles'));
    }

}
