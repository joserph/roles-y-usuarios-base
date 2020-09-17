<?php

use Illuminate\Database\Seeder;
use App\User;
use App\PermissionFolder\Models\Role;
use App\PermissionFolder\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate
        DB::statement("SET foreign_key_checks=0");
            DB::table('role_user')->truncate();
            DB::table('permission_role')->truncate();
            Permission::truncate();
            Role::truncate();
        DB::statement("SET foreign_key_checks=1");

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

        $rolAdmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrador',
            'full-access' => 'yes'
        ]);

        $rolUser = Role::create([
            'name' => 'Registered User',
            'slug' => 'registered-user',
            'description' => 'Registered User',
            'full-access' => 'no'
        ]);
        
        // Table role_user
        $userAdmin->roles()->sync([$rolAdmin->id]);
        
        // Permission
        $permissionAll = [];


        // permission role
        $permission = Permission::create([
            'name' => 'List role',
            'slug' => 'role.index',
            'description' => 'Un usuario puede listar un rol',
        ]);
        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create role',
            'slug' => 'role.create',
            'description' => 'Un usuario puede crear un rol',
        ]);
        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit role',
            'slug' => 'role.edit',
            'description' => 'Un usuario puede editar un rol',
        ]);
        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy role',
            'slug' => 'role.destroy',
            'description' => 'Un usuario puede eliminar un rol',
        ]);
        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show role',
            'slug' => 'role.show',
            'description' => 'Un usuario puede ver un rol',
        ]);

        $permissionAll[] = $permission->id;
        
        // permission user
        $permission = Permission::create([
            'name' => 'List user',
            'slug' => 'user.index',
            'description' => 'Un usuario puede listar un user',
        ]);

        $permissionAll[] = $permission->id;

        /*$permission = Permission::create([
            'name' => 'Create user',
            'slug' => 'user.create',
            'description' => 'Un usuario puede crear un user',
        ]);

        $permissionAll[] = $permission->id;*/

        $permission = Permission::create([
            'name' => 'Edit user',
            'slug' => 'user.edit',
            'description' => 'Un usuario puede editar un user',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy user',
            'slug' => 'user.destroy',
            'description' => 'Un usuario puede eliminar un user',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show user',
            'slug' => 'user.show',
            'description' => 'Un usuario puede ver un user',
        ]);

        $permissionAll[] = $permission->id;


        $permission = Permission::create([
            'name' => 'Show own user',
            'slug' => 'userown.show',
            'description' => 'Un usuario puede ver su propio user',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit own user',
            'slug' => 'userown.edit',
            'description' => 'Un usuario puede editar su propio user',
        ]);
        
        $permissionAll[] = $permission->id;

        // Table permission_role
        //$rolAdmin->permissions()->sync($permissionAll);
    }
}
