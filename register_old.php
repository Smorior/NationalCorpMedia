<?php
try {
include('conn/conn.php');
extract($_REQUEST);
session_start();

error_reporting(0);
//session_cache_expire(0);

//$sesija = new Sesija();
//$niz = $sesija->loadSesija();
//extract($niz);
//print_r($niz);
//setcookie("ID", $ID, 9999999999); 
//setcookie("IME", $IME, 9999999999); 
//setcookie("PREZIME", $PREZIME, 9999999999); 

//echo $_SESSION["NAME"];

$ID=$_SESSION["ID"];

//print_r($_SESSION);

//echo $ID ;
//if($kraj==0) $source_page="home.php"; 
//else
if($page!="")
$source_page=$_REQUEST["page"];
else
$source_page="home.php";

/*
if ($login==1)
{   
$login=0;
$godina=date("Y",mktime());
$mesec=date("m",mktime());
$dan=date("d",mktime());
$sql="SELECT * FROM users WHERE LOWER(username)='" . trim(strtolower($username))  . "' AND pswd='" . trim($pswd)  . "'";
$retval = mysql_query( $sql, $conn );
//echo $sql . "<br>";	

if($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	{
		
		
		 $_SESSION["NAME"] = $row['name'];
		 $_SESSION["SNAME"] = $row['surname'];;
		 $_SESSION["ID"] = $row['id'];

		 setcookie("ID", $ID, 9999999999); 
         setcookie("NAME", $NAME, 9999999999); 
         setcookie("SNAME", $SNAME, 9999999999); 
		 
		 
		mysql_close($conn); 
          ?>
         <script type="text/javascript">
             //location.replace("windex.php");
         </script>
         <?php

		 $mess="Done!";
     }
	 else
	 {
	  $mess="Error!";
	 }
	
}//login=1 , prijava
*/
if($clear==1)
{
$user="";
$pswd="";
}




if ($logout==1)
{   
$logout=0;
$_SESSION["NAME"] = "";
		 $_SESSION["SNAME"] = "";
		 $_SESSION["ID"] = 0;
		 setcookie("ID", $ID, 0); 
         setcookie("NAME", $NAME, 0); 
         setcookie("SNAME", $SNAME, 0);
		 $user=" guest";
}
//echo $page . " - " .  $source_page;


if($_SESSION["ID"]>0) $user=$_SESSION["NAME"] . " " . $_SESSION["SNAME"];
else $user=" guest";

} //try
catch (Exception $e) 
{

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="img/fav.png" type="image/x-icon" />
<style type="text/css">

html, body {
		
		background:url(img/bgr.jpg)  ;
		margin: 0 0 0 0;
	 
	}
	.page-container {
		background:#FFF;
		/*background:url(img/bckg1.png) repeat-x; */
		width:1280px;
		margin:0px auto;
		margin-top:0; 
		margin-bottom:0px; 
		border:solid 0px  #0054A8;
		border-bottom:none;
		border-top:none;
		}
	
	
	@font-face {
	font-family: 'MYRIADPROREGULAR';
	src: url('./MYRIADPROREGULAR.ttf');
	src: url('./MYRIADPROREGULAR.eot');
	src: local('MYRIADPROREGULAR'), url('./MYRIADPROREGULAR.woff') format('woff'), url('./MYRIADPROREGULAR.ttf') format('truetype');
	
	
}
/* use this class to attach this font to any element i.e. <p class="fontsforweb_fontid_4410">Text with this font applied</p> */
body {
	 font-family: 'MYRIADPROREGULAR' !important; 
	/*font-family:Arial, Helvetica, sans-serif;*/
}							

/*
body,td,th {
	font-family: Arial, Helvetica, sans-serif; 
	font-family:MYRIADPRO;
src:url(MYRIADPROREGULAR.ttf);
}
*/

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
	color: #fff;
}
.page-container table tr td #links a:hover {
	color: #fff;
}

a{
    outline: none !important;
 }

.link {
text-decoration:none;
border:0;
outline:none;
}



textarea {
   resize: none;
}

    </style>
    
    <script type='text/javascript'> 
var msg = ">> National Media <<";
msg = " Welcome " + msg;pos = 0;
function scrollTitle() {
document.title = msg.substring(pos, msg.length) + msg.substring(0, pos); pos++;
if (pos > msg.length) pos = 0
window.setTimeout("scrollTitle()",300);
}
scrollTitle();

