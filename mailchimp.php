<?php
	$apikey = "xxxxxxxxxxxxxxxxxx-usXX";
	$list_id = "xxxxxxxxx";

	$email = /*EMAIL*/;
	$fname = /*First Name*/;
	$lname = /*Last name*/;

	$auth = base64_encode( 'user:'.$apikey );

	$data = array(
  	'apikey'        => $apikey,
  	'email_address' => $email,
  	'status'        => 'pending',    // no double opt-in 'status' => 'subscribed'
  	'merge_fields'  => array(
  	'FNAME' => $fname,
  	'LNAME' => $lname,
	));

	$json_data = json_encode($data);

	$ch = curl_init();

	$curlopt_url = "https://usXX.api.mailchimp.com/3.0/lists/ea5321639f/members/"; // Set your Region in XX
	curl_setopt($ch, CURLOPT_URL, $curlopt_url);

	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
	'Authorization: Basic '.$auth));
	
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/3.0');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

	$result = curl_exec($ch);

	/*  
	 // display output

	if($result)
	{
	    $msg = "Success! <br>$email has been subscribed <br>check your inbox";
	}
	else
	{
	    $msg = "Error - cannot subscribe $email <br>$msg <br>";
	}
  		echo "$msg <br>";
  	*/

  	curl_close($ch);
?>
