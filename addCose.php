<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="ajax/framework.js"></script>

<script> 
//เช็คว่าcodeซ้ำไหม
function Search_IDcourse(){ 
	var data = getFormData('form1');
	var url = 'checkCode.php';
	
	ajaxLoad('post', url, data, 'displayAJAX')
	/*alert("1");
	var params = getFormData('form1');
	alert("2");
	var url='checkCode.php';
	alert("3");
	var Addnew=new Ajax.Updater(Div,url,{method:"post",parameters: params});
	alert(Div);*/
	//alert("<?php/* Search();*/ ?>");
	 }
    </script>
	<?php /*function Search(){ 
	global $a; 
	$code = $_POST['textfield'];
	echo $code;
	$str = "ไม่สามารถใช้โค้ดนี้ได้".$code;
	echo $str;*/
	/*@mysql_connect("localhost","root","root");
	mysql_select_db("SFHG");
	$qry = mysql_query("select ID_course from course where ID_course == "+$code+";" );
	if ($qry ){
		echo "สามารถใช้codeนี้ได้";
		}else{
			echo "ไม่สามารถใช้โค้ดนี้ได้"+$code;
			}*/
	//mysql_query("delete from course where ID_course = '12';"); 
	/*$qry = mysql_query("INSERT INTO course VALUES ('12','fr1','fr2','fr3','fer4');"); 
	if ($qry){
		echo "connet";
		}else{
			echo "not connet";
			}
	if(!$conn){
		echo "not connet";
		}
		else {
			echo "connet";
			}*/
	
	// }?>

</head>
<body>
<table width="1015" border="0" ><form action="AddCourse.php" method="post" name="form1" id="form1"  >
  <tr>
    <th colspan="5" scope="col"><input type="image" name="imageField" id="imageField" src="image/add.jpg" /></th>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#E06601">&nbsp;</td>
  </tr>
  <tr>
    <td height="33" colspan="2">Please select Previous Course</td>
    <td width="129">&nbsp;</td>
    <td width="129">&nbsp;</td>
    <td width="122">&nbsp;</td>
  </tr>
  <tr>

    <td width="182" height="77">ID Code :</td>
    <td width="446">
      <label for="textfield"></label>
    
      <input name="textfield" type="text" id="textfield" maxlength="5" onblur="Search_IDcourse()" /> <span id="displayAJAX"> </span>
   
    </td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="31">
      <label for="checkbox"></label>
      <p>Previous Course 1 :</p>
    </td>
    <td>
      <label for="textfield2"></label>
      <input type="text" name="textfield2" id="textfield2" />
  </td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="34">
      <p>Previous Course 2 :</p>
      <label for="checkbox2"></label>
    </td>
    <td>
      <label for="textfield3"></label>
      <input type="text" name="textfield3" id="textfield3" />
    </td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">
      <p>Previous Course 3 :</p>
      <label for="checkbox3"></label>
    </td>
    <td>
      <label for="textfield4"></label>
      <input type="text" name="textfield4" id="textfield4" />
   </td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">
      <p>Previous Course 4 :</p>
      <label for="checkbox4"></label>
    </td>
    <td>
      <label for="textfield5"></label>
      <input type="text" name="textfield5" id="textfield5" />
   </td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="27" colspan="2"><blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <p>
                  <input type="submit" name="button2" id="button2" value="Add Course" />
                  
                </p>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  </form>
</table>
<table width="1029" height="25" border="0">
  <tr>
    <th width="181" scope="col">&nbsp;</th>
    <th width="838" scope="col">&nbsp;</th>
  </tr>
</table>
<table width="1029" border="0">
  <tr>
    <th width="183" rowspan="2" scope="col">&nbsp;</th>
    <th width="417" scope="col"></th>
    <th width="417" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="2" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<table width="1029" height="25" border="0">
</table>
<table width="1015" border="0">
</table>
</body>
</html>