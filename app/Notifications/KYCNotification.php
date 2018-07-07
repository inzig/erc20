<?php

namespace BCES\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use BCES\Models\KnowYourCustomer;

class KYCNotification extends Notification
{
    use Queueable;

    /**
     * @var KnowYourCustomer
     */
    protected $kyc;

    /**
     * KYCNotification constructor.
     * @param KnowYourCustomer $kyc
     */
    public function __construct(KnowYourCustomer $kyc)
    {
        $this->kyc = $kyc;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'kyc' => $this->kyc->id,
            'message' => 'A new KYC added by user. Please verify.'
        ];
    }
}
