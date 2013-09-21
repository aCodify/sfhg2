<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<? 

// เก็บข้อมูลจาก กล่องรับข้อความ

$code = $_POST["textfield"];
$course1 = $_POST["textfield2"];
$course2 = $_POST["textfield3"];
$course3 = $_POST["textfield4"];
$course4 = $_POST["textfield5"];

$dbname ="c2oh2o_project";
mysql_connect("localhost","c2oh2o_project","password") or die("ติดต่อhostม่ได้");
mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");
$sql = "INSERT INTO course VALUES ('$code','$course1','$course2','$course3','$course4'); ";
$qry = mysql_query($sql);
if ($qry){
		echo "เก็บข้อมูลเรียบร้อย โปรดรอดักครู่....";
        echo "<meta http-equiv='refresh' content='3;url=index.php' />";
		
		}else{
			echo "not connet";
			}

//echo "hell, $code";
?>

<body>
</body>
</html>