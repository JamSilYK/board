<?php
session_start();
if($_SESSION["user_email"] == null){
  // echo("<script>location.href='login.php';</script>");
}
?>
<?php

	require_once("dbconfig.php");

	/* 페이징 시작 */

	//페이지 get 변수가 있다면 받아오고, 없다면 1페이지를 보여준다.

	if(isset($_GET['page'])) {

		$page = $_GET['page'];

	} else {

		$page = 1;

	}



	$sql = 'select count(*) as cnt from community order by com_idx desc'; //열 개수를 가지고 오는 쿼리

	$result = $db->query($sql);

	$row = $result->fetch_assoc();



	$allPost = $row['cnt']; //전체 게시글의 수

	$onePage = 10; // 한 페이지에 보여줄 게시글의 수.

	$allPage = ceil($allPost / $onePage); //전체 페이지의 수



	if($page < 1 || ($allPage && $page > $allPage)) {

?>

		<script>

			alert("존재하지 않는 페이지입니다.");

			history.back();

		</script>

<?php

		exit;

	}



	$oneSection = 5; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)

	$currentSection = ceil($page / $oneSection); //현재 섹션

	$allSection = ceil($allPage / $oneSection); //전체 섹션의 수



	$firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지
  $tmp = $firstPage;



	if($currentSection == $allSection) {

		$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.

	} else {

		$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지

	}



	$prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.

	$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.



	$paging = '<ul class="pagination">'; // 페이징을 저장할 변수



	//첫 페이지가 아니라면 처음 버튼을 생성

	if($page != 1) {

		$paging .= '<li class="page-item"><a href="community_list.php?page=1">처음</a></li>';

	}

	//첫 섹션이 아니라면 이전 버튼을 생성

	if($currentSection != 1) {

		$paging .= '<li class="page-item"><a href="community_list.php?page=' . $prevPage . '">이전</a></li>';


	}


	for($i = $firstPage; $i <= $lastPage; $i++) {

		if($i == $page) {

			$paging .= '<li class="page-item"><a style="color:red">' . $i . '</a></li>';

		} else {

			$paging .= '<li class="page-item"><a href="community_list.php?page=' . $i . '">' . $i . '</a></li>';

		}

	}



	//마지막 섹션이 아니라면 다음 버튼을 생성

	if($currentSection != $allSection) {

		$paging .= '<li class="page-item"><a href="community_list.php?page=' . $nextPage . '">다음</a></li>';

	}
	//마지막 페이지가 아니라면 끝 버튼을 생성

	if($page != $allPage) {
		$paging .= '<li class="page-item"><a href="community_list.php?page=' . $allPage . '">끝</a></li>';
	}
	$paging .= '</ul>';

	/* 페이징 끝 */
	$currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
	$sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; //limit sql 구문
	$sql = 'select * from community order by com_idx desc' . $sqlLimit; //원하는 개수만큼 가져온다. (0번째부터 20번째까지
	$result = $db->query($sql);
?>

<!doctype html>
<html class="no-js" lang="en">
<?php
require_once('dbconfig.php');
include 'include/head.php';
include 'include/left_nav.php';
include 'include/jq.php';
?>
<body>
<!-- Start Welcome area -->
  <div class="all-content-wrapper">
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
                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="header-top-menu tabl-d-n hd-search-rp" style="text-align:right;">
                      <!-- <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn" style="background-color:red;">
                        logout
                      </button> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" style="background-color:#152036">
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
                              <button class="btn btn-default btn-sm" id="bt_write"><i class="fa fa-tag"></i></button>
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
                          <table class="table table-hover table-mailbox, col-md-12">
                            <tbody>
                              <tr>
                                <th class="col-md-1" style="text-align:left">번호</th>
                                <th class="col-md-2" style="text-align:left">작성자</th>
                                <th class="col-md-5" style="text-align:left">제목</a></th>
                                <th class="col-md-3" style="text-align:center">날짜</th>
                                <td class="col-md-1" style="text-align:center"><i class="fa fa-eye"></i></td>
                              </tr>
                              <?php
                              $tmp_no = $page * 10 -9;

                    						while($row = $result->fetch_assoc()){
                                  $a = $row['user_idx'];
                                  $s=mysql_connect("localhost", "*******", "*******") or die("실패ㅠㅠ");
                                  mysql_select_db("board", $s);
                                  $user_sql = "select * from user where user_idx = '$a'";
                                  $user_result = mysql_query($user_sql);
                                  $data = mysql_fetch_array($user_result);

                                  //"select * from user where user_email = '$user_email' and user_password = '$user_password'";


                                  //$user_sql = "SELECT * FROM user WHERE user_idx = '$row['user_idx']'"; //안되면 확인
                                  //
                                  // $data = mysql_fetch_array($user_result);
                              ?>
                              <?php echo '<tr class="list" onclick="document.location.href='. "'" . 'community_read.php?com_idx='.htmlspecialchars($row['com_idx']) . "'" . '"' . '>' ?>
                                <?php echo '<input type="hidden" name="idtest" class="no" value="' . htmlspecialchars($row['com_idx']) . '">'; ?>
                                <td class="col-md-1, td" style="text-align:left"><?php echo $tmp_no?></th>
                                <td class="col-md-2, td" style="text-align:left"><?php echo $data['user_name']?></th>
                                <td class="col-md-6, td" style="text-align:left"><?php echo $row['com_title']?></th>
                                <td class="col-md-3, td" style="text-align:center"><?php echo $row['com_date']?></th>
                                <td class="col-md-1, td" style="text-align:center"><?php echo $row['com_views']?></td>
                              </tr>
                              <?php
                              $tmp_no++;
        						              }
                                  ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="panel-footer">
                        <div class="custom-pagination">
                          <div class="paging">
                    				<?php echo $paging ?>
                            <!-- <ul class="pagination">
            									<li class="page-item"><a class="page-link" href="#">1</a></li>
            									<li class="page-item"><a class="page-link" href="#">2</a></li>
            									<li class="page-item"><a class="page-link" href="#">3</a></li>
            									<li class="page-item"><a class="page-link" href="#">Next</a></li>
            								</ul> -->
                    			</div>



                        </div>
                      </div>
                    </div>
                  </div>
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
    $('#bt_write').on("click", function(evt) {
			evt.preventDefault();
      location.href="community_write.php";

  });

  $('#bt_logout').on("click", function(evt) {
    evt.preventDefault();
    if(confirm("로그아웃 하시겠습니까?") == true){
      location.href="controller/ct_logout.php";
    }
  });
});
</script>
