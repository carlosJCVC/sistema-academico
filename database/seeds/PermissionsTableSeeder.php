<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [ 'name' => 'list users' ],
            [ 'name' => 'create users' ],
            [ 'name' => 'edit users' ],
            [ 'name' => 'delete users' ],

            [ 'name' => 'list roles' ],
            [ 'name' => 'create roles' ],
            [ 'name' => 'edit roles' ],
            [ 'name' => 'delete roles' ],

            [ 'name' => 'list areas' ],
            [ 'name' => 'create areas' ],
            [ 'name' => 'edit areas' ],
            [ 'name' => 'delete areas' ],
/*
            [ 'name' => 'list announcements' ],
            [ 'name' => 'create announcements' ],
            [ 'name' => 'show announcements' ],
            [ 'name' => 'edit announcements' ],
            [ 'name' => 'delete announcements' ],

            [ 'name' => 'list requirements' ],
            [ 'name' => 'create requirements' ],
            [ 'name' => 'edit requirements' ],
            [ 'name' => 'delete requirements' ],

            [ 'name' => 'list conditions' ],
            [ 'name' => 'create conditions' ],
            [ 'name' => 'edit conditions' ],
            [ 'name' => 'delete conditions' ],

            [ 'name' => 'list documents' ],
            [ 'name' => 'create documents' ],
            [ 'name' => 'edit documents' ],
            [ 'name' => 'delete documents' ],

            [ 'name' => 'list events' ],
            [ 'name' => 'create events' ],
            [ 'name' => 'edit events' ],
            [ 'name' => 'delete events' ],

            [ 'name' => 'list califications_merits' ],
            [ 'name' => 'create califications_merits' ],
            [ 'name' => 'edit califications_merits' ],
            [ 'name' => 'delete califications_merits' ],

            [ 'name' => 'list califications_known' ],
            [ 'name' => 'create califications_known' ],
            [ 'name' => 'edit califications_known' ],
            [ 'name' => 'delete califications_known' ],

            [ 'name' => 'list postulants' ],
            [ 'name' => 'create postulants' ],
            [ 'name' => 'edit postulants' ],
            [ 'name' => 'delete postulants' ],

            [ 'name' => 'calificate postulants' ],
            [ 'name' => 'calificate merits postulants' ],
            [ 'name' => 'calificate rating postulants' ],
*/ 
            [ 'name' => 'list academics' ],
            [ 'name' => 'create academics' ],
            [ 'name' => 'edit academics' ],
            [ 'name' => 'delete academics' ],
/*
            [ 'name' => 'list avisos' ],
            [ 'name' => 'create avisos' ],
            [ 'name' => 'edit avisos' ],
            [ 'name' => 'delete avisos' ],

            [ 'name' => 'list items' ],
            [ 'name' => 'create items' ],
            [ 'name' => 'edit items' ],
            [ 'name' => 'delete items' ],

            [ 'name' => 'list publishes' ],
            [ 'name' => 'create publishes' ],
            [ 'name' => 'edit publishes' ],
            [ 'name' => 'delete publishes' ],
            */
        ];

        $admin = Role::find(1);
        $jdpa = Role::find(2);
        $decano = Role::find(3);
        $director = Role::find(4);
        $dpa = Role::find(5);

        foreach ($permissions as $permission) {
            Permission::create($permission);
            $admin->givePermissionTo($permission);
            $jdpa->givePermissionTo($permission);
            $decano->givePermissionTo($permission);
            $director->givePermissionTo($permission);
            $dpa->givePermissionTo($permission);
        }
/*
        $conocimiento->givePermissionTo([
            'list postulants',
            'list announcements',
            'show announcements',
            'edit postulants',
            'calificate postulants',
            'calificate rating postulants',
            'list academics',
            'list items',
            'list avisos',
            'list publishes',
            'create publishes',
            'edit publishes',
            'delete publishes'
        ]);

        $meritos->givePermissionTo([
            'list postulants',
            'list announcements',
            'show announcements',
            'edit postulants',
            'calificate postulants',
            'calificate rating postulants',
            'list academics',
            'list items',
            'list avisos',
            'list publishes',
            'create publishes',
            'edit publishes',
            'delete publishes'
        ]);
*/
    }
}
