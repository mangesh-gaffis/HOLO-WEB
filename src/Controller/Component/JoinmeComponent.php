<?php
/*
More details about Joinme API : https://developer.join.me/docs
*/

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;

class JoinmeComponent extends Component
{
	protected $_defaultConfig = [
		'client_id' => 'c5smvxggjggafcwf2gufr2fa', //** change with your client_id
        'client_secret' => 'j5xE9z6Dzr',	//** change with your client_secret
        'redirect_uri' => 'http://localhost/projects/holo_web/users/get_access', //** change with your project url where you want to redirect user 
        'auth_base_url' => 'https://secure.join.me/api/public/v1/auth/oauth2',
        'token_base_url' => 'https://secure.join.me/api/public/v1/auth/token',
        'start_meeting_url' => 'https://api.join.me/v1/meetings/start', //to start adhoc meeting
        'schedule_meeting_url' => 'https://api.join.me/v1/meetings', //to create new schedule meeting
    ];
	
	//private $access_token = ''; //this generate & store in session / database, so no need here I think
	
	public function jmProcess($post_url, $postdata, $access_token = '') {
		
		if(is_array($postdata)) {
			$data_string = json_encode($postdata); 
		}
		
		if($post_url == $this->_config['token_base_url']) {
			$header_array = array(                                                                          
			'Content-Type: application/json',   
			'Content-Length: ' . strlen($data_string)
			);
		}else {
			$header_array = array(
			'Authorization: Bearer '.$access_token,		
			'Content-Type: application/json'  
			);
		}
																														 
		$ch = curl_init($post_url);
		
		if(is_array($postdata)) {	
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);     
		}else{
			//get meeting details need GET request. all other need post so added below line in else part.
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		}	
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header_array);      

																															 
		$result = curl_exec($ch);
		if ($result === false) {
			$error = curl_error($ch);
			echo $error; die; //intentionally done to know exact issue related to curl if any. 
		}
		
		$response = json_decode($result);       
		return $response;
	}
	
	public function jmAuthorizeLink() {
		//build auth url to generate access token
		$complete_auth_url = $this->_config['auth_base_url'].'?client_id='.$this->_config['client_id'].'&scope=scheduler%20start_meeting'.'&redirect_uri='.$this->_config['redirect_uri'].'&state=ABCD&response_type=code';
		return $complete_auth_url;
	}
	
	public function jmGetAccess($code) {
		$data = array(
			"client_id" => $this->_config['client_id'], 
			"client_secret" => $this->_config['client_secret'], 
			"code" => $code, 
			"redirect_uri" => $this->_config['redirect_uri'], 
			"grant_type" => "authorization_code"
		);  

		return $this->jmProcess($this->_config['token_base_url'], $data);
	}
	
	/*
	Accepted Example Array
	$data = array(
		"startWithPersonalUrl" => false, 			//optional
		"meetingStart" => '2017-09-15T17:15:00Z',	//required. in format 'Y-m-d\TH:i:s\Z'
		"meetingEnd" =>  '2017-09-15T17:15:00Z', 	//required. in format 'Y-m-d\TH:i:s\Z'
		"meetingName" => "Developers Meeting", 		//required
		"participants" => ["nikt001@mailinator.com", "nikt002@mailinator.com"]	//optional	
	);
	*/
	public function jmScheduleMeeting($formdata, $access_token) {
		if(!isset($formdata['startWithPersonalUrl'])) {
			$formdata['startWithPersonalUrl'] = false; 
		}
		
		return $this->jmProcess($this->_config['schedule_meeting_url'], $formdata, $access_token);
	}
	
	public function jmGetScheduleMeeting($meeting_id, $access_token) {
		return $this->jmProcess($this->_config['schedule_meeting_url'].'/'.$meeting_id, '', $access_token);
	}
	
	public function jmGetAllScheduleMeetings($access_token) {
		return $this->jmProcess($this->_config['schedule_meeting_url'], '', $access_token);
	}
	
	public function jmSendMail($to, $subject, $body) {
		$email = new Email();
        //$email->transport('IF CUSTOM CREATED THEN SET HERE');
        $email->emailFormat('html');
        $email
            //->from(['FROM EMAIL' => 'FROM NAME'])  //If not set then default value will take which set in config/app.php
            ->to($to)
            ->subject($subject);
        if (empty($body)) {
            $result = $email->send();
        } else {
            $result = $email->send($body);
        }
	}
	
	
	/*
	public function jmAuthenticated()
    {
        if(!empty($this->access_token)){
            return true;
        } else {
            return false;
        }
    }
	*/
	
}
?>