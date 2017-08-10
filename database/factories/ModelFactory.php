<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$factory->define(App\Model\CompanyModel::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->company
    ];
});

$factory->define(App\Model\DepartmentModel::class, function (Faker\Generator $faker) {

    return [
        'name' => 'DP-' . $faker->name,
        'company_id' => 1
    ];
});

$factory->define(App\Model\EmployeeModel::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'role' => 'employee',
        'status' => 'active',
        'remember_token' => str_random(10),
        'company_id' => 1,
        'department_id' => $faker->numberBetween(1, 5)
    ];
});

$factory->define(App\Model\MoodModel::class, function (Faker\Generator $faker) {

    return [
        'mood' => $faker->randomFloat(0, 1, 5),
        'status' => true,
        'description' => str_random(10),
        'company_id' => 1,
        'employee_id' => $faker->numberBetween(1, 50)

    ];
});

$factory->define(App\Model\MoodReasonModel::class, function (Faker\Generator $faker) {

    return [
        'reason' => $faker->numberBetween(0, 15),
        'mood_id' => $faker->numberBetween(1, 100)
    ];
});


