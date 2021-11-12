<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

class Visitor {

  use Notifiable;

  public function __construct(protected string $email, protected string $name)
  {
  }

  /**
   * Route notifications for the mail channel.
   *
   * @param  \Illuminate\Notifications\Notification  $notification
   * @return array|string
   */
  public function routeNotificationForMail($notification)
  {
      // Return email address only...
      return $this->email_address;

      // Return email address and name...
      return [$this->email_address => $this->name];
  }
}
