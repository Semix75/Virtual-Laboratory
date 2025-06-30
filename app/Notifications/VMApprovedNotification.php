<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VMApprovedNotification extends Notification
{
    use Queueable;

    private $orderDetails;

    public function __construct($orderDetails)
    {
        $this->orderDetails = $orderDetails;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Your VM Request Has Been Approved')
                    ->greeting('Hello ' . $notifiable->name . ',')
                    ->line('Your VM request has been successfully approved.')
                    ->line('VM Details:')
                    ->line('OS: ' . $this->orderDetails['os'])
                    ->line('CPU: ' . $this->orderDetails['cpu'])
                    ->line('RAM: ' . $this->orderDetails['ram'] . ' MB')
                    ->action('Access Your VM', url('/vms/' . $this->orderDetails['id']))
                    ->line('Thank you for using our service.');
    }
}