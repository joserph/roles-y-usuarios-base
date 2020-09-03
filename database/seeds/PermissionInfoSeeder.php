<?php

use Illuminate\Database\Seeder;
use App\User;
use App\PermissionFolder\Models\Role;
use App\PermissionFolder\Models\Permission;
use Illuminate\Support\Facades\Hash;

class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User Admin
        $userAdmin = User::where('email', 'admin@admin.com')->first();
        if($userAdmin)
        {
            $userAdmin->delete();
        }
        $userAdmin = User::create([
            'name'      => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('admin')
        ]);
        
    }
}
