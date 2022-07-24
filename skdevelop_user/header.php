	<?
    	$showlink= "select * from messages where ((fromuid=1 or fromuid=2 or fromuid=3 or fromuid=4 or fromuid=5) and touid='$useridm') or (fromuid='$useridm' and touid=1 or touid=2 or touid=3 or touid=4 or touid=5) order by dated desc limit 1";
$reslink = mysql_query($showlink) or die ('select query:');
$numslink = mysql_num_rows($reslink);
?>
 <div class="tp_fl_bx"><a href="#"><img src="../images/logo.jpg" alt="logo" width="206" height="143" border="0" /></a></div>
    <div class="nav_fl_bx">
    <div class="lt_curve_bx"></div>
    <div class="nav_inner_fl_bx2"><span>Welcome : <? echo $usr; ?> | <a href="myprofile.php">My Profile</a> | <a href="logout.php">Logout</a></span>
    <?
	 if($rowlink = mysql_fetch_array($reslink))
 {
 $lastmid=$rowlink['mid'];
 }
	?>
      
    <a href="viewmessages.php<? if($lastmid!="") { ?>#<? echo $lastmid; ?><? } ?>" class="txt_line_sp_user">Inbox</a></div>
    <div class="rt_curve_bx"></div>
    
    </div>