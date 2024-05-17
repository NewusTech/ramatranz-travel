<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPengajuanNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user, $pengajuan, $url;
    public function __construct($user, $pengajuan)
    {
        $this->user = $user;
        $this->pengajuan = $pengajuan;
        $this->url = route('detil-pengajuan', $pengajuan->kode);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->subject('Pengajuan Pinjaman Baru')
                    ->line('Halo, ada pengajuan pinjaman baru dari '.$this->user->name)
                    ->action('Cek disini', $this->url)
                    ->line('Terimakasih');
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
            'title'    => 'Ada pengajuan pinjaman baru',
            'message' => 'Cek pengajuan pinjaman baru dari '.$this->user->name,
            'url'    => $this->url
        ];
    }
}
