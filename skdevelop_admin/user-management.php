<?php
ob_start();
include("../config.php");
session_start();
$usr = $_SESSION['username'];
$usercheck=$_SESSION['usercheck'];
if($_SESSION['username']=="")
	{
	header("location:index.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<title>User Management</title>
<link href="../sk.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../pagination/paginate.css">
<script type="text/javascript">
function del(id)
{
		var agree;
		agree=confirm("Do you want to delete this user?");
		if (agree)
		{
			window.location='user-management.php?stat=del&userid='+id;
		}
		else
		{
		
		}

}
</script>
<script type="text/javascript">
function approve(id)
{
		var agree;
		agree=confirm("Do you want to approve this user?");
		if (agree)
		{
	window.location='user-management.php?stat=approve&userid='+id;
		}
		else
		{
		
		}

}
</script>
<script language="javascript">
function valdchk()
{
 	var chks = document.getElementsByName('id[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (!hasChecked)
{
alert("Please select at least one detail");
chks[0].focus();
return false;
}
var agree;
		agree=confirm("Do you want to delete this users?");
		if (agree)
		{
			return true
		}
		else
		{
		return false;
		}
}
</script>
<SCRIPT LANGUAGE="JavaScript">
function checkAll(field) {
	for (i = 0; i < field.length; i++)
	field[i].checked = true;
}
function uncheckAll(field) {
	for (i = 0; i < field.length; i++)
	field[i].checked = false;
}
</script>

</head>
<?
$stat=$_REQUEST['stat'];
if($stat=="del")
	{
	$delid=$_REQUEST['userid'];
	$del = "delete from userdetails where uid='$delid'"; 
	$delt = mysql_query($del) or die('Del err:');
	$msg = "<font color=#FF0000>Deleted Sucessfully...</font>";
 ?>

		<script language="javascript">alert('User deleted Successfully');</script>
		<script language="javascript">window.location='user-management.php';</script> 
<?	

			}
if($stat=="approve")
	{
		$approveid=$_REQUEST['userid'];
	 $sql = "select * from userdetails where uid='$approveid'";
$res = mysql_query($sql) or die (mysql_error());
if($row=mysql_fetch_array($res))
{
	$emailid=$row['email'];
	$passwordprof=$row['password'];
}
	$approve = "update userdetails set status='approved' where uid='$approveid'"; 
	$approvec = mysql_query($approve) or die('Update err:');
	$email_to = $emailid;
	$email_from ="info@skdevelopersgroup.com";
    $email_subject = "Sk developers group Login Details";
     
     
    // validation expected data exists
   
     
    $email_message = "Thank you for registering with Sk developers group.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Your account has been activated \n";
    $email_message .= "Your Login details are given below \n\n";
    $email_message .= "Login / email : ".$emailid."\n";
    $email_message .= "Password : ".$passwordprof."\n\n";
    $email_message .= "You can login with above login details by using this link \n";
    $email_message .= "http://skdevelopersgroup.com/skdevelop_user/index.php \n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers)  
		//echo "send";
?>
<script language="javascript">alert('Profile Approved Successfully and an email has been sent to user');</script>
		<script language="javascript">window.location='user-management.php';</script> 
<?

			}
?>
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
    <?
	  $rpp = 20; // results per page
	  $page   = intval($_GET['page']);
//$tpages = ($_GET['tpages']) ? intval($_GET['tpages']) : 20; // 20 by default
$adjacents  = intval($_GET['adjacents']);

if($page<=0)  $page  = 1;
if($adjacents<=0) $adjacents = 4;

$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages . "&amp;adjacents=" . $adjacents;
			$sql = "select * from userdetails where usercheck='user'";
	$res = mysql_query($sql) or die('Select Query error:');
	$tcount = mysql_num_rows($res);
	$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
//echo $tpages;

$count = 0;
$i = ($page-1)*$rpp;
	if ($tcount!="0") 
		{ ?>
      <table width="880" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="user_reg_text">User Management<br />
            <br /></td>
        </tr>
        <tr>
          <td><form id="form1" name="form1" method="post" action="deleteusers.php" onsubmit="return valdchk();">
            <table width="880" border="0" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF">
              <tr>
                <td width="27" height="20" align="center" bgcolor="#333333" class="user_reg_title_text">&nbsp;</td>
                <td width="181" align="center" bgcolor="#333333" class="user_reg_title_text">Name</td>
                <td width="247" align="center" bgcolor="#333333" class="user_reg_title_text">Email</td>
                <td width="147" align="center" bgcolor="#333333" class="user_reg_title_text">Mobile</td>
                <td width="45" align="center" bgcolor="#333333" class="user_reg_title_text">Block</td>
                <td width="45" align="center" bgcolor="#333333" class="user_reg_title_text">Flat</td>
                <td width="45" align="center" bgcolor="#333333" class="user_reg_title_text">Status</td>
                <td width="45" align="center" bgcolor="#333333" class="user_reg_title_text">Compose</td>
                <td width="54" align="center" bgcolor="#333333" class="user_reg_title_text">Delete</td>
              </tr>
               <? while(($count<$rpp) && ($i<$tcount))
		  {
		   mysql_data_seek($res,$i);
		   $row = mysql_fetch_array($res);
 $useridmessage=$row['uid'];
 		  ?>
              <tr>
                <td align="center" bgcolor="#EAEAEA"><label>
                  <input name="id[]" type="checkbox" id="id[]" value="<?=$row['uid']?>"/>
                </label></td>
                <td align="center" bgcolor="#EAEAEA" class="user_reg_running_text"><?=$row['name']?></td>
                <td align="center" bgcolor="#EAEAEA" class="user_reg_running_text"><?=$row['email']?></td>
                <td align="center" bgcolor="#EAEAEA" class="user_reg_running_text"><?=$row['mobile']?></td>
                <td align="center" bgcolor="#EAEAEA" class="user_reg_running_text"><?=$row['block']?></td>
                <td align="center" bgcolor="#EAEAEA" class="user_reg_running_text"><?=$row['flat']?></td>
                <?
		  $status=$row['status'];
		  ?>
                <td align="center" bgcolor="#EAEAEA" class="user_reg_running_text">
               <? if($status=="approved") { ?><img src="../images/approval.png" width="20" height="16" title="Approved" border="0" /> <? } else { ?><a  onClick="return approve(<?=$row['uid']?>)" class="deleteimage"><img src="../images/pending.png" title="Pending" border="0" /></a> <? } ?>               </td>
                <td align="center" bgcolor="#EAEAEA" class="user_reg_running_text">
                             	<?
    	$showlink= "select * from messages where ((fromuid=1 or fromuid=2 or fromuid=3 or fromuid=4 or fromuid=5) and touid='$useridmessage') or (fromuid='$useridmessage' and touid=1 or touid=2 or touid=3 or touid=4 or touid=5) order by dated desc limit 1";
$reslink = mysql_query($showlink) or die ('select query:');
$numslink = mysql_num_rows($reslink);
?> 
 <?
	 if($rowlink = mysql_fetch_array($reslink))
 {
 $lastmid=$rowlink['mid'];
 }
	?>
                <a href="replyorviewmessages.php?uid=<?=$row['uid']?>&messageviewedstatus=viewed<? if($lastmid!="") { ?>#<? echo $lastmid; ?><? } ?>"><img src="../images/compose.png" alt="Compose" border="0" title="Compose" /></a>
                </td>
                <td align="center" bgcolor="#EAEAEA" class="user_reg_running_text"><a onClick="return del(<?=$row['uid']?>)" class="deleteimage"><img src="../images/Delete-icon.png" alt="delete icon" width="16" height="16" border="0" /></a></td>
              </tr>
                        <? $i++;
    $count++; } ?>
            </table>
            <table border="0" align="center" cellpadding="5" cellspacing="0" width="100%">
              <tr>
                <td width="893"><input name="CheckAll2" type="button" class="button" value="Select All" 
onclick="checkAll(document.form1['id[]'])" />
                    <input name="uncheckall2" type="button" class="button" value="Unselect All" 
onclick="uncheckAll(document.form1['id[]'])" />
                    <input type="submit" name="btnsubmit2" value="Delete" class="button"/></td>
                <td width="329" align="right"><?
                     include("../pagination/pagination.php");
echo paginate_two($reload, $page, $tpages, $adjacents);
?></td>
              </tr>
            </table>
  <?
				  } 
				?>
                 <?
		   if($tcount==0)
//	   echo $nums;
	   {?>
                 <table width="50%"  border="0" align="center" cellpadding="0" cellspacing="0">
                   <tr>
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td height="30" align="center" bgcolor="#3399FF" class="norecordsfound"><span style="color:#FFFFFF; font-family:Arial, Helvetica, sans-serif;">There is no users found</span></td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                   </tr>
                 </table>
                 <? }
			?>
          </form>
          </td>
        </tr>
      </table>
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
