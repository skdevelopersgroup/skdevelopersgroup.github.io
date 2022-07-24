<?
ob_start();
session_start();
//session_unregister('branchname');
include ("../config.php");
$submit=$_REQUEST['submit'];
$confirm_code=md5(uniqid(rand())); 
//echo $confirm_code;
//$usrchk="0";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<title>Forgot Password</title>
<link href="../sk.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function val()
{
if(document.form1.emailid.value=="")
{
alert("Please enter email id");
document.form1.emailid.focus();
return false;
}
 var emailID=document.form1.emailid;
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
return true;
}
</script>
</head>
<?
$st=0;
	
	if ($submit=="Submit")
		{
			$emailid=$_REQUEST['emailid'];
			
			$query="select * from userdetails where email='$emailid' and usercheck='user'";
			$row=mysql_query($query) or die(mysql_error());
            if($res=mysql_fetch_array($row))
			{
				$profileemail=$res['email'];
				$profileuserid=$res['uid'];
				//echo $jobseekforgotuserid;
				$ins = "INSERT INTO emailforgotcode(`userid`,`reset_code`) 
	 VALUES('$profileuserid','$confirm_code')";
	 $sqlins= mysql_query($ins) or die('Insert Query error in Forgot link insertion details:');	
	 $email_to = $profileemail;
	$email_from ="info@skdevelopersgroup.com";
    $email_subject = "sk developers group Reset Password Link";
     
     
    // validation expected data exists
   
     
    $email_message = "sk developers group has sent Reset Password Link.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "You can reset the password by going to this link \n\n";
    $email_message .= "http://www.skdevelopersgroup.com/skdevelop_user/reset-password.php?resetkey=$confirm_code \n\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers)  
		//echo "send";
	?>
<script language="javascript">window.location='../forgot-link.php';</script>	
<?

}
		
		
			 else
				{	
					$st=1;
					$msg="<div class=error><font face=Arial, Helvetica, sans-serif color=#ffffff><b>Email ID does not match</b></font></div>";
				}
					
		}


?>
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
              <td width="302" height="45" align="center" valign="top" class="user_reg_text">Forgot Password</td>
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
              <td class="running_text"><strong>Enter Your Email ID</strong></td>
            </tr>
            <tr>
              <td><label></label>
                <label>
                <input name="emailid" type="text" class="login_field_bx" id="emailid" />
                </label></td>
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
