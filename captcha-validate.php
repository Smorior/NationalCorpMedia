<?php
/* captcha-validate file */

session_start();

if(strtolower($_POST['answer']) == $_SESSION['captcha'])
{
	//echo 'Captcha solved sucesfully, now you can allow this user to submit comment/vote/upload/etc.';
	$_SESSION['pass']=1;
}
else
{
	//echo 'Sorry, captcha not solved. Offer user captcha again or what ever.';
	$_SESSION['pass']=0;
}
	
unset($_SESSION['captcha']);	
?>