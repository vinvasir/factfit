<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MissedDay extends Notification
{
    use Queueable;

    protected $date;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($date, $user)
    {
        $this->date = $date->format('D. M d, Y');
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('You missed a day on Nutrition Facts Tracker!')
                    ->line('You missed a day on Nutrition Facts Tracker') 
                    ->action('Record activity for ' . $this->date, url('/app/days/create'))
                    ->line('Thanks for using Nutrition Facts Tracker to track your health activity!');
    }

    /**
     * Get the notifiable entity that the notfication belongs to.
     */

    public function notifiable()
    {
        return $this->morphTo();
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->user->name . 'missed ' . $this->date . ' on Nutrition Facts Tracker',
            'username' => $this->user->name,
            'date' => $this->date,
            'link' => '/app/profiles/' . $this->user->id
        ];
    }
}
