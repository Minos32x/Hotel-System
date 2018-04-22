<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Notifications\Mailer;
use App\User;

class MailsController extends Controller
{
    public function send ($id)
    {
        $user = User::find($id);
        $DelayTime=Carbon::now()->addSeconds(10);
        $user->notify((new Mailer("Welcome $user->name To Our Hotel"))->delay($DelayTime));

        return view('welcome');
    }
}
