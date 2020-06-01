<?php

namespace Monocontact;

use Monocontact\Listing;

class Monocontact {

	private $apikey;
	private $secret;
	private $curl;
	private $apiurl = 'https://manager.monocontact.net/api';

	public function __construct($apikey=null, $secret=null, $apiurl=null) {
		if(!$apikey || !$secret) throw new \Exception('You must provide a Monocontact API key');
		$this->apikey = $apikey;
		$this->secret = $secret;
		$this->curl = curl_init();

		if ($apiurl!=null) {
			$this->apiurl = $apiurl;
		}

		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
		// curl_setopt($this->curl, CURLOPT_FAILONERROR, true);
/*		curl_setopt($this->curl, CURLOPT_USERAGENT, 'Mandrill-PHP/1.0.54');
		curl_setopt($this->curl, CURLOPT_POST, true);
		curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($this->curl, CURLOPT_HEADER, false);
		curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($this->curl, CURLOPT_TIMEOUT, 600);*/

		$this->listing = new Listing($this);
		$this->contact = new Contact($this);
		$this->subscriber = new Subscriber($this);

		$this->apiurl = rtrim($this->apiurl, '/') . '/';
	}

	public function call($url, $params) {

        curl_setopt($this->curl, CURLOPT_URL, $this->apiurl . $url);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, ['data'=>json_encode($params, JSON_PRETTY_PRINT)]);
        /*curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_VERBOSE, $this->debug);*/

		$token  = $this->apikey;                 // base64_encode(random_bytes(12));
		$secret = $this->secret; // base64_encode(random_bytes(24));
		$stamp  = date("c");        // date("c");
		$sig    = hash_hmac('SHA256', $stamp.$token, $secret);
		// Result: "1f3ff7b1165b36a18dd9d4c32a733b15c22f63f34283df7bd7de65a690cc6f21"

		curl_setopt($this->curl, CURLOPT_HTTPHEADER, [
			"X-Auth-Token: $token",
			"X-Auth-Signature: $sig",
			"X-Auth-Timestamp: $stamp"
		]);

		$server_output = curl_exec($this->curl);

		if (curl_getinfo($this->curl, CURLINFO_HTTP_CODE)!='200') {
			throw new \Exception($server_output);
		}

		/*curl_setopt($this->curl, CURLOPT_FAILONERROR, true);
		if($server_output === FALSE) {
			die(curl_error($this->curl));
		}*/

		return json_decode($server_output);

	}

	public function __destruct() {
		curl_close($this->curl);
	}
}