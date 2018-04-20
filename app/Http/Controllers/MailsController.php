<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\Mailer;
use App\User;

class MailsController extends Controller
{
    public function send ($id)
    {
        $user = User::find($id);

        $user->notify((new Mailer("Welcome $user->name To Our Hotel"))->onQueue('Welcome-Notification'));

        return view('welcome');
    }
}
