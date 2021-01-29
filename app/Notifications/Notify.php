<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Notify extends Notification implements ShouldQueue
{
    use Queueable;
    private $notification;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notification)
    {
        $this->notification=$notification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        
        $info=json_decode($this->notification['info']); 
        $data=json_decode($this->notification['from']);
        $name=$data->name;
        $nameClient=$info->name;
        $id=$info->id;
        setlocale(LC_ALL, 'spanish');
        $date = strftime("%A, %d de %B del %Y %H:%M" , strtotime($this->notification->created_at));
        return (new MailMessage)
            ->subject($name.' ha creado un acuerdo')
            ->greeting('Hola!')
            ->line('')
            ->line($name.' acaba de crear un acuerdo con '.$nameClient)
            ->line('el '.$date)
            ->action('Ver', url('/llamadas/create/'.$id));
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
            //
        ];
    }
}
