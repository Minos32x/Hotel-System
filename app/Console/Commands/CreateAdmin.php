<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {--name=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It Will Create New Admin User';

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
        DB::table('users')->insert([
            'email' => $this->option('name'),
            'password' => $this->option('password'),
        ]);
    }
}
