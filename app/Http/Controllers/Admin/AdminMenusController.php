<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/30
 * Time: 17:43
 */

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminMenus\TopMenusCriteria;
use App\Criteria\Permissions\TopPermissionsCriteria;
use App\Repositories\AdminMenusRepository;
use App\Repositories\PermissionsRepository;
use Illuminate\Container\Container as App;
class AdminMenusController extends Controller
{
    protected $repository;

    public function __construct(AdminMenusRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $menus = $this->repository->with('permission')->all();

        return view('admin.admin-menus.index', compact('menus'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.admin-menus.create', $this->repository->viewDataForCreate());
    }
}
