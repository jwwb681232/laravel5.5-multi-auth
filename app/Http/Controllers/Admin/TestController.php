<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TestController extends Controller
{

    public function index()
    {
//        $role = Role::create(['name'=>'editor']);
//        $permission = Permission::create(['name'=>'edit article']);
        $role = Role::findById(1);
        $permission = Permission::findById(1);
        //$role->givePermissionTo($permission);
        $user = auth('admin')->user();
        $user->assignRole($role);
    }
}
