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
$com_date = date("Y-m-d h:i");
$com_idx = $_SESSION['modify_com_idx'];

echo "$com_title";
echo "$com_contents";
echo "$com_idx";

$query = "UPDATE community set com_title='$com_title',com_contents='$com_contents',com_date='$com_date',com_pass='$com_pass' where com_idx = '$com_idx' ";

if($com_title != null && $com_contents != null && $user_idx != null){
  $s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");
  mysql_select_db("board", $s);
  $result = mysql_query($query);
  if($result == true){
    unset($_SESSION['modify_com_idx']);
    echo("<script>alert('정상적으로 수정되었습니다.')</script>");
    echo("<script>location.href='../community_list.php';</script>");
  }

  else {
    echo("<script>alert('수정에 실패했습니다.')</script>");
    echo("<script>location.href='../community_write.php';</script>");
  }
  mysql_close($s);

}

?>
