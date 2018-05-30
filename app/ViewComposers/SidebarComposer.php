<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/30
 * Time: 20:21
 */

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\AdminMenusRepository;

class SidebarComposer
{
    protected $menus;

    public function __construct(AdminMenusRepository $menus)
    {
        $this->menus = $menus;
    }

    public function compose(View $view)
    {
        $view->with('menus',$this->menus->all());
    }
}