
<?php
if(isset($_POST['cid'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = $EMAILS[$_POST['cid']];
    $email_type = $EMAIL_SUBJECT[$_POST['cid']];
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please <a href=\"$PAGE_PATH contact\" onClick=\"history.back();return false;\">go back</a> and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
		!isset($_POST['mail']) ||
		!isset($_POST['subject']) ||
		!isset($_POST['message'])){
         died('We are sorry, but a required field was left blank.');
    }
	
	$error_message = "";
	if(empty($_POST['name'])){
		$error_message .= 'We are sorry, but the name field is required and was left blank.<br />';
	}
	if(empty($_POST['mail'])){
		$error_message .= 'We are sorry, but the email field is required and was left blank.<br />';
	}	
	if(empty($_POST['subject'])){
		$error_message .= 'We are sorry, but the subject field is required and was left blank.<br />';
	}	
	if(empty($_POST['message'])){
		$error_message .= 'We are sorry, but the message field is required and was left blank.<br />';
	}
	elseif (preg_match("/(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?/",$_POST['message'])){
		$error_message .= 'We are sorry, but the links are not permitted in the message for spam reasons.<br />';
	}
	if(strlen($error_message) > 0) {
		died($error_message);
	}
	
     
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS); // required
	$mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL); // required
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
	$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
     

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  //if(!preg_match($email_exp,$mail)) {
  if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
    $error_message .= 'The Email Address you entered does not appear to be valid. Email addresses must be of the form "xxxxx@yyyy.zzz". <br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.<br />\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    //$email_message .= "<b> Name:</b>  ".clean_string($name)."<br />\n";
    //$email_message .= "<b> Email Address:</b>  ".clean_string($mail)."<br />\n";
    //$email_message .= "<b> Subject:</b>  ".clean_string($subject)."<br />\n";
	//$email_message .= "<b> Message:</b>  ".clean_string($message)."<br />\n";
	$email_subject .= $email_type." - ".$subject;
	
$email_message= '<html><body>';
$email_message .= $email_type . ' - Web Form Submission';
$email_message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$email_message .= "<tr style='background: #eee;'><td><strong>Name: </strong> </td><td>" . strip_tags($name) . "</td></tr>";
$email_message .= "<tr><td><strong> Email: </strong> </td><td>" . strip_tags($mail) . "</td></tr>";
$email_message .= "<tr><td><strong> Subject: </strong> </td><td>" . strip_tags($subject) . "</td></tr>";
$email_message .= "<tr><td><strong> Message: </strong> </td><td>" . strip_tags($message) . "</td></tr>";
$email_message .= "</table>";
$email_message .= "</body></html>";
     
     
// create email headers
$headers  = 'From: '.$mail."\r\n";
$headers .= 'Reply-To: '.$mail."\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion()."\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
@mail($email_to, $email_subject, $email_message, $headers);  
?>

 
<!-- include your own success html here -->
 
Thank you for contacting us. The following message has been sent: <br/><br/>
<b> Email Sent:</b>  <p><?php echo($email_message); ?></p><br/>
<br/><br/>
We will be in touch with you very soon.
<?php
}
?>

