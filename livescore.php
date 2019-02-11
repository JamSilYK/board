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
                  <!-- <table class="table table-hover table-mailbox">
                    <tbody>
                      <th colspan="11" style="text-align:center; height:50px; background-color:white;"><h3 class="th_cal">2018-11-14</h3></th> -->
                      <?php
                      $html = file_get_html('http://www.spojoy.com/live/?mct=soccer');
                      $ret2 = $html->find('div[id=ScheduleBox]');

                      foreach ($ret2 as $key => $value) {
                          echo $value;
                      }
                      ?>



                    <!-- </tbody>
                  </table> -->
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
    $('#bt_logout').on("click", function(evt) {
         evt.preventDefault();
      if(confirm("로그아웃 하시겠습니까?") == true){
        location.href="controller/ct_logout.php";
      }
    });

    $('#sms').on("click", function(evt) {
         evt.preventDefault();
      if(confirm("로그아웃 하시겠습니까?") == true){
        location.href="controller/ct_logout.php";
      }
    });

    $('#ScheduleBox').css('text-align','center');

    $("#ScheduleBox").find('img').each(function(){
      $(this).remove();

      });

  });
</script>
