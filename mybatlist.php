<?php
session_start();
if($_SESSION["user_email"] == null){
  echo("<script>location.href='login.php';</script>");
}
?>
<!doctype html>
<html class="no-js" lang="en">
<?php
require_once("dbconfig.php");
include 'include/head.php';
include 'include/left_nav.php';
include 'include/jq.php';
include ("simple_html_dom.php");
?>

<body>
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="logo-pro">
            <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
          </div>
        </div>
      </div>
    </div>
    <div class="header-advance-area">
      <div class="header-top-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="header-top-wraper">
                <div class="row">
                  <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                    <div class="menu-switcher-pro">
                      <button type="button" id="bt_logout" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn" style="background-color:#152036; border-color:black; float:left;">
                        로그아웃
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="header-top-menu tabl-d-n hd-search-rp">
                      <div class="breadcome-heading">
                        <form role="search" class="">
                          <input type="text" placeholder="Search..." class="form-control">
                          <a href=""><i class="fa fa-search"></i></a>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Mobile Menu start -->

      <!-- Mobile Menu end -->
    </div>

    <div class="mailbox-area mg-tb-15">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="hpanel mg-b-15">
              <div class="breadcome-list">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcomb-wp">
                      <div class="breadcomb-ctn">
                        <h2>배팅 내역</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              $s=mysql_connect("localhost", "********", "*********") or die("실패ㅠㅠ");
              mysql_select_db("board", $s);
              $user_idx = $_SESSION["user_idx"];
              $user_sql = "SELECT * FROM user WHERE user_idx = '$user_idx'";
              $user_result = mysql_query($user_sql);
              $data = mysql_fetch_array($user_result);
              $user_game_count = (int)"$data[user_game_count]"; //유저가 몇게임을 했는지 확인할 수 있는 변수
              $user_coin = (int)"$data[user_coin]";

              for($i = $user_game_count; $i > 0; $i--){
                $count_sql = "SELECT COUNT(*) AS cnt FROM game_pick WHERE user_idx = '$user_idx' AND game_count = '$i'"; //열 개수를 가지고 오는 쿼리
                $count_result = $db->query($count_sql);
              	$row = $count_result->fetch_assoc();
              	$count = $row['cnt'];
                $bat_allocation = 1;//배당률
                $confirm =""; // 각 폴을 확인 초기값 확인중으로 세팅
                $lastconfirm = "확인중"; //전체 폴이 당첨됐는지 낙첨됐는지 표시
                $play_result=""; //경기결과가 home 승인지, 무승부인지 away 승인지 확인하는 변수
                $sql = "SELECT * FROM game_pick WHERE user_idx = '$user_idx' AND game_count = '$i'"; //열 개수를 가지고 오는 쿼리
                $result = $db->query($sql);
                $checked = 0; //당청개수 확인하는 변수
               ?>

                <div class="tab-content custom-product-edit">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:50px;">
                      <div class="review-content-section">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:50px;">
                          <?php
                          while($row = $result->fetch_assoc()){
                            $al_idx = $row['al_idx'];
                            $game_pick_game = $row['game_pick_game'];
                            $game_bat_price = $row['game_bat_price'];
                            $game_allocation = $row['game_allocation'];
                            $game_idx = $row['game_idx'];
                            $game_checked = $row['game_checked']; //당첨금을 받았는지 안받았는지 확인하는 변수

                            $bat_allocation = $bat_allocation * $game_allocation;

                            $al_sql = "SELECT * FROM allocation_game WHERE al_idx = '$al_idx'";
                            $al_result = mysql_query($al_sql);
                            $al_data = mysql_fetch_array($al_result);
                            $al_homename = "$al_data[al_homename]";
                            $al_awayname = "$al_data[al_awayname]";
                            $al_home = "$al_data[al_home]";
                            $al_draw = "$al_data[al_draw]";
                            $al_away = "$al_data[al_draw]";
                            $bat_allocation = number_format($bat_allocation, 2); //배당률
                            $bat_total = $game_bat_price * $bat_allocation; //총 상금
                            $finished_sql = "SELECT * FROM finished_game WHERE finished_homename = '$al_homename'";

                            $finished_result = mysql_query($finished_sql);

                            $finished_data = mysql_fetch_array($finished_result);

                            $finished_score = "$finished_data[finished_score]";


                            if($finished_score == null){

                              $confirm = "진행중";
                            }

                            else if($finished_score != null){

                              $strTok = explode('-', $finished_score);

                              $homescore = (int)$strTok[0];
                              $awayscore = (int)$strTok[1];
                              if($homescore > $awayscore){
                                $play_result = "home";
                              }

                              else if($homescore == $awayscore){
                                $play_result = "draw";
                              }

                              else if($homescore < $awayscore){
                                $play_result = "away";
                              }

                              else {
                                $confirm = "낙첨";
                                $lastconfirm = "낙첨";
                              }

                              if($play_result == $game_pick_game){
                                $confirm = "당첨";
                                $checked++;
                                if($count == $checked){
                                  $lastconfirm = "당첨";
                                  if($game_checked == 0){
                                    $user_coin = $user_coin + $bat_total;
                                    $up_user_query = "UPDATE user set user_coin='$user_coin' where user_idx = '$user_idx' ";
                                    $up_user_result = mysql_query($up_user_query);
                                    if($up_user_result == true){
                                      echo("<script>alert('당첨금 자동 지급 완료')</script>");
                                    }
                                    $game_checked = 1;
                                    $game_sql = "UPDATE game_pick SET game_checked='$game_checked' WHERE game_idx = '$game_idx'";
                                    $game_result = mysql_query($game_sql);
                                  }


                                }
                              }

                              else {
                                $confirm = "낙첨";
                                $lastconfirm = "낙첨";
                              }
                            }



                        if($game_pick_game == "home"){
                           ?>
                          <div class="col-md-4 bat" style="background-color:red;"><?php echo "$al_homename" . " / " . "$al_home"; ?></div>
                          <div class="col-md-1 bat" style="background-color:#152036;"><?php echo "$al_draw"?></div>
                          <div class="col-md-4 bat" style="background-color:#152036;"><?php echo "$al_awayname" . " / " . "$al_away"; ?></div>
                          <div class="col-md-1 bat" style="background-color:;"><?php echo "$confirm" ?></div>
                          <?php
                        }

                        else if($game_pick_game == "draw"){
                          ?>
                          <div class="col-md-4 bat" style="background-color:#152036;"><?php echo "$al_homename" . " / " . "$al_home"; ?></div>
                          <div class="col-md-1 bat" style="background-color:red;"><?php echo "$al_draw"?></div>
                          <div class="col-md-4 bat" style="background-color:#152036;"><?php echo "$al_awayname" . " / " . "$al_away"; ?></div>
                          <div class="col-md-1 bat" style="background-color:;"><?php echo "$confirm" ?></div>

                          <?php
                        }

                        else if($game_pick_game == "away"){
                           ?>
                           <div class="col-md-4 bat" style="background-color:#152036;"><?php echo "$al_homename" . " / " . "$al_home"; ?></div>
                           <div class="col-md-1 bat" style="background-color:#152036;"><?php echo "$al_draw"?></div>
                           <div class="col-md-4 bat" style="background-color:red;"><?php echo "$al_awayname" . " / " . "$al_away"; ?></div>
                           <div class="col-md-1 bat" style="background-color:;"><?php echo "$confirm" ?></div>
                           <?php
                         }
                            ?>


                          <?php
                        }

                           ?>
                           <div class="col-md-3 bat">배팅코인 : <?php echo "$game_bat_price" ?>코인</div>
                           <div class="col-md-3 bat">배당률 : <?php echo "$bat_allocation" ?>배</div>
                           <div class="col-md-3 bat">배당금 : <?php  echo "$bat_total"."코인"?></div>
                           <div class="col-md-1 bat" style="color:red;"><?php echo "$lastconfirm" ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>






              <!-- <div class="col-md-12" style="color:white; text-align:center; margin-top:50px;">
                <h1 style="">배팅 내역</h1>
                <div class="col-md-4 bat" style="background-color:black;">홈</div>
                <div class="col-md-2 bat" style="background-color:black;">무승부</div>
                <div class="col-md-4 bat" style="background-color:black;">어웨이</div>
                <div class="col-md-1 bat" style="background-color:red;">진행중</div>
              </div>
              <div class="col-md-12" style="color:white; text-align:center; margin-top:50px;">
                <h1 style="">배팅 내역</h1>
                <div class="col-md-4 bat" style="background-color:black;">홈</div>
                <div class="col-md-2 bat" style="background-color:black;">무승부</div>
                <div class="col-md-4 bat" style="background-color:black;">어웨이</div>
                <div class="col-md-1 bat" style="background-color:red;">진행중</div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
