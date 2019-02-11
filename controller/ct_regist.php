<?php
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
$user_name = $_POST['user_name'];

if($user_email != null && $user_password != null && $user_name != null){
  $s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");
  mysql_select_db("board", $s);
  $result = mysql_query("INSERT INTO user (user_email, user_password, user_name)VALUES('$user_email','$user_password','$user_name')");
  if($result == true){
    echo("<script>location.href='../login.php';</script>");
  }

  else {
    echo("<script>location.href='../register.php';</script>");
  }
  mysql_close($s);
}


?>
