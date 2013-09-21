<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
    $code = '7325';
	$dbname ="c2oh2o_project";
	mysql_connect("localhost","c2oh2o_project","password") or die("ติดต่อhostม่ได้");
	mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");
	$sql = "select id_student,name,cum_Grad from student_data where ID_course ='$code'";
	//$dbquery = mysql_db_query($dbname,$sql);
	//$num_row = mysql_num_rows($dbquery);
	$dbquery = mysql_db_query($dbname,$sql);
	$d=0;
	
	$stuarry = array();

	
	while($fetch = mysql_fetch_assoc($dbquery))   //ดึงข้อมูลในตารางมาใส่ตัวแปร $fetch แล้ววนลูปแสดงข้อมูลออกมา
{
	$stuarry [$d] = $fetch["id_student"];
	$d++;
    // echo "ID Student: " . $fetch["id_student"] . " Name: " . $fetch["name"] . "<= CUM GRAD <=> : " . $fetch["cum_Grad"] . "<br>";  
	 
	 //อ้างอิงตัวแปรที่เก็บข้อมูลแต่ละฟิลมีรูปแบบ $fetch[ชื่อฟิล]
	 
}
    $totalArr= count($stuarry);
	//echo 'Size of Array :=' .$totalArr."<br>";

	//print_r ($stuarry)."<br>";
	
	shuffle ($stuarry)."<br>";  //สลับตำแหน่งในอะเร

	//print_r ($stuarry)."<br>"; // สลับตำแหน่งแล้ว

/*/////////////////////////////////////////////////////////////////////////////////////// */
    $size = 2;                                // จำนวนนักศึกษาในกลุ่ม
	$totalsize =  $totalArr / $size;
	$num = 0;
	 echo $totalsize;                     // ตรวจสอบ จำนวนกลุม

  	for($i = 1;$i <= $totalsize;$i++){
		echo 'Group'.$i."<br>";
		$stuarry2 = compact('stuarry');
		$stuarry2 = array();
	
		
	
		for ($j=1;$j<= $size;$j++){
			//echo $stuarry[$num]."<br>";
			$stuarry2[$num] = $stuarry[$num]."<br>";
			print_r ($stuarry2);
			$num ++;
			
			}
		}
	//	print_r ($stuarry2);
		if($num  < $totalArr){
			 echo ' นักเรียนไม่มีกลุ่ม '.$stuarry[$num++ ]."<br>";
			}
		





?>
</body>
</html>