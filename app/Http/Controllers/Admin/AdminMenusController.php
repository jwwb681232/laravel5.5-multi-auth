<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/30
 * Time: 17:43
 */

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminMenus\CreateRequest;
use App\Repositories\AdminMenusRepository;

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
        $menus = $this->repository->with('permission')->viewDataForIndex();

        return view('admin.admin-menus.index', compact('menus'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function create()
    {
        return view('admin.admin-menus.create', $this->repository->viewDataForSave());
    }

    /**
     * @param CreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateRequest $request)
    {
        $this->repository->create($request->all());

        return redirect('admin/admin-menus')->with('message', 'Admin menu created.');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function edit($id)
    {
        return view('admin.admin-menus.edit', $this->repository->viewDataForSave());
    }
}
