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
require_once('dbconfig.php');
?>
<link rel="stylesheet" href="https://livescore.co.kr/css/default.css?2017070712">

<body>
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <div class="container-fluid" >
      <div class="row" >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="logo-pro" style="height:60px;">

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
        <div class="hpanel email-compose mg-b-15">
          <div class="panel-heading hbuilt">
            <div class="p-xs">
              <form action="controller/ct_com_regist.php" method="post" id="Com_Form" class="form-horizontal">
                <div id="bo_v">
                	<div class="view_head_wrap">
                		<div class="view_head">
                      <span class="sv_wrap" style="margin-left:5px;">
                        <h4>제목 :</h4>
                      </span>
                      <span class="sv_wrap">
                        <?php
                        $com_idx = $_GET['com_idx'];
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
                        $_SESSION['modify_com_idx'] = $com_idx;
                        $my_user_idx = $_SESSION['user_idx'];
                        $up_com_views = (int)$com_views + 1;
                        $query = "UPDATE community SET com_views='$up_com_views' WHERE com_idx=$com_idx ";
                        $result = mysql_query($query);

                        mysql_select_db("board", $s);
                        $user_sql = "select * from user where user_idx = '$user_idx'";
                        $user_result = mysql_query($user_sql);
                        $user_data = mysql_fetch_array($user_result);
                        $user_name = "$user_data[user_name]";

                         ?>
                        <?php echo '<h4>' . htmlspecialchars($com_title) . '</h4>'; ?>
                      </span>
                		     <div class="view_info_wrap">
                				    <div class="writer_name">
                              <span class="sv_wrap"><h5>작성자 :</h5></span>
                					     <span class="sv_wrap">
                                 <?php echo '<h5>' . htmlspecialchars($user_name) . '</h5>'; ?>

                               </span>
                             </div>
                				     <div class="view_info">작성일
                               <?php echo '<b>' . htmlspecialchars($com_date) . '</b>'; ?>

                               <em>|</em> 조회
                               <?php echo '<b>' . htmlspecialchars($com_views+1) . '</b>'; ?>
                            </div>
                			  </div>
                		</div>
                	</div>
                	<hr>
                  <div id="bo_v_atc">
                    <?php echo '<p>' . htmlspecialchars($com_contents) . '</p>'; ?>

                  </div>
                	<hr>
                  <div id="bo_v_bot" style="text-align:center">
                      <button type="button" id="bt_list" class="btn btn-primary" name="button">목록</button>
                      <?php
                      if($user_idx == $my_user_idx){
                        echo '<button type="button" id="bt_modify" class="btn btn-danger" name="button">수정</button>';
                        echo '<button type="button" id="bt_del" class="btn btn-success" style="margin-left:3px;"name="button">삭제</button>';
                      }
                       ?>
                      <!-- <button type="button" id="bt_modify" style="display:" name="button">수정</button>
                      <button type="button" id="bt_del" name="button">삭제</button> -->
                    </div>
                    <hr>
                  </div>
                </form>
                <div class="comment_div" style="">
                  <ul class="cmt-list-box list-unstyled">
                    <?php
                    $comment_sql = "select * from comment where com_idx = '$com_idx'";
                  	$comment_result = $db->query($comment_sql);

                    while($comment_row = $comment_result->fetch_assoc()){
                      $comment_idx = $comment_row['comment_idx'];
                      $comment_contents = $comment_row['comment_contents'];
                      $comment_date = $comment_row['comment_date'];
                      $comment_user_idx = $comment_row['user_idx'];
                      $user_name = $comment_row['user_name'];
                     ?>
                    <li id="mb_cmt96" class="cmt-list-item">
                      <div>
                        <span class="cmt-name">
                          <span class="btn-user-info">
                            <span style="color:blue;"><?php  echo "$user_name"?></span>
                          </span>
                        </span>
                        <span class="cmt-date" style="margin-left:10px;"><?php  echo "$comment_date"?></span>
                      </div>
                      <div class="cmt-content" style="margin-top:20px; margin-left:10px;"><?php  echo "$comment_contents"?></div>

                      <div class="cmt-content" style="margin-top:5px; margin-left:50px; margin-bottom:5px;">
                        <ul class="cmt-list-box list-unstyled">
                          <?php
                          $recomment_sql = "SELECT * FROM recomment WHERE comment_idx = '$comment_idx'";

                          $recomment_result = $db->query($recomment_sql);

                          while($recomment_row = $recomment_result->fetch_assoc()){
                           ?>

                          <li class="cmt-list-item" style="margin-top:10px;" >
                            <span style="color:blue">ㄴ</span>
                            <span style="color:blue"><?php echo $recomment_row['user_name']; ?></span>
                            <span style="margin-left:10px;"><?php echo $recomment_row['recomment_contents']; ?></span>
                            <span style="margin-left:40px;"><?php echo $recomment_row['recomment_date']; ?></span>

                            <span>
                              <?php
                              if($my_user_idx == $recomment_row['user_idx']){
                                echo '<button name="bt_recomment_del" value="' . htmlspecialchars($recomment_row['recomment_idx']) . '">' . '삭제' . '</button>';
                              }
                               ?>

                            </span>
                          </li>
                          <?php
                        }
                           ?>
                        </ul>
                      </div>
                      <?php

                      echo '<textarea class="' . htmlspecialchars($comment_idx) . '" style="margin-left:60px; margin-top:10px; display:none;" name="recomment_contents" rows="3" cols="50" id="' . htmlspecialchars($comment_idx) . '"></textarea>';
                      echo '<div>';
                      echo '<button name="bt_recomment_send" style="margin-left:60px; display:none;" class="' . htmlspecialchars($comment_idx) . '" value="' . htmlspecialchars($comment_idx) . '">' . '<span>댓글 달기</span>' . '</button>';
                      echo '</div>';
                       ?>
                      <div class="btn-box-right" style="text-align:right; margin-top:10px;">
                        <?php
                        if($comment_user_idx == $my_user_idx){
                          echo '<button class="btn btn-default" name="bt_delete" value="' . htmlspecialchars($comment_idx) . '">' . '<span>삭제</span>' . '</button>';
                          echo '<button class="btn btn-default" name="bt_recomment" value="' . htmlspecialchars($comment_idx) . '">' . '<span>답글</span>' . '</button>';
                        }

                        else {
                          echo '<button class="btn btn-default" name="bt_recomment" value="' . htmlspecialchars($comment_idx) . '">' . '<span>답글</span>' . '</button>';
                        }
                         ?>
                         <!-- <button button class="btn btn-default" value="">
                           <span>삭제</span>
                         </button> -->

                      </div>
                      <div id="mb_comment_reply2" class="cmt-reply-box">
                        <hr>
                      </div>
                    </li>
                    <?php
                  }
                     ?>
                  </ul>
                </div>

              </div>


              <table cellspacing="0" cellpadding="0" border="0" id="" class="table table-comment">
                <colgroup>
                  <col style="width:20%"><col>
                </colgroup>
                <tbody>
                  <tr>
                    <th scope="row">
                      <label for="mb_board1_i_content">내용(*)</label>
                    </th>
                    <td>
                      <textarea class="mb-comment-content col-md-12" name="content" id="cm_content" style="height:100px;"></textarea>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">
                    </th>
                    <td>
                      <div class="" style="">
                        <button type="button" name="button" id="bt_cm">댓글 달기</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <?php
            $my_user_name = $_SESSION['user_name'];
            echo '<input type="hidden" id="user_idx" value="' . htmlspecialchars($my_user_idx) . '">';
            echo '<input type="hidden" id="user_name" value="' . htmlspecialchars($my_user_name) . '">';
             ?>
        </div>
      </div>
    </div>
  </div>

