<?php
error_reporting(0);
extract($_REQUEST);
session_start();
if($register==1)
{
   ?>
 <script type="text/javascript">
	 location.replace("register.php");
 </script>
 <?php
}
if ($login==1)
{  
$login=0;

include_once('singing.php');
	if($err==1) $mess="The email or password you entered is incorrect.";
}//login=1
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


</style>
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>    

<script type='text/javascript'> 

function link_page()
{
document.forms[0].kraj.value=1;
}






</script>

</head>

<body >
<form id="form1" name="form1" method="post" action="">
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
	  <td width="13%"  align="left" valign="middle" style=" font-size:20px; "><a class="red"  href="login.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Login</a></td>
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
<table border="0" bordercolor="#00FF00" align="center" cellpadding="0" cellspacing="0" width="1000px"  style=" border-collapse:collapse; ">
<tr><td height="200"></td></tr>
<tr>
<td valign="middle">
<table width="364" height="280"  border="0"  align="center" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse;">
<tr>
<td width="104" height="38" style="font-size:18px; ">Username</td>
<td width="243" colspan="2" align="center" style="background:url(img/search.png) no-repeat; background-position:center;" > 
  <input class="link"  type="text" name="username" id="username" style="width:150px; height:24px; border:none; background-color:#FFF; " placeholder="User name" /></td>
</tr>
<tr>
<td style="font-size:18px; ">Password</td>
  <td height="38" colspan="2" align="center"  style="background:url(img/search.png) no-repeat; background-position:center;"> 
  <input class="link"  type="password" name="pswd" id="pswd" style="width:150px; height:24px; border:none; background-color:#FFF; " placeholder="**********" /></td>
</tr>
<tr>
<td height="50" align="center" valign="middle" >&nbsp;
  
  

  </td>
<td height="50" align="center" valign="middle" ><a href="#"><img  src="img/login_off.png" onClick="document.forms[0].login.value=1; 
document.forms[0].submit();" style="border:0;"  onmousedown="this.src='img/login_on.png'" onMouseUp="this.src='img/login_off.png'"/></a>&nbsp;&nbsp;
<?php if($_SESSION["ID"]<=0) {  ?>
    <a href="#"><img  src="img/register_off.png" onClick="document.forms[0].register.value=1; 
document.forms[0].submit();"  style="border:0;"  onmousedown="this.src='img/register_on.png'" onMouseUp="this.src='img/register_off.png'"/></a>
<?php }  ?>
</td>
</tr>
<tr>
 <td height="23"  colspan="2" align="center" style="font-size:18px; color:#FF0000; ">&nbsp;
 
 <?php echo $mess . "<br>"; 
 
 if($err==1)
 {
 ?>
 <a class="black" href="lost_pswd.php">Forgot password?</a>
 
 <?php  } ?>
 </td>
</tr>

<tr>
<td height="53" colspan="2"><br></td>
</tr>
</table>







<!--
<table width="398" height="202"  border="0"  align="center" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse;">
<tr><td height="29" colspan="4" align="center"></td>
<td width="54" height="29" align="center"></td>
</tr>
<tr>
<td height="37" colspan="4" align="left" valign="middle" style="background:url(img/search.png) no-repeat; background-position:center;"> 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input class="link"  type="text" name="username" id="username" style="width:150px; height:24px; border:none; background-color:#FFF; " placeholder="User name" /></td>
</tr>
<tr>
  <td height="41" colspan="4" align="left" valign="middle" style="background:url(img/search.png) no-repeat; background-position:center;"> 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input class="link"  type="password" name="pswd" id="pswd" style="width:150px; height:24px; border:none; background-color:#FFF; " placeholder="**********" /></td>
</tr>
<tr>
  <td width="36" height="46" align="center" valign="middle">&nbsp;</td>
  <td width="229" align="center" valign="middle" >&nbsp;
  
  
<a href="#"><img  src="img/Login.png" onClick="document.forms[0].login.value=1; 
document.forms[0].submit();" style="border:0;"  /></a>&nbsp;&nbsp;
    <a href="#"><img  src="img/Register.png" onClick="document.forms[0].register.value=1; 
document.forms[0].submit();"  style="border:0;" /></a>
  </td>
<td width="40" align="left" valign="middle" >&nbsp;</td>
</tr>
<tr>
  <td height="15" colspan="4" align="center" style=" font-size:12px;color:#999">&nbsp;</td>
</tr>
<tr>
  <td height="23"  colspan="4" align="center" style=" font-size:12px;color:#ec1c24">&nbsp;<?php echo $mess; ?></td>
</tr>
</table>
-->


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
