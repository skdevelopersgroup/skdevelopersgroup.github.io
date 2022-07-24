<?php
include("config.php");
$confirm_code=md5(uniqid(rand())); 

$submit = $_POST['submit'];
$name = $_POST['name'];
$mobileno = $_POST['mobileno'];
$block = $_POST['block'];
$flat = $_POST['flat'];
$loginemail = $_POST['loginemail'];
$password = $_POST['password'];
if ($submit=="Register")
{	
$st=0;
$chk = "select email from userdetails where email='$loginemail' and usercheck='user'";
	$check = mysql_query($chk) or die('Check query error:');
	$num = mysql_num_rows($check);
	if ($num!=0)
		{
			$st=1;
		$msg = "<div class=error><font face=Arial, Helvetica, sans-serif color=#ffffff><b>Email ID already exists.</b></font></div>";
	
		}
	else
		{
	
			
	$ins = "INSERT INTO userdetails(`name`,`email`,`mobile`,`block`,`flat`,`password`,`usercheck`,`messagestatus`,`status`) 
	 VALUES('$name','$loginemail','$mobileno','$block','$flat','$password','user','viewed','not approved')";
	 $sqlins= mysql_query($ins) or die('Insert Query error in user details:');	
	 ?>
		<script language="javascript">window.location='thank-you.php';</script>
    <?
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/home.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/favicon.ico" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>User Registration Form</title>
<meta name="keywords" content="developers in chennai, sk developers, sk, promoters and developers chennai, promoters and developers, promoters, chennai Builders, chennai Flat Promoters, Builders, residential projects promoters in Chennai, developers at Kodambakkam, promoters and developers in Kodambakkam, promoters and developers in chennai " />
<meta name="description" content="S.K. Developers is promoted by A.V.Subba Rao. He is a chartered accountant by profession and having experience in the industry for more than 20 years. And he is associated with KSR Group for more than 7 years and developed residential projects in Vizag, Bangalore and Chennai." />
<script type="text/javascript">
function validate()
{
if(document.form1.name.value=="")
{
alert("Please enter name");
document.form1.name.focus();
return false;
}
if(document.form1.mobileno.value=="")
{
alert("Please enter mobile number");
document.form1.mobileno.focus();
return false;
}
if(document.form1.block.value=="")
{
alert("Please enter block");
document.form1.block.focus();
return false;
}
if(document.form1.flat.value=="")
{
alert("Please enter flat");
document.form1.flat.focus();
return false;
}
if(document.form1.loginemail.value=="")
{
alert("Please enter email address");
document.form1.loginemail.focus();
return false;
}
 var emailID=document.form1.loginemail;
      if (echeck(emailID.value)==false)
      {
		
		emailID.focus();
		return false;
	}
      function echeck(str) {

		var at="@";
		var dot=".";
		var lat=str.indexOf(at);
		var lstr=str.length;
		var ldot=str.indexOf(dot);
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID");
		   return false;
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID");
		   return false;
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID");
		    return false;
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID");
		    return false;
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID");
		    return false;
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID");
		    return false;
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID");
		    return false;
	 }
	}
if(document.form1.password.value=="")
{
alert("Please enter password");
document.form1.password.focus();
return false;
}
if(document.form1.confirmpassword.value=="")
{
alert("Please enter confirm password");
document.form1.confirmpassword.focus();
return false;
}
 if(document.form1.password.value!=document.form1.confirmpassword.value)
 {
	 alert("Password mismatch");
	 document.form1.confirmpassword.focus();
	 return false;
 }
return true;
}
</script>

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

<body onLoad="initialize()" onUnload="GUnload()">
<div class="fl_bg">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <div class="tp_fl_bx"><a href="index.html"><img src="images/logo.jpg" alt="logo" width="206" height="143" border="0"  title="SK Developers"/></a></div>
    
    <!-- InstanceBeginEditable name="EditRegion1" -->

    <div class="ban_content_hold_bx">
      <div class="registration_form_bx">
        <form id="form1" name="form1" method="post" action="" onSubmit="return validate();">
          <table width="312" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <td width="302" height="40" align="center" valign="top" class="user_reg_text">User Registration Form</td>
              </tr>
              <?
			  if($st=="1")
			  {
			  ?>
            <tr>
              <td align="center" valign="middle"><?=$msg?></td>
            </tr>
            <?
			}
			?>
            <tr>
              <td class="running_text"><strong>Name</strong></td>
            </tr>
            <tr>
              <td><input name="name" type="text" class="login_field_bx" id="name" /></td>
            </tr>
            <tr>
              <td class="running_text"><strong>Mobile No</strong></td>
            </tr>
            <tr>
              <td><input name="mobileno" type="text" class="login_field_bx" id="mobileno" /></td>
            </tr>
            <tr>
              <td class="running_text"><strong>Block</strong></td>
            </tr>
            <tr>
              <td><input name="block" type="text" class="login_field_bx" id="block" /></td>
            </tr>
            <tr>
              <td class="running_text"><strong>Flat</strong></td>
            </tr>
            <tr>
              <td><input name="flat" type="text" class="login_field_bx" id="flat" />	</td>
            </tr>
            <tr>
              <td class="running_text"><strong>Login / Email ID</strong></td>
            </tr>
            <tr>
              <td><input name="loginemail" type="text" class="login_field_bx" id="loginemail" /></td>
            </tr>
            <tr>
              <td class="running_text"><strong>Password</strong></td>
            </tr>
            <tr>
              <td><input name="password" type="password" class="login_field_bx" id="password" /></td>
            </tr>
            <tr>
              <td class="running_text"><strong>Confirm Password</strong></td>
            </tr>
            <tr>
              <td><input name="confirmpassword" type="password" class="login_field_bx" id="confirmpassword" />	</td>
            </tr>
            <tr>
              <td><label>
                <input type="submit" name="submit" id="submit" value="Register" />
                <input type="reset" name="reset" id="reset" value="Reset" />
              </label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
        </form>
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
