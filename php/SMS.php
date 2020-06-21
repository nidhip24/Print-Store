
<?php
//post

include_once 'SMS.php';

class SMS {
	public $url="https://www.sms4india.com/api/v1/sendCampaign";
	public $message = "";//urlencode("message-text");// urlencode your message
	public $curl = null;

	public $apikey = "****";
	public $seckey = "*******";

	public $mob = 0;

	public function __construct($mob, $mess) {
		$this->mob = $mob;
		$this->message = urlencode($mess);
		$this->curl = curl_init();
	}

	public function sendsms(){
		curl_setopt($this->curl, CURLOPT_POST, 1);// set post data to true
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, "apikey=$this->apikey&secret=$this->seckey&usetype=stage&phone=$this->mob&senderid=OTVS&message=$this->message");// post data

			//or prod

		// query parameter values must be given without squarebrackets.
		 // Optional Authentication:
		curl_setopt($this->curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($this->curl, CURLOPT_URL, $this->url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($this->curl);
		curl_close($this->curl);
		echo $result;
	}
}

// $tmp = new SMS("9967188022","aaaa");
// $tmp->sendsms();


//create sender ID

// $url="https://www.sms4india.com/api/v1/createSenderId";
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
// curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=PWXTNATDEFXZ0HUXAMU27M1XRCSGSRYL&secret=7C3ZJJRQYOXKIBC4&usetype=prod");// post data
// // query parameter values must be given without squarebrackets.
//  // Optional Authentication:
// curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// $result = curl_exec($curl);
// curl_close($curl);
// echo $result;
?>