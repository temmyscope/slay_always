<?php
if (!function_exists('pushnotification')) {
  function pushNotification(array $tokens = [], string $msg)
  {
    $msg = [
        'title' => "StaySlay - Fashion Notification",
        'body'  => $msg,
        'icon'  => env('APP_ICON_URL')
    ];
    return curl('https://fcm.googleapis.com/fcm/send')
        ->setMethod('POST')->setHeaders([
            'Authorization: key=' . app()->config()->get('firebase_token'),
            'Content-Type: Application/json'
        ])->setData(['registration_ids' => $tokens, 'data' => $msg ])
        ->send();
  }
}
/**
 * I might need this
 * $url = 'https://www.instagram.com/stayslay_fashion/?__a=1'
 * $instagram = json_decode(file_get_contents($url), true);
*/