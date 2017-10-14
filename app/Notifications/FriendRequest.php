<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FriendRequest extends Notification
{
    use Queueable;

    private $friender;
    private $friended;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($friender, $friended)
    {
        $this->friender = $friender;
        $this->friended = $friended;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->line($this->friender->name . ' sent you a friend request on Nutrition Facts Tracker')
                    ->action('Accept Request', url('/friendships/' . $this->friender->id . '/accept'))
                    ->line("If you accept this request, you can see each other's health progress and compete with each other!");
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
            'message' => $this->friender->name . ' sent you a friend request'
        ];
    }
}
