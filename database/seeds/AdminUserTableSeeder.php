<?php

use Illuminate\Database\Seeder;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobTitle = ['Phper', 'Javaer', 'Pythoner', 'C++'];

        for ($i = 0; $i <= 100; $i++) {
            $adminName = str_random(10);
            $admin    = new App\Admin;
            $admin->name      = $adminName;
            $admin->email     = $adminName.'@gmail.com';
            $admin->job_title = array_random($jobTitle, 1)[0];
            $admin->password  = bcrypt('123456');
            $admin->save();
        }
    }
}
