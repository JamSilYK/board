<?php
$comment_idx = $_GET['comment_idx'];
$user_idx = $_GET['user_idx'];
$user_name = $_GET['user_name'];
$com_idx = $_GET['com_idx'];
$recomment_contents = $_GET['contents'];
$recomment_date = date("Y-m-d h:i");

$s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");

mysql_select_db("board", $s);


$result = mysql_query("INSERT INTO recomment(comment_idx, user_idx, com_idx, user_name, recomment_contents, recomment_date)VALUES('$comment_idx','$user_idx','$com_idx','$user_name', '$recomment_contents', '$recomment_date')");
if($result == true){
  echo "0";
  mysql_close($s);
}

?>
