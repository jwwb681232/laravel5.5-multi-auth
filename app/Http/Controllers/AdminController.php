<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
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

    public function test(AdminRequest $request)
    {
        /*$role = Role::create(['name'=>'editor']);
        $permission = Permission::create(['name'=>'edit article']);*/
    }
}
