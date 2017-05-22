<?php
include('conn/conn.php');
error_reporting(0);
session_cache_expire(0);


//echo $page . " - " .  $source_page;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Nationalcorp Media</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="img/fav.png" type="image/x-icon" />
<style type="text/css">

html, body {
		
		/*background:url(img/bground.jpg) repeat-x; */
		margin: 0 0 0 0;
	 
	}
	.menu-container {
		background:#FFF;
		/*background:url(img/bckg1.png) repeat-x; */
		position:fixed;
		top:0;
		width:100%;
		margin:0px auto;
		margin-top:0; 
		margin-bottom:0px; 
		border:solid 0px  #0054A8;
		border-bottom:none;
		border-top:none;
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
	
.footer-container {
		background:#FFF;
		/*background:url(img/bckg1.png) repeat-x; */
		position:fixed;
		bottom:0;
		width:100%;
		margin:0px auto;
		margin-top:0; 
		margin-bottom:0px; 
		border:solid 0px  #0054A8;
		border-bottom:none;
		border-top:none;
		}
	
}
/* use this class to attach this font to any element i.e. <p class="fontsforweb_fontid_4410">Text with this font applied</p> */
body {
	 font-family:"Bodoni MT";
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


    </style>
    
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
<div class="menu-container" >
 <table width="100%" border="0" bordercolor="#999999" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;border-top:none;border-left:none; border-right:none; ">
     <tr >
      <td width="5%" align="left" valign="middle" style="font-size:36px; font-weight:bold; " ><img src="img/logo.jpg"  height="60"  style="border:none; padding-left:3px;padding-top:3px; " /></td>
      <td width="25%" align="left" valign="middle" style="font-size:36px; font-weight:bold;" >Nationalcorp Media</td>
      <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep.png"   style="border:none;" /></td>
      <td width="9%" align="center" valign="middle" >&nbsp;<a class="black"  href="index.php?page=<?php echo "about.php";  ?>">About us</a></td>
      <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="11%" align="center" valign="middle" ><a  class="black" href="publications.php" >Publications</a></td>
       <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="11%" align="center" valign="middle" ><a  class="black" href="index.php?page=<?php echo "services.php"; ?>">Services</a></td>
       <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="11%" align="center" valign="middle" ><a class="black"  href="index.php?page=<?php echo "advertise.php"; ?>">Advertise</a></td>
       <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="9%" align="center" valign="middle" ><a class="black"  href="index.php?page=<?php echo "contact.php"; ?>">Contact</a></td>
       <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="11%"  align="center" valign="middle" ><a class="black"  href="index.php?page=<?php echo "login.php"; ?>">Client Login</a></td>
      <td width="2%"  >&nbsp;</td>
     </tr>
   </table>
</div>
<div class="page-container">
<table border="0" bordercolor="#FF0000" align="center" cellpadding="0" cellspacing="0" width="1280px" height="920"   style=" background:url(img/background.png) no-repeat;  border-collapse:collapse; ">
<tr>
<td height="738" valign="top">ojkj</td>
</td>
</tr>

<tr>
  <td align="center" style="color:#000; font-size:36px;">Canada’s leader in<br />
city-specific, metropolitan, and subject-specific publications</td>
</tr>
</table>
</div>
<div class="footer-container">
 <table border="0" bgcolor="#999999" bordercolor="#FFFFFF"  width="100%" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
    <tr>
        <td width="426" height="36"  align="center" style="color:#FFF;">&nbsp;<b>100 King Street West, #5700<br />Toronto, Ontario&nbsp;&nbsp;M5X1C7&nbsp;&nbsp;</b></td>
        <td width="380"  align="center" style="color:#FFF; font-size:22px;">&nbsp;<b>Nationalcorp Media Inc.</b></td>
       <td width="55"  align="center" style="color:#FFF; font-size:14px;">&nbsp;</td>
        <td width="734"  align="left" style="color:#FFF; font-size:14px;">&nbsp;<b>www.NationalMedia.ca © Nationalcorp Media Inc. All rights reserved.<br />
Use of this site constitutes the acceptance of our terms of use and privacy policy.</b></td>
        
      </tr>
    </table>
</div>
</form>
</body>
</html>
