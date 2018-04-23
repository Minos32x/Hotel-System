<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Notifications\Mailer;
use App\User;

class MailsController extends Controller
{
    public function GreetingMail($id)
    {
        $user = User::find($id);
        $DelayTime = Carbon::now()->addSeconds(10);

        $MailGreeting = "Welcome  $user->name To Our Hotel";
        $MailLineOne = 'You Can Check Your Reservation In The Link Below from controller.';
        $MailAction = 'Room Reservation';
        $MailLineTwo = 'Thank you for Visiting Us Looking Forward To See You Again';

        $user->notify((new Mailer($MailGreeting, $MailLineOne, $MailAction, $MailLineTwo))->delay($DelayTime));
        return view('welcome');
    }


    public function ReminderMail($id)
    {
        $user = User::find($id);
        $DelayTime = Carbon::now()->addSeconds(10);

        $ReminderGreeting = 'Greeting : ' . $user->name;
        $ReminderLineOne = 'You Didn\'t Log in since: ' . $user->last_login;
        $ReminderAction = 'Visit Us Again';
        $ReminderLineTwo = 'We Miss You Looking Forward To See You As Soon As Possible';

        $user->notify((new Mailer($ReminderGreeting, $ReminderLineOne, $ReminderAction, $ReminderLineTwo))->delay($DelayTime));
        return view('welcome');

    }


}
