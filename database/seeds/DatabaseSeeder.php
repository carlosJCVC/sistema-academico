<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        // $this->call(RolesHasPermissionsSeeder::class);
        $this->call(JefeDepartamentoPermissions::class);
        $this->call(DocentePermissions::class);
        $this->call(AuxiliarPermissions::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SchedulesSeeder::class);
        $this->call(AsignaturesTableSeeder::class);
        $this->call(GroupsTableSeeder::class);

        // $this->call(AreasTableSeeder::class);
        // $this->call(AnnouncementsTableSeeder::class);
        // $this->call(CalifTableSeeder::class);
        //$this->call(PostulantsTableSeeder::class);
        //$this->call(RequirementsTableSeeder::class);
    }
}
