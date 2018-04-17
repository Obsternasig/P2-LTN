
<?php
require_once"connection.php";

if(isset($_POST['komponenter']))
{


 $search_val=$_POST['brand'];
	
 $get_result = mysql_query("select * from komponenter where MATCH(brand) AGAINST('$search_val')");
 while($row=mysql_fetch_array($get_result))
 {
  echo "<li><a href='http://talkerscode.com/webtricks/".$row['brans']."'><span class='title'>".$row['brand']."</span><br><span class='desc'>".$row['brand']."</span></a></li>";
 }
 exit();
}
?>