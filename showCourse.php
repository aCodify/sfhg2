<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../phpMyAdmin/ajax/framework.js"></script>
</head>

<?
$code = $_POST['select'];
$str= "";
$num=1;
$dbname ="c2oh2o_project";
mysql_connect("localhost","c2oh2o_project","password") or die("ติดต่อhostม่ได้");
mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");
$sql = "select * from course where ID_course ='$code' ";

// ดึงรหัสวิชามาแสดง
 //$result = mysql_query($sql,$dbcon);   
 $dbquery = mysql_db_query($dbname,$sql);
//
  while($row = mysql_fetch_row($dbquery)) {
  //$str = "$row[1] <br/>$row[2] <br/>$row[3] <br/>$row[4] <br/>";
 
	echo " <tr><th> Previous Course 1 :  $row[1] </th> </tr> \n <br/>";
	echo " <tr><th> Previous Course 2 :  $row[2] </th> </tr> \n <br/>";
	echo " <tr><th> Previous Course 3 :  $row[3] </th> </tr> \n <br/>";
	echo " <tr><th> Previous Course 4 :  $row[4] </th> </tr> \n <br/>";
	
	}
     
//while($fetch = mysql_fetch_assoc( $dbquery))   //ดึงข้อมูลในตารางมาใส่ตัวแปร $fetch แล้ววนลูปแสดงข้อมูลออกมา
//{
//	echo $fetch;
//     echo "หมายเลขไอดี : " . $fetch["id_student"]  . "<br>";  //อ้างอิงตัวแปรที่เก็บข้อมูลแต่ละฟิลมีรูปแบบ $fetch[ชื่อฟิล]
//}

  
	/*echo " <tr><th> $str1 $row[2] </th> </tr> \n<br>";
	echo " <tr><th> $str  $row[3] </th> </tr> \n<br>";
	echo " <tr><th> $str1 $row[4] </th> </tr> \n<br>";*/
		
	/*}
	
	for ( $i =0 ;$i<4 ;$i++) {
		  $str = "$row[i]";
		  echo $str;
		}*/




//echo $str;

//echo "test"
?>

<body>
</body>
</html>