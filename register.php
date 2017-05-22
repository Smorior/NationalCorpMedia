<?php
error_reporting(0);
extract($_REQUEST);
session_start();
try {
include('conn/conn.php');
//echo strcmp($pass1,$pass2) ;
if(strcmp($_POST['answer'], $_SESSION['captcha'])==0)
{
	//echo 'Captcha solved sucesfully, now you can allow this user to submit comment/vote/upload/etc.';
	$_SESSION['pass']=1;
	
}
else
{
	//echo 'Sorry, captcha not solved. Offer user captcha again or what ever.';
	$_SESSION['pass']=0;
}

$done=0;
if ($kraj==1)
{  
$kraj=0;
$godina=date("Y",mktime());
$mesec=date("m",mktime());
$dan=date("d",mktime());
date_default_timezone_set("UTC");
$datum=date("Y-m-d H:i:s",mktime());
//echo "kraj=1" . $firstname . " - " . $lastname . " - " . $company. " - " . $phone. " - " . $username. " - " . $pass1.   " - " . $pass2.  " - " . $mail.  "<br>";
if($firstname=="") $mess="First name field is empty!";
elseif($lastname=="") $mess="Last name field is empty!";
elseif($company=="") $mess="Company field is empty!";
elseif($phone=="") $mess="Phone field is empty!";
elseif($username=="") $mess="Username field is empty!";
elseif($pass1=="") $mess="Pswd field is empty!";
elseif($pass2=="") $mess="Repeat pswd field is empty!";
elseif($mail=="") $mess="Mail field is empty!";
elseif(strcmp($pass1,$pass2)!=0)  $mess="Password don't match!"; 
elseif($_SESSION["pass"]==0) 
{
$mess="Sorry, captcha not solved! Try again."; 
}
else
{
$ime_postoji=0;
$mail_postoji=0;
//provera da li user vec postoji
$sql="SELECT id FROM users WHERE username='".$username . "'";
$retval = mysql_query( $sql, $conn );
//echo $sql . "<br>";	

if($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	{ 
	$ime_postoji=1;
	}
	
$sql="SELECT id FROM users WHERE mail='".$mail . "'";
$retval = mysql_query( $sql, $conn );
//echo $sql . "<br>";	

if($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	{ 
	$mail_postoji=1;
	}

if($ime_postoji==0 && $mail_postoji==0)
{

  //proveri format
  if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail))
  {
   $mess="Invalid email format!";
  }
  else
  {
	  {
  
		  //echo "insert" . "<br>";
		    $min = 10000;
            $max = 99999;
            $reg_code = rand($min, $max);
			
			
			
			//////sad moze registracija/////
			$sql="INSERT INTO users (name,surname,company,username,pswd,mail,phone,status,date_reg,reg_code) VALUES 
			('".$firstname."','".$lastname."','".$company."','".$username."','".$pass1."','".$mail."','".$phone."',1,'".$datum."','".$reg_code."')";
			   //echo $sql . "<br>";
			$ress=mysql_query($sql,$conn);
			//mysql_close($conn);
			if($ress!=0)
			   {
				//poslaji mail adminu
				date_default_timezone_set("UTC");
			   $poslat=date("Y-m-d h:i:s",mktime()) . "  -  UTC time ";
			   
			
			   $to = 'jelena.radosavljevic.87@gmail.com';
			   $subject = "Nationalcorp Media";
			   $message="New client registred!";
			   $body = "\n$message\n\nRegistration date:" . $poslat . "\nClient name: " . $firstname . " " . $lastname . " \nCompany: $company \nPhone: $phone \nE-mail: $mail \n";
			   
			   if (mail($to, $subject, $body)) 
						{ 
						//$mess="Message sent!";
						}
						else
						{
						//$mess="Error!";
						}
			
			   $to = $mail;
			   $subject = "Nationalcorp Media";
			   $message="Welcome to Nationalcorp Media Inc.\n\nThank you for registration!";
			   $body = "$message\n\nYour access data \nUsername:" . $username . "\nPassword: " . $pass1 . " \n";
			   
			   if (mail($to, $subject, $body)) 
						{ 
						//$mess="Message sent!";
						}
						else
						{
						//$mess="Error!";
						}
				$done=1;
				 ?>
					 <script type="text/javascript">
						 //alert("Successful registration! Now, you can login.");
						 //location.replace("login.php");
					 </script>
					 <?php
			   }
			   else
			   {
				  $mess="Error! " . $sql; 
			   }
			
			if($done==1)
			{
			$sql="SELECT * FROM users WHERE LOWER(username)='" . trim(strtolower($username))  . "' AND pswd='" . trim($pass1)  . "'";
			$retval = mysql_query( $sql, $conn );
			//echo $sql . "<br>";	
			
			if($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
					 {
					 //session_start();
					 $_SESSION["NAME"] = $row['name'];
					 $_SESSION["SNAME"] = $row['surname'];
					 $_SESSION["MAIL"] = $row['mail'];;
					 $_SESSION["COMPANY"] = $row['company'];;
					 $_SESSION["PHONE"] = $row['phone'];;
					 $_SESSION["ID"] = $row['id'];
					 $_SESSION["ACCESS"] = $row['access_group'];
					 $ID=$_SESSION["ID"];
					 setcookie("ID", $ID, 9999999999); 
					 setcookie("NAME", $NAME, 9999999999); 
					 setcookie("SNAME", $SNAME, 9999999999); 
					 setcookie("ACCESS", $SNAME, 9999999999); 
					  }
					 mysql_close($conn); 
					   ?>
					 <script type="text/javascript">
						 location.replace("client_banner.php");
					 </script>
					 <?php
			}
		}//provera phone polja
}//provera maila

	
}
else
{
if($ime_postoji==1)
{
$mess="Username already exists!";
}
if($mail_postoji==1)
{
$mess="E-mail already exists!";
}

}


}

	
}//login=1

} //try
catch (Exception $e) 
{

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Nationalcorp Media</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="description" content="Nationalmedia.ca is the official website for Nationalcorp Media Inc.,
 the publisher of the Vaughan Lifestyle and other publications that bring the news to the people and 
 provide public relations and advertising services for the advertisers.">
<meta name="keywords" content="Nationalcorp, Nationalcorp Media, Nationalcorp Media Inc, The Vaughan Lifestyle, 
The Vaughan Lifestyles, Vaughan, Vaughan newspaper, Advertising in Vaughan, Advertising Vaughan, Vaughan news">


<link rel="shortcut icon" href="img/fav.png" type="image/x-icon" />

<style type="text/css">

html, body {
font-family:"Bodoni Bk BT";
height:100%;

		/*background:url(img/bground.jpg) repeat-x; */
		margin: 0 0 0 0;
	 
	}



	.menu-container {
		background:#FFF;
		margin: auto;
       position: fixed;
		max-height:60px;
		top:0;
		width:100%;
		max-width:1180px;

		}
			
		
	.page-container {
	    text-align:center;
		background:#FFF;
		
		/*background:url(img/bckg1.png) repeat-x; */
		width:1180px;
		margin:0px auto; 
		margin-top:0;
		
		margin-bottom:0px; 
		border:solid 0px  #999999;
		border-bottom:none;
		border-top:none;
		}
	
.footer-container {
		position:fixed;
		bottom:0;
		max-width:1180px;
		width:100%;
		}
		
		
		
/* use this class to attach this font to any element i.e. <p class="fontsforweb_fontid_4410">Text with this font applied</p> */
body {


 
	/*font-family:Arial, Helvetica, sans-serif;*/
}							


/*  meni  */

    a:link {
	text-decoration: none;
	color:#fff;
	size:4;
	
}
a:visited {
	text-decoration: none;
	color:#fff;
	
}
a:hover {
	text-decoration: none;
	color:#ec1c24;
	
}
a:active {
	text-decoration: none;
	color:#fff;	
}

a.test {
color:#ec1c24;

}
a.test1 {
    color:#666;
	font-weight:bold;
}
a.fb
{
background: url(img/fb.jpg);
}
    .page-container table tr td #links a {
	color: #000;
}
.page-container table tr td #links a:hover {
	color: #000;
}

