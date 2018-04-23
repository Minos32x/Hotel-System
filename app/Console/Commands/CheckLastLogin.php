<?php

namespace App\Console\Commands;

use App\Http\Controllers\MailsController;
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

        /**
         *  To check on users who hasn't logged in for 30 days
         */
        foreach (User::all() as $user) {
            if (Carbon::now()->diffInDays(Carbon::parse(User::find($user->id)->last_login)) >= 30) {
                $SendTo = new MailsController();
                $SendTo->ReminderMail($user->id);
            }
        }


    }
}
