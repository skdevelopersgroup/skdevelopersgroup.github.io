<?php
ob_start();
include ("../config.php");
session_start();
$usr = $_SESSION['uname'];
if($_SESSION['uid']=="")
	{
	header("location:index.php");
	}
	  $useridfromquery= "select * from userdetails where name='$usr'";
$useridfromres = mysql_query($useridfromquery) or die ('select query error in getting from userid:');
$useridfromnum = mysql_num_rows($useridfromres);
if($rowuseidfrom = mysql_fetch_array($useridfromres))
 {
 $useridm=$rowuseidfrom['uid'];
 }
 $show= "select * from messages where (fromuid=1 and touid='$useridm') or (fromuid='$useridm' and touid=1) order by dated desc limit 1";
$res = mysql_query($show) or die ('select query:');
$nums = mysql_num_rows($res);
 	$messages = $_POST['elm2'];
	$userdatetime= date('Y-m-d H:i:s');
	$submit = $_POST['submit'];
if ($submit=="Submit")
{
$ins = "INSERT INTO messages(`fromuid`,`touid`,`messages`,`image`,`dated`) 
	 VALUES('$useridm','1','$messages','','$userdatetime')";
	 $sqlins= mysql_query($ins) or die('Insert Query error:');	
//	 echo $sqlins;
	 $msg = "<font color=#FF0000>Successfully Inserted..</font>";
	 if($row = mysql_fetch_array($res))
 {
 $lastmid=$row['mid'];
 echo $lastmid;
 }
 		?>
        <script language="javascript">alert('inserted successfully');</script>
		<script language="javascript">window.location='viewmessages.php<? if($lastmid!="") { ?>#<? echo $lastmid; ?><? } ?>';</script>
	<?	
}
	$show= "select * from messages where (fromuid=1 and touid='$useridm') or (fromuid='$useridm' and touid=1) order by dated asc";
$res = mysql_query($show) or die ('select query:');
$nums = mysql_num_rows($res);
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
var text = tinyMCE.get('elm2').getContent();
//alert(text);
if(text=="")
{
alert("Please enter message")
return false;
}
return true;
}
</script>
      <!-- TinyMCE -->
<script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	// Default skin
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm1",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

	// O2k7 skin
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm2",
		theme : "advanced",
		skin : "o2k7",
		plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

	// O2k7 skin (silver)
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm3",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "silver",
		plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

	// O2k7 skin (silver)
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm4",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "black",
		plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

</head>

<body>
<div class="fl_bg">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <div class="tp_fl_bx"><a href="#"><img src="../images/logo.jpg" alt="logo" width="206" height="143" border="0" /></a></div>
    <div class="nav_fl_bx">
    <div class="lt_curve_bx"></div>
    <div class="nav_inner_fl_bx2"><span>Welcome : <? echo $usr; ?> | <a href="logout.php">Logout</a></span><a href="myprofile.php" class="txt_line_sp_user">My Profile</a><a href="viewmessages.php" class="txt_line_sp_user">View Message</a></div>
    <div class="rt_curve_bx"></div>
    
    </div>
    <div class="ban_content_hold_bx">
    <div class="registration_form_bx">
    	    <? if ($nums>0)
	  { ?>
         <? 	
 while($row = mysql_fetch_array($res))
 {
 $useridfrom=$row['fromuid'];
  $usernamefromquery= "select * from userdetails where uid='$useridfrom'";
$usernamefromres = mysql_query($usernamefromquery) or die ('select query error in getting from username:');
$usernamefromnum = mysql_num_rows($usernamefromres);
if($rowusernamefrom = mysql_fetch_array($usernamefromres))
 {
 $usernamefrom=$rowusernamefrom['name'];
 }
 if($useridfrom=="1")
 {
 ?>
 <div style="clear:both"></div>
<div style="height:10px;"><a name="<?=$row['mid']?>" id="<?=$row['mid']?>"></a>
</div>
          <div class="chating_bx1"> <img src="../images/customer_icon.jpg" /><strong>
		  
		  <? echo $usernamefrom; ?></strong> <span>
		    <?
            	$datedtime=$row['dated'];
			$userdatedtimed=date("d-M-Y H:i:s", strtotime($datedtime));
			?>
           <? echo $userdatedtimed; ?>
		  </span>
              <div class="clr"></div>
<?=$row['messages']?>
          </div>
          <?
		  }
		  else
		  {
		  ?>
           <div style="clear:both"></div>
          <div style="height:10px;"><a name="<?=$row['mid']?>" id="<?=$row['mid']?>"></a>
</div>
          <div class="chating_bx2"> <img src="../images/admin_icon.jpg" /><strong>
		  
		  <? echo $usernamefrom; ?></strong> <span>
		    <?
            	$datedtime=$row['dated'];
			$userdatedtimed=date("d-M-Y H:i:s", strtotime($datedtime));
			?>
           <? echo $userdatedtimed; ?> 
          
          </span>
              <div class="clr"></div>
           <?=$row['messages']?>
          </div>
           <?
		   }
	$i++;
	} 
	?>
     <? } ?>
        <?
		 if($nums==0)

	   {?>
        <table width="98%"  border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30" align="center" bgcolor="#3399FF" class="norecordsfound"><span style="color:#FFFFFF; font-family:Arial, Helvetica, sans-serif;">There is no messages found</span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
        <? }?>
          <div class="add_message_bx"><span class="user_reg_text">Add Your Message</span> <br />
          <form name="form1" id="form1" method="post" action="" onsubmit="return val();">
              <textarea id="elm2" name="elm2" rows="15" cols="80" style="width: 137%">
                <?=$editres['content']?>
	            </textarea><br />
                <input type="submit" name="submit" id="submit" value="Submit" />
              </form>
              <div class="clr"></div>
          </div>
        
        </div>
    <div class="shadow"></div>
    </div>
    
    </td>
  </tr>
</table>
<div class="ft_fl_bx">
<div class="ft_inner_fl_bx">
  <table width="900" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td rowspan="2"><p><strong>SK Developers</strong><br />
        3 - B, Rajaram Film Directors Colony,<br />
        Kodambakkam, Chennai - 600 024</p>
        <p>Tel: 044 - 24800633 / 34<br />
          Fax: 044 - 24800635</p>
        <p>Email:info@skdevelopers.com</p></td>
      <td height="74" align="right" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="middle"><a href="#" class="hm_ft_link">Home</a> | <a href="#" class="hm_ft_link">About Us</a> | <a href="#" class="hm_ft_link">Projects</a> | <a href="#" class="hm_ft_link">Testimonials</a> | <a href="#" class="hm_ft_link">Contact Us</a><br />
© 2012 <strong>SK Developers</strong>. 
        All Rights Reserved<br />
Designed by <a href="#" class="hm_ft_link">Dream Effects Multimedia</a></td>
    </tr>
  </table>
</div>

</div>


</div>
</body>
</html>
