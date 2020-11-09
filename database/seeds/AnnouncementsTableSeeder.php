<?php

use App\Area;
use App\User;
use Illuminate\Database\Seeder;
use App\Announcement;
use App\Models\Academic;
use App\Item;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = [
            'name' => 'SISTEMAS',
            'code' => 'LAB-ASASSASS0',
            'level' => '8vo semestre',
            'teacher' => 'Valkiria',
            'destine' => 'DOCENCIA'
        ];

        Item::create($item);

        $announcements = [
            [
                'title' => 'FULLSTACK DEVELOPER',
                'description' => 'Se requiere para la empresa un desarrollador fullstack el cual seran puestos en un concursos de meritos a traves de sitio ',
                'item_id' => 1,
                'code' => '12345',
                'gestion' => 'I-2020',
                'academic_id' => 1,
                'start_date_announcement' => \Carbon\Carbon::now(),
                'end_date_announcement' => \Carbon\Carbon::now(),
                'start_date_calification' => \Carbon\Carbon::now(),
                'end_date_calification' => \Carbon\Carbon::now(),
            ],
            [
                'title' => 'CONTADOR',
                'description' => 'Se requiere para la empresa un estudiante de contaduria publica los postulantes deben presentar sus documentos ',
                'item_id' => 1,
                'code' => '123456',
                'gestion' => 'Ii-2020',
                'academic_id' => 1,
                'start_date_announcement' => \Carbon\Carbon::now(),
                'end_date_announcement' => \Carbon\Carbon::now(),
                'start_date_calification' => \Carbon\Carbon::now(),
                'end_date_calification' => \Carbon\Carbon::now(),
            ],
            [
                'title' => 'ABOGADO',
                'description' => 'Se requiere para la empresa un abogado el cual seran puestos en un concursos de meritos a traves de sitio ',
                'item_id' => 1,
                'code' => '5478952',
                'gestion' => 'I-2019',
                'academic_id' => 1,
                'start_date_announcement' => \Carbon\Carbon::now(),
                'end_date_announcement' => \Carbon\Carbon::now(),
                'start_date_calification' => \Carbon\Carbon::now(),
                'end_date_calification' => \Carbon\Carbon::now(),
            ],
            [
                'title' => 'EXPERTO BASE DE DATOS',
                'description' => 'Se requiere para la empresa un experto en el area de base de datos el cual seran puestos en un concursos de meritos a traves de sitio ',
                'item_id' => 1,
                'code' => '12345',
                'gestion' => 'I-2018',
                'academic_id' => 1,
                'start_date_announcement' => \Carbon\Carbon::now(),
                'end_date_announcement' => \Carbon\Carbon::now(),
                'start_date_calification' => \Carbon\Carbon::now(),
                'end_date_calification' => \Carbon\Carbon::now(),
            ],
            [
                'title' => 'EXPERTO EN .NET',
                'description' => 'Se requiere para la empresa un experto en el area de base de datos el cual seran puestos en un concursos de meritos a traves de sitido ',
                'item_id' => 1,
                'code' => '123454',
                'gestion' => 'I-2017',
                'academic_id' => 1,
                'start_date_announcement' => \Carbon\Carbon::now(),
                'end_date_announcement' => \Carbon\Carbon::now(),
                'start_date_calification' => \Carbon\Carbon::now(),
                'end_date_calification' => \Carbon\Carbon::now(),
            ],
        ];

        $academics = Academic::find([1, 2, 3, 4]);
        $user = User::find(2);
        $homero = User::find(4);

        foreach ($announcements as $item) {
            $announ = new Announcement($item);
            $announ->save();

            // $announ->academics()->attach($academics);
            $announ->postulants()->attach($user);
            $announ->postulants()->attach($homero);
        }
    }
}
