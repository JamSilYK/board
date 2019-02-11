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
  <div class="all-content-wrapper" style="padding-top:50px;">
    <div class="container-fluid" >
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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

    <div class="ht-body-wrapper ht-layout ht-wrapper" style="background-color:#ffffff; margin-top:30px; margin-left:20px; margin-right:20px;" >
      <div class="container">
        <div class="ht-body-main ht-body-sidebar-">
          <div class="ht-content-wrap">
            <div class="ht-content responsive-list col-sm-12">
              <article id="post-93" class="post-93 page type-page status-publish hentry">
                <h3 style="margin-top:100px">게시글작성</h3>
                <div class="mb-mobile">
                  <div id="contact_board" class="mb-board">
                    <?php
                    if($_SESSION['modify_com_idx'] != null){
                      $com_idx = $_SESSION['modify_com_idx'];
                      $s=mysql_connect("localhost", "********", "*********") or die("실패ㅠㅠ");
                      mysql_select_db("board", $s);
                      $sql = "select * from community where com_idx = '$com_idx'";
                      $result = mysql_query($sql);
                      $data = mysql_fetch_array($result);
                      $com_title = "$data[com_title]";
                      $com_contents= "$data[com_contents]";
                      $com_date= "$data[com_date]";
                      $com_views= "$data[com_views]";
                      $user_idx= "$data[user_idx]";
                      $com_pass= "$data[com_pass]";

                    }

                     ?>

                    <form action="controller/ct_com_modify.php" method="post" id="Com_Form" class="form-horizontal">
                      <div class="mb-style1">
                        <div class="main-style1" id="contact_board_box">
                          <div>
                            <div class="pull-right">
                            </div>
                            <div class="clear"></div>
                          </div>
                          <table cellspacing="0" cellpadding="0" border="0" id="" class="table table-write" style="margin-top:50px">
                            <colgroup>
                              <col style="width:20%">
                              <col>
                            </colgroup>
                            <tbody>
                              <tr id="mb_contact_tr_email">
                                <th scope="row">
                                  <label for="mb_contact_i_email">비밀번호(*)</label>
                                </th>
                                <td>
                                  <!-- <input style="width:200px;" name="com_pass" id="com_pass" type="password" maxlength="50" placeholder=""> -->
                                  <?php echo '<input style="width:200px;" name="com_pass" id="com_pass" type="password" maxlength="50" value="' . htmlspecialchars($com_pass) . '">'; ?>
                                </td>
                              </tr>
                              <tr id="mb_contact_tr_title">
                                <th scope="row">
                                  <label for="mb_contact_i_title">제목(*)</label>
                                </th>
                                <td>
                                  <?php echo '<input class="text-left" style="width:99%;"id="com_title" name="com_title" type="text" value="' . htmlspecialchars($com_title) . '">'; ?>
                                  <!-- <input class="text-left" style="width:99%;"id="com_title" name="com_title" type="text" placeholder=""> -->
                                </td>
                              </tr>
                              <tr id="mb_contact_tr_content">
                                <td class="content-box" colspan="2">
                                  <input type="hidden" name="data_type" id="data_type" value="html">
                                  <textarea class="content" style="width: 100%; height: 360px;" id="com_contents" name="com_contents" title="내용"><?php echo htmlspecialchars($com_contents); ?></textarea>
                                </td>
                              </tr>
                              <tr id="mb_contact_tr_file1">
                                <th scope="row">

                                </th>
                                <td>

                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="write-btn">
                          <div class="btn-box-right" id="contact_btn_box">
                            <div class="btn-box-left" style="text-align:center;">
                              <a class="btn btn-default"id="bt_cancel">목록</a>
                              <button class="btn btn-default" id="bt_send">수정</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="mb-social-empty-box">

                </div>
                <div class="mb-social mb-social-sharing clear" style="text-align:right">
                  <div class="" style="height:50px">

                  </div>


                </div>

              </article>
            </div>
          </div><!-- end ht-content-wrap -->

        </div>
        <div class="clear"></div>
      </div><!-- end container -->
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

    $('#bt_cancel').on("click", function(evt) {
      evt.preventDefault();
      location.href = "community_list.php";
    });


  });
</script>
