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