<?php
$comment_contents = $_GET['content'];
$user_name = $_GET['user_name'];
$user_idx = $_GET['user_idx'];
$com_idx = $_GET['com_idx'];
$comment_date = date("Y-m-d h:i");


$s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");

mysql_select_db("board", $s);


$result = mysql_query("INSERT INTO comment(comment_contents, comment_date, user_idx, user_name, com_idx)VALUES('$comment_contents','$comment_date','$user_idx','$user_name', '$com_idx')");
if($result == true){
  mysql_close($s);
}

?>
