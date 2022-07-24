<?php
require_once 'class.phpmailer.php';
include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];

$source = $_REQUEST['source'];
if($source != "")
{
$source = implode(", ", $source);
}

$comments = $_REQUEST['comments'];
$mailcontent="You got an enquiry mail from skdevelopersgroup.com";	
//$address = "mailer@3dcrystal.in";
//$address = "muthu@dreameffectsmedia.com";
$subject = "Enquiry mail received from ".$name;
$toaddress = "info@skdevelopersgroup.com";
//$admin_email = "mailer@mrkkings.com";			
	$email_message = "<font face=arial size=3><b>Enquiry Detail</b></font><hr>
			<table width=600>	
			<font face=arial>
			<tr><td width=80><strong>Name</strong></td><td width=4 align=center>:</td><td width=200>" .$name."</td></tr>
			<tr><td width=80><strong>Email</strong></td><td width=4 align=center>:</td><td width=200>" .$email."</td></tr>
			<tr><td width=80><strong>Phone</strong></td><td width=4 align=center>:</td><td width=200>" .$phone."</td></tr>
			<tr><td width=80><strong>How did you know about our project ?</strong></td><td width=4 align=center>:</td><td width=200>" .$source."</td></tr>
			<tr><td width=80><strong>Comments</strong></td><td width=4 align=center>:</td><td width=200>" .$comments."</td></tr></font></table>";

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "mailer@skdevelopersgroup.com";
$mail->Password = "mailsk$45";
$mail->SetFrom($email,$name);
$mail->Subject = $subject;
$mail->AddAddress($toaddress);
//$mail->AddBCC('muthu@dreameffectsmedia.com');
$mail->AddReplyTo($email);
//$mail->MsgHTML($email_message);
//$mail->AddAttachment($filePath);      // attachment
$mail->MsgHTML($email_message);
if($mail->Send()) {
  echo "<script type='text/javascript'>alert('Mail has send to the recipents you have specified'); window.location.href='thank-you.html';</script>";	
				}
		else
		{
		echo "<script type='text/javascript'>alert('Sorry! Mail not reached recipents now. Try again later.'); window.location.href='index.html';</script>";	
				}
				?>