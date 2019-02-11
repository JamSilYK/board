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
      <div class="single-product-pr">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div id="myTabContent1" class="tab-content">
              <div class="product-tab-list tab-pane fade active in" id="single-tab1">
                <!-- <img src="img/product/bg-1.jpg" style="width:400px; height:400px;"alt=""> -->
                <img id="abc" onclick="changeimage()" style="width:400px; height:400px;" src="https://pixabay.com/static/uploads/photo/2015/02/13/09/47/mail-634902__180.png">
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            <section class="payProduct" style="text-align:left;">

              <h3 class="payProduct__heading" style="color:white; font-size:32px;">코인 상품 선택</h4>
              <ul class="payProduct__list">
                <li class="payProduct__item " data-currency="KRW" data-price="9900.0" style="margin-top:30px;">
                  <label class="lzRadio">
                    <input type="radio" name="idCoinProduct" value="10코인:1000">
                    <i>
                      <span class="payProduct__title" name="product_name" style="color:white; font-size:26px;">10코인</span>
                      <span class="payProduct__title" style="color:white; font-size:26px;">:</span>
                      <span class="payProduct__price" style="color:white; font-size:26px;">1,000원</span>
                    </i>
                  </label>
                </li>
                <li class="payProduct__item " data-currency="KRW" data-price="9900.0" style="margin-top:30px;">
                  <label class="lzRadio">
                    <input type="radio" name="idCoinProduct" value="20코인:2000">
                    <i>
                      <span class="payProduct__title" name="product_name" style="color:white; font-size:26px;">20코인</span>
                      <span class="payProduct__title" style="color:white; font-size:26px;">:</span>
                      <span class="payProduct__price" style="color:white; font-size:26px;">2,000원</span>
                    </i>
                  </label>
                </li>
                <li class="payProduct__item " data-currency="KRW" data-price="9900.0" style="margin-top:30px;">
                  <label class="lzRadio">
                    <input type="radio" name="idCoinProduct" value="30코인:3000">
                    <i>
                      <span class="payProduct__title" name="product_name" style="color:white; font-size:26px;">30코인</span>
                      <span class="payProduct__title" style="color:white; font-size:26px;">:</span>
                      <span class="payProduct__price" style="color:white; font-size:26px;">3,000원</span>
                    </i>
                  </label>
                </li>
                <li class="payProduct__item " data-currency="KRW" data-price="9900.0" style="margin-top:30px;">
                  <label class="lzRadio">
                    <input type="radio" name="idCoinProduct" value="40코인:4000">
                    <i>
                      <span class="payProduct__title" name="product_name" style="color:white; font-size:26px;">40코인</span>
                      <span class="payProduct__title" style="color:white; font-size:26px;">:</span>
                      <span class="payProduct__price" style="color:white; font-size:26px;">4,000원</span>
                    </i>
                  </label>
                </li>
              </ul>
            </section>
            <button type="button" id="bt_pay" name="button">결제</button>

          </div>
        </div>
      </div>
    </div>
  </div>


</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    IMP.init('imp46046241');
    $('#bt_logout').on("click", function(evt) {
      evt.preventDefault();
      if (confirm("로그아웃 하시겠습니까?") == true) {
        location.href = "controller/ct_logout.php";
      }
    });

    $('#bt_pay').on("click", function(evt) {
      evt.preventDefault();
      if (confirm("결제하시겠습니까?") == true) {
        var tmp = $(':input[name=idCoinProduct]:radio:checked').val();
        if(tmp != null){
          //alert(tmp);
          //40코인:4000
          var name = tmp.substring(0, 4); //상품명
          var coin = tmp.substring(0, 2); //코인개수
          var price = tmp.substring(5, 9); //상품 가격

              var IMP = window.IMP;
              IMP.request_pay({
              pg : 'html5_inicis', // version 1.1.0부터 지원.
              pay_method : 'card',
              merchant_uid : 'merchant_' + new Date().getTime(),
              name : name,
              amount : price,
              buyer_email : 'iamport@siot.do',
              buyer_name : '구매자이름',
              buyer_tel : '010-1234-5678',
              buyer_addr : '서울특별시 강남구 삼성동',
              buyer_postcode : '123-456',
              m_redirect_url : 'http://192.168.56.4/board/myinfo.php'
          }, function(rsp) {
              if ( rsp.success ) {
                  var msg = '결제가 완료되었습니다.';
                  //msg += '고유ID : ' + rsp.imp_uid;
                  //msg += '상점 거래ID : ' + rsp.merchant_uid;
                  msg += '결제 금액 : ' + rsp.paid_amount;
                  //msg += '카드 승인번호 : ' + rsp.apply_num;
                  $.ajax({
                    data : {
                        user_coin : coin
                    },
                    url : "controller/ct_coin_pay.php",
                    success : function(data) {


                    }
                  });
                }

                  else {
                  var msg = '결제에 실패하였습니다.';
                  msg += '에러내용 : ' + rsp.error_msg;
              }
              alert(msg);

          });
        }

        else {
          alert("포인트를 선택해주세요");
        }




        }
      });
  });
</script>
