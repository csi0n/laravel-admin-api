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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\csi0n\LaravelAdminApi\System\Entities\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\csi0n\LaravelAdminApi\System\Entities\Menu::class, function (Faker\Generator $faker) {
    return [
        'language' => 'zh',
        'icon' => 'sidebar-menu-item-icon vuestic-icon vuestic-icon-auth',
        'sort' => 0,
        'status' => 'enable'
    ];
});

$factory->define(\csi0n\LaravelAdminApi\System\Entities\Permission::class, function (Faker\Generator $faker) {
    return [];
});

$factory->define(\csi0n\LaravelAdminApi\System\Entities\Role::class, function (Faker\Generator $faker) {
    return [];
});