function link_page()
{
document.forms[0].kraj.value=1;
}


function taster_potvrda()
{
document.forms[0].login.value=1;
document.forms[0].submit();
}

function logout()
{
document.forms[0].logout.value=1;
document.forms[0].submit();
}


</script>
</head>

<body >
<form id="form1" name="form1" method="post" action="">
<input name="kraj" type="hidden" value=0>
<input name="login" type="hidden" value=0>
<input name="logout" type="hidden" value=0>
<input name="clear" type="hidden" value=0>
<div class="page-container">
<table width="1280" border="0" bordercolor="#0066CC" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;background:url(img/background.png) no-repeat;  ">
<tr>
<td width="1280" height="167" valign="top">
<!--   header begin  -->
<table width="1280" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;" >
<tr>
<td width="201" height="200" rowspan="2" align="center" valign="middle"><a href="index.php"><img  src="img/logo.jpg"  style="border:0;" /></a></td>
<td width="745" height="120"><img src="img/naslov.png"  style="border:0;" /></td>
<td width="332" valign="top">
<!--   search box begin  -->
<table width="100%" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;">
<tr>
<td width="70%"></td>
<td width="30%" height="30"></td>
</tr>
<tr>
<td height="26"  style="background:url(img/search.png) no-repeat; background-position:center;" align="left" valign="middle">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="link"  type="text" name="textfield" id="textfield" style="border-style: none; width:170px; height:24px; border:none; background-color:#FFF; " placeholder="type your search here" />
</td>
  <td align="left" valign="middle"><a href="#"><img src="img/search_lupa.png" style="border:0;" /></a></td>
</tr>
<tr>
<td height="19"></td>
<td></td>
</tr>
</table>
<!--   search box  end  -->
</td>
</tr>
<tr>
  <td height="75" colspan="2" valign="top">
   <!--   menu begin  -->
   <table width="100%" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;">
   <tr><td height="2" colspan="7"></td>
   </tr>
<tr>
      <td width="1" height="35">&nbsp;</td>
      <td width="192" align="center" valign="middle" ><a href="about.php" ><img src="img/about_off.png" onmousedown="this.src='img/about_on.png'" onmouseup="this.src='img/about_off.png'" style="border:0;"/></a></td>
      <td width="192" align="center" valign="middle" ><a href="publications.php"><img src="img/publications_off.png" onmousedown="this.src='img/publications_on.png'" onmouseup="this.src='img/publications_off.png'" style="border:0;" /></a></td>
      <td width="192" align="center" valign="middle" ><a href="services.php"><img src="img/services_off.png" onmousedown="this.src='img/services_on.png'" onmouseup="this.src='img/services_off.png'" style="border:0;"/></a></td>
      <td width="192" align="center" valign="middle" ><a href="advertise.php"><img src="img/advertise_off.png" onmousedown="this.src='img/advertise_on.png'" onmouseup="this.src='img/advertise_off.png'" style="border:0;"/></a></td>
      <td width="192" align="center" valign="middle" ><a href="contact.php"><img src="img/contact_off.png" onmousedown="this.src='img/contact_on.png'" onmouseup="this.src='img/contact_off.png'" style="border:0;"/></a></td>
      <td width="47"  >&nbsp;</td>
     </tr>
   </table>
   <!--   menu end  -->  </td>
