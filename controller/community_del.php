<?php
session_start();
if($_SESSION["user_email"] == null){
  echo("<script>location.href='../login.php';</script>");
}
?>

<?php
$s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");

$com_idx = $_GET['com_idx'];
mysql_select_db("board", $s);

$sql = "DELETE FROM community where com_idx = '$com_idx'";
$result = mysql_query($sql);

if($result == true){
  echo 0;
}

else {
  echo 1;
}
mysql_close($s);
?>
