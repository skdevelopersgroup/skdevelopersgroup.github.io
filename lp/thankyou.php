<?php
if(isset($_POST['Submit']))
{
 $name          = $_POST['name'];
 $email         = $_POST['email'];
 $mobile        = $_POST['mobile'];
 $message       = $_POST['message'];

$mail="azaam.ali@adglobal360.com";

$Msg = '<table width="865" border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td></td>
  </tr>
 
  <tr>
    <td>Contact  mail From Adglobal360</td>
  </tr>
 
   <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Name: '.$name.'</td>
  </tr>   
   <tr>
    <td>Email: '.$email.'</td>
  </tr>
  <tr>
    <td>Mobile: '.$mobile.'</td>
  </tr>
   <tr>
    <td>Message: '.$message.'</td>
  </tr>
      <tr>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>Yours sincerely,<br />Adglobal360 <br />http://www.adglobal360.com</td>
  </tr>
</table>';


//echo $mailformat;

//$mailheaders = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers    = "Content-Type: text/html; charset=iso-8859-1\r\n";

$Subjectnew    = "Contact Mail From Adglobal360";

if(mail($mail,$Subjectnew,$Msg,$headers))
{
$Flug = "success";
}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SK Developers | Tejas</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/screen.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.fancybox-buttons.css" rel="stylesheet" type="text/css" />
<meta name="keywords" content="" />
<script  src="js/client_agltracking_common.js" type="text/javascript"></script>
<script  src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.fancybox.js" type="text/javascript"></script>
<script src="js/jquery.fancybox-buttons.js" type="text/javascript"></script>
<script src="js/functions.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">

function  contnew_validate()
{
if(document.contactnew.name.value == "")
{	alert("Please enter the name:");	document.contactnew.name.focus();	return false;}
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (!filter.test(document.contactnew.email.value)) 
{	alert("Invalid email:");		document.contactnew.email.focus();		return false;	}
if(document.contactnew.mobile.value == "")
{	alert("Please enter the mobile number:");	document.contactnew.mobile.focus();	return false;}
return true;
}

</script>
<script type="text/javascript">

jQuery(document).ready(function(){
	$('#contactform').submit(function(){				  
		var action = $(this).attr('action');
		$.post(action, 
		{
			name: $('#name').val(),email: $('#email').val(),company: $('#company').val(),subject: $('#subject').val(),message: $('#message').val()
		},
		function(data)
		{
			$('#contactform #submit').attr('disabled','');
			$('.response').remove();
			$('#contactform').before('<p class="response">'+data+'</p>');
			$('.response').slideDown();
			if(data=='Message sent!') $('#contactform').slideUp();
		}
		); 
		return false;
	});
});
</script>

</head>

<body onload="call();">

<div class="banner_sec">
<div class="wrapper"></div>
  <div class="slider_sub_sec">
    <ul>
      <li><img src="images/banner_home1.jpg" /></li>
    </ul>
  </div>
  <div class="arrow_center">
    <div class="form_bg">
    <div class="phone1">
    <div class="app">
    <img src="images/app-logo.png" />
    </div>
    <div class="mob">
    <img src="images/phone-icon.png"/><span>&nbsp; 7550005833 </span>
    </div>
    </div>
      <h2><span class="starting">Thankyou For Your Interest</span><br /> <strong>We will get back to you soon</strong> </h2>
      
      
    </div>
  </div>
</div>
<div class="wrapper">
  <div class="body_container_sec">
    <div class="conatiner_left_sec">
      <div class="container_sec">
        <h2>About Tejas Lakeviw Homes</h2>
        <p class="pr20">TEJAS, aesthetically designed luxury apartments, located at Siruseri, off Navalur, OMR, Chennai. Placed in the most progressive and choicest location of home buyers, it offers the most convenient and secured living and a great appreciation value, as well, With a host of ultra modern amenities provided, it not only suits the contemporary lifestyle, but will also be in sync with the times to come. It has the edge of close proximity to major IT & BPO companies, Hospitals, Colleges and Malls. Rediscover yourself in the home of your dreams.

</p>
      </div>
      <div style="clear:both;"></div>
      <div class="divider">   
      </div>
       <div style="clear:both;"></div>
      <div class="advantages_sec_hom">
      
        <ul>
          <li class="first">
            <h3>Features &amp; Amenities</h3>
            <span class="img"><img src="images/location_advantages_icon.png"  alt="" /></span>
            <div class="description">
              <p>World class amenities for aspirational lifestyle for you and your family.</p>
            </div>
            <a href="images/features.jpg" class="fancybox" title=""><img src="images/exp.jpg"  /></a> </li>
          <li>
            <h3>Floor Plans</h3>
            <span class="img"><img src="images/project_detail_icon.png"  alt="" /></span>
            <div class="description">
              <p>A well illustrated floor plan, to visualize the interior layout of the apartment.</p>
            </div>
            
            <a class="fancybox-buttons" data-fancybox-group="button" href="images/block-1bhk-floor-plan.jpg"></a>
            <a class="fancybox-buttons" data-fancybox-group="button" href="images/block-a-3bhk-floor-plan.jpg"></a>
            <a class="fancybox-buttons" data-fancybox-group="button" href="images/block-b-2bhk-floor-plan.jpg"></a>
            <a class="fancybox-buttons" data-fancybox-group="button" href="images/block-c-2bhk-floor-plan.jpg"></a>
            <a class="fancybox-buttons" data-fancybox-group="button" href="images/overall-view.jpg"><img src="images/exp.jpg"  /></a>
             
             
           </li>
          <li class="last">
            <h3>Specifications</h3>
            <span class="img"><img src="images/project_plan_icon.png" alt="" /></span>
            <div class="description">
              <p>A quick look through all the minute details of your next home.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            </div>
            
            <a href="images/specifications.jpg" class="fancybox" title=""><img src="images/exp.jpg"  /></a> </li>
        </ul>
      </div>
    </div>
    <div class="conatiner_right_sec">
      <div class="download_sec"><br />

         <a class="fancybox-buttons" data-fancybox-group="button1" href="images/location-map-big.jpg"><img src="images/location-map.jpg" /></a>
      <h2>
      <img src="images/3d.png"  /> </h2> 
     <iframe width="100%" height="260" src="https://www.youtube.com/embed/bFvC1t-T2Xc?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<div class="footer_sec">
  <div class="wrapper">
    <div class="privacy_policy">
      <p class="l">Copyright © 2016, SKDevelopersGroup. All Rights Reserved. | <strong><a href="#inline12" class="fancybox" title="">Privacy policy</strong> </a></p>
      <p class="r">Marketed by <strong><a href="http://www.adglobal360.com/" target="_blank" style="color:#ffed2a;">AdGlobal360</a></p>

      
      
    </div>
  </div>
</div>
<div id="inline2" class="" style="display:none;">
  <div class="popup">
<h3>Features & Amenities</h3>
  <h5 class="red f17">CLUB HOUSE</h5>
    <ul class="dot">
<li>Swimming pool</li>
<li>Air-conditioned fitness centre</li>
<li>Indoor games</li>
<li>Party hall</li>
<li>Mini theatre</li>
</ul>
<br />
    <ul class="dot">
<li>Children's play area</li>
<li>Reticulated gas</li>
<li>Water treatment plant</li>
<li>Lifts with ARD & V-3F</li>
<li> Fire alarm & wet riser system</li>
<li>Security cabins</li>
<li>Rain water harvesting</li>
<li>Sewage treatment plant</li>
<li>1000 watts power back-up for each unit</li>
<li>100% back-up power for common areas, lifts and pumps</li>
<li> Toilet for drivers / domestic helps in all blocks</li>
<li>Landscaped garden with water bodies</li>
<li> Video security phone & intercom</li>
<li>Access controlled doors with CCTV cameras at
vantage points</li>
<li> Water meter</li>
<li> Locker room</li>
    </ul>
  </div>
</div>
<div id="inline3" class="" style="display:none;">
  <div class="popup">
  <img src="images/floorplan.jpg" width="790" height="493" alt="" />
<h3>CLUB HOUSE</h3>
    <ul class="dot">
<li>Swimming pool</li>
<li>Air-conditioned fitness centre</li>
<li>Indoor games</li>
<li>Party hall</li>
<li>Mini theatre</li>
</ul>
<br />
    <ul class="dot">
<li>Children's play area</li>
<li>Reticulated gas</li>
<li>Water treatment plant</li>
<li>Lifts with ARD & V-3F</li>
<li> Fire alarm & wet riser system</li>
<li>Security cabins</li>
<li>Rain water harvesting</li>
<li>Sewage treatment plant</li>
<li>1000 watts power back-up for each unit</li>
<li>100% back-up power for common areas, lifts and pumps</li>
<li> Toilet for drivers / domestic helps in all blocks</li>
<li>Landscaped garden with water bodies</li>
<li> Video security phone & intercom</li>
<li>Access controlled doors with CCTV cameras at
vantage points</li>
<li> Water meter</li>
<li> Locker room</li>
    </ul>
  </div>
</div>
<div id="inline4" style="display:none;">
  <div class="popup">
    <h3>Specifications</h3>
    <h5 class="red f17">FLOORING</h5>
    <ul class="dot">
      <li><strong>Living + Dining + Bedrooms + Kitchen :</strong> PVitrified tiles</li>
      <li><strong>Balcony + Bathroom :</strong> Anti-skid tiles</li>
      <li><strong>Bathroom Wall Tiles:</strong> Up to false-ceiling height</li>
      <li><strong>Main Entrance Lobbies & Upper Lobbies:</strong> Vitrified / Granite / Natural Stone</li>
    
    </ul>
    <h5 class="red f17">WALL FINISH</h5>
    <ul class="dot">
     <li><strong>Exterior :</strong>  Weather-proof emulsion</li>
<li><strong>Interior :</strong>  Quality emulsion</li>
    </ul>
    <h5 class="red f17">BATHROOM</h5>
    <ul class="dot">
      <li><strong>Shower Partition:</strong>master bed bathroom</li>
    
    </ul>
    <h5 class="red f17">SANITARY WARE</h5>
    <ul class="dot">
      <li>Hindware or equivalent</li>
     
    </ul>
    <h5 class="red f17">KITCHEN</h5>
    <ul class="dot">
      <li>Granite Platform with double S.S. Sink</li>
    </ul>
    <h5 class="red f17">WINDOWS</h5>
    <ul class="dot">
      <li>UPVC windows</li>
    </ul>
    <h5 class="red f17">DOORS</h5>

    <ul class="dot">
      <li>Hardcore flush door</li>
    </ul>
    <h5 class="red f17">MAIN DOOR</h5>
    <ul class="dot">
      <li>Hardcore flush door with teak wood frame</li>
    </ul>
     <h5 class="red f17">LOCKS</h5>
    <ul class="dot">
      <li>Godrej or equivalent pin locks in main door</li>
    </ul>
     <h5 class="red f17">ELECTRICAL</h5>
    <ul class="dot">
      <li>3 phase electricity with individual meters
Branded switches</li>
    </ul>
     <h5 class="red f17">Bedrooms</h5>
    <ul class="dot">
      <li>2-way switches for light and fan in all bedrooms
Siemens or equivalent ELCB tripper</li>
    </ul>
  </div>
</div>
<div id="inline5" style="display:none;">
  <div class="popup">
    <h3>Payment Plan</h3>
<br />

    <h4>PLP:- 30:35:35</h4>
    <ul class="dot">
      <li>[Pay 30% Now, Rest Near Possession]</li>
      <li>Rs. 5999/SQ. FT.</li>
    </ul>
    <p>&nbsp;</p>
   
    <h4>SUBVENTION:- 10:90</h4>
    <ul class="dot">
      <li>[Pay 8 Lacs Now Nothing Till Possession]</li>
      <li>Rs. 6199/SQ. FT.</li>
    </ul>
    
    
    <h4>&nbsp;</h4>
    <ul class="dot">
      <li>2BHK (1200 SQ. FT.)</li>
      <li>2 BHK + ST (1450 SQ. FT.)</li>
    </ul>
    
    
  </div>
</div>

<div id="inline7" style="display:none;">
  <div class="popup">
 <img src="images/green-parc-2-location-big.jpg" alt="" />
  </div></div>
  
  <div id="inline12" style="display:none;">
  <div class="popup">
  <p ><strong>Privacy Policy :</strong> Your personal information(Name, E-mail, Phone, Query) submitted will not be sold, shared or rented to others. We use this information to send updates about our company and projects and contact you if requested or find it necessary. You may opt out of receiving our communication by calling us on any of our above mentioned contact numbers or by clicking on the unsubscribed link mention in mail.</p> 
  
  </div></div>
  

<!--<script src="js/jquery-1.11.1.min.js"></script> --> 

<script type="text/javascript" src="js/functions.js"></script> 
<script type="text/javascript" src="js/jquery.placeholder.js"></script> 
<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-buttons.css" media="screen" />
<script type="text/javascript" src="js/jquery.fancybox-buttons.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-buttons.css" media="screen" />
<script type="text/javascript" src="js/jquery.bxslider.js"></script> 

<!-- Google Code for Thank You Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 941694827;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "4ZrMCJzV3F8Q676EwQM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/941694827/?label=4ZrMCJzV3F8Q676EwQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


</body>
</html>
