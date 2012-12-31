<?php

// Here's an example form handler that you can change around to suit your needs

const EMAIL_FROM = "Booking Form Mailer <website@google.com>";
const EMAIL_TO   = "Sales <sales@google.com>";
const EMAIL_SUBJ = "A new booking request was made on Google.com";

function error_and_die($status_code) {
	header('x', true, $status_code);
	die();
}

if (count($_POST) < 1 || !isset($_POST['company'])
		|| strlen($_POST['company']) < 1 || strlen($_POST['company']) > 128) {
	error_and_die(400);
}

$company = $_POST['company'];
$contact = $_POST['contact'];
$email = $_POST['email'];

$subject = EMAIL_SUBJ . ": {$company}";
$headers = $headers = "From: " . EMAIL_FROM
					. "\r\nReply-To: {$contact} ({$company}) <{$email}>";

$text = <<<EOT
A customer has made a booking on the main website. They've provided the following details:
\r\n
EOT;

foreach ($_POST as $k => $v) {
	$text .= "The \"{$k}\" provided was:\r\n{$v}\r\n\r\n";
}

$text .= <<<EOT
Please respond to this lead within a timely manner!
EOT;

if ( ! mail(EMAIL_TO, $subject, $text, $headers)) {
	error_and_die(500);
}
