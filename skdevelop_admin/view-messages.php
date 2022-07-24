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
			$sql = "select a.name, a.uid, a.block, a.flat,a.mobile,a.messagestatus from userdetails a, messages b where a.uid=b.fromuid and a.uid!=1  and a.uid!=2 and a.uid!=3 and a.uid!=4 and a.uid!=5  group by a.name order by max(b.mid) desc";
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
                <td width="105" align="center" bgcolor="#333333" class="user_reg_title_text">Mobile no</td>
                <td width="116" align="center" bgcolor="#333333" class="user_reg_title_text">View</td>
                </tr>
                 <? while(($count<$rpp) && ($i<$tcount))
		  {
		   mysql_data_seek($res,$i);
		   $row = mysql_fetch_array($res);
		   $useridmessage=$row['uid'];
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
                <td align="center" class="<? echo $format; ?>"><?=$row['mobile']?></td>
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
                <td align="center" class="<? echo $format; ?>"><a href="replyorviewmessages.php?uid=<?=$row['uid']?>&messageviewedstatus=viewed<? if($lastmid!="") { ?>#<? echo $lastmid; ?><? } ?>"><img src="../images/view-detail-icon.png" width="16" height="16" title="View message" alt="View message" /></a></td>
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
                 <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
                   <tr>
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td height="100" align="center" bgcolor="#3399FF" class="norecordsfound"><span style="color:#FFFFFF; font-family:Arial, Helvetica, sans-serif;">There is no messages found</span></td>
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
