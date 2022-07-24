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
 	$messages = $_POST['message'];
	$imgfile = $_FILES['imgfile']['name'];
	$userdatetime= date('Y-m-d H:i:s');
	$submit = $_POST['submit'];
if ($submit=="Send")
{
if(($imgfile=="") && ($messages!=""))
{
$ins = "INSERT INTO messages(`fromuid`,`touid`,`messages`,`image`,`dated`) 
	 VALUES('$useridm','1','$messages','','$userdatetime')";
	 $sqlins= mysql_query($ins) or die('Insert Query error:');	
//	 echo $sqlins;
$upd = "update userdetails set messagestatus ='not viewed' where`uid`='$useridm'"; 	 
				$update = mysql_query($upd) or die('Update Query error:');
	 $msg = "<font color=#FF0000>Successfully Inserted..</font>";
	 }
	 elseif(($messages=="") && ($imgfile!=""))
	 {
	  $imgfile="".$imgfile;	
			$target_path = "../img/".$_FILES['imgfile']['name']; 
	
			move_uploaded_file($_FILES['imgfile']['tmp_name'], $target_path);

				$target_path = "../img/".$_FILES['imgfile']; 
	
			move_uploaded_file($_FILES['imgfile']['tmp_name'], $target_path);
$ins = "INSERT INTO messages(`fromuid`,`touid`,`messages`,`image`,`dated`) 
	 VALUES('$useridm','1','','$imgfile','$userdatetime')";
	 $sqlins= mysql_query($ins) or die('Insert Query error:');	
	 $upd = "update userdetails set messagestatus ='not viewed' where`uid`='$useridm'"; 	 
				$update = mysql_query($upd) or die('Update Query error:');
	 $msg = "<font color=#FF0000>Successfully Inserted..</font>";
	 }
	 else
	 {
	  $imgfile="".$imgfile;	
			$target_path = "../img/".$_FILES['imgfile']['name']; 
	
			move_uploaded_file($_FILES['imgfile']['tmp_name'], $target_path);

				$target_path = "../img/".$_FILES['imgfile']; 
	
			move_uploaded_file($_FILES['imgfile']['tmp_name'], $target_path);
$ins = "INSERT INTO messages(`fromuid`,`touid`,`messages`,`image`,`dated`) 
	 VALUES('$useridm','1','$messages','$imgfile','$userdatetime')";
	  $sqlins= mysql_query($ins) or die('Insert Query error:');	
	  $upd = "update userdetails set messagestatus ='not viewed' where`uid`='$useridm'"; 	 
				$update = mysql_query($upd) or die('Update Query error:');
	 $msg = "<font color=#FF0000>Successfully Inserted..</font>";
	 }
	  $show2= "select * from messages where (fromuid=1 and touid='$useridm') or (fromuid='$useridm' and touid=1) order by dated desc limit 1";
$res2 = mysql_query($show2) or die ('select query:');
$nums2 = mysql_num_rows($res2);
	 if($row2 = mysql_fetch_array($res2))
 {
 $lastmid=$row2['mid'];
 }
 		?>
		<script language="javascript">window.location='viewmessages.php<? if($lastmid!="") { ?>#<? echo $lastmid; ?><? } ?>';</script>
	<?	
}
	$show= "select * from messages where ((fromuid=1 or fromuid=2 or fromuid=3 or fromuid=4 or fromuid=5) and touid='$useridm') or (fromuid='$useridm' and touid=1 or touid=2 or touid=3 or touid=4 or touid=5) order by dated asc";
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
if((document.form1.message.value=="") && (document.form1.imgfile.value==""))
{
alert("Please enter message or select image to upload")
document.form1.message.focus();
return false;
}
 if(document.form1.imgfile.value!="")
 {
 var fup = document.getElementById('imgfile');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "PNG" || ext == "png")
{
} 
else
{
alert("Upload Gif or Jpg or png images only");
fup.focus();
return false;
}
 }
return true;
}
function OpenNewWindow(bigurl, width, height)
{
    var newWindow = window.open("", "New window", 
        "location=no, directories=no, fullscreen=no, " + 
        "menubar=no, status=no, toolbar=no, width=" + 
        width + ", height=" + height + ", scrollbars=yes");
    newWindow.document.writeln("<html>");
		newWindow.document.writeln("<head>");
	newWindow.document.writeln("<title>New window</title>");
	newWindow.document.writeln("</head>");
    newWindow.document.writeln("<body style='margin: 0 0 0 0;'>");
    newWindow.document.writeln("<a href='javascript:window.close();'>");
    newWindow.document.writeln("<img src='" + bigurl + 
       "' alt='Click to close' id='bigImage'/>");
    newWindow.document.writeln("</a>");
    newWindow.document.writeln("</body></html>");
    newWindow.document.close();
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
<?
include("header.php");
?>
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
 if(($useridfrom=="1") || ($useridfrom=="2") || ($useridfrom=="3") || ($useridfrom=="4") || ($useridfrom=="5"))
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
                <?
			  $messagesd=$row['messages'];
			  if($messagesd!="")
			  {
			  ?>
<p><?=$row['messages']?></p>
 
           <?
		   }
		   $imaged=$row['image'];
		   if($imaged!="")
		   {
		   ?>
           <p><a href="#" onClick="OpenNewWindow('../img/<? echo $imaged; ?>', 800, 800); return true;"><img src="../img/<? echo $imaged; ?>" width="250" height="250" title="<? echo $imaged; ?>" alt="<? echo $imaged; ?>" /></a></p>
           <?
		   }
		   ?>
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
		  
		  <? echo $usernamefrom; ?> (Me)</strong> <span>
		    <?
            	$datedtime=$row['dated'];
			$userdatedtimed=date("d-M-Y H:i:s", strtotime($datedtime));
			?>
           <? echo $userdatedtimed; ?> 
          
          </span>
              <div class="clr"></div>
              <?
			  $messagesd=$row['messages'];
			  if($messagesd!="")
			  {
			  ?>
           <p><? echo $messagesd; ?></p>
           
           <?
		   }
		   $imaged=$row['image'];
		   if($imaged!="")
		   {
		   ?>
           <p><a href="#" onClick="OpenNewWindow('../img/<? echo $imaged; ?>', 800, 800); return true;"><img src="../img/<? echo $imaged; ?>" width="250" height="250" title="<? echo $imaged; ?>" alt="<? echo $imaged; ?>" /></a></p>
           <?
		   }
		   ?>
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
        <table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0">
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
        <? }?>
          <div class="add_message_bx">            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return val();">
              <table width="880" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="880"><span class="user_reg_text">Add Your Message</span></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td valign="top"><label>
                   <a name="a" id="a"></a>  <textarea name="message" cols="45" rows="5" class="user_management_fieldbx" id="message"></textarea>
                  </label></td>
                  </tr>
                <tr>
                  <td height="59" valign="middle"><label>
                    <input type="file" name="imgfile" id="imgfile" />
                  </label></td>
                </tr>
                <tr>
                  <td height="42"><input type="submit" name="submit" id="submit" value="Send" class="submit_btn" /></td>
                </tr>
              </table>
            </form>
            <br />
              <br />

              <div class="clr"></div>
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
