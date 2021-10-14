<?php
function curl($url)
{
	return new class($url){
    protected $_curl = [
          'url' => '',
          'data' => [],
          'headers' => [],
          'time_out' => 200,
          'cookie_file' => '',
          'cookie_jar' => '',
          'method' => 'GET',
          'ret' => true,
    ];
    protected $_result, $_errors;
		function __construct($url){
			$this->_curl['url'] = filter_var($url, FILTER_SANITIZE_URL);
    }
		public function setData(array $postdata){
      $this->_curl['data'] = json_encode($postdata);
			return $this;
		}
		public function setHeaders($headers)
		{
			$this->_curl['headers'] = $headers;
			return $this;	
		}
		public function setHeader($headers)
		{
			return $this->setHeaders($headers);
		}
		public function setSession($cookiefile){
      $this->_curl['cookie_file'] = $cookiefile;
			return $this;
    }
		public function saveSession($cookiefile){
      $this->_curl['cookie_jar'] = $cookiefile;
			return $this;
    }
		public function setMethod(string $method){
      $this->_curl['method'] = strtoupper($method);
			return $this;
    }
		public function isReturnable(bool $val = true){
      $this->_curl['ret'] = $val;
			return $this;
    }
		public function setTimeOut($time = 200){
      $this->_curl['time_out'] = $time;
			return $this;
    }
		public function send(){
			array_push($this->_curl['headers'], 'Content-Type: application/json');
        $ch = curl_init($this->_curl['url']);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($this->_curl['method']) );
        if ( !empty($this->_curl['data']) ) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->_curl['data']);
        }
        if (!empty($this->_curl['cookie_jar']) && !empty($this->_curl['cookie_file']) ) {
            curl_setopt($ch, CURLOPT_COOKIEJAR, $this->_curl['cookie_jar'] );
            curl_setopt($ch, CURLOPT_COOKIEFILE, $this->_curl['cookie_file'] );
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, $this->_curl['ret']);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->_curl['time_out'] );
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->_curl['time_out'] );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->_curl['headers']);
			  $this->_result = curl_exec($ch);
        $this->_errors = curl_error($ch);
			curl_close($ch);
			if ( $this->_errors ) {
				return false;
			} else {
				return $this->_result;
			}
    }
		public function result()
		{
			return $this->_result;
    }
		public function errors()
		{
			return $this->_errors;
    }
	};
}

if (!function_exists('pushnotification')) {
  function pushNotification(string $msg, array $tokens = [])
  {
    $msg = [
      'title' => "StaySlay - Fashion Notification",
      'body'  => $msg,
      'icon'  => env('APP_ICON_URL')
    ];
    return curl('https://fcm.googleapis.com/fcm/send')
        ->setMethod('POST')->setHeaders([
            'Authorization: key=' . env('FIREBASE_TOKEN'),
            'Content-Type: Application/json'
        ])->setData(['registration_ids' => $tokens, 'data' => $msg ])
        ->send();
  }
}

if (!function_exists('paystackverifypayment')) {
  function paystackVerifyPayment(string $reference): array | object
  {
    $response = curl("https://api.paystack.co/transaction/verify/{$reference}")
    ->setMethod('GET')
    ->setHeaders(['Authorization: key=' . env('PAYSTACK_SECRET_KEY') ])->send();
    return json_decode($response, true);
  }
}
if (!function_exists('fetchtransactions')) {
  function fetchTransactions(int $page =1, int $perPage=50): array | object
  {
    $response = curl("https://api.paystack.co/transaction?perPage={$perPage}&page={$page}")
    ->setMethod('GET')->setHeaders([ 'Authorization: key=' . env('PAYSTACK_SECRET_KEY') ])->send();
    return json_decode($response, true);
  }
}
if (!function_exists('createrefund')) {
  function createRefund(string $reference): array | object
  {
    $response = curl("https://api.paystack.co/refund")
    ->setMethod('POST')->setHeaders([ 
      'Authorization: key=' . env('PAYSTACK_SECRET_KEY'), 'content-type: application/json'
    ])->setData([ 'transaction' => $reference ])->send();
    return json_decode($response, true);
  }
}
if (!function_exists('fetchrefund')) {
  function fetchRefunds(): array | object
  {
    $response = curl("https://api.paystack.co/refund")
    ->setMethod('GET')->setHeaders([ 
      'Authorization: key=' . env('PAYSTACK_SECRET_KEY'), 'content-type: application/json'
    ])->send();
    return json_decode($response, true);
  }
}
//charge a customer using previous token
if (!function_exists('createRecharge')) {
  function createRecharge(string $authCode, string $email, float $amount): array | object
  {
    $response = curl('https://api.paystack.co/transaction/charge_authorization')
    ->setMethod('POST')->setData([
      'authorization_code'=> $authCode, 'email' => $email, 'amount' => $amount*100 //amount in kobo
    ])->setHeaders([ 
      'Authorization: key=' . env('PAYSTACK_SECRET_KEY'), 'content-type: application/json'
    ])->send();
    return json_decode($response, true);
  }
}
if(function_exists('percentageIncrease')){
  function percentageIncrease(float $value, float $percent): float{
      return $value + ($value * ($percent/100));
  }
}
if(function_exists('percentageDecrease')){
  function percentageDecrease(float $value, float $percent): float{
      return $value - ($value * ($percent/100));
  }
}


/**
 * I might need this
 * $url = 'https://www.instagram.com/stayslay_fashion/?__a=1'
 * $instagram = json_decode(file_get_contents($url), true);
*/

if(! function_exists('prefixActive')){
	function prefixActive($prefixName)
	{ 
		return	request()->route()->getPrefix() == $prefixName ? 'active' : '';
	}
}

if(! function_exists('prefixBlock')){
	function prefixBlock($prefixName)
	{ 
		return	request()->route()->getPrefix() == $prefixName ? 'block' : 'none';
	}
}

if(! function_exists('routeActive')){
	function routeActive($routeName)
	{ 
		return	request()->routeIs($routeName) ? 'active' : '';
	}
}