<?php

use Illuminate\Database\Seeder;
use App\Area;
use App\Models\Academic;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Academic::create([
            'name' => 'UMSS',
            'status' => 1
        ]);

        $areas = [
            [
                'name' => 'DESARROLLO',
                'academic_id' => 1,
                'slug' => 'desarrollo',
                'description' => 'Esta es el area de desarrollo',
            ],
            [
                'name' => 'TECNOLOGIA',
                'slug' => 'tecnologia',
                'academic_id' => 1,
                'description' => 'Esta es el area de tecnologia',
            ],
            [
                'name' => 'ECONOMIA',
                'academic_id' => 1,
                'slug' => 'economia',
                'description' => 'Esta es el area de economia',
            ],
            [
                'name' => 'CIENCIAS JURIDICAS',
                'academic_id' => 1,
                'slug' => 'juridicas',
                'description' => 'Esta es el area de ciencias juridicas',
            ],
        ];

        foreach ($areas as $item) {
            Area::create($item);
        }
    }
}
