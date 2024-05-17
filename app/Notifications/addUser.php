<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class addUser extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;

    public function __construct($user)
    {
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
        $url = route('login');
        return (new MailMessage)
                    ->subject('Informasi Akun Anda di Aplikasi '.config('app.name'))
                    ->line('Halo '.$this->user->name.', Akun Anda telah dibuat oleh administrator, silakan login menggunakan informasi berikut')
                    ->line('Username : '.$this->user->NIP)
                    ->line('Password : '.$this->user->NIP)
                    ->action('Login', $url)
                    ->line('Segera lakukan penggantian password di menu profile untuk menjaga keamanan data Anda');
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
