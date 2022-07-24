<?
ob_start();
session_start();
//session_unregister('branchname');
include ("../config.php");
$submit=$_REQUEST['submit'];
//$usrchk="0";
$st=0;
	
	if ($submit=="Submit")
		{
	        $resetkey=$_GET['resetkey'];
			$newpassword=$_REQUEST['newpass'];
			
				$sql1="SELECT * FROM emailforgotcode WHERE reset_code ='$resetkey'";
$result1=mysql_query($sql1);


if($result1){


$count=mysql_num_rows($result1);


if($count==1){

$rows=mysql_fetch_array($result1);
$profileuserid=$rows['userid'];

$sql2="update userdetails set password='$newpassword' where uid='$profileuserid'";
$result2=mysql_query($sql2);
}
else {
$st=1;
$msg="<div class=error><font face=Arial, Helvetica, sans-serif color=#ffffff><b>Password reset link is not valid</b><br>Kindly click the correct password reset link link which we sent to your registered mail id.</font></div>";
}
if($result2){
$st=1;
$msg="<div class=success><font face=Arial, Helvetica, sans-serif color=#ffffff><b>You have reset your password Successfully</b></font></div>";
$sql3="DELETE FROM emailforgotcode WHERE reset_code = '$resetkey'";
$result3=mysql_query($sql3);
}
					
		}
		}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<title>Reset Password</title>
<link href="../sk.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function val()
{
if(document.form1.newpass.value=="")
{
alert("Please enter New Password");
document.form1.newpass.focus();
return false;
}
if(document.form1.confirmpass.value=="")
{
alert("Please enter Confirm Password");
document.form1.confirmpass.focus();
return false;
}
if((document.form1.newpass.value)!=(document.form1.confirmpass.value))
{
alert("Password does not match");
document.form1.newpass.focus();
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
    <div class="tp_fl_bx"><a href="#"><img src="../images/logo.jpg" alt="logo" width="206" height="143" border="0" /></a></div>
    <div class="ban_content_hold_bx">
    <div class="banner_bx">
      <div class="login_rounded_bx">
        <form id="form1" name="form1" method="post" action="" onSubmit="return val();">
          <table width="312" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <td width="302" height="45" align="center" valign="top" class="user_reg_text">Reset Password</td>
            </tr>
            <?
			if($st=="1")
			{
			?>
            <tr>
              <td class="running_text"><?=$msg?></td>
            </tr>
            <?
			}
			?>
            <tr>
              <td class="running_text"><strong>New Password</strong></td>
            </tr>
            <tr>
              <td>
                <input name="newpass" type="password" class="login_field_bx" id="newpass" />                </td>
            </tr>
              <tr>
                <td class="running_text"><strong>Confirm Password</strong></td>
              </tr>
              <tr>
              <td>
                <input name="confirmpass" type="password" class="login_field_bx" id="confirmpass" />                </td>
            </tr>
            <tr>
              <td align="left"><label>
                <input name="submit" type="submit" id="submit" value="Submit" />
              </label></td>
            </tr>
            <tr>
              <td align="left">&nbsp;</td>
            </tr>
          </table>
        </form>
        </div>
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
