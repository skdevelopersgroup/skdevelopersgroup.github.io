<?php
ob_start();
include ("../config.php");
session_start();
$usr = $_SESSION['username'];
$semailid=$_SESSION['uid'];
$usercheck=$_SESSION['usercheck'];
if($_SESSION['uid']=="")
	{
	header("location:index.php");
	}
	$submit = $_POST['submit'];
$oldpassword=$_REQUEST['oldpassword'];
$newpassword=$_REQUEST['newpassword'];
$confirmpassword=$_REQUEST['confirmpassword'];
$st=0;
if ($submit=="Change")
{
	$chk = "select password from userdetails where password='$oldpassword' and email='$semailid'";
	$check = mysql_query($chk) or die('Check query error:');
	$num = mysql_num_rows($check);
//	echo $num; 
	if ($num==0)
		{
		$st=1;
			 $msg = "<div class=error><font face=Arial, Helvetica, sans-serif color=#ffffff><b>Old Password entered is wrong</b></font></div>";
					}
	else
		{
	$ins = "update userdetails set password='$newpassword' where email='$semailid'";
	 $sqlins= mysql_query($ins) or die('Update Query error:');	
	 $st=1;
	 $msg = "<div class=success><font face=Arial, Helvetica, sans-serif color=#ffffff><b>Password has been changed Successfully</b></font></div>";
 		}
			
		}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="..//images/favicon.ico" />
<title>User Profile</title>
<link href="../sk.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function val()
{
if(document.form1.oldpassword.value=="")
{
alert("Please enter Old Password");
document.form1.oldpassword.focus();
return false;
}
if(document.form1.newpassword.value=="")
{
alert("Please enter New Password");
document.form1.newpassword.focus();
return false;
}
if(document.form1.confirmpassword.value=="")
{
alert("Please enter Confirm Password");
document.form1.confirmpassword.focus();
return false;
}
if(document.form1.newpassword.value!=document.form1.confirmpassword.value)
{
alert("Password does not match");
document.form1.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>

<body>
<div class="fl_bg">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
   <?
include("header.php");
?>
    <div class="ban_content_hold_bx">
    <div class="banner_bx">
     
      <form id="form1" name="form1" method="post" action=""  onsubmit="return val();">
        <table width="312" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td width="302" height="40" align="center" valign="top" class="user_reg_text">My Profile</td>
          </tr>
          <tr>
            <td class="running_text"><?=$msg?></td>
          </tr>
          <tr>
            <td class="running_text"><strong>Old password</strong></td>
          </tr>
          <tr>
            <td>
            <input name="oldpassword" type="password" class="login_field_bx" id="oldpassword" /></td>
          </tr>
          <tr>
            <td class="running_text"><strong>New password</strong></td>
          </tr>
          <tr>
            <td><input name="newpassword" type="password" class="login_field_bx" id="newpassword"   /></td>
          </tr>
          <tr>
            <td class="running_text"><strong>Confirm password</strong></td>
          </tr>
          <tr>
            <td><input name="confirmpassword" type="password" class="login_field_bx" id="confirmpassword" /></td>
          </tr>
          <tr>
            <td><label>
              <input type="submit" name="submit" id="submit" value="Change" />
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
    
    </td>
  </tr>
</table>
<?
include("../footer.php");
?>
</div>
</body>
</html>
