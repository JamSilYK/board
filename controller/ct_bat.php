<?php
session_start();
if($_SESSION["user_email"] == null){
  echo("<script>location.href='login.php';</script>");
}
?>

<?php
$pickList = json_decode( $_POST['pickList'] );
$game_bat_price = $_POST['bat_price'];
$se_user_idx = $_SESSION["user_idx"];
$s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");
mysql_select_db("board", $s);
$result = mysql_query("SELECT * FROM user WHERE user_idx = '$se_user_idx'");
$data = mysql_fetch_array($result);
$tmp_user_coin = "$data[user_coin]";
$user_coin = (int)$tmp_user_coin;
$user_coin = $user_coin - $game_bat_price;
$user_game_count = "$data[user_game_count]";
$user_game_count++;
$result = mysql_query("UPDATE user set user_game_count='$user_game_count', user_coin='$user_coin' where user_idx = '$se_user_idx' ");

$ct = count($pickList);
for($i = 0; $i<$ct; $i++){
  $al_idx = $pickList[$i]->al_idx;
  $game_pick_game = $pickList[$i]->pick_game;
  $user_idx = $pickList[$i]->user_idx;
  $game_allocation = $pickList[$i]->allocation;
  $game_count = $user_game_count;
  $result = mysql_query("INSERT INTO game_pick (game_pick_game, user_idx, game_allocation, game_count, al_idx, game_bat_price)VALUES('$game_pick_game','$user_idx','$game_allocation','$game_count', '$al_idx', '$game_bat_price')");

}
echo '정상적으로 배팅되었습니다.';
mysql_close($s);


//print_r( $pickList[0]->al_idx );
//print_r( $ct);
//print_r( $pickList[1] );

 ?>
