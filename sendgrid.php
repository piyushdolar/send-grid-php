<?php
    $html = 'YOUR_HTML_MAIL_FORMAT_HERE';
		$string = array('to' => array('person@email.com','another_person@email.com'));
		$params = array(
			'api_user'  => SNAPGRID_MAIL_USER,
			'api_key'   => SNAPGRID_MAIL_PASS,
			'x-smtpapi' => json_encode($string),
			'from'      => 'noreply@piyushdolar.com',
			'to'        => 'person@email.com',
			'subject'   => 'Latest Mail From US',
			'html'      => $html,
		);
		$session = curl_init('https://api.sendgrid.com/api/mail.send.json');
		curl_setopt($session, CURLOPT_POST, true);
		curl_setopt($session, CURLOPT_POSTFIELDS, $params);
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($session);
		curl_close($session);
    print_r($response);
?>
