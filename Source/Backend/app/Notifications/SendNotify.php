<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class SendNotify extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $status,$userid;

    public function __construct($status, $userid)
    {
        $this->status = $status;
        $this->userid = $userid;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            'database',
            'broadcast',
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'news' => $this->status
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'news' => $this->status
        ]);
    }

    public function broadcastOn()
    {
        return ['App.Models.User.'.$this->userid];
    }

}
