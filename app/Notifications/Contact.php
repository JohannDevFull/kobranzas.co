<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Contact extends Notification
{
    use Queueable;
    private $data;

    public function __construct($data)
    {
        $this->data=$data;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Solicitud de contacto')
                    ->line($this->data->nombre.' quiere contactarse contigo')
                    ->line('su telefono es: '.$this->data->telefono)
                    ->line('su correo es: '.$this->data->correo)
                    ->line('su '.$this->data->tipo_documento.' es: '.$this->data->documento)
                    ->line('tipo de consulta: '.$this->data->tipo_de_consulta)
                    ->line('desde: '.$this->data->ciudad)
                    ->line('Mensaje:')
                    ->line($this->data->mensaje)
                    ;
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
