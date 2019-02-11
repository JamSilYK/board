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
              <div class="panel-body" style="margin-top:10px; background-color:#152036;">
                <h3 style="text-align:center; color:white;">경기 결과</h3>


                <?php
                $sql = 'SELECT * FROM finished_game'; //열 개수를 가지고 오는 쿼리
                $result = $db->query($sql);
                while($row = $result->fetch_assoc()){
                  $finished_idx = $row['finished_idx'];
                  $finished_homename = $row['finished_homename']; // 홈팀 이름
                  $finished_awayname = $row['finished_awayname']; // 어웨이팀 이름
                  $finished_score = $row['finished_score']; //홈 배당률
                  $strTok = explode('-', $finished_score);
                  $cnt = count($strTok);
                  for($i = 0; $i < $cnt; $i++){
                    if($i == 0){
                      $homescore = (int)$strTok[0];
                    }

                    else {
                      $awayscore = (int)$strTok[1];
                    }
                  }


                ?>

                <?php echo '<div class="bat_wrap" id="' . $finished_idx . '">'; ?>
                <?php echo '<input type="hidden" name="' . htmlspecialchars($finished_idx) . '">'; ?>

                <?php
                if($homescore > $awayscore){
                  ?>

                  <?php  echo '<div class="col-md-5 bat" style="background-color:red;" name="home">' . $finished_homename . '</div>'?>
                  <?php  echo '<div class="col-md-1 bat" style="" name="draw">' . $finished_score . '</div>' ?>
                  <?php  echo '<div class="col-md-5 bat" style="" name="away">' . $finished_awayname . '</div>'?>
                <?php
              }

              else if($homescore == $awayscore){
              ?>
              <?php  echo '<div class="col-md-5 bat" style="" name="home">' . $finished_homename . '</div>'?>
              <?php  echo '<div class="col-md-1 bat" style="background-color:red;" name="draw">' . $finished_score . '</div>' ?>
              <?php  echo '<div class="col-md-5 bat" style="" name="away">' . $finished_awayname . '</div>'?>
              <?php
            }

            else {
               ?>
               <?php  echo '<div class="col-md-5 bat" style="" name="home">' . $finished_homename . '</div>'?>
               <?php  echo '<div class="col-md-1 bat" style="" name="draw">' . $finished_score . '</div>' ?>
               <?php  echo '<div class="col-md-5 bat" style="background-color:red;" name="away">' . $finished_awayname . '</div>'?>
             <?php
           }
           ?>



                <!-- // echo '<div class="col-md-5 bat" style="background-color:red;" name="home">' . $finished_homename . '</div>'
                // echo '<div class="col-md-5 bat" style="" name="draw">' . $finished_score . '</div>'
                // echo '<div class="col-md-5 bat" style="" name="away">' . $finished_awayname . '</div>'
                 -->





                </div>

                <?php
              }
                ?>
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

  var select_value="";
  var inputvalue;



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
    alert(qw);
  });






});
</script>
