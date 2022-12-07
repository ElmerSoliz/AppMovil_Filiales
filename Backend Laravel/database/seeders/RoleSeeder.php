<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$rol = Role::create(['guard_name' => 'admin' , 'name' => 'administrador']);
        $rol = Role::create(['name' => 'administrador']);
        // $rol = Role::create(['name' => 'administrador']);
        $rol1 = Role::create(['name' => 'cliente']);



        // Permission::create(['guard_name' => 'admin' , 'name' => 'miembros.index'])->syncRoles([$role]);
        
        // Permission::create(['name' => 'miembros.show'])->syncRoles([$role1]);

       
        Permission::create(['name' => 'miembros.index'])->syncRoles([$rol, $rol1]);

        Permission::create(['name' => 'miembros.store'])->assignRole($rol);
        Permission::create(['name' => 'miembros.show'])->assignRole($rol);
        Permission::create(['name' => 'miembros.update'])->assignRole($rol);
        Permission::create(['name' => 'miembros.destroy'])->assignRole($rol);

        Permission::create(['name' => 'asignacioRol.index'])->syncRoles([$rol, $rol1]);

        Permission::create(['name' => 'asignacioRol.store'])->assignRole($rol);
        Permission::create(['name' => 'asignacioRol.show'])->assignRole($rol);
        Permission::create(['name' => 'asignacioRols.update'])->assignRole($rol);
        Permission::create(['name' => 'asignacioRol.destroy'])->assignRole($rol);
        
        Permission::create(['name' => 'ministerio.index'])->syncRoles([$rol, $rol1]);

        Permission::create(['name' => 'ministerio.store'])->assignRole($rol);
        Permission::create(['name' => 'ministerio.show'])->assignRole($rol);
        Permission::create(['name' => 'ministerio.update'])->assignRole($rol);
        Permission::create(['name' => 'ministerio.destroy'])->assignRole($rol);

        Permission::create(['name' => 'ministerioasig.index'])->syncRoles([$rol, $rol1]);

        Permission::create(['name' => 'ministerioasig.store'])->assignRole($rol);
        Permission::create(['name' => 'ministerioasig.show'])->assignRole($rol);
        Permission::create(['name' => 'ministerioasig.update'])->assignRole($rol);
        Permission::create(['name' => 'ministerioasig.destroy'])->assignRole($rol);


        // <div class="table-data-feature">
        //     @can('users.show')
        //     <a href="{{ route('users.show', $user->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
        //         <i class="fa fa-eye"></i>
        //     </a>
        //     @endcan
        //     @can('users.edit')
        //     <a href="{{ route('users.edit', $user->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
        //         <i class="zmdi zmdi-edit"></i>
        //     </a>
        //     @endcan
        //     @can('users.destroy')
        //     <form method="POST" action="{{ route('users.destroy', $user->id) }}">
        //         @csrf
        //         @method('DELETE')
        //         <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
        //             <i class="zmdi zmdi-delete"></i>
        //         </button>
        //     </form>
        // @endcan
    }
}
