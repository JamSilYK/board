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
              <div class="" style="text-align:center;">
                <?php
                $s=mysql_connect("localhost", "********", "*********") or die("실패ㅠㅠ");
                mysql_select_db("board", $s);
                $user_idx = $_SESSION["user_idx"];
                $user_sql = "SELECT * FROM user WHERE user_idx = '$user_idx'";
                $user_result = mysql_query($user_sql);
                $data = mysql_fetch_array($user_result);
                $user_coin = "$data[user_coin]";
                $user_name = "$data[user_name]";
                 ?>
                <h1 style="color:white;"><?php echo "$user_name"; ?>님의 코인은 <?php echo "$user_coin";?>개 입니다.</h1>
                <?php echo '<input type="hidden" id="user_coin" value="' . htmlspecialchars($user_coin) . '">'; ?>
              </div>
              <div class="panel-body" style="margin-top:10px; background-color:#152036;">
                <div class="col-md-5 bat" style="background-color:black;">홈</div>
                <div class="col-md-1 bat" style="background-color:black;">무승부</div>
                <div class="col-md-5 bat" style="background-color:black;">어웨이</div>

                <?php
                $sql = 'SELECT * FROM allocation_game'; //열 개수를 가지고 오는 쿼리
                $result = $db->query($sql);
                $i = 1;

                while($row = $result->fetch_assoc()){
                  $al_idx = $row['al_idx'];
                  $al_homename = $row['al_homename']; // 홈팀 이름
                  $al_awayname = $row['al_awayname']; // 어웨이팀 이름
                  $al_home = $row['al_home']; //홈 배당률
                  $al_draw = $row['al_draw']; // 무승부 배당률
                  $al_away = $row['al_away']; // 어웨이 배당률
                  $al_check = $row['al_check']; // 어웨이 배당률
                  if($al_check == "Y"){
                ?>

                <?php echo '<div class="bat_wrap" id="' . $al_idx . '">'; ?>
                <?php echo '<input type="hidden" name="' . htmlspecialchars($al_idx) . '">'; ?>
                  <div class="col-md-5 bat" name="home" value="home"><?php echo $al_homename .'/'. $al_home ?></div>
                  <div class="col-md-1 bat" name="draw" value="draw"><?php echo $al_draw ?></div>
                  <div class="col-md-5 bat" name="away" value="away"><?php echo $al_awayname .'/'. $al_away ?></div>
                </div>
                <?php
              }
                ?>

                <?php
              }
                ?>
                <div class="col-md-12" style="text-align:center; margin-top:150px; margin-left:7px;">
                  <button type="button" name="button" id="bt_bat">배팅</button>
                </div>
                <?php echo '<input type="hidden" id="user_idx" value="' . htmlspecialchars($user_idx) . '">'; ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#bt_logout').on("click", function(evt) {
    evt.preventDefault();
    if(confirm("로그아웃 하시겠습니까?") == true){
      location.href="controller/ct_logout.php";
    }
  });

  Pick = function(al_idx, user_idx, pick_game, allocation){
      this.al_idx=al_idx;
      this.user_idx=user_idx;
      this.pick_game=pick_game; //선택한 게임이 홈, 무승부, 어웨인지 확인
      this.allocation=allocation; //선택한 배당률 확인
  };

  var select_value="";
  var inputvalue;
  var pickList = new Array();

  $('div[name=home], div[name=draw], div[name=away]').on("click", function(evt) {
    evt.preventDefault();
    var parent_id = $(this).parent().attr("id"); //parent div의 id값
    if(parent_id == $('input[name='+parent_id+']').val()){ //같은 행에 있을 때
      $('#'+parent_id).children().css("background-color", "#1b2a47");
      $('input[name='+parent_id+']').val(parent_id);
      $(this).css("background-color", "red");
      for(var i = 0; i<pickList.length; i++){
        if(pickList[i].al_idx == parent_id){
          pickList.splice(i,1);
        }
      }
      var al_idx = parent_id;
      var user_idx = $('#user_idx').val();
      pick_game = $(this).attr("value");
      var allocation = $(this).text();
      if(allocation.includes("/")){
        var jbSplit = allocation.split('/');
        allocation = jbSplit[1];
      }
      else { //무승부
        allocation = $(this).text();
      }
      pickList.push(new Pick(parent_id, user_idx, pick_game, allocation));
      //alert(pickList.length);
    }


    else{ //중복되는 행이 없을 때
      $('input[name='+parent_id+']').val(parent_id);
      $(this).css("background-color", "red");
      var al_idx = parent_id;
      var user_idx = $('#user_idx').val();
      pick_game = $(this).attr("value");
      var allocation = $(this).text();
      if(allocation.includes("/")){
        var jbSplit = allocation.split('/');
        allocation = jbSplit[1];
      }
      else { //무승부
        allocation = $(this).text();
      }
      pickList.push(new Pick(parent_id, user_idx, pick_game, allocation));
      //alert(pickList.length);
    }
  });

  // $('div[name=draw]').on("click", function(evt) {
  //   evt.preventDefault();
  //   var parent = $(this).parent().attr("id");
  //   if(parent == v){
  //     $('#'+parent).children().css("background-color", "#1b2a47");
  //     $(this).css("background-color", "red");
  //     $('#select').val(parent);
  //     v = $('#select').val();
  //     //var confirm = $('#'+parent).attr("class");
  //     //alert(confirm);
  //   }
  //   else {
  //     $(this).css("background-color", "red");
  //     $('#select').val(parent);
  //     v = $('#select').val();
  //   }
  // });

  // $('div[name=away]').on("click", function(evt) {
  //   evt.preventDefault();
  //   var parent = $(this).parent().attr("id");
  //   if(parent == v){
  //     $('#'+parent).children().css("background-color", "#1b2a47");
  //     $(this).css("background-color", "red");
  //     $('#select').val(parent);
  //     v = $('#select').val();
  //     //var confirm = $('#'+parent).attr("class");
  //     //alert(confirm);
  //   }
  //   else {
  //     $(this).css("background-color", "red");
  //     $('#select').val(parent);
  //     v = $('#select').val();
  //   }
  // });

  $('#bt_bat').on("click", function(evt) {
    evt.preventDefault();
    var mycoin = parseInt($('#user_coin').val());
    if(pickList.length > 0){
      var bat_price = prompt("얼마를 배팅하시겠습니까?");

      if(mycoin < parseInt(bat_price)){
        alert("코인이 부족합니다.")
      }
      else {
        var bat_allocation = 1;
        for(var i = 0; i<pickList.length; i++){
          bat_allocation = bat_allocation *  parseFloat(pickList[i].allocation);
        }
        var bat_w = bat_price * bat_allocation;
        var bat_a = bat_w.toFixed(2);
        if(confirm("회원님의 배당금은 " + bat_a + "코인 입니다. 배팅하시겠습니까?")){
          pickList = JSON.stringify(pickList);
          //alert(pickList);

          $.ajax({
          	type : 'POST',
          	url : 'controller/ct_bat.php',
          	cache : false,
          	data : { pickList: pickList , bat_price: bat_price},
          	success : function( data ){
          		alert(data);
              //location.href="controller/ct_logout.php";
          	},
          	error : function( jqxhr , status , error ){
          		// console.log( jqxhr , status , error );
          	}
          });


        }

      }
    }

    else {
      alert("게임을 선택해주세요");
    }



  });
});

</script>
