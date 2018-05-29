<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/29
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index.index');
    }
}