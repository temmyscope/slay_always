<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCompleted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $metadata = json_decode($this->order->metadata);
        $subTotal = 0;
        foreach ($metadata->products as $key => $product) {
            $sub_total += $product->price;
        }

        return (new MailMessage)->view(
            'emails.order-processed', [
                'order' => $this->order,
                'products' => $metadata->products,
                'charges' => $metadata->taxesApplied,
                'user' => $notifiable,
                'subTotal' =>$subTotal, 
                //'invoice' => env('APP_URL')."/invoice/{$this->order->txn_id}"
            ]
        );
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
