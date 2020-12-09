<?php

use App\Models\AsignatureGroup;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{

    const USER_AS_TEACHER_ID = 3;

    // Seeder para los grupos de las materias
    public function run()
    {
        // el caso Homero como leticia
        $materias = [
            12, // 'intro'
            13, // 'elementos'
            30, // 'tis'
            31, // 'arquitecturas de computadoras'
            33  // 'algoritmos avanzados'
        ];

        $groups = [
            2, // 'intro'
            2, // 'elementos'
            3, // 'elementos'
            2, // 'arquitecturas de computadoras'
            2, // 'tis'
            1, // algoritmos avanzados en informatica
        ];

        $data = [
            ['group' => 2, 'asignature_id' => 12],
            ['group' => 2, 'asignature_id' => 13], ['group' => 3, 'asignature_id' => 13],
            ['group' => 2, 'asignature_id' => 31],
            ['group' => 2, 'asignature_id' => 30],
            ['group' => 1, 'asignature_id' => 33],
        ];

        foreach ($data as $group) {
            $group = AsignatureGroup::create($group);
            // $schedule = null;
            // switch ($group->asignature_id) {
            //     case 12:
            //         $schedule = ['teacher' => self::USER_AS_TEACHER_ID, 'from' => '17:15', 'to' => '18:45', 'day' => 'MA'];
            //         break;
            //     case 13:
            //         $schedule = ['teacher' => self::USER_AS_TEACHER_ID, 'from' => '12:45', 'to' => '14:15', 'day' => 'LU'];
            //         break;
            //     case 31:
            //         $schedule = ['teacher' => self::USER_AS_TEACHER_ID, 'from' => '15:45', 'to' => '17:15', 'day' => 'MA'];
            //         break;
            //     case 30:
            //         $schedule = ['teacher' => self::USER_AS_TEACHER_ID, 'from' => '08:15', 'to' => '09:45', 'day' => 'MA'];
            //         break;
            //     case 33:
            //         $schedule = ['teacher' => self::USER_AS_TEACHER_ID, 'from' => '06:45', 'to' => '08:15', 'day' => 'MA'];
            //         break;
            // }
            // $group->teachers()->createMany([$schedule]);
        }
    }
}
