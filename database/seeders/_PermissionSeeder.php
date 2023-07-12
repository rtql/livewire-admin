<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class _PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'slide-list',
            'slide-create',
            'slide-edit',
            'slide-delete',
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'career-list',
            'career-create',
            'career-edit',
            'jobRequest-list',
            'career-delete',
            'page-list',
            'page-create',
            'page-edit',
            'page-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'gallery-list',
            'gallery-create',
            'gallery-edit',
            'gallery-delete',
            'trash-list',
            'trash-create',
            'trash-edit',
            'trash-delete',
            'trash-restore',
            'about-list',
            'about-create',
            'about-edit',
            'about-delete',
            'contact-list',
            'contact-create',
            'contact-edit',
            'contact-delete',
            'room-list',
            'room-create',
            'room-edit',
            'room-delete',
            'restaurant-list',
            'restaurant-create',
            'restaurant-edit',
            'restaurant-delete',
            'service-list',
            'service-create',
            'service-edit',
            'service-delete',
            'transaction-list',
            'transaction-create',
            'transaction-edit',
            'transaction-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
