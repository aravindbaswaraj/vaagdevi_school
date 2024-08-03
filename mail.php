<?php
//session_start();
$error='';
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$subject=$_POST['subject'];
$message=$_POST['message'];

// Here we get all the information from the fields sent over by the form.
//$name = $_POST['name'];
//$email = $_POST['email'];
//$message = $_POST['message'];
if(empty($name)||empty($email))
{
	$error .= "Name and Email are required fields. \n";	
}
	
if(IsInjected($email) || empty($email))
{
	$error .= "Bad email value! \n";
}

if($error=='')
{	
//$subject = 'the subject';
	$message = 
		
'
Name : '.$name.'
Email : '.$email.'
phone : '.$phone.'
Subject : '.$subject.'
Message : '.$message.'
		
';
		

		
		

//	$to = array('gauthammarolix@gmail.com', 'arunmarolix@gmail.com', 'bdm@marolix.com');
	$to = "bdm@marolix.com, ceo@marolix.com, information@marolix.com, harshadm@marolix.com";
	
//	$to = "arun@marolix.com";
	
	$headers = 'From: '.$email . "\r\n" .
	 "MIME-Version: 1.0\n" .
	 "Content-type: text/html; charset=iso-8859-1";

	if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // this line checks that we have a valid email address
		mail($to,  $phone, $message, $headers); //This method sends the mail.
	//	echo "Your email was sent!"; // success message
    echo '<script type="text/javascript">
	window.location.href = "https://www.marolix.com/thankyou.html";</script>';
	}
    else
    {
		echo '<script type="text/javascript">alert("Invalid Email, please provide an correct email.");</script>';
	}
 
	
	
	}
	else
	{
		echo $error;
	}

	
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Process the form data

  // Access UTM parameters
  $utm_source = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
  $utm_medium = isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '';
  $utm_campaign = isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '';

  // Now you can use these UTM parameters in your processing logic
}

?>