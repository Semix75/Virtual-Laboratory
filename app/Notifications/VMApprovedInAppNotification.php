<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class VMApprovedInAppNotification extends Notification
{
    use Queueable;

    private $orderDetails;

    public function __construct($orderDetails)
    {
        $this->orderDetails = $orderDetails;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Your VM request has been approved.',
            'vm_id' => $this->orderDetails['id'],
            'os' => $this->orderDetails['os'],
            'cpu' => $this->orderDetails['cpu'],
            'ram' => $this->orderDetails['ram'],
        ];
    }
}