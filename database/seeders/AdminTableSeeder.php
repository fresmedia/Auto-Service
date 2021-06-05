<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        Admin::truncate();
        Schema::enableForeignKeyConstraints();
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $adminPermission = config('allpermissions.raw_permissions');

        $admin = Admin::create([
                    'first_name' => 'Super',
                    'last_name' => 'Admin',
                    'username' => 'super_admin',
                    'email' => 'superadmin@gmail.com',
                    'password' => Hash::make('123456'),
                    'status' => '1'
                ]);

        if (!empty($adminPermission)) {
            foreach ($adminPermission as $module => $value) {
                foreach ($value as $perm) {
                    Permission::firstOrCreate(['name' => $module.'.'.$perm, 'group_name' => $module]);
                    $admin->givePermissionTo($module.'.'.$perm);
                }
            }
        } 

        
        Model::reguard();
    }
}
