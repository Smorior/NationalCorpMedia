<?php
try
{
session_start();
extract($_REQUEST);
$filename = $_POST['filename'];
$path = $_POST['directory'];
include('conn/conn.php');

if(file_exists($path."/".$filename)) { 
$sql="DELETE FROM user_uploads WHERE file_name='". $filename . "' AND user_id=".$_SESSION["ID"];
   //echo $sql . "<br>";
$ress=mysql_query($sql,$conn);

 unlink($path."/".$filename); //delete file
}
} //try
catch (Exception $e) 
{

}
?>