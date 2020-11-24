<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'cliente_create',
            ],
            [
                'id'    => 18,
                'title' => 'cliente_edit',
            ],
            [
                'id'    => 19,
                'title' => 'cliente_show',
            ],
            [
                'id'    => 20,
                'title' => 'cliente_delete',
            ],
            [
                'id'    => 21,
                'title' => 'cliente_access',
            ],
            [
                'id'    => 22,
                'title' => 'referencia_pessoal_create',
            ],
            [
                'id'    => 23,
                'title' => 'referencia_pessoal_edit',
            ],
            [
                'id'    => 24,
                'title' => 'referencia_pessoal_show',
            ],
            [
                'id'    => 25,
                'title' => 'referencia_pessoal_delete',
            ],
            [
                'id'    => 26,
                'title' => 'referencia_pessoal_access',
            ],
            [
                'id'    => 27,
                'title' => 'referencia_bancarium_create',
            ],
            [
                'id'    => 28,
                'title' => 'referencia_bancarium_edit',
            ],
            [
                'id'    => 29,
                'title' => 'referencia_bancarium_show',
            ],
            [
                'id'    => 30,
                'title' => 'referencia_bancarium_delete',
            ],
            [
                'id'    => 31,
                'title' => 'referencia_bancarium_access',
            ],
            [
                'id'    => 32,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 33,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 34,
                'title' => 'plano_create',
            ],
            [
                'id'    => 35,
                'title' => 'plano_edit',
            ],
            [
                'id'    => 36,
                'title' => 'plano_show',
            ],
            [
                'id'    => 37,
                'title' => 'plano_delete',
            ],
            [
                'id'    => 38,
                'title' => 'plano_access',
            ],
            [
                'id'    => 39,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
