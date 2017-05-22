<?php
error_reporting(0);
extract($_REQUEST);
session_start();
try {

} //try
catch (Exception $e) 
{

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

</script>

</head>

<body >
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input name="kraj" type="hidden" value=0>
<input name="login" type="hidden" value=0>
<input name="register" type="hidden" value=0>
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
</div>

<table id="tab" border="0" bordercolor="#00FF00" align="center" cellpadding="0" cellspacing="0" width="1180px"  style=" border-collapse:collapse; ">
<tr><td height="90"></td></tr>
<tr>
<td valign="middle">
<table   border="0" width="900" align="center" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">

          <tr>
           <td align="center" style=" no-repeat; font-size:18px; ">
           PRIVACY POLICY<br /><br />
		   <div align="justify">

This privacy policy ("Policy") describes how Nationalcorp Media Inc. and ("Nationalcorp", "we", "our" or "us") collects and uses the personal information we gather from or about visitors to the Web sites located at URLs <a class="black"  href="http://www.nationalmedia.ca">www.nationalmedia.ca</a> and others operated by Nationalcorp (the "Sites") so you, as a visitor to the Sites or using the Services (referred to herein as "you" or "your") can make an informed decision about using the Sites and/or the Services. Please take a moment to read the following to learn more about our information practices, including what type of information is gathered, how the information is used, to whom we may disclose the information, and how we safeguard your personal information that we may obtain. As defined in this Policy, "Services" means: (a) our free online products; (b) our for-pay subscriptions; (c) our custom publishing, creative services, advertising services or other special services; and (d) advertising in one of our publications. This Policy should be read in conjunction with our Terms of Use.<br /><br />
Changes to this Policy<br /><br />
We reserve the right to change the provisions of this Policy at any time. We will alert you that material changes to this Policy have been made by announcing the updates on the Sites, so please check back periodically. If we make any change to our Policy, previously collected information will continue to be governed by the protections of the Policy in effect at the time the information was collected unless otherwise required by law. If, at any time, you do not agree with the terms of this Policy, you should not access or use the Sitesor Services.
<br /><br />
Jurisdiction
<br /><br />
Nationalcorp and its Sitesoperate in Canada and are intended for use in Canada. You agree that your access to and use of the NationalcorpSitesand Services, including this Policy, are governed exclusively by the laws of the Province of Ontario and the federal laws of Canada applicable therein (excluding conflicts or choice of laws principles). Applicable laws include the ONPersonal Information Protection Act and the Personal Information Protection and Electronic Documents Act (the "Privacy Legislation"). other applicable laws. Certain provisions of Canada’s "anti-spam" legislation, commonly referred to as "CASL" may also govern the use of your personal information.<br /><br />
Personal Information<br /><br />
As used in this Policy, "personal information" means any data that identifies a user as an individual or is capable of doing so. Information about your business does not constitute your personal information and is not protected by this privacy policy.<br /><br />
Personal information does not include "aggregated" information, which is data we collect about or through the use of the Sites or through the Services from which individual identities or other personal information has been removed. This Policy in no way restricts or limits our collection and use of aggregated information.
Personal Information Collection<br /><br />
We may collect certain information that you voluntarily provide to us which may contain your personal information. Personal information may also be collected by us, among other means, if you provide such information in connection with your (a) sending an email or message to us from the Sites; (b) providing us with your personal information in order to subscribe to receive one of our free or for pay publications; or (c) provide us with information in order to get information about one of our products or services. If you choose to link any of your social media sites such as Facebook, Twitter, Google+ to comment on our magazines or to share personal information in your social profiles with our Sites, when you click allow on the permission authorizations screen, you have consented to our collection, use and disclosure of your basic profile information, user ID and other information from the social media Sites that you specifically allow us to access.
If you subscribe to or use our Services, we may also collect personal information through your use of those Services. For example, personal information is collected when you provide us with your personal information for the purposes of using our Services. Information that you might provide us might include your name, contact information, credit card number or other payment or account information, home address identification, personal preferences, information about your residence, and other identification and contact information.
<br /><br />
Personal Information Use and Choice
<br /><br />
We use personal information collected for a variety of purposes, primarily to provide you with the Services that you have agreed to receive, to provide you with information regarding news features, products or services, or to contact you regarding the use of our Services.
<br /><br />
We have a number of communications such as marketing offers and surveys which are sent to recipients from whom we have express or implied consent to send such communications. When we contact you about these special offers or services, you may opt out by following the unsubscribe instructions located at the bottom of these emails or in the case of direct mail marketing offers, contact us at the contact information set forth at the end of this Policy.
<br /><br />
Information Sharing
<br /><br />
We will not share the personal information we collect from you with third parties except as otherwise described in this Policy, or the Terms of Use located on the Sites.
We may share your personal information with third party service providers who are engaged by or working with us in connection with the operation of the Sites, mobile applications or the provision of the Services who need access to such information to carry out their work for us. We may use third party service providers to verify financial information, such as the validity of a credit card. We may also share personal information with other third parties when you give us your consent to do so. If we transfer any personal information to a third party service provider, we will provide them only with the information needed to perform the subcontracted service, and will use appropriate contractual or other means to provide a comparable level of protection while the information is being used by them. However, you agree that we are not responsible for the actions of service providers or other third parties (even if we would otherwise be vicariously liable) if the third parties do not comply with their contractual obligations to us, nor are we responsible for any additional information you provide directly to these service providers or other third parties, and we encourage you to become familiar with their practices before disclosing information directly to them. We may share aggregate information and other information that does not identify you with third parties without your consent.
<br /><br />
We may share your personal information in order to provide you with the Services.  We take your conduct in providing us with that information as consent to disclose the information for the purposes of providing the Services.  <br /><br />
Unless expressly prohibited from doing so under applicable legislation such as "anti-spam" legislation, we may disclose personal information in the good faith belief that we are lawfully authorized or required to do so, or that doing so is reasonably necessary or appropriate to comply with the law or with legal process or authorities, to ensure compliance with our Terms of Use, respond to any claims, or to protect the rights, property or safety of Nationalcorp, our users, our employees or the public, including without limitation to protect Nationalcorp or our users from fraudulent, abusive, inappropriate or unlawful use of our Sites. Information about our users, including personal information, may also be disclosed or transferred as part of, or during negotiations of, any merger, sale of company assets, financing or acquisition or in any other situation where personal information may be transferred as one of the business assets of Nationalcorp.<br /><br />
You may choose to submit various content such as photographs, music video, profiles, or commentary to us and we may reproduce, publish, distribute or otherwise use your personal information submitted in such content. If you have submitted such information, including your personal information, you have chosen to disclose that personal information publicly. Please review our Terms of Use in respect of such situations.<br /><br />
Updating, Correcting or Deleting Your Personal Information<br /><br />
If you have an online account with us, you may change any of your personal information in your account at any time. We encourage you to promptly update your information if it changes. You may at any time ask to have the information on your account deleted or removed, or withdraw consent to receive commercial electronic messages from us. You may also contact us at the email or address listed below and request that we update, correct or delete any personal information we have collected, and we will endeavor to respond to your inquiry or to correct, update or remove the personal information you have provided us as you indicate. However, please note that in some cases, we may believe it is necessary or appropriate to retain certain personal information we have collected, and the deletion of such personal information will be in our discretion unless otherwise required by law. If you withdraw consent to receive any commercial electronic messages from us, we will promptly stop sending those messages to you. If you withdraw consent to any other use of your personal information, we will advise you of the implications (if any) of such withdrawal.<br /><br />
As an additional security measure we may "back up" the data stored on our systems. Data archived for back-up purposes at a given point in time may include information that you corrected or deleted after the back-up was made.<br /><br />
Online Information Security<br /><br />
We have endeavored to put into place and maintain reasonable industry-recognized security measures in an effort to protect the security of your personal information. For example, if you have an online account, it is only accessible through the use of a password. To protect the confidentiality of your information, to the extent you obtain a password for access to the Sites or for use in connection with the Services, you must keep your password confidential and not disclose it to any other person. You are responsible for all uses of the Sites and Services by any person using your password. Please advise us immediately if you believe your password has been misused or misappropriated. We also require our partners and Service Providers to adopt and follow stringent consumer privacy policies and communications policies that are consistent with “no call”, “anti-spam” and other applicable legislation. You may choose to link to other third party sites from our Sites or mobile applications in which case you should be aware that we are not responsible for the third parties’ privacy practices or collection, use and disclosure of personal information. You should read the privacy polices of all third party sites before submitting any personal information to those sites.<br /><br />
Changes in Ownership<br /><br />
Nationalcorpmay decide to sell, buy, merge, or reorganize businesses to further strategic or business interests. Where a transaction of this kind involves disclosing personal information to prospective or actual purchasers, our practice is to seek appropriate protections consistent with our Policy.<br /><br />
Contacting Us <br /><br />
If you have any questions about this Policy or the practices of our Sites or the Services that this Policy may be applicable to, please contact us by sending a letter to:<br /><br />
NationalcorpMedia Inc.<br />
100 King St. West, #5700<br />
Toronto, Ontario	<br />
M5X 1C7<br /><br />
You may also contact us by sending an e-mail to <a class="black" href="mailto:info@nationalmedia.ca">info@nationalmedia.ca</a>

<br />


		   </div>
		   </td>
          </tr>
          <tr><td height="100"></td></tr>
       </table>
</td>
</tr>
</table>
<div class="footer-container" >

<table  border="0" bordercolor="#FFFFFF"  bgcolor="#000000" width="1180" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">
  <tr>
	<td align="left" height="24" ><img  src="img/footernovi.png"  width="100%" border="0" usemap="#Map"  style="border:0;" /></td>
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
