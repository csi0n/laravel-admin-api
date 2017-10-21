<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.user.manage',
            'display_name' => '用户管理',
            'description' => '用户管理',
            'class_settings' => ''
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.user.lists',
            'display_name' => '用户列表',
            'description' => '用户列表',
            'class_settings' => 'class|csi0n\LaravelAdminApi\System\Http\Controllers\UserController[index]'
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.user.create',
            'display_name' => '创建用户',
            'description' => '创建用户',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\UserController[create,store]
button|csi0n\LaravelAdminApi\System\Entities\User[destroy]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.user.edit',
            'display_name' => '编辑用户',
            'description' => '编辑用户',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\UserController[edit,update]
button|csi0n\LaravelAdminApi\System\Entities\User[edit,update]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.user.show',
            'display_name' => '用户详情',
            'description' => '用户详情',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\UserController[show]
button|csi0n\LaravelAdminApi\System\Entities\User[show]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.user.destroy',
            'display_name' => '删除用户',
            'description' => '删除用户',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\UserController[destroy]
button|csi0n\LaravelAdminApi\System\Entities\UserController[destroy]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.permission.manage',
            'display_name' => '权限管理',
            'description' => '权限管理',
            'class_settings' => ''
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.permission.lists',
            'display_name' => '权限列表',
            'description' => '权限列表',
            'class_settings' => 'class|csi0n\LaravelAdminApi\System\Http\Controllers\PermissionController[index]'
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.permission.create',
            'display_name' => '创建权限',
            'description' => '创建权限',
            'class_settings' => 'class|csi0n\LaravelAdminApi\System\Http\Controllers\PermissionController[create,store]'
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.permission.edit',
            'display_name' => '编辑权限',
            'description' => '编辑权限',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\PermissionController[edit,update]
button|csi0n\LaravelAdminApi\System\Entities\Permission[edit]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.permission.show',
            'display_name' => '权限详情',
            'description' => '权限详情',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\PermissionController[show]
button|csi0n\LaravelAdminApi\System\Entities\Permission[show]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.permission.destroy',
            'display_name' => '删除权限',
            'description' => '删除权限',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\PermissionController[destroy]
button|csi0n\LaravelAdminApi\System\Entities\Permission[destroy]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.role.manage',
            'display_name' => '角色管理',
            'description' => '角色管理',
            'class_settings' => ''
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.role.lists',
            'display_name' => '角色列表',
            'description' => '角色列表',
            'class_settings' => 'class|csi0n\LaravelAdminApi\System\Http\Controllers\RoleController[index]'
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.role.create',
            'display_name' => '添加角色',
            'description' => '添加角色',
            'class_settings' => 'class|csi0n\LaravelAdminApi\System\Http\Controllers\RoleController[create,store]'
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.role.edit',
            'display_name' => '编辑角色',
            'description' => '编辑角色',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\RoleController[edit,update]
button|csi0n\LaravelAdminApi\System\Entities\Role[edit]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.role.show',
            'display_name' => '角色详情',
            'description' => '角色详情',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\RoleController[show]
button|csi0n\LaravelAdminApi\System\Entities\Role[show]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.role.destroy',
            'display_name' => '删除角色',
            'description' => '删除角色',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\RoleController[destroy]
button|csi0n\LaravelAdminApi\System\Entities\Role[destroy]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.menu.manage',
            'display_name' => '菜单管理',
            'description' => '菜单管理',
            'class_settings' => ''
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.menu.lists',
            'display_name' => '菜单列表',
            'description' => '菜单列表',
            'class_settings' => 'class|csi0n\LaravelAdminApi\System\Http\Controllers\MenuController[index]'
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.menu.create',
            'display_name' => '添加菜单',
            'description' => '添加菜单',
            'class_settings' => 'class|csi0n\LaravelAdminApi\System\Http\Controllers\MenuController[create,store]'
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.menu.edit',
            'display_name' => '编辑菜单',
            'description' => '编辑菜单',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\MenuController[edit,update]
button|csi0n\LaravelAdminApi\System\Entities\Menu[edit]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.menu.show',
            'display_name' => '菜单详情',
            'description' => '菜单详情',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\MenuController[show]
button|csi0n\LaravelAdminApi\System\Entities\Menu[show]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.menu.destroy',
            'display_name' => '删除菜单',
            'description' => '删除菜单',
            'class_settings' => <<<EOF
class|csi0n\LaravelAdminApi\System\Http\Controllers\MenuController[destroy]
button|csi0n\LaravelAdminApi\System\Entities\Menu[destroy]
EOF
        ]);
        factory(\csi0n\LaravelAdminApi\System\Entities\Permission::class)->create([
            'name' => 'system.menu.sort',
            'display_name' => '菜单排序',
            'description' => '菜单排序',
            'class_settings' => 'class|csi0n\LaravelAdminApi\System\Http\Controllers\MenuController[sort]'
        ]);
    }
}
