<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApprovedOrReject extends Notification
{
    use Queueable;

    /**
     * Result of the verification request.
     *
     * @var string
     */
    protected $result;

    /**
     * Create a new notification instance.
     *
     * @param string $result
     */
    public function __construct($result)
    {
        $this->result = $result;
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
    public function toMail($notifiable)
    {
        $subject = $this->result === 'approved' ? 'Verification Request Approved' : 'Verification Request Rejected';
        $line = $this->result === 'approved' ? 'Your verification request has been approved!' : 'Your verification request has been rejected.';

        $actionText = $this->result === 'approved' ? 'Go to Home' : 'Submit a request again'  ;
        $actionUrl = $this->result === 'approved' ? route('home') : route('verification.popup');

        return (new MailMessage)
        ->subject($subject)
        ->line($line)
        ->action($actionText, $actionUrl)
        ->line('Thank you for using our application.');
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
