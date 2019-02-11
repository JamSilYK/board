<?php
$s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");

$recomment_idx = $_GET['recomment_idx'];
mysql_select_db("board", $s);

$sql = "DELETE FROM recomment where recomment_idx = '$recomment_idx'";
$result = mysql_query($sql);
mysql_close($s);
?>
