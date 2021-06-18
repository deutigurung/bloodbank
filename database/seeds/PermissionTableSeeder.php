<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'donor_management']);
        Permission::create(['name' => 'blog_management']);
        Permission::create(['name' => 'volunteer_management']);
        Permission::create(['name' => 'user_management']);
        Permission::create(['name' => 'contact_management']);
        Permission::create(['name' => 'dashboard_management']);
        Permission::create(['name' => 'blood_management']);

    }
}
