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
<td valign="middle" align="center">
<table   border="0" width="900" align="center" cellpadding="0" cellspacing="0"  style=" border-collapse:collapse; ">

          <tr>
           <td align="center" style=" no-repeat; font-size:18px; ">
           TERMS OF USE<br /><br />
		   <div align="justify">
		   
This Agreement sets forth the terms and conditions between you and Nationalcorp Media Inc. (“Nationalcorp Media,” “Nationalcorp,” “us,” “our,” or “we”), its subsidiaries and/or affiliates and sets forth the legally binding terms for your use of NationalMedia.ca and any other websites owned by Nationalcorp Media Inc. and successor websites(collectively and individually, the “Sites”) and other interactive properties including but not limited to our mobile websites and applications (the sites and interactive properties collectively referred to herein as the “NCM Applications”).  By accessing and using the Sites or the NCM Applications, you agree to be bound by the terms and conditions of this Agreement and the privacy policy of Nationalcorp Media Inc.
<br /><br />
Accepting the Terms
<br /><br />
By using the Sites, the NCM Application or the information, tools, features and functionality located on the Sites, you are bound by this Agreement whether you are simply visiting or browsing the Sites or whether you have subscribed to our services. <br /><br />
You may not use our services and may not accept this Agreement if you are not of a legal age to form a binding contract with Nationalcorp.  If you accept this Agreement, you represent that you have the capacity to be bound by it, or if you are acting on behalf of a company or entity, that you have authority to bind such entity.  
Nationalcorp reserves the right to update or change these terms at any time, which will be in effect on the date shown on the updated Terms of Use.  If at any time you do not agree with the updated Terms, you are obliged to discontinue using the Sites and/or the NCM Application.  
The content on the Sites and the NCM Applications are intended for personal, non-commercial use.  All materials published on the Sites and/or the NCM Applications are protected by copyright and owned by Nationalcorp Media.  All visitors or users must abide by copyright notices. <br /><br /> 
YOU MAY NOT MODIFY, PUBLISH, TRANSMIT, PARTICIPATE IN THE TRANSFER OR SALE OF, OR REPRODUCE, CREATE NEW WORKS FROM, DISTRIBUTE, PERFORM, DISPLAY, OR IN ANY WAY EXPLOIT THE CONTENT DISPLAYED ON THE SITES OR THE NCM APPLICATION.<br /><br />
Downloading or copying of content is acceptable as long as the visitor or user complies with copyright notices.  You may seek prior written permission to reprint materials by contacting us at <a class="red" href="mailto:info@nationalmedia.ca">info@nationalmedia.ca</a> <br /><br />
Submissions<br /><br />
You are able to post content to the Sites (the “Submissions”).  You hereby transfer, assign, and convey to Nationalcorp all rights, title and interest to such Submissions.  You acknowledge and agree that Submissions are non-confidential and non-proprietary to you. We take no responsibility and assume no liability for any Submissions posted or submitted by you. We have no obligation to use your Submissions; we reserve the right in our absolute discretion to determine which Submissions are used by Nationalcorp and what is published on the Sites. If you do not agree to these terms and conditions, please do not provide us with any Submissions. <br /><br />
You are fully and solely responsible for all the content of your Submissions. You will not use the Service to post or transmit: (a) any unlawful, threatening, libelous, defamatory, obscene, pornographic, or other material or content that would violate rights of publicity and/or privacy or that would violate any law; (b) any commercial material or content (including, but not limited to, solicitation of funds, advertising, or marketing of any good or service); and (c) any material or content that infringes, misappropriates or violates any copyright, trademark, patent right or other proprietary right of any third party. You shall be fully and solely liable to any third party and to us for any damages resulting from any violation of the foregoing restrictions, or any other harm resulting from your posting of content to the Sites.  <br /><br />
To the extent that you participate or view any other postings or chats, you agree that such communications are not endorsed or approved by Nationalcorp, and reflect the views only of the authors who posted the content in the public forum.  The views expressed in the public forum do not reflect the views of Nationalcorp, and we specifically disclaim any liability with respect to the content and any actions resulting from your communications in same.<br /><br />
Prohibited Activities <br /><br />
The content and information in the Sites and NCM Application, as well as the infrastructure used to provide such content and information, is proprietary to us or our suppliers and providers. You agree not to modify, copy, distribute, transmit, display, reverse engineer, perform, reproduce, publish, license, create derivative works from, transfer, or sell or re-sell any information, software, products, or services obtained from or through the Sites and NCM Application. Additionally, you agree not to: (a) use the Sites and NCM Application or its contents for any commercial purpose; (b) make any speculative, false, or fraudulent notification; (c) access, monitor or copy any content or information of the Sites and NCM Application using any robot, spider, scraper or other automated means or any manual process for any purpose without our express written permission; (d) violate the restrictions on the Sites and NCM Application or bypass or circumvent other measures employed to prevent or limit access and or to the Sites and NCM Application; (e) take any action that imposes, or may impose, in our discretion, an unreasonable or disproportionately large load on our infrastructure; (f) deep-link to any portion of the Sites and NCM Application (including, without limitation, the purchase path for any gaming services) for any purpose without our express written permission; or (g) "frame", "mirror" or otherwise incorporate any part of the Sites and NCM Application into any other web Sites without our prior written authorization.
Disclaimer of Representations and Warranties<br /><br />
THE CONTENT AND ALL SERVICES AND PRODUCTS ASSOCIATED WITH THE SERVICE OR PROVIDED THROUGH THE SERVICE ARE PROVIDED TO YOU ON AN “AS IS” AND “AS AVAILABLE” BASIS. NATIONALCORP MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, AS TO THE CONTENT OR OPERATION OF THE SITES OR OF THE SERVICE. YOU EXPRESSLY AGREE THAT YOUR USE OF THE SERVICE IS AT YOUR SOLE RISK.<br /><br />
NATIONALCORPMAKES NO REPRESENTATIONS, WARRANTIES OR GUARANTEES, EXPRESS OR IMPLIED, REGARDING THE ACCURACY, RELIABILITY OR COMPLETENESS OF THE CONTENT ON THE SITES OR OF THE SERVICE, OR OF THE CONTENT OF ANY THIRD PARTY WEB SITES OR INFORMATION, AND EXPRESSLY DISCLAIMS ANY WARRANTIES OF NON-INFRINGEMENT OR FITNESS FOR A PARTICULAR PURPOSE. NATIONALCORPMAKES NO REPRESENTATION, WARRANTY OR GUARANTEE THAT THE CONTENT OR SERVICES THAT MAY BE AVAILABLE THROUGH THE SERVICE ARE FREE OF INFECTION FROM ANY VIRUSES OR OTHER CODE OR COMPUTER PROGRAMMING ROUTINES THAT CONTAIN CONTAMINATING OR DESTRUCTIVE PROPERTIES OR THAT ARE INTENDED TO DAMAGE, SURREPTITIOUSLY INTERCEPT OR EXPROPRIATE ANY SYSTEM, DATA OR PERSONAL INFORMATION.<br /><br />
Limitations on Nationalcorp’s Liability<br /><br />
IN NO EVENT SHALL NATIONALCORPBE RESPONSIBLE OR LIABLE TO YOU OR TO ANY THIRD PARTY, WHETHER IN CONTRACT, WARRANTY, TORT (INCLUDING NEGLIGENCE) OR OTHERWISE, FOR ANY INDIRECT, SPECIAL, INCIDENTAL, CONSEQUENTIAL, EXEMPLARY, LIQUIDATED OR PUNITIVE DAMAGES, OR DAMAGES OF ECONOMIC LOSS, LOSS OF PROFIT, REVENUE OR BUSINESS, ARISING IN WHOLE OR IN PART FROM YOUR ACCESS TO NATIONALCORP, YOUR USE OF THE SERVICE OR THIS AGREEMENT, EVEN IF NATIONALCORPHAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. NOTWITHSTANDING ANYTHING TO THE CONTRARY IN THIS AGREEMENT, NATIONALCORP’S LIABILITY TO YOU FOR ANY CAUSE WHATEVER AND REGARDLESS OF THE FORM OF THE ACTION, WILL AT ALL TIMES BE LIMITED TO THE PRICE PAID BY YOU TO NATIONALCORPFOR THE SERVICE.<br /><br />
You agree that the limits on Nationalcorp’s liability are a reasonable allocation of risk between you and Nationalcorpand that they are a fundamental term of this Agreement and an essential basis on which the parties entered into this Agreement. <br /><br />
While Nationalcorptakes steps to ensure the accuracy and completeness of product and third-party services information provided, please refer to the originator of the information, product or services (e.g., the third party service provider or manufacturer) for complete product details.<br /><br />
IN NO EVENT IS OR WILL NATIONALCORPBE RESPONSIBLE OR LIABLE FOR ANY SERVICE, MATERIAL OR PRODUCTS PROVIDED BY ANY THIRD PARTY THAT ARE AVAILABLE OR OFFERED THROUGH THE SERVICE OR ON THE SITES.  NATIONALCORPMAKES NO REPRESENTATIONS, CONDITIONS OR WARRANTIES IN RESPECT OF ANY THIRD PARTY SERVICE, MATERIAL OR PRODUCTS AND USER SHOULD CONTACT THE SUPPLIER OR MANUFACTURER OF ANY SERVICE, MATERIAL OR PRODUCT PROVIDED BY A THIRD PARTY FOR ANY WARRANTY OR OTHER CLAIM.<br /><br />
Your Indemnification of Nationalcorp<br /><br />
YOU SHALL DEFEND, INDEMNIFY AND HOLD HARMLESS NATIONALCORPAND ITS AFFILIATES, AND THEIR OFFICERS, DIRECTORS, SHAREHOLDERS, LICENSORS, PARTNERS, AGENTS, AND EMPLOYEES, FROM AND AGAINST ALL CLAIMS AND EXPENSES, INCLUDING BUT NOT LIMITED TO ATTORNEYS’ FEES, IN WHOLE OR IN PART ARISING OUT OF OR ATTRIBUTABLE TO ANY USE OR NON-USE OF THE SERVICE OR ANY FAILURE TO COMPLY WITH ANY TERM OR CONDITION OF THIS AGREEMENT BY YOU.<br /><br />
Governing Law and Forum for Disputes<br /><br />
This Agreement, and your relationship with Nationalcorpunder this Agreement, shall be governed by the laws of the Province of Ontario and the federal laws of Canada applicable therein, without regard to its conflict or choice of laws provisions. Any dispute, claim, suit or proceeding with Nationalcorp, or its officers, directors, employees, agents or affiliates, arising under or in relation to this Agreement shall be brought in the courts of the Province of Ontario, in Toronto, Ontario, except with respect to imminent harm requiring temporary or preliminary injunctive relief in which case Nationalcorpmay seek such relief in any court with jurisdiction over the parties. <br /><br />
You also acknowledge, agree and understand that, with respect to any dispute with Nationalcorp, its affiliates, and their respective officers, directors, employees or agents, arising out of or relating to your use of the Service or this Agreement:<br /><br />
•	YOU HEREBY GIVE UP YOUR RIGHT TO HAVE A TRIAL BY JURY; and
•	YOU HEREBY GIVE UP YOUR RIGHT TO SERVE AS A REPRESENTATIVE, AS A PRIVATE ATTORNEY GENERAL, OR IN ANY OTHER REPRESENTATIVE CAPACITY, OR TO PARTICIPATE AS A MEMBER OF A CLASS OF CLAIMANTS, IN ANY LAWSUIT INCLUDING BUT NOT LIMITED TO CLASS ACTION LAWSUITS INVOLVING ANY SUCH DISPUTE.<br /><br />
Unauthorized Use<br /><br />
You are responsible for promptly updating your Billing Information in the event of any known or suspected unauthorized use of your Billing Information, including loss, theft, or unauthorized disclosure of your Billing Information.<br /><br />
Payment Method<br /><br />
The terms of your payment will be determined by agreements between you and the financial institution, credit/debit card issuer or other provider of your chosen Payment Card (the "Payment Card Provider"). If Nationalcorpdoes not receive payment from your Payment Card Provider, Nationalcorpreserves the right to bill you and you agree to pay all amounts due on your account upon demand.
<br /><br />
Change in Fees<br /><br />
If the amount to be charged to your Payment Card varies from the current rate set forth in your initial offer due to an increase in our current rates (other than due to the imposition or change in the amount of state sales taxes), Nationalcorpwill provide notice of the amount to be charged and the date of the charge at least 30 days before the scheduled date of the transaction.
<br /><br />
General <br /><br />
If any portion of this Agreement is deemed unlawful, void or unenforceable by any arbitrator or court of competent jurisdiction, this Agreement as a whole shall not be deemed unlawful, void or unenforceable, but only that portion of this Agreement that is unlawful, void or unenforceable shall be stricken from this Agreement.<br /><br />
If Nationalcorpdoes not exercise or enforce any legal right or remedy which is contained in the Agreement (or which Nationalcorphas the benefit of under any applicable law), this is not a formal waiver of Nationalcorp’s rights and that those rights or remedies will still be available to Nationalcorp.<br /><br />
All covenants, agreements, indemnities, representations and warranties made in this Agreement shall survive your acceptance of this Agreement and the termination of this Agreement. All limits of liability, governing laws, disclaimers of warranties, indemnities, submissions, warranties by you and general clauses survive the expiration or termination of this Agreement. 
<br /><br />
This Agreement and the Privacy Policy represent the entire understanding and agreement between you and Nationalcorpregarding the subject matter of the same, and supersedes and replaces all other previous agreements.<br /><br />
Any rights not expressly granted herein are reserved by Nationalcorp.



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
