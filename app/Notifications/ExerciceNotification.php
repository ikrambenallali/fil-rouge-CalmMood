<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExerciceNotification extends Notification
{
    use Queueable;
    protected $positivities;

    /**
     * Create a new notification instance.
     */
    public function __construct($positivities)
    {
        $this->positivities = $positivities;
       
    }
    

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $message = (new MailMessage)
            ->subject('Rappel de positivité')
            ->greeting('Bonjour ' . $notifiable->name . '!')
            ->line('Voici un rappel des choses positives que vous avez écrites :');
    
        foreach ($this->positivities as $item) {
            $message->line('- ' . $item->positive_thing_1);
            $message->line('- ' . $item->positive_thing_2);
            $message->line('- ' . $item->positive_thing_3);
        }
    
        $message->action('Voir sur l\'application', url('/'))
                ->line('Merci d’utiliser notre application !');
    
        return $message;
    }
    

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
