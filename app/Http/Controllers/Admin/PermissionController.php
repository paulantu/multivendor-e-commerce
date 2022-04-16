<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class PermissionController extends Controller
{
    public function Index(){
        $permissions = DB::table('permissions')->get();
        return view('admin.pages.role_permission.permission.index', compact('permissions'));
    }












    public function Store(Request $request){
        $validation = $request->validate(['name' => 'required']);

        if ($validation == true){
            $name = $request->name;
            $guard_name = Auth::getDefaultDriver();
            $created_at = Carbon::now();
            $updated_at = Carbon::now();
            $data = DB::insert('insert into permissions (name, guard_name, created_at, updated_at) values(?, ?, ?, ?)',[$name, $guard_name, $created_at, $updated_at]);

        if($data == true){
            $message = Alert::success('Success', 'permission saved');
            return redirect('admin/all-permissions')->with('message',$message);
        }else{
            $message = Alert::error('Error', 'something went wrong');
            return redirect('admin/all-permissions')->with('message', $message);
        }
        }
    }









    public function Edit($id){
        $permissions = DB::table('permissions')->find($id);
        return view('admin.pages.role_permission.permission.edit', compact('permissions'));
    }





    public function UpdatePermission(Request $data, $id){
        $validation = $data->validate(['name' => 'required']);
        if ($validation == true){
            $name = $data->name;
            $guard_name = Auth::getDefaultDriver();
            $updated_at = Carbon::now();
            $datasave = DB::table('permissions')
                    ->where('id', $id)->limit(1)
                    ->update(array('name' => $name, 'guard_name' => $guard_name, 'updated_at' => $updated_at));

        if($datasave == true){
            $message = Alert::success('Success', 'permission updated');
            return redirect('admin/all-permissions')->with('message',$message);
        }else{
            $message = Alert::error('Error', 'something went wrong');
            return redirect('admin/all-permissions')->with('message', $message);
        }
        }
    }









    public function Destroy($id){
        // find the data row
        $delete = DB::table('permissions')->where('id', $id)->delete();
        if($delete == true){
            $message = Alert::success('Success', 'permission deleted');
            return redirect('admin/all-permissions')->with('message',$message);
        }else{
            $message = Alert::error('Error', 'something went wrong');
            return redirect('admin/all-permissions')->with('message', $message);
        }

    }


}
