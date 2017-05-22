<?php
session_start();
if($_SESSION["ID"]>0)
{

try {
include('conn/conn.php');
extract($_REQUEST);
error_reporting(0);
$ID=$_SESSION["ID"];

//print_r($_SESSION);


//get members

$sql="SELECT * FROM users ";
$retval = mysql_query( $sql, $conn );
//echo $sql . "<br>";	
$i=0;
while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	    { 
		$members[$i]["id"]=$row['id'] ;
		$members[$i]["ime"]=$row['name'];
		$members[$i]["prezime"]=$row['surname'];
		$i++;
     	}



if($page!="")
$source_page=$_REQUEST["page"];
else
$source_page="home.php";



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
		  ?>
         <script type="text/javascript">
             location.replace("index.php");
         </script>
         <?php	
}
//echo $page . " - " .  $source_page;



$dir    = 'advertise/' . $_SESSION["ID"]. "/";
$files = scandir($dir);

//echo $dir . "<br>";	

//print_r($files1);


//echo "status: " .  $_SESSION["pass"] ;
//echo $kraj . "<br>";	
//echo ini_get('upload-max-filesize'). '<br />';

if ($kraj==1)
{   
$kraj=0;
$godina=date("Y",mktime());
$mesec=date("m",mktime());
$dan=date("d",mktime());
$datum=date("Y-m-d H:i:s",mktime());
$dir="advertise/" . $_SESSION['ID'];
mkdir($dir, 0777);

$target_path = $dir. "/";

//echo $target_path;
$target_path1 = $target_path . basename( $_FILES['uploadedfile1']['name']); 
$target_path2 = $target_path . basename( $_FILES['uploadedfile2']['name']); 
$target_path3 = $target_path . basename( $_FILES['uploadedfile3']['name']);

if($_FILES['uploadedfile1']['name']!="")
		{
		if(move_uploaded_file($_FILES['uploadedfile1']['tmp_name'], $target_path1))
		 {
			 //echo "Uspešno 1!";
		 }
		else
		 {
			//echo "Greska 1!";
		 }
	} 
	
if($_FILES['uploadedfile2']['name']!="")
		{
		if(move_uploaded_file($_FILES['uploadedfile2']['tmp_name'], $target_path2))
		 {
			 //echo "Uspešno 2!";
		 }
		else
		 {
			//echo "Greska 2!";
		 }		 
        }
		
if($_FILES['uploadedfile3']['name']!="")
		{
		 if(move_uploaded_file($_FILES['uploadedfile3']['tmp_name'], $target_path3))
		 {
			 //echo "Uspešno 3!";
		 }
		else
		 {
			//echo "Greska 3!";
		 }
        }
}  //kraj==1


//unlink($filename);
if($_SESSION["ID"]>0) $user=$_SESSION["NAME"] . " " . $_SESSION["SNAME"];
else $user=" guest";


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

function remove(par1)
{
alert(par1);
//document.forms[0].logout.value=1;
//document.forms[0].submit();
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
<form id="form1" name="form1" method="post" action="">
<input name="kraj" type="hidden" value=0>
<input name="login" type="hidden" value=0>
<input name="logout" type="hidden" value=0>
<input name="izabran_korisnik" type="hidden" value=0>
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
	<td valign="top" align="center">
	    <!--   left column main content begin  -->
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<table width="684"  align="center" border="0" bordercolor="#0066CC" cellpadding="0" cellspacing="0" style=" border-collapse:collapse;">
		<tr>
		<td width="104" height="34" align="right">&nbsp;
		Client&nbsp;&nbsp;&nbsp;
		</td>
		<td width="580">
		<select name="korisnik1"  style="width: 300;  font-size=10pt; color=#800000; text-align: center;font-weight: bold"
		onChange="document.forms[0].izabran_korisnik.value=1;
							      	  document.forms[0].submit();"
		 >
                    <option value="-1"><?php echo "" ?> </option>
                    <?php for ($i=0; $i<count($members); $i++) 
			{ ?>
                    <option value="<?php echo $members[$i]["id"];?>" 
								  <?php if( $korisnik1 ==  $members[$i]["id"]) echo "selected";  ?>>
                    <?php   
				echo  $members[$i]["prezime"] . " " . $members[$i]["ime"]; 
			?>
                    </option>
                    <?php } ?>
                </select>
		</td>
		</tr>
		<tr>
		<td height="30" valign="top">&nbsp;
		
		</td>
		<td valign="top" align="left">
		<?php
		
		$directory  = 'advertise/' . $korisnik1. "/";
$images = scandir($directory);
$ignore = Array(".", "..");
$count=1;

echo '
<table width="619" border="1" bordercolor="#CCCCCC" align="center" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
	 <tr>
	   <td  colspan="3" align="center" bgcolor="#C4C4C4">Member files</td>
	 </tr>
	  <tr>
	   <td width="46" align="center" bgcolor="#E8E8E8">Num.</td>
	   <td width="540" align="center" bgcolor="#E8E8E8">File (click to download of preview)</td>
       <td width="25" align="center" bgcolor="#E8E8E8">Del.</td>
	 </tr>
';

foreach($images as $dispimage){
    if(!in_array($dispimage, $ignore)){
    echo "<tr id='del$count'>
	<td align='right' >$count &nbsp;</td>
	<td>&nbsp;<a class='black' href='$directory$dispimage'; target='_blank'>$dispimage</td>
	<td>
	<input type='image' src='img/remove.png' id='delete$count'  onclick='deleteFile(\"$dispimage\",$count,\"$directory\");'>
	</td>
	</tr>";
    $count++;
    }
}
if(count($dispimage)==0) 
echo '<tr><td colspan="3" align="center">No files</td></tr></table>';
else
echo '</table>';
		
		?>
		</td>
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
<a href="#" onclick="logout();"><font color="#000">Logout</font></a>
</td>
</tr>
<tr>
<td height="29" >&nbsp;<a href="upload.php"><font color="#000000">Upload files</font></a></td>
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