a{
    outline: none !important;
 }

.link {
text-decoration:none;
border:0;
outline:none;
}


a.black:link {
text-decoration: none;
color:#000;
size:4;
	
}
a.black:visited {
	text-decoration: none;
	color:#000;
	
}
a.black:hover {
	text-decoration: none;
	color:#ec1c24;
	
}
a.black:active {
	text-decoration: none;
	color:#000;	
}



a.red:link {
text-decoration: none;
color:#d00606;
size:4;
	
}
a.red:visited {
	text-decoration: none;
	color:#d00606;
	
}
a.red:hover {
	text-decoration: none;
	color:#000;
	
}
a.red:active {
	text-decoration: none;
	color:#d00606;	
}

textarea {
   resize: none;
}

</style>
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>    

<script type='text/javascript'> 

function link_page()
{
document.forms[0].kraj.value=1;
}


function taster_potvrda()
{
	
document.forms[0].kraj.value=1;
document.forms[0].submit();
}

function reload()
{
document.forms[0].submit();
}

function validateForm() {
    //var x = document.forms[0]["email"].value;
	var p = document.getElementById("mail"); 
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}

function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
			emailField.style.bgcolor="#FF0000";
        }

        return true;

}
</script>

</head>

<body >
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input name="kraj" type="hidden" value=0>
<input name="login" type="hidden" value=0>
<input name="register" type="hidden" value=0>
<div class="page-container">
<div class="menu-container">
<table bgcolor="#FFFFFF" id="con" align="center" width="100%" border="0" bordercolor="#999999" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;border-top:none;border-left:none; border-right:none; ">
 <tr>
    <td valign="top" align="center">
    <table align="center" width="100%" border="0" bordercolor="#999999" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;border-top:none;border-left:none; border-right:none; ">
      <tr>
      <td width="30%" align="left" valign="middle" style="font-size:36px; font-weight:bold; " ><a href="index.php"><img src="img/logo_novi.png" width="378" height="60"  style="border:none;   margin:1 0 1 1; " /></a></td>
      <td width="9%" align="left" valign="middle"  style=" font-size:20px; ">&nbsp;<a class="black"  href="about.php" >About Us</a></td>
      <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="12%" align="center" valign="middle" style=" font-size:20px; "><a  class="black" href="publications.php" >Publications</a></td>
       <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="11%" align="center" valign="middle" style=" font-size:20px; "><a  class="black" href="services.php">Services</a></td>
       <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="9%" align="center" valign="middle" style=" font-size:20px; "><a class="black"  href="contact.php">Contact</a></td>
       <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
	   <?php if($_SESSION["ID"]>0) { 
	   
					  if($_SESSION["ACCESS"]==5){
					?>
				   <td width="13%"  align="left" valign="middle" style=" font-size:20px; "><a class="black"  href="admin_sec_qw224wVEfdiept.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Profile</a></td>
				  <?php } 
					else 
					   {  ?>
				   <td width="13%"  align="left" valign="middle" style=" font-size:20px; "><a class="black"  href="my_files.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Profile</a></td>
				  <?php } 
				  } else { ?>
	  <td width="13%"  align="left" valign="middle" style=" font-size:20px; "><a class="black"  href="login.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Login</a></td>
	  <?php } ?>
     </tr>
     <tr><td colspan="14" height="1" valign="top" bgcolor="#999999">
	 </td>
	 </tr>
    </table>
  </td>
  </tr>
