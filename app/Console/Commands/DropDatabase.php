<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DropDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tis:drop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elimina la base de datos de esta aplicacion';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // https://stackoverflow.com/questions/59662899/how-to-drop-a-database-in-laravel-6
        // https://laravel-tricks.com/tricks/drop-database
        $db_name = config('database.connections.mysql.database');
        $this->line("eliminando base de datos {$db_name}");
        DB::statement("DROP DATABASE `{$db_name}`");
        $this->line("eliminado base de datos {$db_name}");
    }
}
