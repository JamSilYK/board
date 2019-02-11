<?php
$s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");

$comment_idx = $_GET['comment_idx'];
mysql_select_db("board", $s);

$sql = "DELETE FROM comment where comment_idx = '$comment_idx'";
$result = mysql_query($sql);

if($result == true){
  echo "0";
}

else {
  echo "1";
}
mysql_close($s);

?>