</body>
<?php echo '<input type="hidden" id="com_idx" class="no" value="' . htmlspecialchars($com_idx) . '">'; ?>
<?php echo '<input type="hidden" id="com_pass" class="no" value="' . htmlspecialchars($com_pass) . '">'; ?>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {

  $('#bt_cm').on("click", function(evt) {
    evt.preventDefault();
    var content = $('#cm_content').val();
    var user_idx = $('#user_idx').val();
    var user_name = $('#user_name').val();
    var com_idx = $('#com_idx').val();
    $.ajax({
        data : {
            content : content,
            user_idx : user_idx,
            user_name : user_name,
            com_idx : com_idx
        },
        url : "controller/ct_comment.php",
        success : function(data) {
          $('#cm_content').val("");
          location.href="community_read.php?com_idx="+com_idx;
        }
    });
  });

  $('button[name=bt_recomment_del]').on("click", function(evt) { //댓글삭제
    evt.preventDefault();
    var recomment_idx = $(this).val();
    var com_idx = $('#com_idx').val();

    if(confirm("댓글을 삭제하시겠습니까?")){
      $.ajax({
          data : {
              recomment_idx : recomment_idx
          },
          url : "controller/ct_recomment_del.php",
          success : function(data) {
            alert("정상적으로 삭제되었습니다.");
            location.href="community_read.php?com_idx="+com_idx;


          }
      });
    }
  });

  $('button[name=bt_delete]').on("click", function(evt) { //댓글삭제
    evt.preventDefault();
    var comment_idx = $(this).val();
    var com_idx = $('#com_idx').val();
    if(confirm("댓글을 삭제하시겠습니까?")){
      $.ajax({
          data : {
              comment_idx : comment_idx
          },
          url : "controller/ct_comment_del.php",
          success : function(data) {
            if(data == "0"){
              $('#cm_content').val("");
              location.href="community_read.php?com_idx="+com_idx;
            }

          }
      });
    }
  });

  $('button[name=bt_recomment]').on("click", function(evt) { //대댓글 답글 버튼
    evt.preventDefault();
    var com_idx = $(this).val();
    $('.'+com_idx).css("display", "block");
  });

  $('button[name=bt_recomment_send]').on("click", function(evt) { //대댓글 등록 버튼
    evt.preventDefault();
    var comment_idx = $(this).val();
    var user_idx = $('#user_idx').val();
    var user_name = $('#user_name').val();
    var com_idx = $('#com_idx').val();
    var contents = $('#'+comment_idx).val();
    if(contents == ""){
      alert("댓글을 입력해주세요");
    }
    else {

      $.ajax({
          data : {
              comment_idx : comment_idx,
              user_idx : user_idx,
              user_name : user_name,
              com_idx : com_idx,
              contents : contents
          },
          url : "controller/ct_recomment.php",
          success : function(data) {
            if(data == "0"){
              $('#'+comment_idx).val("");
              location.href="community_read.php?com_idx="+com_idx;
            }


          }
      });
    }

  });




  $('#bt_logout').on("click", function(evt) {
    evt.preventDefault();
    if(confirm("로그아웃 하시겠습니까?") == true){
      location.href="controller/ct_logout.php";
    }
  });

    $('#bt_list').on("click", function(evt) {
      evt.preventDefault();
      location.href="community_list.php";
      });

    $('#bt_modify').on("click", function(evt) {
      evt.preventDefault();
      if(confirm("정말 수정하시겠습니까?") == true){
          location.href="community_modify.php";
      }

      });

    $('#bt_del').on("click", function(evt) {
      evt.preventDefault();
      var com_idx = $('#com_idx').val();
      var com_pass = $('#com_pass').val();
      if(confirm("정말 삭제하시겠습니까?") == true){
        if(prompt("비밀번호를 입력해주세요") == com_pass){
          $.ajax({
              data : {
                  com_idx : com_idx
              },
              url : "controller/community_del.php",
              success : function(data) {
                if($.trim(data) == 0 && com_idx != null){ //아이디가 있을 때
                  alert("정상적으로 삭제되었습니다.")
                  location.href="community_list.php";
                }

                else {
                  alert("삭제실패");
                }

              }
          });
        }

        else {
          alert("비밀번호가 틀렸습니다");
        }


      }
      // var inputString = prompt('비밀번호 : ');

      });

//       function CheckPwd() {
//        msgWindow=window.open("","displayWindow","height=150,width=400");
//        msgWindow.document.write("<HEAD><TITLE>Password required</TITLE></HEAD>")
//        msgWindow.document.write("<BODY bgcolor='gray'><FORM formpwd><table><tr><td>Your name:</td><td><input type=text size=20></td></tr>");
//        msgWindow.document.write("<tr><td>Your password:</td><td><input type=password size=20></td></tr>");
//        msgWindow.document.write("<tr><td COLSPAN=2 ALIGN=CENTER><input type=button value=' OK '>&nbsp;&nbsp;<input type=button value=' Cancel '></td></tr></table></form>");
//        return msgWindow;
// }


		});





</script>
