<?php
error_reporting(0);
extract($_REQUEST);
session_start();
try
{
//echo "<br><br><br><br><br>";	
include('conn/conn.php');
if($send==1)
{
    $send=0;
	if($name=="") { $mess="Username field is empty!"; $done=0; $finish=0; }
	elseif($mail=="") 
	{ 
	 $mess="Email field is empty!";  $done=0; $finish=0; 
	}
	else 
	{
	
		$ime_postoji=0;
		$mail_postoji=0;
		//provera da li user vec postoji
		$sql="SELECT reg_code FROM users WHERE username='".$name . "' AND mail='".$mail."'";
		$retval = mysql_query( $sql, $conn );
		//echo $sql . "<br>";	
		
		if($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
			{ 
			$ime_postoji=1;
			$reg_code=$row["reg_code"];
			}
				
				
			if($ime_postoji==0)
			{
			//echo "rtytyert<br>";	
				$mess="Client don't exist!";
				$done=0;
			}
			else
	        {
	
	
			   date_default_timezone_set("UTC");
			   $poslat=date("Y-m-d h:i:s",mktime()) . "  -  UTC time ";
			   
			   $to=$mail;
			   $subject="Recovery password";
			   
			   $body = "\n\nSecurity code:" . $reg_code ;
			 
			   
			   if (mail($to, $subject, $body)) 
						{ 
						$mess="Security code is sent to your email!";
						$done=1;
						}
						else
						{
						$mess="Error!";
						
						}
						$name="";
						$company="";
						$phone="";
						$email="";
						$message="";
						
            }


   }	
}


if($send_code==1)
{
    
	if($code_mail=="") { $mess="Code field is empty!"; }
	else 
	{
	   $kod_postoji=0;
		//provera da li user vec postoji
		$sql="SELECT * FROM users WHERE reg_code='".$code_mail . "'";
		$retval = mysql_query( $sql, $conn );
		//echo "<br><br><br><br><br>" . $sql . "<br>";	
		
		if($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
			{ 
			$kod_postoji=1;
			$pass=$row["pswd"];
			$to_send=$row["mail"];
			}
				
				
			if($kod_postoji==0)
			{
			 $mess="Wrong code!";
			}
			else
	        {
	
	
			   date_default_timezone_set("UTC");
			   $poslat=date("Y-m-d h:i:s",mktime()) . "  -  UTC time ";
			   
			   $to=$to_send;
			   $subject="Recovery password";
			   
			   $body = "\n\nYour password:" . $pass ;
			   
			   
			   if (mail($to, $subject, $body)) 
						{ 
						$mess="Password is sent to your email!";
						$done=1;
						$send_code=1;
						$finish=1;
						}
						else
						{
						$mess="Error!";
						$done=0;
						$send_code=0;
						}
						$name="";
						$company="";
						$phone="";
						$email="";
						$message="";
						
            }


     }


  }
  mysql_close($conn); 
  //echo "<br><br><br><br><br> ggggggggggggg" . $done;
}
catch (Exception $e) 
{
$mess="Error!";
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
		width:1180px;
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

.link1 {text-decoration:none;
border:0;
outline:none;
}
</style>
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>    

<script type='text/javascript'> 

function link_page()
{
document.forms[0].kraj.value=1;
}



function send()
{
document.forms[0].send.value=1;
document.forms[0].submit();
}


</script>

</head>

<body >
<form id="form1" name="form1" method="post" action="">
<input name="kraj" type="hidden" value=0>
<input name="done" type="hidden" value=0>
<input name="logout" type="hidden" value=0>
<input name="send_code" type="hidden" value=0>
<input name="send" type="hidden" value=0>
<input name="code" type="hidden" value=0>
<input name="finish" type="hidden" value=0>
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
      <td width="9%" align="center" valign="middle" style=" font-size:20px; "><a class="red"  href="contact.php">Contact</a></td>
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
<table id="tab" border="0" bordercolor="#00FF00" align="center" cellpadding="0" cellspacing="0" width="1000px"  style=" border-collapse:collapse; ">
<tr><td height="150"></td></tr>
<tr>
<td valign="top">
<table width="403" border="0" bordercolor="#66CC66" align="center" >
		     <tr>
			 <td  height="37"align="left" colspan="3" style="font-size:22px; ">&nbsp;Forgot password form&nbsp;</td>
		     </tr>
			  <?php
			  if($finish==0)
			    {
			    if($done==0) { ?>
             <tr>
			 <td width="136"  align="left"  style="font-size:18px; ">&nbsp;Username</td>
			 <td width="257" height="51" align="center" valign="middle" style="background:url(img/search.png) no-repeat; background-position:center;">
			 <input class="link"  type="text" name="name" id="name"  value="<?php echo $name; ?>" style="width:150px; height:24px; border:none; background-color:#FFF; " placeholder="Username" />			 </td>
			 </tr>
			<tr><td height="40"  align="left"  style="font-size:18px; ">&nbsp;Email&nbsp;</td>
			   <td width="257" height="40" align="center" style="background:url(img/search.png) no-repeat; background-position:center;"><input class="link1"  type="text" name="mail" id="mail"  value="<?php echo $mail; ?>" style="width:180px; height:24px; border:none; background-color:#FFF; " placeholder="Email" /></td>
			 </tr>
			 <tr><td height="52" colspan="3" align="center"><a href="#"><img  src="img/send_off.png"  onClick="document.forms[0].send.value=1; document.forms[0].done.value=1; 
document.forms[0].submit();" style="border:0;"   onmousedown="this.src='img/send_on.png'" onmouseup="this.src='img/send_off.png'"  /></a></td>
			 </tr>
		    <?php  } else { ?>

			 <tr><td height="40"  align="left"  style="font-size:18px; ">&nbsp;Security code&nbsp;</td>
			   <td width="257" height="40" align="center" style="background:url(img/search.png) no-repeat; background-position:center;"><input  type="text" name="code_mail" id="code_mail"  value="<?php echo $code_mail; ?>" style="width:180px; height:24px; border:none; background-color:#FFF; " placeholder="Code" /></td>
			 </tr>
			  <tr><td height="52" colspan="3" align="center"><a href="#"><img src="img/send_off.png"  onClick="document.forms[0].send_code.value=1; document.forms[0].code.value=1; document.forms[0].done.value=1; 
document.forms[0].submit();" style="border:0;"   onmousedown="this.src='img/send_on.png'" onmouseup="this.src='img/send_off.png'"  /></a></td>
			 </tr>
			 <?php  } 
			 
			 }
			 ?>
			 <tr><td height="25" colspan="3" align="center" style="font-size:18px; color:#FF0000; "><?php echo $mess;  ?></td></tr>
		   </table>
</td>
</tr>
</table>
<div class="footer-container" >

<table  border="0" bordercolor="#FFFFFF"  bgcolor="#000000" width="1180" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
  <tr>
	<td align="left" height="24" ><img  src="img/footernovi.png"  width="100%" border="0" usemap="#Map"  style="border:0;" /></td>
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
   <area shape="rect" coords="962,2,1060,39" href="terms.php"  style="border:none;" />
   <area shape="rect" coords="1078,1,1180,24" href="privacy.php"  style="border:none;"/>
 </map>
</body>
</html>