</tr>
</table>
<!--   header end  -->
</td></tr>
<tr>
<td height="1000" valign="top">
<!--   main content begin  -->
<table width="1280" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;">
<tr>
<td width="980" valign="top">
<!--   left column begin  -->
<table width="980" border="0" bordercolor="#0066CC" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;">
    <tr>
	<td height="150" colspan="3" align="left"><img src="img/HEADER_TITLE.png" style="border:0;" /></td>
	</tr>
	<tr>
	<td valign="top">
	    <!--   left column main content begin  -->
		
		<table   border="0" width="49%" align="center" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
          <tr>
           <td  width="26%" height="36"> &nbsp;First name</td>
           <td colspan="2" align="center" style="background:url(img/register.png)  no-repeat; background-position:center;"><input name="firstname" type="text" style="width:270px; height:24px; border:none; background-color:#FFF; "  value="<?php echo $firstname; ?>"/></td>
          </tr>
          <tr>
           <td  width="26%" height="36">&nbsp;Last name </td>
           <td colspan="2"  align="center" style="background:url(img/register.png)  no-repeat; background-position:center;"><input name="lastname" type="text" style="width:270px; height:24px; border:none; background-color:#FFF; " value="<?php echo $lastname; ?>" /></td>
          </tr>
		  <tr>
           <td  width="26%" height="36">&nbsp;Company name </td>
           <td colspan="2"  align="center" style="background:url(img/register.png)  no-repeat; background-position:center;"><input name="company" type="text" style="width:270px; height:24px; border:none; background-color:#FFF; "  value="<?php echo $company; ?>" /></td>
          </tr>
		  <tr>
           <td  width="26%" height="36">&nbsp;Phone </td>
           <td colspan="2"  align="center" style="background:url(img/register.png)  no-repeat; background-position:center;"><input name="phone" type="text" style="width:270px; height:24px; border:none; background-color:#FFF; "  value="<?php echo $phone; ?>" /></td>
          </tr>
          <tr>
           <td  width="26%" height="36">&nbsp;Username </td>
           <td colspan="2"  align="center" style="background:url(img/register.png)  no-repeat; background-position:center;"><input name="username" type="text" style="width:270px; height:24px; border:none; background-color:#FFF; "  value="<?php echo $username; ?>" /></td>
          </tr>
          <tr>
           <td  width="26%" height="36">&nbsp;Pswd </td>
           <td colspan="2"  align="center" style="background:url(img/register.png)  no-repeat; background-position:center;"><input name="pass1" type="password" style="width:270px; height:24px; border:none; background-color:#FFF; "  value="<?php echo $pass1; ?>" /></td>
          </tr>
          <tr>
           <td  width="26%" height="36">&nbsp;Repeat pswd </td>
           <td colspan="2"  align="center" style="background:url(img/register.png)  no-repeat; background-position:center;"><input name="pass2" type="password"style="width:270px; height:24px; border:none; background-color:#FFF; "  value="<?php echo $pass2; ?>" /></td>
          </tr>
          <tr>
           <td  width="26%" height="36">&nbsp;Mail </td>
           <td colspan="2"  align="center" style="background:url(img/register.png)  no-repeat; background-position:center;"><input name="mail" type="text" style="width:270px; height:24px; border:none; background-color:#FFF; "  value="<?php echo $mail; ?>" /></td>
          </tr>
           <tr>
           <td  width="26%" height="36">&nbsp;Secure </td>
           <td width="33%" valign="middle" >
            <div >
                <img src="captcha.php" style="border:0;"  /> 
				 <a  href="#"><img  src="img/wreload.png" style="border:0;"  onclick="reload();" /></a>
			</div>
           </td>
          <td width="41%" valign="middle" align="center"  style="background:url(img/captcha.png) no-repeat; background-position:center;">
		  <input type="text" name="answer" style="width:120px; height:24px; border:none; background-color:#FFF; "  placeholder="Enter captcha here" /></td>
           </tr>
          <tr>
           <td height="58" colspan="3" align="center" >
		   <a href="#"><img  src="img/wsubmit.png" style="border:0;"  onclick="taster_potvrda();" /></a>
		   </td>
           </tr>
		   <tr>
           <td height="20" colspan="3" align="center" bgcolor="#FFFFFF" ><?php  echo $mess;   ?></td>
           </tr>
       </table>
		
		
		<!--   left column main content end  --></td>
	</tr>
</table>
<!--   left column end  -->
</td>
<td width="5" valign="top">
<!--   vertical line begin  -->
 <table width="5" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;">
 <tr>
 <td width="5"><img  src="img/VERTICAL_large.png" /></td>
 </tr>
 </table>
<!--   vertical line  end  -->
</td>

<td width="295" height="170" valign="top" align="left">
<!--   right column begin  -->


