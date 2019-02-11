<?php
session_start();
if($_SESSION["user_email"] == null){
  echo("<script>location.href='login.php';</script>");
}
?>
<!doctype html>
<html class="no-js" lang="en">
<?php
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
              <div class="panel-body" style="margin-top:10px;">
                <div class="table-responsive">

                  <table class="table table-hover table-mailbox" id="table">
                    <thead>
                      <tr>
                        <td>경기</td>
                        <td></td>
                        <td>시작</td>
                        <td>경기상황</td>
                        <td>상황중계
                          <div class="ico_th_new">
                            <b></b>
                          </div>
                        </td>
                        <td>홈팀</td>
                        <td>점수</td>
                        <td>원정팀</td>
                        <td>전반</td>
                        <td>데이터</td>
                        <td>▲</td>
                      </tr>
                    </thead>
                    <?php
                    // $html = file_get_html('https://livescore.co.kr/sports/score_board/soccer_score.php');
                    // $ret2 = $html->find('thead');
                    // foreach ($ret2 as $key => $value) {
                    //     echo $value;
                    // }
                    ?>
                    <tbody id="tbody">
                    <?php

                    // $ret2 = $html->find('tr[class=score_tr]');
                    // foreach ($ret2 as $key => $value) {
                    // echo $value;
                    // }
                    ?>

                    <!-- <span id="odds" class="oddsDown">[3.83&nbsp;]</span>
                    <span id="odds" class="oddsDown">[3.12&nbsp;]</span>
                    <td><span class="score">0-<b>2</b></span></td>

                    <tr class="score_tr" id="11369832" alt="np" rel="14">
                      <td class="game" name="ENG U23D2" bgcolor="#E34250">ENG U23D2</td>
                      <td><input type="checkbox" name="checkbox" value="11369832"></td>
                      <td class="stime"> 23:00 </td>
                      <td class="situation"></td>
                      <td class="relay"></td>
                      <td class="hometeam">
                        <u>[5위]</u>
                        <span class="homeName">번리 FC (U23)</span>
                        <span id="odds" class="oddsUp">[1.76&nbsp;]</span>
                      </td>
                      <td>
                        <span class="score">
                          <span id="odds" class="oddsDown">[3.83&nbsp;]</span>
                        </span>
                      </td>
                      <td class="visitor">
                        <span id="odds" class="odds">[3.74&nbsp;]</span>
                        <span class="awayName">노팅엄 포레스트 FC (U23)</span>
                        <u>[11위]</u>
                      </td>
                      <td class="overall">

                      </td>
                      <td class="data">
                        <a onclick="javascript:window.open('/sports/score_record/soccer/?code=livescore11369832&amp;mode=Y','','width=930,height=800,scrollbars=yes,resizable=yes');" class="btn_data01 btn_tda" title="전적보기"></a>
                      </td>
                      <td class="btn_up_s"><a onclick="score_up(11369832)" class="btn_up btn_tda" title="UP"></a></td>
                    </tr> -->

                    </tbody>
                  </table>
                </div>
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
  var i = 0;
  $.ajax({
    url : "controller/ct_crolling.php",
    success : function(data) {
      $('#tbody').empty();
      var str = data;
      $("#tbody").append(str);
      $("#tbody").find('img').each(function(){
        $(this).remove();
        });
    }
  });
  setInterval(function () {
    $.ajax({
      url : "controller/ct_crolling.php",
      success : function(data) {
        $('#tbody').empty();
        var str = data;
        $("#tbody").append(str);
        $("#tbody").find('img').each(function(){
          $(this).remove();
          });
      }
    });
  }, 60000);

  // $.ajax({
  //   url : "controller/ct_crolling.php",
  //   success : function(data) {
  //     $('#tbody').empty();
  //     var str = data;
  //     $("#tbody").append(str);
  //   }
  // });


  $('input[name=checkbox]').remove();
  $('#bt_logout').on("click", function(evt) {
    evt.preventDefault();
    if(confirm("로그아웃 하시겠습니까?") == true){
      location.href="controller/ct_logout.php";
    }
  });

  $(".score_tr").find('img').each(function(){
    $(this).remove();
  });
});
</script>
