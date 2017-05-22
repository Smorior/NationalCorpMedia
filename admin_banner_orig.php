<?php

session_start();
if($_SESSION["ACCESS"]==5)
{
	try 
	{
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
			$name=$row['name'];
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
		if($name=="") $mess="Name field is empty!";
		elseif($size=="") $mess="Size field is empty!";
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
			$sql="UPDATE banners SET name='".$name."', size='".$size."',price=".$price." ,ins4=".$price4." ,ins16=".$price16.", status=".$status." WHERE id=".$baner; 
			$ress=mysql_query($sql,$conn);
			echo $status . "<br>";
			
			if($ress!=0)
			   {
				 $mess="Successful change!";
				 $baner="";
				 $name="";
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

</head>

<body>
<FORM enctype="multipart/form-data"   METHOD=POST ACTION=<?php echo $HTTP_SERVER_VARS['PHP_SELF']?>>

  <input name="kraj" type="hidden" value=0>
  <input name="odabran_baner" type="hidden" value=0>

<p>&nbsp; </p>
<table width="499" align="center">
  <tr>
  <td height="33" bgcolor="#7c7c7c" colspan="2"   border="1" align="left" style="font-size:20px; color:#FFFFFF; ">&nbsp;Banner administration</td>
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
         <tr> 
           <td width="187" height="26" style="font-size:18px; color:#FFFFFF; " bgcolor="#999"  > &nbsp;Name  </td>
           <td width="300"  align="left"><input name="name" type="text" style=" width:300;  " value="<?php echo $name;   ?>" /></td>
         </tr>
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
          <td height="57" colspan="2" align="center">
          <img  src="img/submit_off.png" onMouseDown="this.src='img/submit_on.png'" onMouseUp="this.src='img/submit_off.png'"    style="border:0" 
           onclick="document.forms[0].kraj.value=1;
                     document.forms[0].submit();"/></td>
          </tr>
          <tr>
           <td height="20" colspan="3" align="center" bgcolor="#FFFFFF"  style="font-size:18px; color:#FF0000; "><?php  echo $mess;   ?></td>
           </tr>
</table>
<p>&nbsp;</p>


</FORM>
</body>
</html>
