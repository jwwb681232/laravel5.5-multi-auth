<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/30
 * Time: 17:44
 */

namespace App\Repositories;

use App\Criteria\AdminMenus\TopMenusCriteria;
use App\Criteria\Permissions\TopPermissionCriteria;
use App\Criteria\Permissions\TopPermissionsCriteria;
use App\Entities\AdminMenu;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class AdminMenusRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminMenu::class;
    }

    /**
     * Boot up the repository, pushing criteria
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function otherRepository(BaseRepository $repository)
    {
        return (new $repository($this->app));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function children()
    {
        return AdminMenu::with(['children', 'permission'])->where('parent_id', 0)->get();
    }

    /**
     * @param int $id
     * @return array
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function viewDataForSave(int $id = 0)
    {
        $permissionRepository = (new PermissionsRepository($this->app));
        $this->pushCriteria(TopMenusCriteria::class);
        $permissionRepository->pushCriteria(TopPermissionsCriteria::class);

        $topMenus       = $this->all(['id', 'name']);
        $topPermissions = $permissionRepository->all(['id', 'name']);
        if ($id){
            $menu = $this->skipCriteria()->find($id);
        }

        return compact('topMenus', 'topPermissions','menu');
    }

    /**
     *  主页数据按钮
     * @return mixed|object
     */
    public function viewDataForIndex()
    {
        $menus = $this->all();
        if ( ! $menus) {
            return (object)[];
        }
        foreach ($menus as $key =>$item) {
            $button['edit'] = "<a href='".url('admin/admin-menus')."/{$item->id}/edit' class='btn btn-indigo btn-xs'><i class='fa fa-trash'> Edit</i></a>";
            $button['delete'] = "<a href='javascript:;' data-id='{$item->id}' class='btn btn-danger btn-xs destroy'><i class='fa fa-trash'> Delete</i><form action='".url('admin/admin-menus')."/{$item->id}' method='POST' name='delete_item_{$item->id}' style='display:none'>".method_field('DELETE').csrf_field()."</form></a>";
            $menus[$key]->button = implode(' ',$button);
        }

        return $menus;
    }
}