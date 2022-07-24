<?php
ob_start();
include("../config.php");
session_start();
$usr = $_SESSION['username'];
if($_SESSION['username']=="")
	{
	header("location:index.php");
	}

?>
<?
	 $enquiryid = $_REQUEST['id'];
	  if($enquiryid!="")
			 {
			  $_SESSION['Chkid']=$enquiryid;
			 }	
			 foreach($enquiryid as $tbgid)
					 {	
					$del = "delete from userdetails where uid='$tbgid'"; 
	$delt = mysql_query($del) or die('Del err in contact us:');
 ?>

		<script language="javascript">alert('Selected users has been deleted');</script>
		<script language="javascript">window.location='user-management.php';</script> 
<?	
	}
?>