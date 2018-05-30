<?php

use Illuminate\Database\Seeder;
use App\Entities\AdminMenu;
class AdminMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $systemManage = new AdminMenu();
        $systemManage->name = 'System';
        $systemManage->href = 'admin/menus';
        $systemManage->icon = 'fa fa-cogs';
        $systemManage->permission_id = 0;
        $systemManage->parent_id = 0;
        $systemManage->sort = 0;
        $systemManage->save();

        $menusManage = new AdminMenu();
        $menusManage->name = 'Admin Menus';
        $menusManage->href = 'admin/admin-menus';
        $menusManage->permission_id = 0;
        $menusManage->parent_id = $systemManage->id;
        $menusManage->save();

        $adminUserManage = new AdminMenu();
        $adminUserManage->name = 'Admin Users';
        $adminUserManage->href = 'admin/admin-users';
        $adminUserManage->permission_id = 0;
        $adminUserManage->parent_id = $systemManage->id;
        $adminUserManage->save();


        $adminUserManage = new AdminMenu();
        $adminUserManage->name = 'Permissions';
        $adminUserManage->href = 'admin/permissions';
        $adminUserManage->permission_id = 0;
        $adminUserManage->parent_id = $systemManage->id;
        $adminUserManage->save();

        $adminUserManage = new AdminMenu();
        $adminUserManage->name = 'Roles';
        $adminUserManage->href = 'admin/roles';
        $adminUserManage->permission_id = 0;
        $adminUserManage->parent_id = $systemManage->id;
        $adminUserManage->save();

    }
}
