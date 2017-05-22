<?php
session_start();
error_reporting(0);
extract($_REQUEST);

//echo $_REQUEST("success");
if($_SESSION["ID"]>0)
{
$paypal_tr=$_SESSION["PAYPALTRANSACTION"];
if($paypal_tr==878) { $status_transakcije="PayPal transaction canceled!"; $_SESSION["PAYPALTRANSACTION"]=0; }

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
 $user=" guest";
 ?>
 <script type="text/javascript">
	 location.replace("index.php");
 </script>
 <?php
}




/*
$sql="SELECT * FROM users WHERE id=".$_SESSION["ID"];
$retval = mysql_query( $sql, $conn );
//echo $sql . "<br>";	

while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	    { 
		$client["id"]=$row['id'] ;
		$members["firstname"]=$row['name'];
		$members["lastname"]=$row['surname'];
		$members["mail"]=$row['mail'];
		$members["company"]=$row['company'];
     	}
	*/	
		
include('conn/conn.php');

/*
$sql="SELECT * FROM banners ";
$retval = mysql_query( $sql, $conn );
//echo $sql . "<br>";	
$i=1;
while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	    { 
		$baner[$i]["id"]=$row['id'] ;
		$baner[$i]["name"]=$row['name'];
		$baner[$i]["size"]=$row['size'];
		$baner[$i]["price"]=$row['price'];
		$i++;
     	}
*/

   $num_ban=1;
   //$subtotal=0;
   //$total_cost=0;
   $tax=15;
 //echo  "<br><br><br>";	 
 
   //print_r($_SESSION);
    for($i=1;$i<=11;$i++)  
	{
	   $_SESSION["ITEM$num_ban"]=0;
	   $_SESSION["PRICE$num_ban"]=0;
		if($_SESSION["BAN$i"]==1)
		{ 
		 $sql="SELECT * FROM banners WHERE id=".$i;
         $retval = mysql_query( $sql, $conn );
		 //echo $sql . "<br>";	
		  if($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
			{ 
			$baner["id"]=$row['id'];
			$baner["name"]=$row['name'];
			$baner["size"]=$row['size'];
			$baner["price"]=$row['price'];
			}

		 $_SESSION["ITEM$num_ban"]=$baner["name"] . " - " . $baner["size"];
		 //$_SESSION["QUANT$i"]=$quantity[$i];
		 //$_SESSION["PRICE$num_ban"]=$baner["price"];
		 $data["product"][$num_ban]=$baner["name"] . "<br>" . $baner["size"];
		 $data["insert"][$num_ban]=$_SESSION["INS$i"];
		 $data["uprice"][$num_ban]=$baner["price"];
		 //if($quantity[$num_ban]==0) $quantity[$i]=1;
		 $data["tprice"][$num_ban]=$_SESSION["INS$i"] * $baner["price"] ;
		 $_SESSION["PRICE$num_ban"]=$data["tprice"][$num_ban];
		 $subtotal+=$data["tprice"][$num_ban];
		 //echo $_SESSION["ITEM$num_ban"] . "<br>";	
		 $num_ban++;
		 
		}
	}
   //echo $data["product"][2] . "<br>";	
  
  /*
   if($_SESSION["BAN1"]==1)
    { 
	 $_SESSION["ITEM1"]="Full page banner<br>(10.375’’ W x 11.5’’ H)";
	 $_SESSION["QUANT1"]=$quantity[1];
     $data["product"][1]="Full page banner<br>(10.375’’ W x 11.5’’ H)";
     $data["insert"][1]=$_SESSION["INS1"];
     $data["uprice"][1]=$_SESSION["UPRICE1"];
	 if($quantity[1]==0) $quantity[1]=1;
	 $data["tprice"][1]=$_SESSION["PRICE1"] * $quantity[1];
	 $subtotal+=$data["tprice"][1];
	 $num_ban++;
    }
	if($_SESSION["BAN2"]==1)
    { 
	 $_SESSION["ITEM2"]="1/2 page banner<br>(10.375’’ W x 5.75’’ H)";
	 $_SESSION["QUANT2"]=$quantity[2];
     $data["product"][2]="1/2 page banner<br>(10.375’’ W x 5.75’’ H)";
     $data["insert"][2]=$_SESSION["INS2"];
     $data["uprice"][2]=$_SESSION["PRICE2"];
	 if($quantity[2]==0) $quantity[2]=1;
	 $data["tprice"][2]=$_SESSION["INS2"] * $_SESSION["PRICE2"] * $quantity[2];
	 $subtotal+=$data["tprice"][2];
	 $num_ban++;
    }
	if($_SESSION["BAN3"]==1)
    { 
	 $_SESSION["ITEM3"]="Horizontal 1/4<br>(10.375’’ W x 2.875’’ H)";
	 $_SESSION["QUANT3"]=$quantity[3];
     $data["product"][3]="Horizontal 1/4<br>(10.375’’ W x 2.875’’ H)";
     $data["insert"][3]=$_SESSION["INS3"];
     $data["uprice"][3]=$_SESSION["PRICE3"];
	 if($quantity[3]==0) $quantity[3]=1;
	 $data["tprice"][3]=$_SESSION["INS3"] * $_SESSION["PRICE3"] * $quantity[3];
	 $subtotal+=$data["tprice"][3];
	 $num_ban++;
    }
	if($_SESSION["BAN4"]==1)
    { 
	 $_SESSION["ITEM4"]="Vertical 1/4<br>(2.5’’ W x 11.5’’ H)";
	 $_SESSION["QUANT4"]=$quantity[4];
     $data["product"][4]="Vertical 1/4<br>(2.5’’ W x 11.5’’ H)";
     $data["insert"][4]=$_SESSION["INS4"];
     $data["uprice"][4]=$_SESSION["PRICE4"];
	 if($quantity[4]==0) $quantity[4]=1;
	 $data["tprice"][4]=$_SESSION["INS4"] * $_SESSION["PRICE4"] * $quantity[4];
	 $subtotal+=$data["tprice"][4];
	 $num_ban++;
    }
	if($_SESSION["BAN5"]==1)
    { 
	 $_SESSION["ITEM5"]="Base banner<br>(10.375’’ W x 1.438’’ H)";
	 $_SESSION["QUANT5"]=$quantity[5];
     $data["product"][5]="Base banner<br>(10.375’’ W x 1.438’’ H)";
     $data["insert"][5]=$_SESSION["INS5"];
     $data["uprice"][5]=$_SESSION["PRICE5"];
	 if($quantity[5]==0) $quantity[5]=1;
	 $data["tprice"][5]=$_SESSION["INS5"] * $_SESSION["PRICE5"] * $quantity[5];
	 $subtotal+=$data["tprice"][5];
	 $num_ban++;
    }
	if($_SESSION["BAN6"]==1)
    { 
	 $_SESSION["ITEM6"]="Top banner<br>(10.375’’ W x 1.438’’ H)";
	 $_SESSION["QUANT6"]=$quantity[6];
     $data["product"][6]="Top banner<br>(10.375’’ W x 1.438’’ H)";
     $data["insert"][6]=$_SESSION["INS6"];
     $data["uprice"][6]=$_SESSION["PRICE6"];
	 if($quantity[6]==0) $quantity[6]=1;
	 $data["tprice"][6]=$_SESSION["INS6"] * $_SESSION["PRICE6"] * $quantity[6];
	 $subtotal+=$data["tprice"][6];
	 $num_ban++;
    }
	if($_SESSION["BAN7"]==1)
    {  
	 $_SESSION["ITEM7"]="Puzzle page banner<br>(6.732’’ W x 2.834’’ H)";
	 $_SESSION["QUANT7"]=$quantity[7];
     $data["product"][7]="Puzzle page banner<br>(6.732’’ W x 2.834’’ H)";
     $data["insert"][7]=$_SESSION["INS7"];
     $data["uprice"][7]=$_SESSION["PRICE7"];
	 if($quantity[7]==0) $quantity[7]=1;
	 $data["tprice"][7]=$_SESSION["INS7"] * $_SESSION["PRICE7"] * $quantity[7];
	 $subtotal+=$data["tprice"][7];
	 $num_ban++;
    }
	
	/*
	if($_SESSION["BANC"]==1)
    { 
	 $_SESSION["BANC"]="Custom Editorial Service";
     $data["product"][8]="Custom Editorial Service";
     $data["insert"][8]=$_SESSION["INSC"];
     $data["uprice"][8]=$_SESSION["PRICEC"];
	 //if($quantity[8]==0) $quantity[8]=1;
	 $data["tprice"][8]= $_SESSION["PRICEC"];
	 $subtotal+=$data["tprice"][8];
	 //$num_ban++;
    }
*/
    //$subtotal=$data["tprice"][1]+$data["tprice"][2]+$data["tprice"][2]+$data["tprice"][2]+$data["tprice"][2]+$data["tprice"][2]+$data["tprice"][2]+$data["tprice"][2]+$data["tprice"][2];
    $custom=0;
	//if($_SESSION["BANC"]==1)
 //{ 
	// $custom=$_SESSION["PRICEC"];
 //   }
	$total_order=$subtotal;
	$total_cost=$total_order + $total_order*$tax/100;
//
$tax_cost=$total_order*$tax/100;

//echo  $_SESSION["UPRICE1"]; 
$_SESSION["ITEMS"]=0;
$_SESSION["TOTORDER"]=0;
$_SESSION["TOTCOST"]=0;
  //pakuj sesiju
  $_SESSION["TAX"]=$total_order*$tax/100;
  $_SESSION["ITEMS"]=$num_ban-1;
  //if($_SESSION["BANC"]==1) $_SESSION["ITEMS"]++;
  
  
  $_SESSION["TOTORDER"]=$total_order;
  $_SESSION["TOTCOST"]=$total_cost;


//echo $_SESSION["ITEMS"]. " <> " . $_SESSION["TOTORDER"]  . " <> " .$_SESSION["TOTCOST"] . "<br>";	


mysql_close($conn);	
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


</style>
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>    

<script type='text/javascript'> 

function link_page()
{
document.forms[0].kraj.value=1;
}


function taster_logout()
{
document.forms[0].logout.value=1;
document.forms[0].submit();
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
	

/*
function if_check2(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 
if(field.checked)
 {  
polje.value = polje.value + "\n1/2 page banner\t\t\tPrice 10$";
 }

}

function if_check3(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 
if(field.checked)
 {  
polje.value = polje.value + "\nHorisontal 1/4 page banner\t\t\tPrice 8$";
 }

}
function if_check4(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 
if(field.checked)
 {  
polje.value = polje.value + "\nVertical 1/4 page banner\t\t\tPrice 11$";
 }

}

function if_check5(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 
if(field.checked)
 {  
polje.value = polje.value + "\nBase page banner\t\t\tPrice 6$";
 }

}

function if_check6(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 
if(field.checked)
 {   
polje.value = polje.value + "\nTop page banner\t\t\tPrice 11$";
 }

}

function if_check7(field,event,par1) 
{
	//alert(field.value);
polje = document.getElementById(par1); 
if(field.checked)
 {  
polje.value = polje.value + "\nPuzzles page banner\t\t\tPrice 9$";
 }

}
*/

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


function if_check(field,event,par1) 
{
//alert(field.checked);
polje = document.getElementById(par1); 
if(field.checked)
 {  
polje.disabled = false;
polje.focus();
 }
else
 {
polje.disabled = true;
 }
}




function openList() {
    var list1 = document.getElementById("pay");

		if (list1.style.display == "none")
		{
			    list1.style.display = "block";
		}
		else
		{
		 list1.style.display = "none";
		}	
}






</script>


</head>

<body >
<form id="form1" name="form1" method="post" action="">
<input name="kraj" type="hidden" value=0>
<input name="cart" type="hidden" value=0>
<input name="logout" type="hidden" value=0>
<div class="footer-container" >

<table  border="0" bordercolor="#FFFFFF"  bgcolor="#000000" width="100%" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
  <tr>
	<td align="left" height="24" ><img  src="img/footernovi.png"  width="100%" usemap="#Map"  style="border:0;" /></td>
  </tr>
</table>
</div>
</div>
<table id="tab" border="0" bordercolor="#00FF00" align="center" cellpadding="0" cellspacing="0" width="1020px"  style=" border-collapse:collapse; ">
<tr><td height="65"></td></tr>
<tr>
<td height="73" colspan="5" align="center">
<table width="100%" align="center" cellpadding="0" cellspacing="0" style=" border-collapse:collapse; ">
     <tr>
      <td height="40" colspan="2" align="right" valign="middle"  style=" font-size:24px; color:#000; ">&nbsp;User:</td>
      <td width="246" align="left" valign="middle" style=" font-size:24px; color:#000; ">&nbsp;&nbsp;<font color="#ec1c24"><?php  echo $_SESSION["NAME"] . " " . $_SESSION["SNAME"];  ?></font></td>
     </tr>
	  <tr>
      <td width="727" height="44" align="center" valign="middle"  style=" font-size:18px; color:#FFFFFF; ">&nbsp;</td>
      <td colspan="2" align="center" valign="middle"  style=" font-size:18px; color:#FFFFFF; ">
	  	  <a  href="upload.php" ><img  src="img/upload_off.png" onmousedown="this.src='img/upload_on.png'" onmouseup="this.src='img/upload_off.png'"   style="border:0; cursor:pointer;"/></a>&nbsp;&nbsp;&nbsp;
	  <img  src="img/logout_off.png"  style="border:0; cursor:pointer;" onmousedown="this.src='img/logout_off.png'" onmouseup="this.src='img/logout_off.png'"    onclick="taster_logout();"/>
	  

	  </td>
      </tr>
	  <tr><td height="47" align="center" colspan="3" style="font-size:24px; color:#FF0000; "><?php  echo $status_transakcije;  ?></td>
</table>
  </td>
</tr>
<tr>
<td width="30" valign="top">&nbsp;

</td>
<td width="504" valign="top">
<table border="1"  bordercolor="#E1E1E1" align="left" cellpadding="0" cellspacing="0" width="550px"  style="border-collapse:collapse; ">
<tr  bgcolor="#7c7c7c"><td align="left" colspan="5" style="font-size:20px; color:#FFFFFF; ">&nbsp;Order information</td></tr>
<tr bgcolor="#999"  style="font-size:18px; color:#FFFFFF; ">
<td width="39" align="center">Num.</td>
<td width="204" align="center">Product</td>
<!--
<td width="62" align="center">Quantity</td>
-->
<td width="77" align="center">Insertions</td>
<td width="93" align="center">Un. price</td>
<td width="79" align="center">Tot. price</td>
</tr>
<?php  for($j=1;$j<$num_ban;$j++)  {   ?>
<tr style="font-size:18px; ">
<td align="center"><?php echo $j;  ?>&nbsp;</td>
<td align="left">&nbsp;<?php echo $data["product"][$j];  ?></td>
<!--
<td align="center">
<select name="quantity[<?php  echo $j;  ?>]" style="width:60px" onChange="document.forms[0].submit();">
<option value="1" <?php if( $quantity[$j] == 1) echo "selected";  ?>>1</option>
<option value="2" <?php if( $quantity[$j] == 2) echo "selected";  ?>>2</option>
<option value="3" <?php if( $quantity[$j] == 3) echo "selected";  ?>>3</option>
<option value="5" <?php if( $quantity[$j] == 5) echo "selected";  ?>>5</option>
<option value="10"<?php if( $quantity[$j] == 10) echo "selected";  ?>>10</option>
</select>
</td>
-->
<td align="center">&nbsp;<?php echo $data["insert"][$j];  ?></td>
<td align="left">&nbsp;<?php echo $data["uprice"][$j];  ?>&nbsp;$</td>
<td align="left">&nbsp;<?php echo $data["tprice"][$j];  ?>&nbsp;$</td>
</tr>
<?php  }  ?>
<tr ><td align="left" colspan="5"  height="10">&nbsp;</td></tr>

<tr>
<td colspan="2">&nbsp;</td>
<td align="left" bgcolor="#7c7c7c" colspan="2" style="font-size:20px; color:#FFFFFF; ">&nbsp;Order total:</td>
<td style="font-size:18px; color:#000000;">&nbsp;<?php  echo $total_order;   ?>$</td>
</tr>

<tr  ><td align="left" colspan="5" style="font-size:20px; color:#FFFFFF; ">&nbsp;</td></tr>
<tr>
<td colspan="3">&nbsp;</td>
<td align="left" bgcolor="#999"  style="font-size:18px; color:#FFFFFF; ">&nbsp;HST(<?php  echo $tax;   ?>%):</td>
<td style="font-size:18px; color:#000000;">&nbsp;<?php  echo $tax_cost;   ?>%</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
<td align="left" bgcolor="#999"  style="font-size:18px; color:#FFFFFF; ">&nbsp;Fee:</td>
<td style="font-size:18px; color:#000000;">&nbsp;<?php  echo "0";   ?>$</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
<td align="left" bgcolor="#999"  style="font-size:18px; color:#FFFFFF; ">&nbsp;Discount:</td>
<td style="font-size:18px; color:#000000;">&nbsp;<?php  echo "0";   ?>$</td>
</tr>
<tr  ><td align="left" colspan="5" style="font-size:20px; color:#FFFFFF; ">&nbsp;</td></tr>
<tr  bgcolor="#7c7c7c"><td align="left" colspan="5" style="font-size:20px; color:#FFFFFF; ">&nbsp;Client information</td></tr>
<tr>
<td align="left" colspan="5"><br />&nbsp;<?php  echo $_SESSION['NAME'] . " " . $_SESSION['SNAME'];   ?><br/>&nbsp;<br/>&nbsp;<?php  echo $_SESSION['COMPANY'];   ?><br/>&nbsp;<?php  echo $_SESSION['MAIL']; ?><br/>
<br/>&nbsp;<?php  echo $_SESSION['PHONE'];  ?><br/>&nbsp;</td>
</tr>

<tr  ><td height="35" colspan="5" align="left" style="font-size:20px; color:#FFFFFF; ">&nbsp;</td>
</tr>
</table>
</td>
<td width="84" valign="top"></td>
<td width="600" valign="top">

<table border="1"  bordercolor="#E1E1E1" align="left" cellpadding="0" cellspacing="0" width="400px"  style="border-collapse:collapse; ">
<tr  bgcolor="#7c7c7c"><td align="left" colspan="4" style="font-size:20px; color:#FFFFFF; ">&nbsp;Order summary</td></tr>
<tr>
<td width="302" align="right"   style="font-size:28px; color:#000; font-weight:bold; ">&nbsp;Total cost:&nbsp;</td>
<td width="92" style="font-size:22px; color:#d00606;">&nbsp;<?php  echo $total_cost;   ?>$</td>
</tr>
<tr>
<td colspan="4" style="border-bottom:none; ">
<table width="100%" height="180" border="0">
<tr ><td align="left" colspan="2"  height="10">&nbsp;<?php  //echo $total_cost;   ?></td></tr>
<tr>
<td width="5%" height="18"  align="center" valign="middle" bgcolor="#d00606" style="margin:3 3 3 3; "><input name="agree" type="checkbox" value="" onclick="openList();" style=" background-color:#d00606; border-color:#d00606; "  /></td>
<td width="95%" valign="middle" style="font-size:18px; color:#999; ">I agree to the following:</td>
</tr>
<tr>
<td></td>
<td  style="font-size:16px; color:#000; "><a class="black" href="#">Nationalcorp Media Terms of Use Agreement</a></td>
</tr>
<tr>
<td></td>
<td style="font-size:16px; color:#000; "><a class="black" href="#">Nationalcorp Media Privacy Policy Agreement</a></td>
</tr>

<tr>
<td height="81" colspan="2">
<div id="pay"  style="display:none">
<a href='sample/checkoutdev.php'>
<img  id="pal" src="img/express-checkout.png" style="border:0; " />
</a>
</div>
</td>
</tr>
</table>
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
