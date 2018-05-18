<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Presenters\AdminUserPresenter;
use App\Repositories\AdminUserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    protected $repository;

    public function __construct(AdminUserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->setPresenter(AdminUserPresenter::class);
        $adminUsers = $this->repository->all();
        if (request()->wantsJson()) {

            return response()->json(
                [
                    'data'=>$adminUsers,
                ]
            );
        }

        return view('admin.admin-user.index');
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
