<?
session_start();
$_SESSION['uname']="";
$_SESSION['uid']="";
$_SESSION['usercheck']="";
//$_SESSION['branchname']="";
//$_SESSION['userchk']="";
//$_SESSION['npacks']="";
//$_SESSION['BillNo']="";
session_unset();

session_destroy();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">
window.location="index.php";
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?
include("favicon.php");
?>
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
