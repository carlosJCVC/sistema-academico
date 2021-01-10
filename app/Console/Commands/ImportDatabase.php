<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ImportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tis:import {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'importa segun el parametro enviado (ruta al archivo .sql)';

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
        $path_artisan_command = $this->argument('path');
        $db_name = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $pwd = config('database.connections.mysql.password');

        $process = new Process("mysql -u {$username} -p{$pwd} {$db_name} < {$path_artisan_command}");
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        echo $process->getOutput();
    }
}
