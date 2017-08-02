<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\CompanyModel::class, 1)->create();
        factory(App\Model\DepartmentModel::class, 5)->create();
        factory(App\Model\EmployeeModel::class,50)->create();
        factory(App\Model\MoodModel::class,100)->create();
        factory(App\Model\MoodReasonModel::class,200)->create();

        return;
    }
}