</table>
</div>
<table   border="0" bordercolor="#00FF00" align="center" cellpadding="0" cellspacing="0" width="1000px"  style=" border-collapse:collapse; ">
<tr><td height="150"></td></tr>
<tr>
<td valign="middle">
<table   border="0" width="469" align="center" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
          <tr>
           <td  width="132" height="36" style="font-size:18px; " align="left"> &nbsp;First name</td>
           <td colspan="2" align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;"><input name="firstname" placeholder="First name"  type="text" style="width:270px; height:24px; border:none; background-color:#FFF; outline:none;  "  value="<?php echo $firstname; ?>"/></td>
          </tr>
          <tr>
           <td  width="132" height="36" style="font-size:18px; " align="left">&nbsp;Last name </td>
           <td colspan="2"  align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;"><input name="lastname"  placeholder="Last name"  type="text" style="width:270px; height:24px; border:none; background-color:#FFF; outline:none;  " value="<?php echo $lastname; ?>" /></td>
          </tr>
		  <tr>
           <td  width="132" height="36" style="font-size:18px; " align="left">&nbsp;Company name </td>
           <td colspan="2"  align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;"><input name="company"  placeholder="Company name"  type="text" style="width:270px; height:24px; border:none; background-color:#FFF; outline:none;  "  value="<?php echo $company; ?>" /></td>
          </tr>
		  <tr>
           <td  width="132" height="36" style="font-size:18px; " align="left">&nbsp;Phone </td>
           <td colspan="2"  align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;"><input name="phone"  placeholder="Phone"    type="text" style="width:270px; height:24px; border:none; background-color:#FFF; outline:none;  "  value="<?php echo $phone; ?>" /></td>
          </tr>
          <tr>
           <td  width="132" height="36" style="font-size:18px; " align="left">&nbsp;Username </td>
           <td colspan="2"  align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;"><input name="username"  placeholder="Username"  type="text" style="width:270px; height:24px; border:none; background-color:#FFF;outline:none;   "  value="<?php echo $username; ?>" /></td>
          </tr>
          <tr>
           <td  width="132" height="36" style="font-size:18px; " align="left">&nbsp;Pasword </td>
           <td colspan="2"  align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;"><input name="pass1"  placeholder="Pasword"  type="password" style="width:270px; height:24px; border:none; background-color:#FFF; outline:none;  "  value="<?php echo $pass1; ?>" /></td>
          </tr>
          <tr>
           <td  width="132" height="36" style="font-size:18px; " align="left">&nbsp;Repeat password </td>
           <td colspan="2"  align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;"><input name="pass2"  placeholder="Repeat password"  type="password"style="width:270px; height:24px; border:none; background-color:#FFF; outline:none;  "  value="<?php echo $pass2; ?>" /></td>
          </tr>
          <tr>
           <td  width="132" height="36" style="font-size:18px; " align="left">&nbsp;Mail </td>
           <td colspan="2"  align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;"><input name="mail"  placeholder="Email" type="text" style="width:270px; height:24px; border:none; background-color:#FFF; outline:none;  "  value="<?php echo $mail; ?>" /></td>
          </tr>
           <tr>
           <td  width="132" height="53" rowspan="2" style="font-size:18px; " align="left">&nbsp;Secure </td>
           <td width="151" rowspan="2" valign="middle" >
            <div >
                <img src="captcha.php" style="border:0;"  /> 
			</div>
           </td>
          <td width="186"  align="left" height="41" valign="middle" style="background:url(img/captcha.png)  no-repeat; background-position:left;" >&nbsp;&nbsp;
		    <input type="text" name="answer" style="width:120px; height:24px; border:none; background-color:#FFF; outline:none; "   placeholder="Enter captcha here" /></td>
           </tr>
           <tr>
             <td height="20" valign="middle" ><a  href="#"><img  src="img/reload_off.png" onmousedown="this.src='img/reload_on.png'" onmouseup="this.src='img/reload_off.png'"  style="border:0;"   onclick="reload();" /></a></td>
           </tr>
          <tr>
           <td height="51" colspan="3" align="center" >
		   <a href="#"><img  src="img/submit_off.png" style="border:0;"  onclick="taster_potvrda();" onmousedown="this.src='img/submit_on.png'" onmouseup="this.src='img/submit_off.png'"/></a>
		   </td>
           </tr>
		   <tr>
           <td height="20" colspan="3" align="center" bgcolor="#FFFFFF"  style="font-size:18px; color:#FF0000; "><?php  echo $mess;   ?></td>
           </tr>
		   <tr>
           <td height="30" colspan="3" align="center" bgcolor="#FFFFFF" ></td>
           </tr>
       </table>
</td>
</tr>
</table>
<div class="footer-container" >

<table  border="0" bordercolor="#FFFFFF"  bgcolor="#000000" width="100%" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
  <tr>
	<td align="left" height="24" ><img  src="img/footernovi.png"  width="100%" usemap="#Map"  style="border:0;" /></td>
  </tr>
</table>
</div>
</div>
<script type='text/javascript'> 
$(document).ready(function(){
    var b= $(window).height();
    $("#tab").css("height",b);
});
</script>
</form>
 <map name="Map" id="Map">
   <area shape="rect" coords="965,2,1063,39" href="terms.php"  style="border:none; outline:none;"/>
   <area shape="rect" coords="1078,1,1180,24" href="privacy.php"  style="border:none; outline:none;"/>
</map>
</body>
</html>
