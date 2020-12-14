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

    // NO APARECE TODOS LOS PERMISOS para poder crear roles y asignar a los usuarios. 
    // Por ejemplo, falta (horarios, informes, planillas, Reposiciones, Justificaciones) 

    public function run()
    {
        $permissions = [

            ['name' => 'list users'],  // 1
            ['name' => 'create users'], // 2
            ['name' => 'edit users'], // 3
            ['name' => 'delete users'], // 4

            ['name' => 'list roles'], // 5
            ['name' => 'create roles'],  // 6
            ['name' => 'edit roles'], // 7
            ['name' => 'delete roles'], // 8

            ['name' => 'list schedules'], // 9
            ['name' => 'create schedules'], // 10
            ['name' => 'edit schedules'], // 11
            ['name' => 'delete schedules'], // 12

            ['name' => 'list academics'], // 13
            ['name' => 'create academics'], // 14
            ['name' => 'edit academics'], // 15
            ['name' => 'delete academics'], // 16

            ['name' => 'list areas'], // 17
            ['name' => 'create areas'], // 18
            ['name' => 'edit areas'], // 19
            ['name' => 'delete areas'], // 20

            ['name' => 'list authorities'], // 21
            ['name' => 'create authorities'], // 22
            ['name' => 'edit authorities'], // 23
            ['name' => 'delete authorities'], // 24

            ['name' => 'list asignatures'], // 25
            ['name' => 'create asignatures'], // 26
            ['name' => 'edit asignatures'], // 27
            ['name' => 'delete asignatures'], // 28

            ['name' => 'list groups'], // 29
            ['name' => 'create groups'], // 30
            ['name' => 'edit groups'], // 31
            ['name' => 'delete groups'], // 32

            ['name' => 'list week reports'], // 33
            ['name' => 'create week reports'], // 34
            ['name' => 'edit week reports'], // 35
            ['name' => 'delete week reports'], // 36

            ['name' => 'list reports planillas'], // 37

            ['name' => 'list classroom'], // 38
            ['name' => 'create classroom'], // 39
            ['name' => 'edit classroom'], // 40
            ['name' => 'delete classroom'], // 41

            ['name' => 'list absences'], // 42
            ['name' => 'create absences'], // 43
            ['name' => 'edit absences'], // 44
            ['name' => 'delete absences'], // 45

            ['name' => 'list bitacoras'], // 46

            ['name' => 'list backups'], // 47
            ['name' => 'create backups'], // 48
            ['name' => 'download backups'], // 49
            ['name' => 'delete backups'], // 50

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

        // $admin = Role::find(1);
        // $jdpa = Role::find(2);
        // $decano = Role::find(3);
        // $director = Role::find(4);
        // $dpa = Role::find(5);

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
        foreach ($permissions as $permission) {
            Permission::create($permission);
            // $admin->givePermissionTo($permission);
            // $jdpa->givePermissionTo($permission);
            // $decano->givePermissionTo($permission);
            // $director->givePermissionTo($permission);
            // $dpa->givePermissionTo($permission);
        }
    }
}
