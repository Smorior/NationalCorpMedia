<?php
session_start();
error_reporting(0);
if($cart==1)
{
	$cart=0;
$cart_arr="";
if($checkbox1=="on")  {  echo "1". "<->"; echo $insertion1. "<br>"; $cart_arr="1-".$insertion1; $_SESSION["CART1"]=$cart_arr; } else { $_SESSION["CART1"]=0; }
if($checkbox2=="on")  {  echo "2". "<->"; echo $insertion2. "<br>"; $cart_arr="2-".$insertion2; $_SESSION["CART2"]=$cart_arr; } else { $_SESSION["CART2"]=0; }
if($checkbox3=="on")  {  echo "3". "<->"; echo $insertion3. "<br>"; $cart_arr="3-".$insertion3; $_SESSION["CART3"]=$cart_arr; } else { $_SESSION["CART3"]=0; }
if($checkbox4=="on")  {  echo "4". "<->"; echo $insertion4. "<br>"; $cart_arr="4-".$insertion4; $_SESSION["CART4"]=$cart_arr; } else { $_SESSION["CART4"]=0; }
if($checkbox5=="on")  {  echo "5". "<->"; echo $insertion5. "<br>"; $cart_arr="5-".$insertion5; $_SESSION["CART5"]=$cart_arr; } else { $_SESSION["CART5"]=0; }
if($checkbox6=="on")  {  echo "6". "<->"; echo $insertion6. "<br>"; $cart_arr="6-".$insertion6; $_SESSION["CART6"]=$cart_arr; } else { $_SESSION["CART6"]=0; }
if($checkbox7=="on")  {  echo "7". "<->"; echo $insertion7. "<br>"; $cart_arr="7-".$insertion7; $_SESSION["CART7"]=$cart_arr; } else { $_SESSION["CART7"]=0; }
		
//prosledi podatke na checkout stranu
//print_r($cart_arr);
$insertion1="1";
$insertion2="1";
$insertion3="1";
$insertion4="1";
$insertion5="1";
$insertion6="1";
$insertion7="1";
$price1="10";
$price2="7";
$price3="6";
$price4="7";
$price5="4";
$price6="4";
$price7="7";

 ?>
 <script type="text/javascript">
    location.replace("client_cart.php");
 </script>
 <?php	

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Nationalcorp Media</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">

html, body {
font-family:"Bodoni Bk BT";
height:100%;

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
		border:solid 1px  #999999;
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




var check_arr = [];
var arr_list = ['Full page banner\t\t\tPrice 12$','1/2 page banner\t\t\tPrice 10$','Horisontal 1/4 page banner\t\t\tPrice 8$','Vertical 1/4 page banner\t\t\tPrice 11$','Base page banner\t\t\tPrice 6$'
,'Top page banner\t\t\tPrice 11$','Puzzles page banner\t\t\tPrice 9$'];

function if_check1(field,event,par1) 
{
	//alert(field.value);
	//check_arr[1]=field.value;
	 
polje = document.getElementById(par1); 
if(field.checked)
 {  
  check_arr.push(arr_list[0]);
  //polje.value = check_arr;
 }
 else
 {
	check_arr.splice(check_arr,0,1);
  //polje.value = check_arr; 	 
 }
	
}

function if_check2(field,event,par1) 
{
	//alert(field.value);
	//check_arr[1]=field.value;
	 
polje = document.getElementById(par1); 
if(field.checked)
 {  
  check_arr.push(arr_list[1]);
  //polje.value = check_arr;
 }
 else
 {
	check_arr.splice(check_arr,1,1);
  //polje.value = check_arr; 	 
 }
 
	
}

for (i = 0; i < check_arr.length; i++) { 
		polje.value += check_arr[i] + "\n";
	}
	


function change1(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "10$";
 if(field.value==4) polje.value = "32$";
 if(field.value==16) polje.value = "120$";

}


function change2(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "7$";
 if(field.value==4) polje.value = "24$";
 if(field.value==16) polje.value = "99$";

}

function change3(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "6$";
 if(field.value==4) polje.value = "19$";
 if(field.value==16) polje.value = "71$";

}

function change4(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "7$";
 if(field.value==4) polje.value = "24$";
 if(field.value==16) polje.value = "99$";

}

function change5(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "4$";
 if(field.value==4) polje.value = "14$";
 if(field.value==16) polje.value = "56$";

}

function change6(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "4$";
 if(field.value==4) polje.value = "14$";
 if(field.value==16) polje.value = "56$";

}

function change7(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 

 if(field.value==1) polje.value = "7$";
 if(field.value==4) polje.value = "24$";
 if(field.value==16) polje.value = "99$";

}
</script>


</head>

<body >
<form id="form1" name="form1" method="post" action="">
<input name="kraj" type="hidden" value=0>
<input name="cart" type="hidden" value=0>
<div class="menu-container" >
 <table width="100%" border="0" bordercolor="#999999" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;border-top:none;border-left:none; border-right:none; ">
     <tr >
      <td width="5%" align="left" valign="middle" style="font-size:36px; font-weight:bold; " ><a href="index.php"><img src="img/logo.png"  style="border:none; " /></a></td>
      <td width="22%" align="left" valign="middle" style="font-size:36px; " >Nationalcorp Media</td>
      <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep.png"   style="border:none;" /></td>
      <td width="10%" align="center" valign="middle"  style=" font-size:20px; ">&nbsp;<a class="black"  href="about.php" >About Us</a></td>
      <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="13%" align="center" valign="middle" style=" font-size:20px; "><a  class="black" href="publications.php" >Publications</a></td>
       <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="11%" align="center" valign="middle" style=" font-size:20px; "><a  class="black" href="services.php">Services</a></td>
       <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="11%" align="center" valign="middle" style=" font-size:20px; "><a class="black"  href="contact.php">Contact</a></td>
       <td width="1%" align="center" valign="middle" ><img  src="img/menu_sep2.png"   style="border:none;" /></td>
      <td width="12%"  align="center" valign="middle" style=" font-size:20px; "><a class="black"  href="login.php">Client Login</a></td>
      <td width="4%"  >&nbsp;</td>
     </tr>
     <tr><td colspan="15" height="1" valign="top" bgcolor="#999999"></td></tr>
   </table>
</div>
<div class="page-container">
<table id="tab" border="0" bordercolor="#00FF00" align="center" cellpadding="0" cellspacing="0" width="1280px"  style=" border-collapse:collapse; ">
<tr><td height="20">
<?php  print_r($cart_arr); ?>dfg
</td>
</tr>
<tr>
<td valign="top">
&nbsp;kh
</td>
</tr>
<tr>
<td valign="top">
&nbsp;gjfg
</td>
</tr>
<tr>
<td valign="top">
&nbsp;
</td>
</tr>
</table>
</div>
<div class="footer-container">
 <table border="0" bgcolor="#919396" bordercolor="#FFFFFF"  width="100%" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
    <tr>
        <td width="426" height="36"  align="center" style="color:#FFF; font-variant:normal; font-size:18px;">&nbsp;100 King Street West, #5700<br />Toronto, Ontario&nbsp;&nbsp;M5X1C7&nbsp;&nbsp;</td>
        <td width="380"  align="center" style="color:#FFF; font-size:22px;">&nbsp;Nationalcorp Media Inc.</td>
       <td width="55"  align="center" style="color:#FFF; font-size:14px;">&nbsp;</td>
        <td width="734"  align="left" style="color:#FFF; font-size:18px;">&nbsp;www.NationalMedia.ca © Nationalcorp Media Inc. All rights reserved.<br />
Use of this site constitutes the acceptance of our <a href="#"><u>terms of use</u></a> and <a href="#"><u>privacy policy</u></a>.</td>
        
      </tr>
    </table>
</div>
<script type='text/javascript'> 
$(document).ready(function(){
    var b= $(window).height();
    $("#tab").css("height",b);
});
</script>
</form>
</body>
</html>
