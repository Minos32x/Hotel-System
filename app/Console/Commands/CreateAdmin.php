<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Hash;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Employee;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {--email=} {--password=}';

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
        Employee::create([
            'name' => 'Admin',
            'email' => $this->option('email'),
            'type' => 'admin',
            'national_id' => now(),
            'password' => Hash::make($this->option('password')),
        ]);
        $this->line(' Admin is created successfuly');

    }
}
