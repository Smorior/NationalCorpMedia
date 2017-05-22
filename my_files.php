<?php
error_reporting(0);
session_start();
extract($_REQUEST);
if($_SESSION["ID"]>0)
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



include('conn/conn.php');



$sql="SELECT * FROM banners ";
$retval = mysql_query( $sql, $conn );
//echo $sql . "<br>";	
$i=0;
while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	    { 
		$baner[$row['id']]["id"]=$row['id'] ;
		$baner[$row['id']]["name"]=$row['name'];
		$baner[$row['id']]["size"]=$row['size'];
		$i++;
     	}



//echo "<br><br><br><br><br>$remowe";
if($remowe==1)
{
 $remowe=0;
   try
	{
	//$filename = $_POST['filename'];
	//$path = $_POST['directory'];


	if(file_exists($path."/".$filename)) { 
	$sql="DELETE FROM user_uploads WHERE file_name='". $filename . "' AND user_id=".$_SESSION["ID"];
	   echo "<br><br><br><br>" . $sql . "<br>";
	//$ress=mysql_query($sql,$conn);
	
	 //unlink($path."/".$filename); //delete file
	}
	} //try
	catch (Exception $e) 
	{
	
	}

}









//$dir    = 'advertise/' . $_SESSION["ID"]. "/";
//$files = scandir($dir);


mysql_close($conn); 
 
} //try
catch (Exception $e) 
{

}

}
else
{
 ?>
         <script type="text/javascript">
		 alert("Unauthorized access!!!");
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


a.light_red:link {
text-decoration: none;
color:#ff0000;
size:4;
	
}
a.light_red:visited {
	text-decoration: none;
	color:#ff0000;
	
}
a.light_red:hover {
	text-decoration: none;
	color:#000;
	
}
a.light_red:active {
	text-decoration: none;
	color:#ff0000;	
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

function taster_logout()
{
document.forms[0].logout.value=1;
document.forms[0].submit();
}

function remove()
{
document.forms[0].remowe.value=1;
document.forms[0].submit();
}

</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
function deleteFile(fname,rowid,directory)
{
    $.ajax({ url: "deletefile.php",
        data: {"filename":fname,"directory":directory},
        type: 'post',
        success: function(output) {
          //alert(output);
          $("#del"+rowid).remove();
        }
    });
	document.forms[0].submit();
}
</script>
</head>

<body >
<FORM  METHOD=POST ACTION=<?php echo $HTTP_SERVER_VARS['PHP_SELF']?>>
<input name="kraj" type="hidden" value=0>
<input name="logout" type="hidden" value=0>
<input name="register" type="hidden" value=0>
<input name="remowe" type="hidden" value=0>

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
				   <td width="13%"  align="left" valign="middle" style=" font-size:20px; "><a class="red"  href="my_files.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Profile</a></td>
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
<!--  client menu begin -->
<table width="1180px" align="center" cellpadding="0" cellspacing="0" style=" border-collapse:collapse; ">
<tr><td height="70"></td></tr>
     <tr>
      <td height="40" colspan="4" align="right" valign="middle"  style=" font-size:24px; color:#000; ">&nbsp;User:&nbsp;<font color="#ec1c24"><?php  echo $_SESSION["NAME"] . " " . $_SESSION["SNAME"];  ?>
      </font>&nbsp;&nbsp;</td>
      </tr>
	  <tr>
      <td width="149" height="30" align="left" valign="middle"  style=" font-size:18px; color:#FFFFFF; "><a  href="client_banner.php" ><img  src="img/ads.PNG"  style="border:0; " /></a> </td>
      <td width="342" align="center" valign="middle"  style=" font-size:18px; color:#FFFFFF; ">&nbsp;</td>
      <td width="458" align="center" valign="middle"  style=" font-size:18px; color:#FFFFFF; ">&nbsp;</td>
      <td width="229" align="center" valign="middle"  style=" font-size:18px; color:#FFFFFF; ">
	  <a  href="upload.php" ><img  src="img/upload_off.png" onmousedown="this.src='img/upload_on.png'" onmouseup="this.src='img/upload_off.png'"  style="border:0; cursor:pointer;"/></a> 
	  &nbsp;&nbsp;&nbsp;
	  <img  src="img/logout_off.png" onmousedown="this.src='img/logout_on.png'" onmouseup="this.src='img/logout_off.png'"   style="border:0; cursor:pointer;"  
	  onclick="document.forms[0].logout.value=1;
               document.forms[0].submit();"/>
	  </td>
      </tr>
</table>
<!--  client menu end -->
<table  border="0" bordercolor="#00FF00" align="center" cellpadding="0" cellspacing="0" width="1180px"  style=" border-collapse:collapse; ">
<tr>
<td height="60">&nbsp;</td>
</tr>
<tr><td height="150" ></td></tr>
<tr>
<td valign="top">
<table width="619" border="1" bordercolor="#CCCCCC" align="center" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
	
	 <tr>
	   <td align="center"  valign="top">
	   <?php
		//$dir    = 'advertise/' . $_SESSION["ID"]. "/";
         //$files = scandir($dir);

		$directory  = 'advertise/' . $_SESSION["ID"]. "/";
$images = scandir($directory);
$ignore = Array(".", "..");
$count=1;

echo '
<table width="819" border="1" bordercolor="#CCCCCC" align="center" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
	 <tr>
	   <td  colspan="4" align="center" bgcolor="#C4C4C4" style="font-size:20px; ">My files</td>
	 </tr>
	  <tr >
	   <td width="46" align="center" bgcolor="#E8E8E8" style="font-size:18px; ">Num.</td>
	   <td width="400" align="center" bgcolor="#E8E8E8" style="font-size:18px; ">File (click to download of preview)</td>
	   <td width="340" align="center" bgcolor="#E8E8E8" style="font-size:18px; ">Banner</td>
       <td width="25" align="center" bgcolor="#E8E8E8" style="font-size:18px; ">Del.</td>
	 </tr>
';

foreach($images as $dispimage){
    if(!in_array($dispimage, $ignore))
	{
	//echo $dispimage . "<br>";
	$tmp=explode('.',$dispimage);
	$ban_id=substr($tmp[0],-1);
	//echo $dispimage . " - " . $ban_id. "<br>";
	//echo substr($dispimage,length($dispimage)-1,length($dispimage));
	//$ban_id=substr($dispimage,length($dispimage)-1,length($dispimage));
    echo "<tr id='del$count'>
	<td align='right' >$count &nbsp;</td>
	<td>&nbsp;<a class='black' href='$directory$dispimage'; target='_blank'>$dispimage</td>
	<td>&nbsp;"; echo $baner[$ban_id]["name"] . " - " . $baner[$ban_id]["size"]; echo "</td>
	<td>
	<!--
	<input type='image'  style='border:0;' src='img/remove.png' id='delete$count'  onclick='deleteFile(\"$dispimage\",$count,\"$directory\");'>
	-->
	<input type='image'  style='border:0;' src='img/remove.png' onclick='remove();' />
	
	</td>
	</tr>";
    $count++;
    }
}
echo '</table>';
		
		?>
	   </td>
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
