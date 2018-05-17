<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function test()
    {
        /*echo '<pre>';
        print_r(123);
        die;*/
        /*$role = Role::create(['name'=>'editor']);
        $permission = Permission::create(['name'=>'edit article']);*/
    }
}
