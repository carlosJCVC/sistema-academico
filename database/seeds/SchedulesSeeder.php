<?php

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hours = [
            '06:45',
            '08:15',
            '09:45',
            '11:15',
            '12:45',
            '14:15',
            '15:45',
            '17:15',
            '18:45',
            '20:15',
            '21:45'
        ];

        $days = [
            'LU',
            'MA',
            'MI',
            'JU',
            'VI',
            'SA',
            'DO'
        ];

        $schedules = [];
        foreach ($days as $day) {
            foreach ($hours as $index => $hour) {
                if ($index !== (count($hours) - 1)) {
                    array_push(
                        $schedules,
                        ['day' => $day, 'from' => $hour, 'to' => $hours[$index + 1]]
                    );
                }
            }
        }

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}
