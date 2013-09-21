<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADD STUDENT</title>
<script src="../phpMyAdmin/ajax/framework.js"></script>
<script> 
//เช็คว่าcodeซ้ำไหม
function Search(){ 
	var data = getFormData('form1');
	var url = 'showCourse.php';

	ajaxLoad('post', url, data, 'displayAJAX')
	//alert(data);
	//var data = getFormData('form1');
	//var url = 'checkCode.php';
	
	//ajaxLoad('post', url, data, 'displayAJAX')
	/*alert("1");
	var params = getFormData('form1');
	alert("2");
	var url='checkCode.php';
	alert("3");
	var Addnew=new Ajax.Updater(Div,url,{method:"post",parameters: params});
	alert(Div);*/
	//alert("<?php/* Search();*/ ?>");
	 }
	 
	/* function Search2(){
	var data = getFormData('form1');
	alert(data);
		 }*/
	 
    </script>

</head>

<body>
<form id="form2" name="form2" method="post" action="">
</form>
 

<table width="975" height="451" border="0" align="center"><form id="form1" name="form1" method="post" action="AddDataStu.php">
  <tr>
    <td height="139" colspan="5"><img src="image/Add student.jpg" width="1024" height="219" /></td>
  </tr>
  <tr>
    <td height="40" bgcolor="#FFFFFF">Code :</td>
    <td height="40" bgcolor="#FFFFFF"> 
      <select name="select" id="select4" onblur="Search()">
      
     
      <? $dbname ="c2oh2o_project";
	  // ดึงรหัสในฐานข้อมูลมาแสดง
	  
	mysql_connect("localhost","c2oh2o_project","root") or die("ติดต่อhostม่ได้");
	mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");
	$sql = "select ID_course from course";
	$dbquery = mysql_db_query($dbname,$sql);
    //$num_row = mysql_num_rows($dbquery);
	while($row = mysql_fetch_row($dbquery)) {
		echo "$row[0] <br />\n";
		echo "<option value="."$row[0]".">$row[0]</option>";
		//$num_row = $num_row-1;
	}
//echo "<option value="."1".">1</option>";
	  ?>
        
      </select></td>
    <td height="40" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="40" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="40" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td width="193" height="47">ID :</td>
    <td>
      <label for="ID_textfield"></label>
      <input name="ID_textfield" type="text" id="ID_textfield" />
    </td>
    <td width="350">&nbsp;</td>
    <td width="78">&nbsp;</td>
    <td width="154">&nbsp;</td>
  </tr>
  <tr>
    <td height="46">Name :</td>
    <td>
      <em>
      <input type="text" name="name" id="name" />
      </em>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="98"><p>Cum Grade :</p></td>
    <td>
      <label for="C_grade"></label>
      <input type="text" name="C_grade" id="C_grade" />
      
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
  <td><br/>
  </td>
  <td><span id="displayAJAX"> </span></td>
  <td><select name="select2" >
    <option value="0">Null</option>
    <option value="4">A</option>
  <option value="3.5">B+</option>
  <option value="3">B</option>
  <option value="2.5">C+</option>
  <option value="2">C</option>
  <option value="1.5">D+</option>
  <option value="1">D</option>
  <option value="0">F</option>
  <option value="0">W</option>
</select> <br/>
<select name="select3" >
  <option value="0">Null</option>
  <option value="4">A</option>
  <option value="3.5">B+</option>
  <option value="3">B</option>
  <option value="2.5">C+</option>
  <option value="2">C</option>
  <option value="1.5">D+</option>
  <option value="1">D</option>
  <option value="0">F</option>
  <option value="0">W</option>
</select> <br/>
<select name="select4" >
  <option value="0">Null</option>
  <option value="4">A</option>
  <option value="3.5">B+</option>
  <option value="3">B</option>
  <option value="2.5">C+</option>
  <option value="2">C</option>
  <option value="1.5">D+</option>
  <option value="1">D</option>
  <option value="0">F</option>
  <option value="0">W</option>
</select> <br/>
<select name="select5" >
<option value="0">Null</option>
<option value="4">A</option>
<option value="3.5">B+</option>
<option value="3">B</option>
<option value="2.5">C+</option>
<option value="2">C</option>
<option value="1.5">D+</option>
<option value="1">D</option>
<option value="0">F</option>
<option value="0">W</option>
</select> <br/>
</td>
  
   
  
  <?
  
  
  ?>
  </tr>
   <tr>
    <td height="67">&nbsp;</td>
    <td colspan="2">
      <p>
        
        <input type="submit" name="add" id="add" value="ADD" />
        <input type="reset" name="Reset" id="button" value="Close" onclick="window.location = 'index.php'"/>
      </p>
      <p>&nbsp; </p>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr></form>
</table>
</body>
</html>

