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
            ['name' => 'calculo 1', 'year' => '2021', 'number' => 'I'],
            ['name' => 'calculo 2', 'year' => '2021', 'number' => 'I'],
            ['name' => 'calculo 3', 'year' => '2021', 'number' => 'I'],
            ['name' => 'ecuaciones diferenciales', 'year' => '2021', 'number' => 'I'],
            ['name' => 'algebra', 'year' => '2021', 'number' => 'I'],
            ['name' => 'algebra 2', 'year' => '2021', 'number' => 'I'],
            ['name' => 'algebra matricial', 'year' => '2021', 'number' => 'I'],
            ['name' => 'matematica discreta', 'year' => '2021', 'number' => 'I'],
            ['name' => 'fisica', 'year' => '2021', 'number' => 'I'],
            ['name' => 'fisica 2', 'year' => '2021', 'number' => 'I'],
            ['name' => 'fisica 3', 'year' => '2021', 'number' => 'I'],
            ['name' => 'introduccion a la programacion', 'year' => '2021', 'number' => 'I'],
            ['name' => 'elementos de programacion', 'year' => '2021', 'number' => 'I'],
            ['name' => 'taller de programacion', 'year' => '2021', 'number' => 'I'],
            ['name' => 'base de datos', 'year' => '2021', 'number' => 'I'],
            ['name' => 'base de datos 2', 'year' => '2021', 'number' => 'I'],
            ['name' => 'taller base de datos', 'year' => '2021', 'number' => 'I'],
            ['name' => 'redes', 'year' => '2021', 'number' => 'I'],
            ['name' => 'redes avanzadas', 'year' => '2021', 'number' => 'I'],
            ['name' => 'sistemas de informacion', 'year' => '2021', 'number' => 'I'],
            ['name' => 'sistemas de informacion 2', 'year' => '2021', 'number' => 'I'],
            ['name' => 'ingles', 'year' => '2021', 'number' => 'I'],
            ['name' => 'ingles 2', 'year' => '2021', 'number' => 'I'],
            ['name' => 'ingles 3', 'year' => '2021', 'number' => 'I'],
            ['name' => 'perfil', 'year' => '2021', 'number' => 'I'],
            ['name' => 'taller de grado', 'year' => '2021', 'number' => 'I'],
            ['name' => 'taller de grado 2', 'year' => '2021', 'number' => 'I'],
            ['name' => 'inteligencia artificial', 'year' => '2021', 'number' => 'I'],
            ['name' => 'inteligencia artificial 2', 'year' => '2021', 'number' => 'I'],
            ['name' => 'taller de ingenieria de software', 'year' => '2021', 'number' => 'I'],
            ['name' => 'arquitectura de computadoras', 'year' => '2021', 'number' => 'I'],
            ['name' => 'grafos', 'year' => '2021', 'number' => 'I'],
            ['name' => 'algoritmos avanzados', 'year' => '2021', 'number' => 'I'],
        ];

        foreach ($asignatures as $asignature) {
            Asignature::create($asignature);
        }
    }
}
