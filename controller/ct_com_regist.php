<?php
session_start();
if($_SESSION["user_email"] == null){
  echo("<script>location.href='../login.php';</script>");
}
?>

<?php
$com_title = $_POST['com_title'];
$com_contents = $_POST['com_contents'];
$user_idx = $_SESSION['user_idx'];
$com_pass = $_POST['com_pass'];
echo '$com_pass';
$com_date = date("Y-m-d h:i");


if($com_title != null && $com_contents != null && $user_idx != null){
  $s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");
  mysql_select_db("board", $s);
  $result = mysql_query("INSERT INTO community (com_title, com_contents, user_idx, com_date, com_pass)VALUES('$com_title','$com_contents','$user_idx','$com_date', '$com_pass')");
  if($result == true){
    echo("<script>alert('정상적으로 등록되었습니다.')</script>");
    echo("<script>location.href='../community_list.php';</script>");
  }

  else {
    echo("<script>alert('등록에 실패했습니다.')</script>");
    echo("<script>location.href='../community_write.php';</script>");
  }
  mysql_close($s);

}

?>
