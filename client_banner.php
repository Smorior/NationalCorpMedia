<?php
session_start();
error_reporting(0);
extract($_REQUEST);
if($_SESSION["ID"]>0)
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
	

	
include('conn/conn.php');
$sql="SELECT * FROM banners";
$retval = mysql_query( $sql, $conn );
//echo "<br><br><br><br>" . $sql . "<br>";	
$k=1;
while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	    { 
		$baner[$k]["id"]=$row['id'] ;
		$baner[$k]["name"]=$row['name'];
		$baner[$k]["size"]=$row['size'];
		$baner[$k]["status"]=$row['status'];
		$baner[$k]["price"]=$row['price'];
		$baner[$k]["price_4"]=$row['ins4'];
		$baner[$k]["price_16"]=$row['ins16'];
		$price[$k]=$baner[$k]["price"];
		//echo "<br>" . $baner[$k]["price"] . "<br>";	
		$k++;
     	}

//echo "<br>" . $sql . "<br>";	

if($cart==1)
{

$cart=0;
$buy_on_off=0;
$mess="";
$cart_arr="";

for($n=1;$n<12;$n++)
{
	if($checkbox[$n]=="on")  
	{  //echo "1". "<->"; echo $insertion1. "<br>"; 
	$buy_on_off=1; 
	//$cart_arr="1-".$insertion1; 
	$_SESSION["BAN$n"]=1; 
	$_SESSION["INS$n"]=$insertion[$n];  
	switch($insertion[$n])
	{
	case 1:  $_SESSION["UPRICE$n"]=$baner[$n]["price"];    break;
	case 4:  $_SESSION["UPRICE$n"]=$baner[$n]["ins4"];     break;
	case 16: $_SESSION["UPRICE$n"]=$baner[$n]["ins16"];    break;	
	}
	$_SESSION["PRICE$n"]=$price[$n];  
	
	} 
	else 
	{ 
	$_SESSION["BAN$n"]=0; 
	}	

	
}

/*
if($checkbox1=="on")  
{  //echo "1". "<->"; echo $insertion1. "<br>"; 
$buy_on_off=1; $cart_arr="1-".$insertion1; 
$_SESSION["BAN1"]=1; 
$_SESSION["INS1"]=$insertion1;  
switch($insertion1)
{
case 1:  $_SESSION["UPRICE1"]=$baner[1]["price"];   break;
case 4:  $_SESSION["UPRICE1"]=$baner[1]["ins4"];   break;
case 16: $_SESSION["UPRICE1"]=$baner[1]["ins16"];    break;	
}
$_SESSION["PRICE1"]=$price1;  

} 
else 
{ 
$_SESSION["BAN1"]=0; 
}





if($checkbox2=="on")  
{  //echo "2". "<->"; echo $insertion2. "<br>"; 
$buy_on_off=1; $cart_arr="2-".$insertion2; $_SESSION["BAN2"]=1; $_SESSION["INS2"]=$insertion2;  
switch($insertion2)
{
case 1:  $_SESSION["UPRICE1"]=$baner[1]["price"];   break;
case 4:  $_SESSION["UPRICE1"]=$baner[1]["ins4"];   break;
case 16: $_SESSION["UPRICE1"]=$baner[1]["ins16"];    break;	
}
$_SESSION["PRICE2"]=$price2; 
} 
else { $_SESSION["BAN2"]=0; }
if($checkbox3=="on")  
{  //echo "3". "<->"; echo $insertion3. "<br>"; 
$buy_on_off=1; $cart_arr="3-".$insertion3; $_SESSION["BAN3"]=1; $_SESSION["INS3"]=$insertion3; $_SESSION["PRICE3"]=$price3; } 
else { $_SESSION["BAN3"]=0; }
if($checkbox4=="on")  
{  //echo "4". "<->"; echo $insertion4. "<br>"; 
$buy_on_off=1; $cart_arr="4-".$insertion4; $_SESSION["BAN4"]=1; $_SESSION["INS4"]=$insertion4;  $_SESSION["PRICE4"]=$price4; } 
else { $_SESSION["BAN4"]=0; }
if($checkbox5=="on")  
{  //echo "5". "<->"; echo $insertion5. "<br>"; 
$buy_on_off=1; $cart_arr="5-".$insertion5; $_SESSION["BAN5"]=1; $_SESSION["INS5"]=$insertion5;  $_SESSION["PRICE5"]=$price5; } 
else { $_SESSION["BAN5"]=0; }
if($checkbox6=="on")  
{  //echo "6". "<->"; echo $insertion6. "<br>"; 
$buy_on_off=1; $cart_arr="6-".$insertion6; $_SESSION["BAN6"]=1; $_SESSION["INS6"]=$insertion6;  $_SESSION["PRICE6"]=$price6; } 
else { $_SESSION["BAN6"]=0; }
if($checkbox7=="on")  
{  //echo "7". "<->"; echo $insertion7. "<br>"; 
$buy_on_off=1; $cart_arr="7-".$insertion7; $_SESSION["BAN7"]=1; $_SESSION["INS7"]=$insertion7;  $_SESSION["PRICE7"]=$price7;} 
else { $_SESSION["BAN7"]=0; }
if($checkboxC=="on")  
{  //echo "7". "<->"; echo $insertion7. "<br>"; 
$buy_on_off=1; $cart_arr="C-".$insertionC; $_SESSION["BAN8"]=1; $_SESSION["INS8"]=$insertion8;  $_SESSION["PRICE8"]=$priceC;} 
else { $_SESSION["BAN8"]=0; }
		
		*/
//prosledi podatke na checkout stranu
//print_r($cart_arr);
$insertion1="1";
$insertion2="1";
$insertion3="1";
$insertion4="1";
$insertion5="1";
$insertion6="1";
$insertion7="1";
$insertion8="1";
$insertion9="1";
$insertion10="1";
$insertion11="1";
/*
$price1=$baner[1]["price"];
$price2=$baner[2]["price"];
$price3=$baner[3]["price"];
$price4=$baner[4]["price"];
$price5=$baner[5]["price"];
$price6=$baner[6]["price"];
$price7=$baner[7]["price"];
$price8=$baner[8]["price"];
$price8=$baner[9]["price"];
$price8=$baner[10]["price"];
*/

mysql_close($conn);	
if($buy_on_off==1)
  {
 ?>
 <script type="text/javascript">
    location.replace("client_cart.php");
 </script>
 <?php	
  }
  else
  {
  $mess="You didn't check any banner!";
  }
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



function send()
{
document.forms[0].send.value=1;
document.forms[0].submit();
}




function taster_logout()
{
document.forms[0].logout.value=1;
document.forms[0].submit();
}



function change1(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "<?php echo $baner[1]["price"];  ?>";
 if(field.value==4) polje.value = "<?php echo $baner[1]["price_4"] * 4;  ?>";
 if(field.value==16) polje.value = "<?php echo $baner[1]["price_16"] * 16;  ?>";

}


function change2(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "<?php echo $baner[2]["price"];  ?>";
 if(field.value==4) polje.value = "<?php echo $baner[2]["price_4"] * 4;  ?>";
 if(field.value==16) polje.value = "<?php echo $baner[2]["price_16"] * 16;  ?>";

}

function change3(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "<?php echo $baner[3]["price"];  ?>";
 if(field.value==4) polje.value = "<?php echo $baner[3]["price_4"] * 4;  ?>";
 if(field.value==16) polje.value = "<?php echo $baner[3]["price_16"] * 16;  ?>";

}

function change4(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "<?php echo $baner[4]["price"];  ?>";
 if(field.value==4) polje.value = "<?php echo $baner[4]["price_4"] * 4;  ?>";
 if(field.value==16) polje.value = "<?php echo $baner[4]["price_16"] * 16;  ?>";

}

function change5(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "<?php echo $baner[5]["price"];  ?>";
 if(field.value==4) polje.value = "<?php echo $baner[5]["price_4"] * 4;  ?>";
 if(field.value==16) polje.value = "<?php echo $baner[5]["price_16"] * 16;  ?>";

}

function change6(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "<?php echo $baner[6]["price"];  ?>";
 if(field.value==4) polje.value = "<?php echo $baner[6]["price_4"] * 4;  ?>";
 if(field.value==16) polje.value = "<?php echo $baner[6]["price_16"] * 16;  ?>";

}

function change7(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "<?php echo $baner[7]["price"];  ?>";
 if(field.value==4) polje.value = "<?php echo $baner[7]["price_4"] * 4;  ?>";
 if(field.value==16) polje.value = "<?php echo $baner[7]["price_16"] * 16;  ?>";

}

function change8(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "<?php echo $baner[8]["price"];  ?>";
 if(field.value==4) polje.value = "<?php echo $baner[8]["price_4"] * 4;  ?>";
 if(field.value==16) polje.value = "<?php echo $baner[8]["price_16"] * 16;  ?>";

}

function change9(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "<?php echo $baner[9]["price"];  ?>";
 if(field.value==4) polje.value = "<?php echo $baner[9]["price_4"] * 4;  ?>";
 if(field.value==16) polje.value = "<?php echo $baner[9]["price_16"] * 16;  ?>";

}

function change10(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "<?php echo $baner[10]["price"];  ?>";
 if(field.value==4) polje.value = "<?php echo $baner[10]["price_4"] * 4;  ?>";
 if(field.value==16) polje.value = "<?php echo $baner[10]["price_16"] * 16;  ?>";

}

function change11(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "<?php echo $baner[11]["price"];  ?>";
 if(field.value==4) polje.value = "<?php echo $baner[11]["price_4"] * 4;  ?>";
 if(field.value==16) polje.value = "<?php echo $baner[11]["price_16"] * 16;  ?>";

}



</script>

</head>

<body >
<form id="form1" name="form1" method="post" action="">
<input name="kraj" type="hidden" value=0>
<input name="cart" type="hidden" value=0>
<input name="logout" type="hidden" value=0>

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
<table width="1180px" bgcolor="#FFFFFF" align="center" cellpadding="0" cellspacing="0" style=" border-collapse:collapse; ">
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
	  <img  src="img/logout_off.png" onmousedown="this.src='img/logout_off.png'" onmouseup="this.src='img/logout_off.png'"   style="border:0; cursor:pointer;"  onclick="taster_logout();"/>
	  </td>
      </tr>

</table>
<!--  client menu end -->
<table border="0" bordercolor="#00FF00" align="center" cellpadding="0" cellspacing="0" width="1024px"  style=" border-collapse:collapse; ">

<tr>
<td  height="120">
</td>
</tr>
<tr>
<td height="30" align="center" style="font-size:18px; color:#FF0000; ">&nbsp;<?php   echo $mess; ?>
</td>
</tr>
<tr>
<td valign="top">
<table align="center" width="900" border="0"  bordercolor="#EAEAEA" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;">
<tr>
<td height="54" colspan="2" style="font-size:30px; " valign="top">Standard advertising sizes</td>
<td colspan="3" align="right" style="font-size:18px; " valign="top">&nbsp;<i>The location of the ad on a page may vary. </i></td>
</tr>
<tr>
<td width="175"  align="left"><img  src="img/Full%20page%20back%20cover.png" width="140" height="163"  style="border:0;" /></td>
<td width="175"  align="left"><img  src="img/Full%20page%20inside%20cover.png" alt="full2" width="140" height="163"  style="border:0;" /></td>
<td width="175"  align="left"><img  src="img/Full%20page%20elsewhere.png" alt="full3" width="140" height="163"  style="border:0;" /></td>
<td width="175"  align="left"><img  src="img/half.png" width="140" height="163"  style="border:0;" /></td>
<td width="200"  align="left"><img  src="img/quater.png" width="140" height="163"  style="border:0;" /></td>
</tr>
<tr>
<td  align="left" style="font-size:16px; "><?php   echo $baner[1]["size"]; ?></td>
<td  align="left" style="font-size:16px; "><?php   echo $baner[2]["size"]; ?></td>
<td  align="left" style="font-size:16px; "><?php   echo $baner[3]["size"]; ?></td>
<td  align="left" style="font-size:16px; "><?php   echo $baner[4]["size"]; ?></td>
<td  align="left" style="font-size:16px; "><?php   echo $baner[5]["size"]; ?></td>
</tr>
<tr>
<td height="40" align="left" valign="middle" style="font-size:16px; " >Price:&nbsp;<input type="text" readonly name="price[1]" id="price[1]" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right;" value="<?php if($price[1]=="") echo  $baner[1]["price"]; else echo $price[1]; ?>"/>&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price[2]" id="price[2]" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right;" value="<?php if($price[2]=="") echo $baner[2]["price"]; else echo $price[2]; ?>" />&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price[3]" id="price[3]" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right; " value="<?php if($price[3]=="") echo $baner[3]["price"]; else echo $price[3]; ?>" />&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price[4]" id="price[4]" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right; " value="<?php if($price[4]=="") echo $baner[4]["price"]; else echo $price[4]; ?>" />&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price[5]" id="price[5]" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right; " value="<?php if($price[5]=="") echo $baner[5]["price"]; else echo $price[5]; ?>" />&nbsp;$</td>
</tr>
<tr>
<td align="left" valign="middle">
<select name="insertion[1]" onChange="change1(this, event,'price[1]')" <?php if($baner[1]["status"]==0) echo "disabled";  ?> >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox[1]" <?php if($baner[1]["status"]==0) echo "disabled";  ?>  /></td>
<td align="left" valign="middle">
<select name="insertion[2]" onChange="change2(this, event,'price[2]')"  <?php if($baner[2]["status"]==0) echo "disabled";  ?>  >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox[2]"   <?php if($baner[2]["status"]==0) echo "disabled";  ?>   /></td>
<td align="left" valign="middle">
<select name="insertion[3]" onChange="change3(this, event,'price[3]')" <?php if($baner[3]["status"]==0) echo "disabled";  ?>   >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox[3]"   <?php if($baner[3]["status"]==0) echo "disabled";  ?>   ></td>
<td align="left" valign="middle">
<select name="insertion[4]" onChange="change4(this, event,'price[4]')" <?php if($baner[4]["status"]==0) echo "disabled";  ?>   >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox[4]"     <?php if($baner[4]["status"]==0) echo "disabled";  ?>   /></td>
<td align="left" valign="middle">
<select name="insertion[5]" onChange="change5(this, event,'price[5]')" <?php if($baner[5]["status"]==0) echo "disabled";  ?>   >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox[5]"    <?php if($baner[5]["status"]==0) echo "disabled";  ?>    /></td>
</tr>
<tr>
<td height="35" >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
</tr>
<tr>
<td  align="left"><img  src="img/quater%20vertical.png" width="140" height="163"  style="border:0;" /></td>
<td  align="left"><img  src="img/base_baner.png" width="140" height="163"  style="border:0;" /></td>
<td  align="left"><img  src="img/top_baner.png" width="140" height="163"  style="border:0;" /></td>
<td ><img  src="img/puzzle_page.png" width="140" height="163"  style="border:0;" /></td>
<td >&nbsp;</td>
</tr>
<tr>
<td align="left" style="font-size:16px; "><?php   echo $baner[6]["size"]; ?></td>
<td align="left" style="font-size:16px; "><?php   echo $baner[7]["size"]; ?></td>
<td align="left" style="font-size:16px; "><?php   echo $baner[8]["size"]; ?></td>
<td align="left" style="font-size:16px; "><?php   echo $baner[9]["size"]; ?></td>
<td rowspan="4"  valign="top">
  <p><a href="#">
    </a><br />
    <img  src="img/add_cart_txt.png" style="border:0;"  /></p>
</td>
</tr>
<tr>
<td height="40" align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price[6]" id="price[6]" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right;" 
value="<?php if($price[6]=="") echo $baner[6]["price"]; else echo $price[6]; ?>"/>&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price[7]" id="price[7]" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right;" value="<?php if($price[7]=="") echo $baner[7]["price"]; else echo $price[7]; ?>" />&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price[8]" id="price[8]" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right; " value="<?php if($price[8]=="") echo $baner[8]["price"]; else echo $price[8]; ?>" />&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price[9]" id="price[9]" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right; " value="<?php if($price[9]=="") echo $baner[9]["price"]; else echo $price[9]; ?>" />&nbsp;$</td>
</tr>
<tr>
<td align="left" valign="middle">
<select name="insertion[6]" onChange="change6(this, event,'price[6]')"  <?php if($baner[6]["status"]==0) echo "disabled";  ?>  >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox[6]"   <?php if($baner[6]["status"]==0) echo "disabled";  ?>    /></td>
<td align="left" valign="middle">
<select name="insertion[7]" onChange="change7(this, event,'price[7]')" <?php if($baner[7]["status"]==0) echo "disabled";  ?>   >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox[7]"   <?php if($baner[7]["status"]==0) echo "disabled";  ?>   /></td>
<td align="left" valign="middle">
<select name="insertion[8]" onChange="change8(this, event,'price[8]')" <?php if($baner[8]["status"]==0) echo "disabled";  ?>   >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp;Buy
<input type="checkbox" name="checkbox[8]"    <?php if($baner[8]["status"]==0) echo "disabled";  ?>   /></td>
<td align="left" valign="middle">
<select name="insertion[9]" onChange="change9(this, event,'price[9]')" <?php if($baner[9]["status"]==0) echo "disabled";  ?>   >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp;Buy
<input type="checkbox" name="checkbox[9]"   <?php if($baner[9]["status"]==0) echo "disabled";  ?>   /></td>
</tr>
<tr>
<td height="60" colspan="3" align="left" style="font-size:30px; " valign="bottom">Custom Editorial Service</td>
<td align="left" valign="middle">     </td>
</tr>
<tr>
<td height="46" colspan="3"><?php echo $baner[10]["name"];  ?>&nbsp;&nbsp;
<select name="insertion[10]" onChange="change10(this, event,'price[10]')"  <?php if($baner[10]["status"]==0) echo "disabled";  ?>  >
  <option value="1">1 Insertion</option>
  <option value="4">4 Insertion</option>
  <option value="16">16 Insertions</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;Price:&nbsp;
<input type="text" readonly name="price[10]" id="price[10]" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right; " value="<?php if($price[10]=="") echo $baner[10]["price"]; else echo $price[10]; ?>" />&nbsp;$
&nbsp;&nbsp;Buy  
    <input type="checkbox" name="checkbox[10]"   <?php if($baner[10]["status"]==0) echo "disabled";  ?>  />    </td>
<td height="46" colspan="2" align="right">&nbsp;</td>
</tr>
<tr>
<td height="30" colspan="3"><?php echo $baner[11]["name"];  ?>&nbsp;&nbsp;&nbsp;
<select name="insertion[11]" onChange="change11(this, event,'price[11]')"  <?php if($baner[11]["status"]==0) echo "disabled";  ?>  >
  <option value="1">1 Insertion</option>
  <option value="4">4 Insertion</option>
  <option value="16">16 Insertions</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;Price:&nbsp;
<input type="text" readonly name="price[11]" id="price[11]" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right; " value="<?php if($price[11]=="") echo $baner[11]["price"]; else echo $price[11]; ?>" />&nbsp;$
&nbsp;&nbsp;Buy  
    <input type="checkbox" name="checkbox[11]"   <?php if($baner[11]["status"]==0) echo "disabled";  ?>   />    </td>
<td height="30" colspan="2" align="right"><a href="#"><img  src="img/add_cart_but.png" onClick="document.forms[0].cart.value=1; 
document.forms[0].submit();"  style="border:0;"  /></a></td>
</tr>
<tr>
<td height="70" colspan="9">&nbsp;</td>
</tr>
</table>

































<!--<table align="center" width="734" border="0"  bordercolor="#EAEAEA" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;">
<tr>
<td height="44" colspan="2" style="font-size:30px; ">Standard advertising sizes</td>
<td colspan="2" align="right" style="font-size:18px; ">&nbsp;<i>The location of the ad on a page may vary. </i></td>
</tr>
<tr>
<td  align="left"><img  src="img/full_page_baner.jpg"  style="border:0;" /></td>
<td  align="left"><img  src="img/1-2_baner.jpg" width="148" height="163"  style="border:0;" /></td>
<td  align="left"><img  src="img/horizontal1-4_baner.jpg" width="148" height="163"  style="border:0;" /></td>
<td  align="left"><img  src="img/vertical1-4_baner.jpg" width="148" height="163"  style="border:0;" /></td>
</tr>
<tr>
<td  align="center" style="font-size:18px; ">10.375’’ W x 11.5’’ H</td>
<td  align="center" style="font-size:18px; ">10.375’’ W x 5.75’’ H</td>
<td  align="center" style="font-size:18px; ">10.375’’ W x 2.875’’ H</td>
<td  align="center" style="font-size:18px; ">2.5’’ W x 11.5’’ H</td>
</tr>
<tr>
<td height="40" align="left" valign="middle" style="font-size:16px; " >Price:&nbsp;<input type="text" readonly name="price1" id="price1" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right;" value="<?php if($price1=="") echo "50"; else echo $price1; ?>"/>&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price2" id="price2" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right;" value="<?php if($price2=="") echo "30"; else echo $price2; ?>" />&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price3" id="price3" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right; " value="<?php if($price3=="") echo "15"; else echo $price3; ?>" />&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price4" id="price4" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right; " value="<?php if($price4=="") echo "15"; else echo $price4; ?>" />&nbsp;$</td>
</tr>
<tr>
<td align="left" valign="middle">
<select name="insertion1" onChange="change1(this, event,'price1')" >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox1"   onclick="if_check1(this, event,'check_list');" /></td>
<td align="left" valign="middle">
<select name="insertion2" onChange="change2(this, event,'price2')" >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox2"    onclick="if_check2(this, event,'check_list');" /></td>
<td align="left" valign="middle">
<select name="insertion3" onChange="change3(this, event,'price3')" >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox3"   onclick="if_check3(this, event,'check_list');" /></td>
<td align="left" valign="middle">
<select name="insertion4" onChange="change4(this, event,'price4')" >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox4"     onclick="if_check4(this, event,'check_list');" /></td>
</tr>
<tr>
<td height="35" >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
</tr>
<tr>
<td  align="left"><img  src="img/base_baner.jpg" width="148" height="163"  style="border:0;" /></td>
<td  align="left"><img  src="img/top_baner.jpg" width="148" height="163"  style="border:0;" /></td>
<td  align="left"><img  src="img/puzzle_baner.jpg" width="148" height="163"  style="border:0;" /></td>
<td ><img  src="img/add_cart_txt.png" style="border:0;"  /></td>
</tr>
<tr>
<td align="center" style="font-size:18px; ">10.375’’ W x 1.438’’ H</td>
<td align="center" style="font-size:18px; ">10.375’’ W x 1.438’’ H</td>
<td align="center" style="font-size:18px; ">6.732’’ W x 2.834’’ H</td>
<td rowspan="4"  valign="top">
<a href="#">
<img  src="img/add_cart_but.png" onClick="document.forms[0].cart.value=1; 
document.forms[0].submit();"  style="border:0;"  />
</a>
</td>
</tr>
<tr>
<td height="40" align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price5" id="price5" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right;" value="<?php if($price5=="") echo "10"; else echo $price5; ?>"/>&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price6" id="price6" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right;" value="<?php if($price6=="") echo "10"; else echo $price6; ?>" />&nbsp;$</td>
<td align="left" valign="middle" >Price:&nbsp;<input type="text" readonly name="price7" id="price7" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right; " value="<?php if($price7=="") echo "20"; else echo $price7; ?>" />&nbsp;$</td>
</tr>
<tr>
<td align="left" valign="middle">
<select name="insertion5" onChange="change5(this, event,'price5')" >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox5"   onclick="if_check5(this, event,'check_list');" /></td>
<td align="left" valign="middle">
<select name="insertion6" onChange="change6(this, event,'price6')" >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp; Buy<input type="checkbox" name="checkbox6"   onclick="if_check6(this, event,'check_list');" /></td>
<td align="left" valign="middle">
<select name="insertion7" onChange="change7(this, event,'price7')" >
<option value="1">1 Insertion</option>
<option value="4">4 Insertion</option>
<option value="16">16 Insertions</option>
</select>&nbsp;Buy
<input type="checkbox" name="checkbox7"   onclick="if_check7(this, event,'check_list');" /></td>
</tr>
<tr>
<td height="51" colspan="2" align="left" style="font-size:30px; " valign="bottom">Custom Editorial Service</td>
<td align="left" valign="middle">     </td>
</tr>
<tr>
<td height="30" colspan="8"><select name="insertion8" onChange="changeC(this, event,'priceC')" >
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
  <option value="4">Option 4</option>
  <option value="5">Option 5</option>
  <option value="6">Option 6</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;Price:&nbsp;
<input type="text" readonly name="priceC" id="priceC" style="width:60px; height:30; font-size:22px;border:none; color:#F00 ; text-align:right; " value="<?php if($priceC=="") echo "10"; else echo $priceC; ?>" />&nbsp;$
&nbsp;&nbsp;Buy  
    <input type="checkbox" name="checkboxC"   onclick="if_checkC(this, event,'check_list');" />  
</td>
</tr>
<tr>
<td height="70" colspan="8">&nbsp;</td>
</tr>
</table>-->
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
