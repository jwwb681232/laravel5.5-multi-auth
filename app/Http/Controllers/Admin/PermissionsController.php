<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/22
 * Time: 22:39
 */

namespace App\Http\Controllers\Admin;

use App\Criteria\PermissionsTableDataCriteria;
use App\Presenters\PermissionsTableDataPresenter;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\PermissionsRepository;
use App\Http\Requests\Permissions\CreateRequest;
use App\Http\Requests\Permissions\UpdateRequest;

/**
 * Class RolesController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class PermissionsController extends Controller
{
    /**
     * @var PermissionsRepository
     */
    protected $repository;


    /**
     * RolesController constructor.
     *
     * @param PermissionsRepository $repository
     */
    public function __construct(PermissionsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        if (request()->wantsJson()) {
            $this->repository->pushCriteria(PermissionsTableDataCriteria::class);
            $this->repository->setPresenter(PermissionsTableDataPresenter::class);

            return response()->json($this->repository->search($request));
        }

        return view('admin.permissions.index');
    }

    /**
     * Display create form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidatorException
     */
    public function store(CreateRequest $request)
    {
        $this->repository->create($request->all());

        return redirect('admin/permissions')->with('message', 'Permission created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json(['data' => $role]);
        }

        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->repository->find($id);

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param               $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidatorException
     */
    public function update(UpdateRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);
        return redirect('admin/permissions')->with('message', 'Permission updated.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->back()->with('message', 'Permission deleted.');
    }
}