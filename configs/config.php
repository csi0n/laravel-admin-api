<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 11:19 AM
 */
return [
    'prefix'=>'laravel-admin-api/api',
    'authMiddleware'=>'api',
    'otherMiddleware'=>'web',
    'datatables' => [
        'permission' => [
            'enableAction' => true,
            'paginate' => [
                'limit' => 10,
            ],
            'columns' => [
                'id' => [
                    'name' => 'id',
                    'render' => false,
                ],
                'name' => [
                    'name' => 'name',
                    'zh_name' => '值',
                    'searchable' => true,
                    'searchType' => 'input',
                    'render' => true,
                    'placeholder' => '请输入权限值',
                    'default' => true
                ],
                'display_name' => [
                    'name' => 'display_name',
                    'zh_name' => '展示名称',
                    'searchable' => true,
                    'searchType' => 'input',
                    'render' => true,
                    'placeholder' => '请输入展示名称',
                    'default' => true
                ],
                'description' => [
                    'name' => 'description',
                    'zh_name' => '描述',
                    'searchable' => true,
                    'searchType' => 'input',
                    'render' => true,
                    'placeholder' => '请输入描述',
                    'default' => false
                ]
            ],
        ],
        'role' => [
            'enableAction' => true,
            'paginate' => [
                'limit' => 10,
            ],
            'columns' => [
                'id' => [
                    'name' => 'id',
                    'render' => false,
                ],
                'name' => [
                    'name' => 'name',
                    'zh_name' => '值',
                    'searchable' => true,
                    'searchType' => 'input',
                    'render' => true,
                    'placeholder' => '请输入权限值',
                    'default' => true
                ],
                'display_name' => [
                    'name' => 'display_name',
                    'zh_name' => '展示名称',
                    'searchable' => true,
                    'searchType' => 'input',
                    'render' => true,
                    'placeholder' => '请输入展示名称',
                    'default' => true
                ],
                'description' => [
                    'name' => 'description',
                    'zh_name' => '描述',
                    'searchable' => true,
                    'searchType' => 'input',
                    'render' => true,
                    'placeholder' => '请输入描述',
                    'default' => false
                ]
            ],
        ],
        'user' => [
            'enableAction' => true,
            'paginate' => [
                'limit' => 10,
            ],
            'columns' => [
                'id' => [
                    'name' => 'id',
                    'render' => false,
                ],
                'name' => [
                    'name' => 'name',
                    'zh_name' => '用户昵称',
                    'searchable' => true,
                    'searchType' => 'input',
                    'render' => true,
                    'placeholder' => '请输入用户昵称',
                    'default' => true
                ],
                'email' => [
                    'name' => 'email',
                    'zh_name' => '邮箱',
                    'searchable' => true,
                    'searchType' => 'input',
                    'render' => true,
                    'placeholder' => '请输入用户邮箱',
                    'default' => true
                ]
            ],
        ]
    ],
    'cache' => [
        'menuCacheKey' => 'menusCache'
    ]
];