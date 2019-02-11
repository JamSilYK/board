<?php
echo'시발~~';
 ?>



<script src="https://cdn.bootpay.co.kr/js/bootpay-2.0.12.min.js" type="application/javascript">
BootPay.request({
  price: '1000',
  application_id: "[ WEB SDK용 Application ID ]",
  name: '블링블링 마스카라',
  pg: 'kakao',
  method: 'easy',
  show_agree_window: 0,
  items: [
    {
      item_name: '나는 아이템',
      qty: 1,
      unique: '123',
      price: 1000,
      cat1: 'TOP',
      cat2: '티셔츠',
      cat3: '라운드 티',
    }
  ],
  user_info: {
    username: '사용자 이름',
    email: '사용자 이메일',
    addr: '사용자 주소',
    phone: '010-1234-4567'
  },
  order_id: '고유order_id_1234',
  params: {callback1: '그대로 콜백받을 변수 1', callback2: '그대로 콜백받을 변수 2', customvar1234: '변수명도 마음대로'},
  account_expire_at: '2018-05-25',
  extra: {
      expire_month: '12',
        vbank_result: 1,
        quota: '0,2,3'

  }
}).error(function (data) {
  //결제 진행시 에러가 발생하면 수행됩니다.
  console.log(data);
}).cancel(function (data) {
  //결제가 취소되면 수행됩니다.
  console.log(data);
}).ready(function (data) {
  // 가상계좌 입금 계좌번호가 발급되면 호출되는 함수입니다.
  console.log(data);
}).confirm(function (data) {
  //결제가 실행되기 전에 수행되며, 주로 재고를 확인하는 로직이 들어갑니다.
  //주의 - 카드 수기결제일 경우 이 부분이 실행되지 않습니다.
  console.log(data);
  if (is_somthing) { // 재고 수량 관리 로직 혹은 다른 처리
    this.transactionConfirm(data); // 조건이 맞으면 승인 처리를 한다.
  } else {
    this.removePaymentWindow(); // 조건이 맞지 않으면 결제 창을 닫고 결제를 승인하지 않는다.
  }
}).close(function (data) {
    // 결제창이 닫힐때 수행됩니다. (성공,실패,취소에 상관없이 모두 수행됨)
    console.log(data);
}).done(function (data) {
  //결제가 정상적으로 완료되면 수행됩니다
  //비즈니스 로직을 수행하기 전에 결제 유효성 검증을 하시길 추천합니다.
  console.log(data);
});

</script>
