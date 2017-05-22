<?php

session_start();
if($_SESSION["ACCESS"]==5)
{
	try 
	{
	
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
	
	
	
	
	error_reporting(0);
	extract($_REQUEST);
	include('conn/conn.php');
	//uzmi banere
	$sql="SELECT * FROM banners ";
	$retval = mysql_query( $sql, $conn );
	//echo "<br><br><br><br>" . $sql . "<br>";	
	$k=1;
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	    { 
		$baneri[$k]["id"]=$row['id'] ;
		$baneri[$k]["name"]=$row['name'];
		$baneri[$k]["size"]=$row['size'];
		$baneri[$k]["price"]=$row['price'];
		$baneri[$k]["price_4"]=$row['ins4'];
		$baneri[$k]["price_16"]=$row['ins16'];
		//echo "<br>" . $baner[$k]["price"] . "<br>";	
		$k++;
     	}
	
if($odabran_baner==1)	
	{
		 $sql="SELECT * FROM banners WHERE id=".$baner;
         $retval = mysql_query( $sql, $conn );
		 //echo $sql . "<br>";	
		  if($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
			{ 
			$baner_id=$row['id'];
			//$name=$row['name'];
			$size=$row['size'];
			if($row['status']==1)
			$status=1; else $status=0; 
			
			$price=$row['price'];
			$price4=$row['ins4'];
			$price16=$row['ins16'];
			//echo $baner["price_4"] . "<br>";
			}
		
	}
	
	
	
	
if ($kraj==1)
{
        //insert u bazu
		$kraj=0;
		$godina=date("Y",mktime());
		$mesec=date("m",mktime());
		$dan=date("d",mktime());
		date_default_timezone_set("UTC");
		$datum=date("Y-m-d H:i:s",mktime());
		//echo "kraj=1" . $firstname . " - " . $lastname . " - " . $company. " - " . $phone. " - " . $username. " - " . $pass1.   " - " . $pass2.  " - " . $mail.  "<br>";
		//if($name=="") $mess="Name field is empty!";
		if($size=="") $mess="Size field is empty!";
		elseif($price=="") $mess="Price field is empty!";
		elseif($price4=="") $mess="Price (4 insertion) field is empty!";
		elseif($price16=="") 
		{
		$mess="Price (16 insertions) field is empty!"; 
		}
		else
		{
		 //update
		// if($status==1) $stat=1;
			$sql="UPDATE banners SET size='".$size."',price=".$price." ,ins4=".$price4." ,ins16=".$price16.", status=".$status." WHERE id=".$baner; 
			$ress=mysql_query($sql,$conn);
			//echo $status . "<br>";
			
			if($ress!=0)
			   {
				 $mess="Successful change!";
				 $baner="";
				 //$name="";
				 $size="";
				 $price="";
				 $price4="";
				 $price16="";
			   }
			   else
			   {
				 $mess="Error!";   
			   }
	   
		}
	
	
	
     }
	mysql_close($conn);
	} //try
	catch (Exception $e) 
	{
	  $mess="Error!"; 
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
		}.menu-container {
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
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input name="kraj" type="hidden" value=0>
<input name="logout" type="hidden" value=0>
<input name="odabran_baner" type="hidden" value=0>
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
 <td height="30" width="120" align="center" style=" font-size:18px; "><a class="red" href="admin_banner.php">Advertise settings</a></td>
 <td width="4" align="center" valign="middle" ><img  src="img/menu_sep_user.png"   style="border:none;" /></td>
 <td width="120" align="center" style=" font-size:18px; "><a class="black" href="admin_home.php">Home page edit</a></td>
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

<table  border="0" bordercolor="#00FF00" align="center" cellpadding="0" cellspacing="0" width="1180"  style=" border-collapse:collapse; ">
<tr><td height="100" >
</td>
</tr>
<tr>
<td valign="top" align="center">
<table width="499" bordercolor="#CCCCCC" border="1" align="center" cellpadding="0" cellspacing="0" style=" border-collapse:collapse; " >
  <tr>
  <td height="33" bgcolor="#7c7c7c" colspan="2"  align="left" style="font-size:20px; color:#FFFFFF; ">&nbsp;Banner administration</td>
  </tr>
  <tr> 
           <td width="187" height="26" style="font-size:18px; color:#FFFFFF; " bgcolor="#999" > &nbsp;Select banner  </td>
           <td width="300"  align="left">
		   <select name="baner"  style="width: 300;  font-size=10pt; color=#800000; text-align: left;font-weight: bold" 
           onchange="document.forms[0].odabran_baner.value=1;
                     document.forms[0].submit();" >
                    <option value="-1"><?php echo "" ?> </option>
                    <?php for ($i=1; $i<=count($baneri); $i++) 
			                { ?>
                    <option value="<?php echo $baneri[$i]["id"];?>" 
								  <?php if( $baner ==  $baneri[$i]["id"]) echo "selected";  ?>>
                    <?php   
				echo  $baneri[$i]["name"]; 
			?>
                    </option>
                    <?php } ?>
             </select>
		   </td>
         </tr>
		 <!--
         <tr> 
           <td width="187" height="26" style="font-size:18px; color:#FFFFFF; " bgcolor="#999"  > &nbsp;Name  </td>
           <td width="300"  align="left"><input name="name" type="text" style=" width:300;  " value="<?php echo $name;   ?>" /></td>
         </tr>
		 -->
         <tr> 
           <td width="187" height="26" style="font-size:18px; color:#FFFFFF; " bgcolor="#999" > &nbsp;Size </td>
           <td width="300"  align="left"> <input name="size" type="text" style=" width:300;  "  value="<?php echo $size;   ?>" /></td>
         </tr>
         <tr> 
           <td width="187" height="26" style="font-size:18px; color:#FFFFFF; " bgcolor="#999" > &nbsp;Price (1 insertation) </td>
           <td width="300" align="left"> <input name="price" type="text"  value="<?php echo $price;   ?>" style="width:60px" />&nbsp;$</td>
         </tr>
          <tr> 
           <td width="187" height="26" style="font-size:18px; color:#FFFFFF; " bgcolor="#999" > &nbsp;Price (4 insertation) </td>
           <td width="300"  align="left"> <input name="price4" type="text"  value="<?php echo $price4;   ?>" style="width:60px"  />&nbsp;$</td>
         </tr>
         <tr> 
           <td width="187" height="26" style="font-size:18px; color:#FFFFFF; " bgcolor="#999"  > &nbsp;Price (16 insertations) </td>
           <td width="300"  align="left"> <input name="price16" type="text"  value="<?php echo $price16;   ?>" style="width:60px"  />&nbsp;$</td>
         </tr>
          <tr> 
           <td width="187" height="26" style="font-size:18px; color:#FFFFFF; "  bgcolor="#999" > &nbsp;Status </td>
           <td width="300"  align="left"> 
           <select name="status" id="status">
		   <option value="0"  <?php if( $status ==  0) echo "selected";  ?>>Disabled</option>
		   <option value="1"  <?php if( $status ==  1) echo "selected";  ?>>Enabled</option>
		   </select>
           </td>
         </tr>
          <tr>
          <td height="46" colspan="2" align="center">
          <img  src="img/submit_off.png" onMouseDown="this.src='img/submit_on.png'" onMouseUp="this.src='img/submit_off.png'"    style="border:0" 
           onclick="document.forms[0].kraj.value=1;
                     document.forms[0].submit();"/></td>
          </tr>
          <tr>
           <td height="20" colspan="3" align="center" bgcolor="#FFFFFF"  style="font-size:18px; color:#FF0000; "><?php  echo $mess;   ?></td>
           </tr>
</table>
</td>
</tr>
</table>
<div class="footer-container" >

<table  border="0" bordercolor="#FFFFFF"  bgcolor="#000000" width="1180" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
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
