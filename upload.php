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


//$paypal_tr=$_SESSION["PAYPALTRANSACTION"];
//if($paypal_tr==787) { $status_tr="PayPal transaction is success!  Thank you for buying on Nationalcorp Media!"; $_SESSION["PAYPALTRANSACTION"]=0; }


$paypal_tr=$_REQUEST["success"];
if($paypal_tr==787) 
{ 
$status_transakcije="PayPal transaction is success!  Thank you for buying on Nationalcorp Media";

}




//get members

$sql="SELECT * FROM banners ";
$retval = mysql_query( $sql, $conn );
//echo $sql . "<br>";	
$i=0;
while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	    { 
		$baneri[$i]["id"]=$row['id'] ;
		$baneri[$i]["name"]=$row['name'];
		$baneri[$i]["size"]=$row['size'];
		$i++;
     	}
		
		
		
		




//echo ini_get('upload-max-filesize'). '<br />';
$mess="";
if ($kraj==1)
{   
$kraj=0;
$godina=date("Y",mktime());
$mesec=date("m",mktime());
$dan=date("d",mktime());
date_default_timezone_set("UTC");
$datum=date("Y-m-d H:i:s",mktime());
$dir="advertise/" . $_SESSION['ID'];
mkdir($dir, 0777);
try
{
$target_path = $dir. "/";
$target_path1 = $target_path . basename( $_FILES['uploadedfile1']['name']); 
//$target_path2 = $target_path . basename( $_FILES['uploadedfile2']['name']); 
//$target_path3 = $target_path . basename( $_FILES['uploadedfile3']['name']);

if($_FILES['uploadedfile1']['name']!="")
		{
		$ext=explode('.',$_FILES['uploadedfile1']['name']);
		$new_file_name=$ext[0] . "_" . $baner. "." . $ext[1];
		//$mess=$ext[1];
		if($ext[1]=="jpeg" || $ext[1]=="JPEG" || $ext[1]=="jpg"|| $ext[1]=="JPG" || $ext[1]=="tiff" || $ext[1]=="eps" || $ext[1]=="ai" || $ext[1]=="doc" || $ext[1]=="docx"|| $ext[1]=="TIFF" || $ext[1]=="EPS" || $ext[1]=="AI" || $ext[1]=="DOC" || $ext[1]=="DOCX")
		{
		  
			if(move_uploaded_file($_FILES['uploadedfile1']['tmp_name'], $target_path1))
			 {
			 rename($target_path1,$target_path."/".$new_file_name);
			 //echo "<br><br><br><br>" . $target_path1."/".$_FILES['uploadedfile1']['name'] . " - " . $target_path1."/".$new_file_name;
			 
			 $sql="INSERT INTO user_uploads (user_id,banner_id,file_name,date) VALUES 
				('".$_SESSION["ID"]."','".$baner."','".$new_file_name."','".$datum."')";
				   //echo $sql . "<br>";
				$ress=mysql_query($sql,$conn);
				mysql_close($conn);
				if($ress!=0)
				   {
					 $mess="Successful upload!";
					  $odabran_baner=0;
				 $baner=0;
				   }
				   else
				   {
					  $mess="Error! File already exists!"; 
					  $odabran_baner=1;
				   }
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
catch (Exception $e1) 
{
 $mess="Error! Check file name.";
}
 
	/*
if($_FILES['uploadedfile2']['name']!="")
		{
		if(move_uploaded_file($_FILES['uploadedfile2']['tmp_name'], $target_path2))
		 {
			 //echo "Uspešno 2!";
			 $mess="Successful upload!";
			 $odabran_baner=0;
			 $baner=0;
		 }
		else
		 {
			//echo "Greska 2!";
			$mess="Error!";
			$odabran_baner=1;
		 }		 
        }
		else
		{
		 if($mess=="") $mess="No file selected!";
		}
	
if($_FILES['uploadedfile3']['name']!="")
		{
		 if(move_uploaded_file($_FILES['uploadedfile3']['tmp_name'], $target_path3))
		 {
			 //echo "Uspešno 3!";
			 $mess="Successful upload!";
			 $odabran_baner=0;
			 $baner=0;
		 }
		else
		 {
			//echo "Greska 3!";
			$mess="Error!";
			$odabran_baner=1;
		 }
        }
		else
		{
		 if($mess=="") $mess="No file selected!";
		 $odabran_baner=1;
		}
		*/
		
		
		
  }  //kraj==1

 mysql_close($conn); 
} //try
catch (Exception $e) 
{
$mess="Error! Check file name.";
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

function if_select(field,event,par1) 
{
//alert(field.checked);
polje = document.getElementById(par1); 
polje.disabled = false;
/*
if(field.checked)
 {  
polje.disabled = false;
polje.focus();
 }
else
 {
polje.disabled = true;
 }
 */
}



</script>

</head>

<body >
<FORM enctype="multipart/form-data"   METHOD=POST ACTION=<?php echo $HTTP_SERVER_VARS['PHP_SELF']?>>
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
	  <a  href="my_files.php" ><img  src="img/my_files_off.png" onMouseDown="this.src='img/my_files_on.png'" onMouseUp="this.src='img/my_files_off.png'"  style="border:0; cursor:pointer;"/></a> 
	  &nbsp;&nbsp;&nbsp;
	  <img  src="img/logout_off.png" onMouseDown="this.src='img/logout_on.png'" onMouseUp="this.src='img/logout_off.png'"   style="border:0; cursor:pointer;"  onclick="taster_logout();"/>
	  </td>
      </tr>
</table>
<!--  client menu end -->
<table border="0" bordercolor="#00FF00" align="center" cellpadding="0" cellspacing="0" width="1000px"  style=" border-collapse:collapse; ">
<tr>
<td height="60">&nbsp;</td>
</tr>
<tr><td height="30" align="center" style="font-size:24px; color:#FF0000; "><?php  echo $status_transakcije;  ?></td></tr>
<tr>
<td valign="top">
<table  border="0" width="920" align="center" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
          <tr><td height="77" align="center" colspan="3" style="font-size:30px; ">Upload Your Advertising Materials</td></tr>
		  
		   <tr>
           <td  width="15%" height="45" style="font-size:18px; "> &nbsp;Select banner</td>
           <td width="45%" align="center" >
		   <select name="baner"  style="width: 400;  font-size=10pt; color=#800000; text-align: left;font-weight: bold" 
		    onChange="document.forms[0].odabran_baner.value=1;
							      document.forms[0].submit();"
		 >
                    <option value="-1"><?php echo "" ?> </option>
                    <?php for ($i=0; $i<count($baneri); $i++) 
			{ ?>
                    <option value="<?php echo $baneri[$i]["id"];?>" 
								  <?php if( $baner ==  $baneri[$i]["id"]) echo "selected";  ?>>
                    <?php   
				echo  $baneri[$i]["name"] . " - " . $baneri[$i]["size"]; 
			?>
                    </option>
                    <?php } ?>
                </select>
		   </td>
          </tr>
		  <tr>
           <td  width="15%" height="36" style="font-size:18px; "> &nbsp;Select file</td>
           <td width="45%" align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;">
		   <?php if($odabran_baner==1 && $baner!=0) { ?>
		   <input  name="uploadedfile1" style ="width:270" type="file" onClick="if_select(this, event,'submit');" />
		   <?php } ?>
		   </td>
          <td width="40%" rowspan="4" align="center" ><img  src="img/upload_txt.png" style="border:0;"  /></td>
		  </tr>
		
		  <!--
          <tr>
           <td  width="10%" height="36" style="font-size:18px; "> &nbsp;File 2</td>
           <td width="45%" align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;"><input name="uploadedfile2" style ="width:270" type="file" /></td>
          </tr>
		  <tr>
           <td  width="10%" height="36" style="font-size:18px; "> &nbsp;File 3</td>
           <td width="45%" align="center" style="background:url(img/register_bgr.png)  no-repeat; background-position:center;"><input name="uploadedfile3" style ="width:270" type="file" /></td>
          </tr>
		  -->
          <tr>
           <td height="48" colspan="2" align="center" >
		   <?php 
		   //if($_FILES['uploadedfile1']['name']!=""  && $baner!=0)
		   //if($uploadedfile1!="" && $baner!=0) 
		   { ?>
           <input type="image" disabled="true"  name="submit" id="submit" src="img/submit_off.png"  onmousedown="this.src='img/submit_on.png'" onMouseUp="this.src='img/submit_off.png'"  style="border:0; outline:none;"  onclick="taster_potvrda();"/>		   
           <?php } ?>
		   </td>
           </tr>
          <tr>
            <td height="48" colspan="2" align="center"  style="font-size:18px; color:#FF0000; "><?php  echo $mess; ?></td>
          </tr>
		   <tr>
           <td height="40" colspan="2" align="center" >&nbsp;
		   </td>
		   
           <td height="40" align="center" >&nbsp;</td>
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
