<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use App\User;

class CheckLastLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:last-login';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Last Login On Clients';

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

        $TimeCheck = Carbon::now()->diffInDays(Carbon::parse(User::find(1)->created_at));
        if ($TimeCheck == 3) {
          // Call Mail Send Function here
        }
        
    }
}
