<?php namespace Parkgaram\Payeezy;

use Curl\Curl;

class Api {

	/** @string */
    private $api_key;
    /** @string */
    private $api_secret;
    /** @string */
    private $merchant_token;
    /** @string */
	private $base_uri;

    public static $URI_SANDBOX = 'https://api-cert.payeezy.com/v1';
	public static $URI_LIVE = 'https://api.payeezy.com/v1';
	
    function __construct($api_key, $api_secret,$merchant_token,$base_uri) {
		$this->api_key = $api_key;
		$this->api_secret = $api_secret;
		$this->merchant_token = $merchant_token;
		$this->base_uri = $base_uri;
    }

	/**
	 * @param string $payload json type String value
	 */
	public function creditCardPayment($json)
	{	
		$headers = $this->hmac($json);
		$curl = $this->createCurl($json,$headers);
		
		$base_uri = $this->base_uri;
		
		if($base_uri != self::$URI_LIVE && $base_uri != self::$URI_SANDBOX)
			throw new \Exception('Make base_uri SAND_BOX OR LIVE');
		$curl->post($base_uri.'/transactions',$json);	
		$response = $curl->response;
    	$curl->close();
		return $response;
	}

	private function createCurl($json,$headers)
	{
		$curl = new Curl();
		$curl->setHeader('Content-Type','application/json');
		$curl->setHeader('apikey',strval($this->api_key));
		$curl->setHeader('token',strval($this->merchant_token));
		$curl->setHeader('Authorization',$headers['authorization']);
		$curl->setHeader('nonce',$headers['nonce']);
		$curl->setHeader('timestamp',$headers['timestamp']);
    	return $curl;
	}

	private function hmac($json)
	{
		$nonce = strval(hexdec(bin2hex(openssl_random_pseudo_bytes(4, $cstrong))));
	    $timestamp = strval(time()*1000); //time stamp in milli seconds
	    
	    $data = 
	    	$this->api_key . $nonce . $timestamp . $this->merchant_token . $json;
	    $hash_algorithm = "sha256";
	    $hmac = hash_hmac ($hash_algorithm , $data , $this->api_secret, false );    // HMAC Hash in hex
	    $authorization = base64_encode($hmac);
	    return [
	    		'authorization' => $authorization,
	            'nonce' => $nonce,
	            'timestamp' => $timestamp,
	           ]; 
	}
}