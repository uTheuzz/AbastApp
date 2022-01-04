<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    
    static $permissions = [
        'admin',
        'user',
    ];
    
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}
