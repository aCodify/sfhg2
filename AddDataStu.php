<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?
$ID_course = $_POST["select"];
$id_Student = $_POST["ID_textfield"];
$Name = $_POST["name"];
$cum_Grade = $_POST["C_grade"];
$course_G1 = $_POST["select2"];
$course_G2 = $_POST["select3"];
$course_G3 = $_POST["select4"];
$course_G4 = $_POST["select5"];

$dbname ="c2oh2o_project";
mysql_connect("localhost","c2oh2o_project","password") or die("ติดต่อhostม่ได้");
mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");

$sql = "INSERT INTO student_data VALUES 

('$id_Student','$Name','$cum_Grade','$ID_course','$course_G1','$course_G2','$course_G3','$course_G4'); ";
$qry = mysql_query($sql);

if ($qry = 1){
		echo "เก็บข้อมูลเรียบร้อย โปรดรอดักครู่....";
		
        echo "<meta http-equiv='refresh' content='1;url=addStu.php' />";
		
		}else{
			echo "not connet";
			}


echo $course1;

?>
<body>
</body>
</html>