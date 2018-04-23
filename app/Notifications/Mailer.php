<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Mailer extends Notification implements shouldQueue
{
    use Queueable;
    protected $Intro;
    protected $LineOne;
    protected $Action;
    protected $LineTwo;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Intro, $LineOne, $Action, $LineTwo)
    {
        $this->Intro = $Intro;
        $this->LineOne = $LineOne;
        $this->Action = $Action;
        $this->LineTwo = $LineTwo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting($this->Intro)
            ->line($this->LineOne)
            ->action($this->Action, url('http://hotel.local'))
            ->line($this->LineTwo);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
