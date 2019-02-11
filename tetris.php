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
include ("../simple_html_dom.php");
?>

<?php
$s=mysql_connect("localhost", "********", "*********") or die("실패ㅠㅠ");
mysql_select_db("board", $s);
$user_idx = $_SESSION["user_idx"];
$result = mysql_query("SELECT * FROM user where user_idx = '$user_idx'");
$data = mysql_fetch_array($result);
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

    <div class="mailbox-area mg-tb-15" style="margin-left:15px; margin-right:15px;">
      <div class="single-product-pr" style="text-align:center;">
        <div class="tetris_head">
          <h1 style="color:white;">테트리스</h1>
        </div>
        <div class="tetris_body">
          <audio id="clearsound" src="sound/pop.ogg" preload="auto"></audio>
          <canvas width='300' height='600' style="background-color:black;"></canvas>
          <script src='js/tetris.js'></script>
          <script src='js/controller.js'></script>
          <script src='js/render.js'></script>
        </div>
        <div class="tetris_footer" style="margin-top:20px;">
          <button class="btn btn-success" id="playbutton" onclick="playButtonClicked();">Play</button>
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

    $('#bt_save').on("click", function(evt) {
			evt.preventDefault();
      if(confirm("결제하시겠습니까?") == true){
        location.href="coin_charge.php";
      }
    });
  });
</script>
