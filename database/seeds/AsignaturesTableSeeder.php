<?php

use App\Models\Asignature;
use Illuminate\Database\Seeder;

class AsignaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asignatures = [
            ['name' => 'calculo 1', 'year' => '2020', 'number' => 'II'],
            ['name' => 'calculo 2', 'year' => '2020', 'number' => 'II'],
            ['name' => 'calculo 3', 'year' => '2020', 'number' => 'II'],
            ['name' => 'ecuaciones diferenciales', 'year' => '2020', 'number' => 'II'],
            ['name' => 'algebra', 'year' => '2020', 'number' => 'II'],
            ['name' => 'algebra 2', 'year' => '2020', 'number' => 'II'],
            ['name' => 'algebra matricial', 'year' => '2020', 'number' => 'II'],
            ['name' => 'matematica discreta', 'year' => '2020', 'number' => 'II'],
            ['name' => 'fisica', 'year' => '2020', 'number' => 'II'],
            ['name' => 'fisica 2', 'year' => '2020', 'number' => 'II'],
            ['name' => 'fisica 3', 'year' => '2020', 'number' => 'II'],
            ['name' => 'introduccion a la programacion', 'year' => '2020', 'number' => 'II'],
            ['name' => 'elementos de programacion', 'year' => '2020', 'number' => 'II'],
            ['name' => 'taller de programacion', 'year' => '2020', 'number' => 'II'],
            ['name' => 'base de datos', 'year' => '2020', 'number' => 'II'],
            ['name' => 'base de datos 2', 'year' => '2020', 'number' => 'II'],
            ['name' => 'taller base de datos', 'year' => '2020', 'number' => 'II'],
            ['name' => 'redes', 'year' => '2020', 'number' => 'II'],
            ['name' => 'redes avanzadas', 'year' => '2020', 'number' => 'II'],
            ['name' => 'sistemas de informacion', 'year' => '2020', 'number' => 'II'],
            ['name' => 'sistemas de informacion 2', 'year' => '2020', 'number' => 'II'],
            ['name' => 'ingles', 'year' => '2020', 'number' => 'II'],
            ['name' => 'ingles 2', 'year' => '2020', 'number' => 'II'],
            ['name' => 'ingles 3', 'year' => '2020', 'number' => 'II'],
            ['name' => 'perfil', 'year' => '2020', 'number' => 'II'],
            ['name' => 'taller de grado', 'year' => '2020', 'number' => 'II'],
            ['name' => 'taller de grado 2', 'year' => '2020', 'number' => 'II'],
            ['name' => 'inteligencia artificial', 'year' => '2020', 'number' => 'II'],
            ['name' => 'inteligencia artificial 2', 'year' => '2020', 'number' => 'II'],
            ['name' => 'taller de ingenieria de software', 'year' => '2020', 'number' => 'II'],
            ['name' => 'arquitectura de computadoras', 'year' => '2020', 'number' => 'II'],
            ['name' => 'grafos', 'year' => '2020', 'number' => 'II'],
            ['name' => 'algoritmos avanzados', 'year' => '2020', 'number' => 'II'],
        ];

        foreach ($asignatures as $asignature) {
            Asignature::create($asignature);
        }
    }
}
