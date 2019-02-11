<?php
session_start();
if($_SESSION["user_email"] == null){
  echo("<script>location.href='../login.php';</script>");
}
?>

<?php
$s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");
mysql_select_db("board", $s);
$user_idx = $_SESSION["user_idx"];
$result = mysql_query("SELECT * FROM user WHERE user_idx = '$user_idx'");
$data = mysql_fetch_array($result);

$db_user_coin = $data['user_coin'];
$user_coin = $_GET['user_coin'];
$int_user_coin = (int)$db_user_coin + (int)$user_coin; //기존값과 새로운 코인을 더한다.
$result = mysql_query("UPDATE user set user_coin='$int_user_coin' where user_idx = '$user_idx'");
if($result != null){
  echo '결제가 완료되었습니다.';
}
mysql_close($s);

?>
