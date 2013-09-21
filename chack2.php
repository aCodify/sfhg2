<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?

//$login = $_POST['textfield'];
//echo $login;
$code = $_POST['textfield'];
$dbname ="c2oh2o_project";
mysql_connect("localhost","c2oh2o_project","password") or die("ติดต่อhostม่ได้");
mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");
$sql = "select * from course where ID_course ='$code' ";
$dbquery = mysql_db_query($dbname,$sql);
$num_row = mysql_num_rows($dbquery);
if($num_row>=1){
	echo "ไม่สามารถใช้Codeนี้ได้";
	}else{
		echo "สามารถใช้Codeนี้ได้";
		}


?>



</body>
</html>