<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $resources = [
            'cursos',
            'calendarioEscolars',
            'credenciamentos',
            'legislacaos',
            'servicos',
            'informacaos',
            'detalhes',
            'mapaSalas',
            'dirigentes',
        ];

        $actions = ['index', 'show', 'create', 'edit', 'destroy'];

        $permissions = [];

        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                $permissions[] = Permission::firstOrCreate([
                    'name' => "{$resource}.{$action}"
                ]);
            }
        }

        // Roles
        $admin      = Role::firstOrCreate(['name' => 'admin']);
        $secretaria = Role::firstOrCreate(['name' => 'secretaria']);
        $tiFilial   = Role::firstOrCreate(['name' => 'ti_filial']);

        // secretaria e ti_filial → CRUD completo nessas rotas
        $secretaria->syncPermissions($permissions);
        $tiFilial->syncPermissions($permissions);

        // admin → tudo
        $admin->syncPermissions(Permission::all());

        // Permissões exclusivas admin (opcional)
        Permission::firstOrCreate(['name' => 'users.manage']);
        Permission::firstOrCreate(['name' => 'filials.manage']);
    }
}
