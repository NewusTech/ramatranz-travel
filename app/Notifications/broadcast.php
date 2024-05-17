<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class broadcast extends Notification implements ShouldQueue
{
    use Queueable;
    public $title, $message, $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title,$message, $url = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
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
        $message =  (new MailMessage)
                    ->subject($this->title)
                    ->line($this->message);
                    
        if($this->url){
            $message->action($this->url, $this->url);
        }

        return $message;
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
            'title'   => $this->title,
            'message' => $this->message,
            'link'   => $this->url
        ];
    }
}
