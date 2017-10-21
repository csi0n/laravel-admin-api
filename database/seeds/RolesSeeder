<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = factory(\csi0n\LaravelAdminApi\System\Entities\Role::class)->create([
            'name' => 'Admin',
            'display_name' => '管理员',
            'description' => '管理员'
        ]);


//		管理员默认附加所有权限
        $permissions = (new \csi0n\LaravelAdminApi\System\Entities\Permission())->get();
        if ($permissions->isNotEmpty()) {
            $admin->perms()->sync($permissions->pluck('id'));
        }

//		用户附加角色
        $user = (new \csi0n\LaravelAdminApi\System\Entities\User())->first();
        if (!is_null($user)) {
            $user->attachRole($admin);
        }
    }
}
