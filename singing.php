<?php
try {
include('conn/conn.php');
error_reporting(0);
extract($_REQUEST);
session_start();
//print_r($_SESSION);
$err=0;
$godina=date("Y",mktime());
$mesec=date("m",mktime());
$dan=date("d",mktime());
$sql="SELECT * FROM users WHERE LOWER(username)='" . trim(strtolower($username))  . "' AND pswd='" . trim($pswd)  . "'";
$retval = mysql_query( $sql, $conn );
//echo "<br><br><br><br>" . $sql . "<br>";	

if($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	{
		 session_start();
		 $_SESSION["NAME"] = $row['name'];
		 $_SESSION["SNAME"] = $row['surname'];
		 $_SESSION["MAIL"] = $row['mail'];;
		 $_SESSION["COMPANY"] = $row['company'];;
		 $_SESSION["PHONE"] = $row['phone'];;
		 $_SESSION["ID"] = $row['id'];
		 $_SESSION["ACCESS"] = $row['access_group'];
         $ID=$_SESSION["ID"];
		 setcookie("ID", $ID, 9999999999); 
         setcookie("NAME", $NAME, 9999999999); 
         setcookie("SNAME", $SNAME, 9999999999); 
         setcookie("ACCESS", $SNAME, 9999999999); 
		 mysql_close($conn); 
         $err=0;
		 //$mess="Done!";
		 mysql_close($conn); 
		 if($_SESSION["ACCESS"]!=5)
		 {
		   ?>
         <script type="text/javascript">
             location.replace("client_banner.php");
         </script>
         <?php
		 }
		 else
		 { //admin
			 ?>
         <script type="text/javascript">
             location.replace("admin_sec_qw224wVEfdiept.php");
         </script>
         <?php
		 }
     }
	 else
	 {
	  $err=1;
	 }
	// echo $_SESSION["ACCESS"] . "<br>";
} //try
catch (Exception $e) 
{

}
?>