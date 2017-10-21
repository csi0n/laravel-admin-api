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

Route::resource('permission', 'PermissionController');

Route::resource('role', 'RoleController');

Route::resource('user', 'UserController');