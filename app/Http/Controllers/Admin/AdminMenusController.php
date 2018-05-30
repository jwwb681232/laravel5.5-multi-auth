<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/30
 * Time: 17:43
 */

namespace App\Http\Controllers\Admin;

use App\Repositories\AdminMenusRepository;

class AdminMenusController extends Controller
{
    protected $repository;

    public function __construct(AdminMenusRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $this->repository->ttt();
        $menus = $this->repository->with('permission')->all();

        return view('admin.admin-menus.index', compact('menus'));
    }
}
