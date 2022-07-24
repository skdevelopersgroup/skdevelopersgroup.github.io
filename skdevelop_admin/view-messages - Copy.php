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
	
	  $useridfromquery= "select * from userdetails where email='$semailid'";
$useridfromres = mysql_query($useridfromquery) or die ('select query error in getting from userid:');
$useridfromnum = mysql_num_rows($useridfromres);
if($rowuseidfrom = mysql_fetch_array($useridfromres))
 {
 $useridm=$rowuseidfrom['uid'];
 }
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<title>View Message</title>
<link href="../sk.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../pagination/paginate.css">
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
    <?
	  $rpp = 20; // results per page
	  $page   = intval($_GET['page']);
//$tpages = ($_GET['tpages']) ? intval($_GET['tpages']) : 20; // 20 by default
$adjacents  = intval($_GET['adjacents']);

if($page<=0)  $page  = 1;
if($adjacents<=0) $adjacents = 4;

$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages . "&amp;adjacents=" . $adjacents;
			$sql = "select DISTINCT a.name, a.uid, a.block, a.flat,a.messagestatus from userdetails a, messages b where (a.uid=b.fromuid or a.uid=b.touid) and a.uid!=1  and a.uid!=2 and a.uid!=3 and a.uid!=4 and a.uid!=5 order by b.mid desc";
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
          <td class="user_reg_text">Inbox<br />
            <br /></td>
        </tr>
        <tr>
          <td><form id="form1" name="form1" method="post" action="">
            <table width="880" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
              <tr>
                <td width="352" height="20" align="center" bgcolor="#333333" class="user_reg_title_text">Message From</td>
                <td width="83" align="center" bgcolor="#333333" class="user_reg_title_text">Block</td>
                <td width="168" align="center" bgcolor="#333333" class="user_reg_title_text">Flat</td>
                <td width="105" align="center" bgcolor="#333333" class="user_reg_title_text">Reply</td>
                <td width="116" align="center" bgcolor="#333333" class="user_reg_title_text">View</td>
                </tr>
                 <? while(($count<$rpp) && ($i<$tcount))
		  {
		   mysql_data_seek($res,$i);
		   $row = mysql_fetch_array($res);
		   $userideng=$row['userid'];
		   $messagestatusd=$row['messagestatus'];
		   if($messagestatusd=="viewed")
{
$format="user_reg_running_textgrey";
}
else
{
$format="user_reg_running_textwhite";
}
 		  ?>
              <tr>
                <td align="center" class="<? echo $format; ?>"><?=$row['name']?></td>
                <td align="center" class="<? echo $format; ?>"><?=$row['block']?></td>
                <td align="center" class="<? echo $format; ?>"><?=$row['flat']?></td>
                <td align="center" class="<? echo $format; ?>"><a href="replyorviewmessages.php?uid=<?=$row['uid']?>&messageviewedstatus=viewed#reply"><img src="../images/reply_icon.png" width="20" height="20" title="Write reply" alt="Write reply" /></a></td>
                <td align="center" class="<? echo $format; ?>"><img src="../images/view-detail-icon.png" width="16" height="16" title="View message" alt="View message" /></td>
                </tr>
              <? $i++;
    $count++; } ?>
            </table>
            <table border="0" align="center" cellpadding="5" cellspacing="0" width="100%">
              <tr>
                <td width="893">&nbsp;</td>
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
