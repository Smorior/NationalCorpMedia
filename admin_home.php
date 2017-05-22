<?php
error_reporting(0);
extract($_REQUEST);
session_start();
if($_SESSION["ACCESS"]==5)
{
try {

if ($logout==1)
{   
$logout=0;
$_SESSION["NAME"] = "";
 $_SESSION["SNAME"] = "";
 $_SESSION["ID"] = 0;
 setcookie("ID", $ID, 0); 
 setcookie("NAME", $NAME, 0); 
 setcookie("SNAME", $SNAME, 0);
 session_unset();
 ?>
 <script type="text/javascript">
	 location.replace("index.php");
 </script>
 <?php
}


if($kraj==1)
{
include('conn/conn.php');
$dir="img/";
$target_path = $dir. "/";
$target_path1 = $target_path . basename( $_FILES['uploadedfile1']['name']); 	
$stari_fajl= $target_path . "home.png";

if(!file_exists($_FILES['uploadedfile1']['name']))
{
$mess="File already exists!";
}
else
{
if($_FILES['uploadedfile1']['name']!="" )
		{
		$ext=explode('.',$_FILES['uploadedfile1']['name']);
		//$new_file_name=$ext[0] . "_" . $baner. "." . $ext[1];
		//$mess=$ext[1];
		if($ext[1]=="jpeg" || $ext[1]=="JPEG" || $ext[1]=="jpg"|| $ext[1]=="JPG" || $ext[1]=="png"|| $ext[1]=="PNG" )
		{
		  
			if(move_uploaded_file($_FILES['uploadedfile1']['tmp_name'], $target_path1))
			 {
			 //echo "<br><br><br><br>" . $stari_fajl;
			 //rename($stari_fajl,$stari_fajl."_del");
			 //echo "<br><br><br><br><br><br><br><br>" . $stari_fajl . " - " . $stari_fajl."_del";
			 //rename($target_path1,$target_path ."/home.png");
			 //echo "<br>" . $target_path1 . " - " . $target_path ."/home.png";
			  $sql="UPDATE home_page SET status=0 ";
			   $ress=mysql_query($sql,$conn);
			
			  $sql="INSERT INTO home_page (image_name,status) VALUES ('".$_FILES['uploadedfile1']['name']."',1)";
				   //echo $sql . "<br>";
				$ress=mysql_query($sql,$conn);
				mysql_close($conn);
				
			 $mess="Successful upload!";
			 
			 }
			else
			 {
				//echo "Greska 1!";
				$mess="Error!";
				$odabran_baner=1;
			 }
		 }
		 else
		 {
		  $mess="Wrong file format - " .  $ext[1] . "! See allowed file extensions.";
		  $odabran_baner=1;
		 }
	} 
	else
	{
	 if($mess=="") $mess="No file selected!";
	 $odabran_baner=1;
	}	
}
}
$_FILES['uploadedfile1']['name']="";
} //try
catch (Exception $e) 
{

}


}
else
{
 ?>
 <script type="text/javascript">
 alert("Forbidden! Security area!");
     location.replace("index.php");
 </script>
 <?php	
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


function taster_logout()
{
document.forms[0].logout.value=1;
document.forms[0].submit();
}

</script>

</head>

<body >
<FORM enctype="multipart/form-data"   METHOD=POST ACTION=<?php echo $HTTP_SERVER_VARS['PHP_SELF']?>>
<input name="kraj" type="hidden" value=0>
<input name="logout" type="hidden" value=0>
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
<!--ADMIN menu -->
<table  border="0" align="center" cellpadding="0" cellspacing="0" width="800px"  style=" border-collapse:collapse; background:url(img/user_menu.jpg) repeat-x; ">
 <tr>

 <td height="30" width="120" align="center" style=" font-size:18px; "><a class="black" href="admin_banner.php">Advertise settings</a></td>
 <td width="4" align="center" valign="middle" ><img  src="img/menu_sep_user.png"   style="border:none;" /></td>

 <td width="120" align="center" style=" font-size:18px; "><a class="red" href="admin_home.php">Home page edit</a></td>
 <td width="4" align="center" valign="middle" ><img  src="img/menu_sep_user.png"   style="border:none;" /></td>
 <td width="120" align="center" style=" font-size:18px; "><a class="black" href="admin_client_files.php">Client files</a></td>
 <td width="4" align="center" valign="middle" ><img  src="img/menu_sep_user.png"   style="border:none;" /></td>
 <td width="120" align="center" style=" font-size:16px; "></td>
 <td width="120" align="center" style=" font-size:16px; "></td>
 <td width="120" align="center" style=" font-size:18px; "><a class="black" onclick="taster_logout();" style="cursor:pointer; ">Logout</a></td> 
 </tr>
 </table>

<!--ADMIN menu -->
</div>
<table  border="0" bordercolor="#00FF00" align="center" cellpadding="0" cellspacing="0" width="1024px"  style=" border-collapse:collapse; ">
<tr><td height="150">


</td></tr>
<tr>
<td valign="middle">
<table   border="0" width="900" align="center" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">

          <tr>
           <td align="center" style=" no-repeat; font-size:18px; ">
          <table width="590">
           <tr>
           <td  width="46%" height="36" style="font-size:18px; "> &nbsp;Select home page image</td>
           <td width="54%" align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;">
		  
		   <input  name="uploadedfile1" style ="width:270" type="file" onClick="if_select(this, event,'submit');" />
		 
		   </td>
		  </tr>
          <tr>
           <td height="48" colspan="2" align="center" >
		   <input type="image"  name="submit" id="submit" src="img/submit_off.png"   onmousedown="this.src='img/submit_on.png'" onmouseup="this.src='img/submit_off.png'"  style="border:0;"  onclick="taster_potvrda();"/>
		   </td>
           </tr>
		   <tr>
            <td height="48" colspan="2" align="center"  style="font-size:18px; color:#FF0000; "><?php  echo $mess; ?></td>
          </tr>
          </table>

		   </td>
          </tr>
          <tr><td height="100"></td></tr>
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
	if(b>690)
    $("#tab").css("height",b);
	else
	$("#tab").css("height",b+100);
});
</script>

</form>
 <map name="Map" id="Map">
   <area shape="rect" coords="965,2,1063,39" href="terms.php"  style="border:none; outline:none;"/>
   <area shape="rect" coords="1078,1,1180,24" href="privacy.php"  style="border:none; outline:none;"/>
</map>
</body>
</html>
