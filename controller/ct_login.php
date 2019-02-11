<?php
session_start();
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

$s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");
mysql_select_db("board", $s);
$sql = "select * from user where user_email = '$user_email' and user_password = '$user_password'";
$result = mysql_query($sql);
$data = mysql_fetch_array($result);
// echo"$data[user_email]";
$user_email2 = "$data[user_email]";
// echo $user_email2;

if($user_email === "$data[user_email]" && $user_password === "$data[user_password]"){
  // session start();
  $_SESSION['user_idx'] = $data[user_idx];
  $_SESSION['user_email'] = $data[user_email];
  $_SESSION['user_name'] = $data[user_name];

  echo 0;
}
else {
  echo 1;
  // echo("<script>location.href='../login.html';</script>");
}
mysql_close($s);

?>
