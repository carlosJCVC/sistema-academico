<?php

use Illuminate\Database\Seeder;

class RequirementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requirements = [
            [
                'title' => 'carnet',
                'description' => 'Se requiere el carnet de identidad del postulante',
                'announcement_id' => 1,
                'required' => true
            ],
            [
                'title' => 'foto',
                'description' => 'Se requiere una fotografia 3x3 actualizada',
                'announcement_id' => 1,
                'required' => true
            ],
            [
                'title' => 'tecnologia',
                'description' => 'Manejo de tecnologias como nodejs, graphql, vuejs',
                'announcement_id' => 1,
                'required' => true
            ],
            [
                'title' => 'tecnologia',
                'description' => 'Se tomara en cuenta conocimientos en java',
                'announcement_id' => 1,
                'required' => false
            ],
            [
                'title' => 'tecnologia',
                'description' => 'ingles fluido',
                'announcement_id' => 1,
                'required' => false
            ],
            [
                'title' => 'carnet',
                'description' => 'Se requiere el carnet de identidad del postulante',
                'announcement_id' => 3,
                'required' => true
            ],
            [
                'title' => 'foto',
                'description' => 'Se requiere una fotografia 3x3 actualizada fondo rojo',
                'announcement_id' => 3,
                'required' => true
            ],
            [
                'title' => 'EXOERIENCIA',
                'description' => 'Ser experimeintado y tener un buen curriculum',
                'announcement_id' => 3,
                'required' => true
            ],
            [
                'title' => 'tecnologia',
                'description' => 'Egresado de la universidad',
                'announcement_id' => 3,
                'required' => false
            ],
            [
                'title' => 'tecnologia',
                'description' => 'Buen manejo y conocimientos de las leyes',
                'announcement_id' => 3,
                'required' => false
            ],
            [
                'title' => 'carnet',
                'description' => 'Se requiere el carnet de identidad del postulante',
                'announcement_id' => 2,
                'required' => true
            ],
            [
                'title' => 'foto',
                'description' => 'Se requiere una fotografia 3x3',
                'announcement_id' => 2,
                'required' => true
            ],
            [
                'title' => 'tecnologia',
                'description' => 'Manejo y control de inventarios',
                'announcement_id' => 2,
                'required' => true
            ],
            [
                'title' => 'tecnologia',
                'description' => 'Tener experiencia previa en algunos/as areas',
                'announcement_id' => 2,
                'required' => false
            ],
            [
                'title' => 'tecnologia',
                'description' => 'Titulo de egreso ',
                'announcement_id' => 2,
                'required' => false
            ],
        ];

        foreach ($requirements as $item) {
            \App\Requirement::create($item);
        }
    }
}
