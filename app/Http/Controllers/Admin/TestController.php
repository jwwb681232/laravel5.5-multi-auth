<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TestController extends Controller
{

    public function index()
    {
        echo '<pre>';
        print_r(str_plural('TestController'));
        die;
    }
}
