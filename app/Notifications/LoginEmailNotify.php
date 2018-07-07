<?php

namespace BCES\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LoginEmailNotify extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var array
     */
    protected $activation;

    /**
     * ResendVerificationEmail constructor.
     *
     * @param $activation
     */
    public function __construct($activation)
    {
        $this->activation = $activation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Login Confirmation')
            ->greeting('Hello ' . ucfirst($notifiable->name) . '!')
            ->line('Please login to your account by clicking the button below.')
            ->action('Login Now', route('user.login', ['token' => $this->activation->token]));
    }
}