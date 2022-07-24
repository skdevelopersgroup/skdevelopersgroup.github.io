<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/home.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/favicon.ico" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Thank You</title>
<!-- InstanceEndEditable -->
<link href="sk.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script>

<style type="text/css">

/*** set the width and height to match your images **/

#slideshow {
	position:relative;
	height:359px;
}

#slideshow IMG {
    position:absolute;
    top:0;
    left:0;
    z-index:8;
    opacity:0.0;
}

#slideshow IMG.active {
    z-index:10;
    opacity:1.0;
}

#slideshow IMG.last-active {
    z-index:9;
}

</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body onload="initialize()" onunload="GUnload()">
<div class="fl_bg">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <div class="tp_fl_bx"><a href="index.html"><img src="images/logo.jpg" alt="logo" width="206" height="143" border="0"  title="SK Developers"/></a></div>
    <div class="nav_fl_bx">
    <div class="lt_curve_bx"></div>
    <div class="nav_inner_fl_bx"><a href="index.html" class="txt_line_sp" title="Home">Home</a>     <a href="about-us.html" class="txt_line_sp" title="About Us">About Us</a>     <a href="projects.html" class="txt_line_sp" title="Projects">Projects</a>     <a href="testimonials.html" class="txt_line_sp" title="Testimonials">Testimonials</a>     <a href="contact-us.html" class="txt_line_sp" title="Contact Us">Contact Us</a></div>
    <div class="rt_curve_bx"></div>
    
    </div>
    <!-- InstanceBeginEditable name="EditRegion1" -->
    <div class="ban_content_hold_bx">
      <div class="banner_bx"><img src="images/inner_image.jpg" width="880" height="198" />      </div>
      <div class="bt_fl_bx">
        <table width="860" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="77">&nbsp;</td>
          </tr>
          <tr>
            <td height="103" align="center" class="sub_title_text"><p class="high_light_text3">Thanks for registering with us</p>
              <p class="sub_title_text2">Your account is pending for admin approval.<br />
                We will send a confirmation email to your registered mailid once your account is activated.</p>
              <p class="sub_title_text2">&nbsp;</p>
              <p class="sub_title_text2">&nbsp;</p>
              <p class="sub_title_text2">&nbsp;</p>
              <p class="sub_title_text2">&nbsp;</p></td>
          </tr>
        </table>
      </div>
      <div class="shadow"></div>
    </div>
    <!-- InstanceEndEditable --></td>
  </tr>
</table>
<div class="ft_fl_bx">
<div class="ft_inner_fl_bx">
  <table width="900" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td rowspan="2"><p><strong>SK Developers</strong><br />
        3 - B, Rajaram Film Directors Colony,<br />
        Kodambakkam, Chennai - 600 024</p>
        <p>Tel: 044 - 24800633 / 34<br />
          Fax: 044 - 24800635</p>
        <p>Email:info@skdevelopersgroup.com</p></td>
      <td height="74" align="right" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="middle"><a href="index.html" class="hm_ft_link" title="Home">Home</a> | <a href="about-us.html" class="hm_ft_link" title="About Us">About Us</a> | <a href="projects.html" class="hm_ft_link" title="Projects">Projects</a> | <a href="testimonials.html" class="hm_ft_link" title="Testimonials">Testimonials</a> | <a href="contact-us.html" class="hm_ft_link" title="Contact Us">Contact Us</a><br />
© 2012 <strong>SK Developers</strong>. 
        All Rights Reserved<br />
Designed by <a href="http://www.dreameffectsmedia.com" target="_blank" class="hm_ft_link" title="Dream Effects Multimedia">Dream Effects Multimedia</a></td>
    </tr>
  </table>
</div>

</div>


</div>
</body>
<!-- InstanceEnd --></html>
