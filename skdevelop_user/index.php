<?php
ob_start();
			 session_start();
//session_unregister('branchname');
include ("../config.php");
$submit=$_REQUEST['submit'];
//$usrchk="0";
$usr = $_SESSION['uid'];
?>
<?
$st=0;
	if ($submit=="Login")
		{
			$name=$_REQUEST['uname'];
			$pass=$_REQUEST['pass'];
			$query="select * from userdetails where email='$name' and password='$pass' and usercheck='user'";//Binary exact Uname and pass.
			$row=mysql_query($query) or die(mysql_error());
			 if($res=mysql_fetch_array($row))
			{
				$status=$res['status'];
				$username=$res['name'];
				$pemailid=$res['email'];
			}
            $no=mysql_num_rows($row);
			if ($no>0)
			 {
			 if($status=="not approved")
			 {
			 $st=1;
				$_SESSION['msg']="<div class=error><font face=Arial, Helvetica, sans-serif color=#ffffff><b>Your account is not activated yet</b></font></div>";
			 }
			 else
			 {
	
			$_SESSION['uname']=$username;
			$_SESSION['uid']=$pemailid;
			//echo $_SESSION['uid'];
					  $useridfromquery= "select * from userdetails where email='$pemailid'";
$useridfromres = mysql_query($useridfromquery) or die ('select query error in getting from userid:');
$useridfromnum = mysql_num_rows($useridfromres);
if($rowuseidfrom = mysql_fetch_array($useridfromres))
 {
 $useridm=$rowuseidfrom['uid'];
 }
		$show= "select * from messages where ((fromuid=1 or fromuid=2 or fromuid=3 or fromuid=4 or fromuid=5) and touid='$useridm') or (fromuid='$useridm' and touid=1 or touid=2 or touid=3 or touid=4 or touid=5) order by dated desc limit 1";
$res = mysql_query($show) or die ('select query:');
$nums = mysql_num_rows($res);
 if($row = mysql_fetch_array($res))
 {
 $lastmid=$row['mid'];
 }
				?>
					<script language="javascript">window.location='viewmessages.php<? if($lastmid!="") { ?>#<? echo $lastmid; ?><? } ?>';</script>	
                    <?
				}
				}
				 else
				{	
				$st=1;
				$_SESSION['msg']="<div class=error><font face=Arial, Helvetica, sans-serif color=#ffffff><b>Invalid Username / Password</b></font></div>";
				}
					
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<title>Welcome to Our Website</title>
<link href="../sk.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function val()
{
if(document.form1.uname.value=="")
{
alert("Please enter Username");
document.form1.uname.focus();
return false;
}
if(document.form1.pass.value=="")
{
alert("Please enter Password");
document.form1.pass.focus();
return false;
}
return true;
}
</script>
</head>

<body onLoad="document.form1.uname.focus();">
<div class="fl_bg">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <div class="tp_fl_bx"><a href="#"><img src="../images/logo.jpg" alt="logo" width="206" height="143" border="0" /></a></div>
    <div class="nav_fl_bx">
    <div class="lt_curve_bx"></div>
    <div class="nav_inner_fl_bx"></div>
    <div class="rt_curve_bx"></div>
    
    </div>
    <div class="ban_content_hold_bx">
    <div class="banner_bx">
      <div class="login_rounded_bx">
        <form id="form1" name="form1" method="post" action="" onSubmit="return val();">
          <table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <td height="45" colspan="2" align="center" valign="top"><img src="../images/login-icon.jpg" width="135" height="43" /></td>
            </tr>
             <?
			  if($st=="1")
			  {
			  ?>
             <tr>
              <td colspan="2">
              <?=$_SESSION['msg'];?>              </td>
            </tr>
              <?
			}
			?>
              <tr>
                <td colspan="2" class="running_text"><strong>Email ID</strong></td>
              </tr>
            <tr>
              <td colspan="2"><label></label>
                <label>
                <input name="uname" type="text" class="login_field_bx" id="uname" />
                </label></td>
            </tr>
              <tr>
                <td colspan="2" class="running_text"><strong>Password</strong></td>
              </tr>
            <tr>
              <td colspan="2"><label>
                <input name="pass" type="password" class="login_field_bx" id="pass"/>
              </label></td>
            </tr>
            <tr>
              <td colspan="2" align="left"><label>
                <input name="submit" type="submit" id="submit" value="Login" />
                <input type="reset" name="reset" id="reset" value="Cancel" />
              </label></td>
            </tr>
            <tr>
              <td width="112" align="left"><a href="forgot-password.php" class="login_running_text">Forgot Password?</a></td>
              <td width="180" align="left"><a href="../user-registration.php" class="login_running_text">New user signup</a></td>
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
<? $_SESSION['msg']="";?>