<?php  if($ID>0) 
{  
?>

<table width="295" height="170"  border="0"  align="center" cellpadding="0" cellspacing="0" >
<tr>
<td width="295" height="29" align="left">
&nbsp;User:&nbsp;<?php  echo $user; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#" onClick="logout();"><font color="#000">Logout</font></a>
</td>
</tr>
<tr>
<td height="29" >&nbsp;</td>
</tr>
<tr>
<td height="41"  align="left" valign="middle" >&nbsp; 
  </td>
</tr>
<tr>
  <td height="41"  align="left" valign="middle" >&nbsp; 
  </td>
</tr>
<tr>
  <td height="28" align="center" valign="middle">&nbsp;
  
  </td>
  </tr>
<tr>
  <td height="24" align="center" style=" font-size:12px;color:#999">&nbsp;</td>
</tr>
<tr>
  <td height="23"   align="center" style=" font-size:12px;color:#ec1c24">&nbsp;</td>
</tr>
</table>


<?php 
 }
else
 { 
 ?>
 
 
<table width="295" height="170"  border="0"  align="center" cellpadding="0" cellspacing="0" >
<tr>
<td width="295" height="29" align="left">
&nbsp;User login &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="register.php"><font  color="#000">Register</font></a> 
</td>
</tr>
<tr>
<td height="29" >&nbsp;</td>
</tr>
<tr>
<td height="41"  align="left" valign="middle" style="background:url(img/search.png) no-repeat; background-position:center;"> 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input class="link"  type="text" name="username" id="username" style="width:150px; height:24px; border:none; background-color:#FFF; " placeholder="username" /></td>
</tr>
<tr>
  <td height="41"  align="left" valign="middle" style="background:url(img/search.png) no-repeat; background-position:center;"> 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input class="link"  type="password" name="pswd" id="pswd" style="width:150px; height:24px; border:none; background-color:#FFF; " placeholder="**********" /></td>
</tr>
<tr>
  <td height="28" align="center" valign="middle">
    <a href="#"><img  src="img/wlogin.png" onClick="document.forms[0].login.value=1; 
document.forms[0].submit();" style="border:0;"  /></a>&nbsp;&nbsp;&nbsp;
    <a href="#"><img  src="img/wcancel.png" onClick="document.forms[0].clear.value=1; 
document.forms[0].submit();"  style="border:0;" /></a>  </td>
  </tr>
<tr>
  <td height="24" align="center" style=" font-size:12px;color:#999">&nbsp;<!--Forgot your password? Click <a href="#"><font color="#999999">HERE</font></a> --></td>
</tr>
<tr>
  <td height="23"   align="center" style=" font-size:12px;color:#ec1c24">&nbsp;<?php echo $mess; ?></td>
</tr>
</table>



<?php  } ?>

<!--   right column end  -->
</td>
</tr>
</table>
<!--   main content  end  -->
</td></tr>
<tr>
<td  valign="top">
<!--   footer begin  -->
	<table width="1280" cellpadding="0" cellspacing="0">
	<tr>
	<td height="40" colspan="7">&nbsp;</td>
	<td width="107" rowspan="2" valign="bottom"><img src="img/foot_logo.jpg" style="border:0;" /></td>
	<td width="233" colspan="3">&nbsp;</td>

	</tr>
	<tr bgcolor="#5a6970">
	 <td width="202" height="60" align="center" style=" color:#FFF;font-size:21px;" ><a href="about.php">ABOUT US</a></td>
        <td width="19"><img src="img/foot_vert.png" style="border:0;"/></td>
        <td width="255" align="center" style=" color:#FFF;font-size:21px;" ><a href="publications.php">PUBLICATIONS</a></td>
        <td width="19"><img src="img/foot_vert.png" style="border:0;" /></td>
        <td width="188" align="center" style=" color:#FFF;font-size:21px;" ><a href="services.php">SERVICES</a></td>
        <td width="19"><img src="img/foot_vert.png" style="border:0;" /></td>
        <td width="236" align="center" style=" color:#FFF;font-size:21px;" ><a href="advertise.php">ADVERTISE</a></td>
	<td width="243" align="center" ><img  src="img/company_info.jpg" style="border:0;"  /></td>
        <td width="14"><img src="img/foot_vert.png" style="border:0;"  /></td>
        <td width="227" align="center" style=" color:#FFF;font-size:21px;" ><a href="index.php">www.nationalmedia.ca</a><br><a href="mailto:info@nationalmedia.ca">info@nationalmedia.ca</a></td>

	</tr>
	</table>
	<!--   footer end  -->

</td>
</tr>
</table>
</div>
</form>
</body>
</html>
