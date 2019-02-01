<?php
	// get variables
	$var_name = $_POST["name"];
	echo $var_name;
	$var_email = $_POST["email"];
	$var_comment = $_POST["comment"];
	$var_subject = $_POST["subject"];
	
	// check the variables
	$allGiven = TRUE; 
	if($var_name == ""){
		$allGiven = FALSE;
	}else if($var_email == ""){
		$allGiven = FALSE;
	}else if($var_subject == ""){
		$allGiven = FALSE;
	}else if($var_comment == ""){
		$allGiven = FALSE;
		}
	
	$str_comment = strtolower($var_comment);
	$checkfor = array("http://", "https://");
	
	foreach($checkfor as $validation){
	if(strpos($str_comment,$validation) !== false) {
		$allGiven = FALSE;
	}
	}
	
	// if all are not set, do not send the email
	if($allGiven == TRUE){
		
		// mail to 
		$to  = 'jessicaphillips.jp@gmail.com';
		
		// subject for the email
		$subject = $var_subject;
		
		// message
		$message  = 'Subject:'  . "\r\n";
		$message .= $var_subject . "\r\n";
		$message .= "\r\n";
		$message .= 'Name:'  . "\r\n";
		$message .= $var_name . "\r\n";
		$message .= "\r\n";
		$message .= 'Email:'  . "\r\n";
		$message .= $var_email . "\r\n";
		$message .= "\r\n";
		$message .= 'Comment:'  . "\r\n";
		$message .= $var_comment . "\r\n";
		
		
		
		// additional headers
		$headers  = 'From: Faye Crafts <jessicaphillips.jp@gmail.com>' . "\r\n";
		$headers .= 'Reply-To: ' . $var_email . "\r\n";
		$headers .= 'Cc: jessicaphillips.jp@gmail.com' . "\r\n";
		  
		mail($to, $subject, $message, $headers);
		
		header("Location: ../submitted.html");
		exit;
	}
	
	header("Location: ../contact.html");
	exit;
	
?>
