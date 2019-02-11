<?php
session_start();
if($_SESSION["user_email"] == null){
  echo("<script>location.href='../login.php';</script>");
}
?>
<!doctype html>
<html class="no-js" lang="en">
<?php
include 'include/head.php';
include 'include/left_nav.php';
include 'include/jq.php';
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
                      <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                        <i class="icon nalika-menu-task"></i>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
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
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 mg-b-15">
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Refresh</button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-exclamation"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-check"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-tag"></i></button>
                    </div>
                  </div>
                  <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 mailbox-pagination mg-b-15">
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-arrow-right"></i></button>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover table-mailbox">
                    <tbody>
                      <tr class="score_tr " id="11311968" alt="np" rel="16">
                        <td class="game" name="CZE U21" bgcolor="#8811CC">CZE U21</td>
                        <td><input type="checkbox" name="checkbox" value="11311968"></td>
                        <td class="stime"> 19:00 </td><td class="situation">전반종료</td>
                        <td class="relay"><a class="btn_relay" onclick="javascript:set_gamecast('11311968')"> <b>상황중계</b></a></td>
                        <td class="hometeam"><u>[10위]</u><span class="homeName">슬라비아 프라하 (U21)</span></td>
                        <td><span class="score">0-<b>2</b></span></td>
                        <td class="visitor"><span class="awayName">FC 흐라데츠크랄로베 (U21)</span><u>[8위]</u></td>
                        <td class="overall">  </td>
                        <td class="data"><a onclick="javascript:window.open('/sports/score_record/soccer/?code=livescore11311968&amp;mode=Y','','width=930,height=800,scrollbars=yes,resizable=yes');" class="btn_data01 btn_tda" title="전적보기"></a><!--<a href="#" class="btn_data02 btn_tda" title="응원하기"></a>--></td>
                        <td class="btn_up_s"><a onclick="score_up(11311968)" class="btn_up btn_tda" title="UP"></a></td>
                      </tr>
                      <tr class="score_tr " id="11311968" alt="np" rel="16">
                        <td class="game" name="CZE U21" bgcolor="#8811CC">CZE U21</td>
                        <td><input type="checkbox" name="checkbox" value="11311968"></td>
                        <td class="stime"> 19:00 </td><td class="situation">전반종료</td>
                        <td class="relay"><a class="btn_relay" onclick="javascript:set_gamecast('11311968')"> <b>상황중계</b></a></td>
                        <td class="hometeam"><u>[10위]</u><span class="homeName">슬라비아 프라하 (U21)</span></td>
                        <td><span class="score">0-<b>2</b></span></td>
                        <td class="visitor"><span class="awayName">FC 흐라데츠크랄로베 (U21)</span><u>[8위]</u></td>
                        <td class="overall">  </td>
                        <td class="data"><a onclick="javascript:window.open('/sports/score_record/soccer/?code=livescore11311968&amp;mode=Y','','width=930,height=800,scrollbars=yes,resizable=yes');" class="btn_data01 btn_tda" title="전적보기"></a><!--<a href="#" class="btn_data02 btn_tda" title="응원하기"></a>--></td>
                        <td class="btn_up_s"><a onclick="score_up(11311968)" class="btn_up btn_tda" title="UP"></a></td>
                      </tr>
                      <tr class="score_tr " id="11311968" alt="np" rel="16">
                        <td class="game" name="CZE U21" bgcolor="#8811CC">CZE U21</td>
                        <td><input type="checkbox" name="checkbox" value="11311968"></td>
                        <td class="stime"> 19:00 </td><td class="situation">전반종료</td>
                        <td class="relay"><a class="btn_relay" onclick="javascript:set_gamecast('11311968')"> <b>상황중계</b></a></td>
                        <td class="hometeam"><u>[10위]</u><span class="homeName">슬라비아 프라하 (U21)</span></td>
                        <td><span class="score">0-<b>2</b></span></td>
                        <td class="visitor"><span class="awayName">FC 흐라데츠크랄로베 (U21)</span><u>[8위]</u></td>
                        <td class="overall">  </td>
                        <td class="data"><a onclick="javascript:window.open('/sports/score_record/soccer/?code=livescore11311968&amp;mode=Y','','width=930,height=800,scrollbars=yes,resizable=yes');" class="btn_data01 btn_tda" title="전적보기"></a><!--<a href="#" class="btn_data02 btn_tda" title="응원하기"></a>--></td>
                        <td class="btn_up_s"><a onclick="score_up(11311968)" class="btn_up btn_tda" title="UP"></a></td>
                      </tr>
                      <tr class="score_tr " id="11311968" alt="np" rel="16">
                        <td class="game" name="CZE U21" bgcolor="#8811CC">CZE U21</td>
                        <td><input type="checkbox" name="checkbox" value="11311968"></td>
                        <td class="stime"> 19:00 </td><td class="situation">전반종료</td>
                        <td class="relay"><a class="btn_relay" onclick="javascript:set_gamecast('11311968')"> <b>상황중계</b></a></td>
                        <td class="hometeam"><u>[10위]</u><span class="homeName">슬라비아 프라하 (U21)</span></td>
                        <td><span class="score">0-<b>2</b></span></td>
                        <td class="visitor"><span class="awayName">FC 흐라데츠크랄로베 (U21)</span><u>[8위]</u></td>
                        <td class="overall">  </td>
                        <td class="data"><a onclick="javascript:window.open('/sports/score_record/soccer/?code=livescore11311968&amp;mode=Y','','width=930,height=800,scrollbars=yes,resizable=yes');" class="btn_data01 btn_tda" title="전적보기"></a><!--<a href="#" class="btn_data02 btn_tda" title="응원하기"></a>--></td>
                        <td class="btn_up_s"><a onclick="score_up(11311968)" class="btn_up btn_tda" title="UP"></a></td>
                      </tr>
                      <tr class="score_tr " id="11311968" alt="np" rel="16">
                        <td class="game" name="CZE U21" bgcolor="#8811CC">CZE U21</td>
                        <td><input type="checkbox" name="checkbox" value="11311968"></td>
                        <td class="stime"> 19:00 </td><td class="situation">전반종료</td>
                        <td class="relay"><a class="btn_relay" onclick="javascript:set_gamecast('11311968')"> <b>상황중계</b></a></td>
                        <td class="hometeam"><u>[10위]</u><span class="homeName">슬라비아 프라하 (U21)</span></td>
                        <td><span class="score">0-<b>2</b></span></td>
                        <td class="visitor"><span class="awayName">FC 흐라데츠크랄로베 (U21)</span><u>[8위]</u></td>
                        <td class="overall">  </td>
                        <td class="data"><a onclick="javascript:window.open('/sports/score_record/soccer/?code=livescore11311968&amp;mode=Y','','width=930,height=800,scrollbars=yes,resizable=yes');" class="btn_data01 btn_tda" title="전적보기"></a><!--<a href="#" class="btn_data02 btn_tda" title="응원하기"></a>--></td>
                        <td class="btn_up_s"><a onclick="score_up(11311968)" class="btn_up btn_tda" title="UP"></a></td>
                      </tr>
                      <tr class="score_tr " id="11311968" alt="np" rel="16">
                        <td class="game" name="CZE U21" bgcolor="#8811CC">CZE U21</td>
                        <td><input type="checkbox" name="checkbox" value="11311968"></td>
                        <td class="stime"> 19:00 </td><td class="situation">전반종료</td>
                        <td class="relay"><a class="btn_relay" onclick="javascript:set_gamecast('11311968')"> <b>상황중계</b></a></td>
                        <td class="hometeam"><u>[10위]</u><span class="homeName">슬라비아 프라하 (U21)</span></td>
                        <td><span class="score">0-<b>2</b></span></td>
                        <td class="visitor"><span class="awayName">FC 흐라데츠크랄로베 (U21)</span><u>[8위]</u></td>
                        <td class="overall">  </td>
                        <td class="data"><a onclick="javascript:window.open('/sports/score_record/soccer/?code=livescore11311968&amp;mode=Y','','width=930,height=800,scrollbars=yes,resizable=yes');" class="btn_data01 btn_tda" title="전적보기"></a><!--<a href="#" class="btn_data02 btn_tda" title="응원하기"></a>--></td>
                        <td class="btn_up_s"><a onclick="score_up(11311968)" class="btn_up btn_tda" title="UP"></a></td>
                      </tr>
                      <tr class="score_tr " id="11311968" alt="np" rel="16">
                        <td class="game" name="CZE U21" bgcolor="#8811CC">CZE U21</td>
                        <td><input type="checkbox" name="checkbox" value="11311968"></td>
                        <td class="stime"> 19:00 </td><td class="situation">전반종료</td>
                        <td class="relay"><a class="btn_relay" onclick="javascript:set_gamecast('11311968')"> <b>상황중계</b></a></td>
                        <td class="hometeam"><u>[10위]</u><span class="homeName">슬라비아 프라하 (U21)</span></td>
                        <td><span class="score">0-<b>2</b></span></td>
                        <td class="visitor"><span class="awayName">FC 흐라데츠크랄로베 (U21)</span><u>[8위]</u></td>
                        <td class="overall">  </td>
                        <td class="data"><a onclick="javascript:window.open('/sports/score_record/soccer/?code=livescore11311968&amp;mode=Y','','width=930,height=800,scrollbars=yes,resizable=yes');" class="btn_data01 btn_tda" title="전적보기"></a><!--<a href="#" class="btn_data02 btn_tda" title="응원하기"></a>--></td>
                        <td class="btn_up_s"><a onclick="score_up(11311968)" class="btn_up btn_tda" title="UP"></a></td>
                      </tr>
                      <tr class="score_tr " id="11311968" alt="np" rel="16">
                        <td class="game" name="CZE U21" bgcolor="#8811CC">CZE U21</td>
                        <td><input type="checkbox" name="checkbox" value="11311968"></td>
                        <td class="stime"> 19:00 </td><td class="situation">전반종료</td>
                        <td class="relay"><a class="btn_relay" onclick="javascript:set_gamecast('11311968')"> <b>상황중계</b></a></td>
                        <td class="hometeam"><u>[10위]</u><span class="homeName">슬라비아 프라하 (U21)</span></td>
                        <td><span class="score">0-<b>2</b></span></td>
                        <td class="visitor"><span class="awayName">FC 흐라데츠크랄로베 (U21)</span><u>[8위]</u></td>
                        <td class="overall">  </td>
                        <td class="data"><a onclick="javascript:window.open('/sports/score_record/soccer/?code=livescore11311968&amp;mode=Y','','width=930,height=800,scrollbars=yes,resizable=yes');" class="btn_data01 btn_tda" title="전적보기"></a><!--<a href="#" class="btn_data02 btn_tda" title="응원하기"></a>--></td>
                        <td class="btn_up_s"><a onclick="score_up(11311968)" class="btn_up btn_tda" title="UP"></a></td>
                      </tr>
                      <tr class="score_tr " id="11311968" alt="np" rel="16">
                        <td class="game" name="CZE U21" bgcolor="#8811CC">CZE U21</td>
                        <td><input type="checkbox" name="checkbox" value="11311968"></td>
                        <td class="stime"> 19:00 </td><td class="situation">전반종료</td>
                        <td class="relay"><a class="btn_relay" onclick="javascript:set_gamecast('11311968')"> <b>상황중계</b></a></td>
                        <td class="hometeam"><u>[10위]</u><span class="homeName">슬라비아 프라하 (U21)</span></td>
                        <td><span class="score">0-<b>2</b></span></td>
                        <td class="visitor"><span class="awayName">FC 흐라데츠크랄로베 (U21)</span><u>[8위]</u></td>
                        <td class="overall">  </td>
                        <td class="data"><a onclick="javascript:window.open('/sports/score_record/soccer/?code=livescore11311968&amp;mode=Y','','width=930,height=800,scrollbars=yes,resizable=yes');" class="btn_data01 btn_tda" title="전적보기"></a><!--<a href="#" class="btn_data02 btn_tda" title="응원하기"></a>--></td>
                        <td class="btn_up_s"><a onclick="score_up(11311968)" class="btn_up btn_tda" title="UP"></a></td>
                      </tr>
                      <tr class="score_tr " id="11311968" alt="np" rel="16">
                        <td class="game" name="CZE U21" bgcolor="#8811CC">CZE U21</td>
                        <td><input type="checkbox" name="checkbox" value="11311968"></td>
                        <td class="stime"> 19:00 </td><td class="situation">전반종료</td>
                        <td class="relay"><a class="btn_relay" onclick="javascript:set_gamecast('11311968')"> <b>상황중계</b></a></td>
                        <td class="hometeam"><u>[10위]</u><span class="homeName">슬라비아 프라하 (U21)</span></td>
                        <td><span class="score">0-<b>2</b></span></td>
                        <td class="visitor"><span class="awayName">FC 흐라데츠크랄로베 (U21)</span><u>[8위]</u></td>
                        <td class="overall">  </td>
                        <td class="data"><a onclick="javascript:window.open('/sports/score_record/soccer/?code=livescore11311968&amp;mode=Y','','width=930,height=800,scrollbars=yes,resizable=yes');" class="btn_data01 btn_tda" title="전적보기"></a><!--<a href="#" class="btn_data02 btn_tda" title="응원하기"></a>--></td>
                        <td class="btn_up_s"><a onclick="score_up(11311968)" class="btn_up btn_tda" title="UP"></a></td>
                      </tr>
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
