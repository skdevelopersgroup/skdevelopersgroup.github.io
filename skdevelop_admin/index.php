<?php
ob_start();

session_unregister('uname');
session_unregister('uid');
//session_unregister('branchname');
include ("../config.php");
$submit=$_REQUEST['submit'];
//$usrchk="0";

?>
<?
$st=0;
	if ($submit=="Login")
		{
			$name=$_REQUEST['uname'];
			$pass=$_REQUEST['pass'];
			$query="select * from userdetails where email='$name' and password='$pass'";//Binary exact Uname and pass.
			$row=mysql_query($query) or die(mysql_error());
            if($res=mysql_fetch_array($row))
			{
				$usrchk=$res['usercheck'];
				$username=$res['name'];
			}
			$no=mysql_num_rows($row);
			if ($no>0)
			 {
				 session_start();
			$_SESSION['uname']=$name;
			$_SESSION['uid']=$name;
			$_SESSION['username']=$username;
			$_SESSION['usercheck']=$usrchk;	
			if($usrchk=="admin")
			{
				?>
					<script language="javascript">window.location='user-management.php';</script>	
                    <?
					}
					elseif($usrchk=="subadmin")
					{
				?>
					<script language="javascript">window.location='view-messages.php';</script>	
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
<title>Admin</title>
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
              <td height="45" align="center" valign="top"><img src="../images/login-icon.jpg" width="135" height="43" /></td>
            </tr>
              <?
			  if($st=="1")
			  {
			  ?>
             <tr>
              <td>
              <?=$_SESSION['msg'];?>              </td>
            </tr>
              <?
			}
			?>
              <tr>
                <td class="running_text"><strong>Email ID</strong></td>
              </tr>
              <tr>
              <td><label></label>
                <label>
               <input name="uname" type="text" class="login_field_bx" id="uname" />
                </label></td>
            </tr>
              <tr>
                <td class="running_text"><strong>Password</strong></td>
              </tr>
              <tr>
              <td><label>
                <input name="pass" type="password" class="login_field_bx" id="pass"/>
              </label></td>
            </tr>
            <tr>
              <td align="left"><label>
                <input name="submit" type="submit" id="submit" value="Login" />
                <input type="reset" name="reset" id="reset" value="Cancel" />
              </label></td>
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