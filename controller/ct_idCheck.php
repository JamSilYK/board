<?php
$s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");

$user_email = $_GET['inputId'];

mysql_select_db("board", $s);

$sql = "select * from user where user_email = '$user_email'";
$result = mysql_query($sql);
$data = mysql_fetch_array($result);
// echo"$data[user_email]";
$user_email2 = "$data[user_email]";
// echo $user_email2;

if($user_email == "$data[user_email]"){ //유저 이메일이 있으면 0
  echo 0;
}
else if($user_email != "$data[user_email]"){ //유저 이메일이 없으면 1
  echo 1;
}
mysql_close($s);

?>
