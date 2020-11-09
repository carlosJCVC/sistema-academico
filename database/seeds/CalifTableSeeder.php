<?php

use Illuminate\Database\Seeder;
use App\Models\Calification;
use App\Models\Rating;
use App\Models\SubCalification;
use App\Models\SubRating;

class CalifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $califications = [
            [
                'announcement_id' => 1,
                'title' => 'RENDIMIENTO ACADÉMICO',
                'percentage' => 0.65,
                'description' => 'Kardex'
            ],
            [
                'announcement_id' => 1,
                'title' => 'EXPERIENCIA GENERAL',
                'percentage' => 0.35,
                'description' => 'DescSe califica sobre la base de tablas elaboradas por el Departamento de Informática y Sistemas conforme a este desglose.'
            ]
        ];

        $ratings = [
            [
                'announcement_id' => 1,
                'title' => 'Conocimiento',
                'percentage' => 1,
                'description' => 'La calificación de conocimientos se realiza sobre la base de 100 puntos, equivalentes al 80% de la calificación final. Se realizarán las siguientes pruebas:'
            ]
        ];

        $subcalif = [
            [
                'calification_id' => 1,
                'title' => 'Promedio',
                'percentage' => 0.35,
                'description' => 'Promedio de aprobación de la materia a la que postula (incluye reprobadas y abandonos):'
            ],
            [
                'calification_id' => 1,
                'title' => 'Promedio materias',
                'percentage' => 0.30,
                'description' => 'Promedio de aprobación de la materia a la que postula (incluye reprobadas y abandonos):'
            ],
        ];

        $subratings = [
            [
                'rating_id' => 1,
                'title' => 'Promedio',
                'percentage' => 0.40,
                'description' => 'Examen escrito de conocimientos (prueba de preselección)'
            ],
            [
                'rating_id' => 1,
                'title' => 'Promedio materias',
                'percentage' => 0.60,
                'description' => 'b) Examen oral, donde se evaluarán aspectos didácticos y pedagógicos sobre
                conocimiento y dominio de la materia. Tendrá una duración máxima de 25 minutos:
                15 minutos de exposición y 10 minutos de
                preguntas'
            ]
            /*,
            [
                'rating_id' => 2,
                'title' => 'Experiencia',
                'percentage' => 0.25,
                'description' => 'Documentos de experiencia universitaria'
            ],
            [
                'rating_id' => 2,
                'title' => 'Experiencia extrauniversitaria',
                'percentage' => 0.10,
                'description' => 'Documentos de experiencia extrauniversitaria'
            ],
            */
        ];

        foreach ($califications as $item) {
            Calification::create($item);
        }

        foreach ($ratings as $item) {
            Rating::create($item);
        }

        foreach ($subcalif as $item) {
            SubCalification::create($item);
        }

        foreach ($subratings as $item) {
            SubRating::create($item);
        }
    }
}
