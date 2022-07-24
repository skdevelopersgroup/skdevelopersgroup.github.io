<?php
ob_start();
include ("../config.php");
session_start();
$usr = $_SESSION['uname'];
$semailid=$_SESSION['uid'];
if($_SESSION['uid']=="")
	{
	header("location:index.php");
	}
		  $useridfromquery= "select * from userdetails where email='$semailid'";
$useridfromres = mysql_query($useridfromquery) or die ('select query error in getting from userid:');
$useridfromnum = mysql_num_rows($useridfromres);
if($rowuseidfrom = mysql_fetch_array($useridfromres))
 {
 $useridm=$rowuseidfrom['uid'];
 }


	
$submit = $_POST['submit'];
$name = $_POST['name'];
$mobileno = $_POST['mobileno'];
$block = $_POST['block'];
$flat = $_POST['flat'];
$loginemail = $_POST['loginemail'];
$password = $_POST['password'];
	if ($submit=="Update")
{
if($password=="")
{
	$upd = "update userdetails set name ='$name',mobile='$mobileno',block='$block',flat='$flat' where`uid`='$useridm'"; 	 
				$update = mysql_query($upd) or die('Update Query error:');
			}
			else
			{
	$upd = "update userdetails set name ='$name',mobile='$mobileno',block='$block',flat='$flat',password='$password' where`uid`='$useridm'"; 	 			
				$update = mysql_query($upd) or die('Update Query error:');
			}
			 $msg = "<div class=success><font face=Arial, Helvetica, sans-serif color=#ffffff><b>Profile has been updated successfully</b></font></div>";

			}
			$chk = "select * from userdetails where email='$semailid'";
	$check = mysql_query($chk) or die('Check query error:');
	$row1 = mysql_fetch_array($check);
	$num = mysql_num_rows($check);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<title>User Profile</title>
<link href="../sk.css" rel="stylesheet" type="text/css" />
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
/*if(document.form1.password.value=="")
{
alert("Please enter new password");
document.form1.password.focus();
return false;
}*/
if(document.form1.password.value!="")
{
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
     
      <form id="form1" name="form1" method="post" action="" onsubmit="return validate();">
        <table width="312" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td width="302" height="40" align="center" valign="top" class="user_reg_text">My Profile</td>
          </tr>
          <tr>
            <td class="running_text"><?=$msg?></td>
          </tr>
          <tr>
            <td class="running_text"><strong>Name</strong></td>
          </tr>
          <tr>
            <td>
            <input name="name" class="login_field_bx" value="<?=$row1['name']?>" /></td>
          </tr>
          <tr>
            <td class="running_text"><strong>Mobile No</strong></td>
          </tr>
          <tr>
            <td><input name="mobileno" class="login_field_bx" value="<?=$row1['mobile']?>"   /></td>
          </tr>
          <tr>
            <td class="running_text"><strong>Block</strong></td>
          </tr>
          <tr>
            <td><input name="block" class="login_field_bx" value="<?=$row1['block']?>" /></td>
          </tr>
          <tr>
            <td class="running_text"><strong>Flat</strong></td>
          </tr>
          <tr>
            <td><input name="flat" class="login_field_bx" value="<?=$row1['flat']?>"  />            </td>
          </tr>
          <tr>
            <td class="running_text"><strong>Email ID</strong></td>
          </tr>
          <tr>
            <td><input name="emailid" class="login_field_bx" id="emailid" readonly="readonly" value="<?=$row1['email']?>" /></td>
          </tr>
          <tr>
            <td class="running_text"><strong>New Password</strong></td>
          </tr>
          <tr>
            <td><input name="password" type="password" class="login_field_bx" /></td>
          </tr>
          <tr>
            <td class="running_text"><strong>Confirm Password</strong></td>
          </tr>
          <tr>
            <td><input name="confirmpassword" type="password" class="login_field_bx" />            </td>
          </tr>
          <tr>
            <td><label>
              <input type="submit" name="submit" id="submit" value="Update" />
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
    
    </td>
  </tr>
</table>
<?
include("../footer.php");
?>
</div>
</body>
</html>
