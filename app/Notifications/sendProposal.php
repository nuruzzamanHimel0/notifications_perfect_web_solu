<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class sendProposal extends Notification
{
    use Queueable;
    private $sendProposal;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sendProposal)
    {
        $this->sendProposal = $sendProposal;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'letter' => $this->sendProposal
        ];
    }
}
