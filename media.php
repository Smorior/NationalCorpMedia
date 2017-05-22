<?php

$id_media=$_REQUEST["id"];


switch ($id_media)
{
case 1: $media_source="media1.pdf"; break;
case 2: $media_source="media2.pdf"; break;
case 3: $media_source="media3.pdf"; break;	
}

//echo $media_source;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="viewer.css"/>

    <script src="compatibility.js"></script>



<!-- This snippet is used in production (included from viewer.html) -->
<link rel="resource" type="application/l10n" href="locale/locale.properties"/>
<script src="l10n.js"></script>
<script src="build/pdf.js"></script>
<script src="debugger.js"></script>
<script src="viewer.js"></script>
</head>

<body>
<!--
<embed src="http://localhost/nationalmedia/publications/<?php echo $media_source; ?>#toolbar=1" width="1120" height="600" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" >
-->
<object data='http://localhost/nationalmedia/publications/<?php echo $media_source; ?>' 
        type='application/pdf' 
        width='1120' 
        height='600'>

</object>

</body>
</html>