<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 11:57 AM
 */
Route::group(['prefix' => 'menu', 'as' => 'menu.'], function ($router) {
    Route::post('sort', [
        'uses' => 'MenuController@sort',
        'as' => 'sort'
    ]);
});
Route::resource('menu', 'MenuController');

Route::resource('permission', 'PermissionController', [
    'only' => [
        'index',
        'store',
        'edit',
        'update',
        'destroy',
        'show'
    ]
]);

Route::resource('role', 'RoleController', [
    'only' => [
        'index',
        'store',
        'edit',
        'update',
        'destroy',
        'show'
    ]
]);

Route::resource('user', 'UserController', [
    'only' => [
        'store',
        'edit',
        'update',
        'destroy',
        'show',
        'index'
    ]
]);