<?php

namespace Hcode;

use Rain\Tpl;

class Mailer {

	const USERNAME = "gugupassos1@hotmail.com";
	const PASSWORD = "doidolima334";
	const NAME_FROM = "Hcode Store";

	private $mail;

	public function __construct($toAddress, $toName, $subject, $tplName, $data = array())
	{
		$config = array(
			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/email/",
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
			"debug"         => false  
		);

		Tpl::configure( $config );

		$tpl = new Tpl;

		$this->$mail = new \PHPMailer;

		$mail->Charset = 'UTF-8';

		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		$mail->SMTPOptions = array(
		    'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    )
		 );


		//Enable SMTP debugging
		// SMTP::DEBUG_OFF = off (for production use)
		 //SMTP::DEBUG_CLIENT = client messages;
		// SMTP::DEBUG_SERVER = client and server messages
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;

		$mail->Debugoutout = 'html';

		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		// use
		//$mail->Host = 'smtp.gmail.com';
		// if your network does not support SMTP over IPv6

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;

		//Set the encryption mechanism to use - STARTTLS or SMTPS
		$mail->SMTPSecure = 'tls';

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = Mailer::USERNAME;

		//Password to use for SMTP authentication
		$mail->Password = Mailer::PASSWORD;

		//Set who the message is to be sent from
		$mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);

		//Set an alternative reply-to address
		//$mail->addReplyTo('replyto@example.com', 'First Last');

		//Set who the message is to be sent to
		$mail->addAddress($toAddress, $toName);

		//Set the subject line
		$mail->Subject = $subject;

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML($html);

		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';

		//Attach an image file
		//$mail->addAttachment('images/download.jpg');

		//send the message, check for errors
		if (!$mail->send()) {
		    echo 'Mailer Error: '. $mail->ErrorInfo;
		} else {
		    echo 'Message sent!';
		    
		}



	}

}


?>