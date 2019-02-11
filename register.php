<!doctype html>
<html class="no-js" lang="en">

<?php
session_start();

// 모든 세션 변수 해제
$_SESSION = array();

// 세션을 없애려면, 세션 쿠키도 지웁니다.
// 주의: 이 동작은 세션 데이터뿐이 아닌, 세션 자체를 파괴합니다!
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// 마지막으로, 세션 파괴.
session_destroy();

include 'include/head.php';
?>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">

    </div>
    <div class="container-fluid" style="width:50%">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-6">
                <div class="text-center custom-login">
                    <h3>Registration</h3>
                    <p>Admin template with very clean and aesthetic style prepared for your next app. </p>
                </div>
                <div class="hpanel" >
                    <div class="panel-body" >
                      <form action="controller/ct_regist.php" method="post" id="myForm" >
                          <div class="form-group has-feedback" >
                              <label class="control-label" for="id">이메일</label>
                              <input class="form-control" type="text" name="user_email" id="user_email" oninput="checkId()" autofocus/>

                              <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                              <label class="control-label" for="pwd">비밀번호</label>
                              <input class="form-control" type="password" name="user_password" id="user_password"/>

                              <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                              <label class="control-label" for="rePwd">비밀번호 재확인</label>
                              <input class="form-control" type="password" name="re_user_password" id="re_user_password"oninput="checkPW()" autofocus/>

                              <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                              <label class="control-label" for="name">이름</label>
                              <input class="form-control" type="text" name="user_name" id="user_name" oninput="checkName()" autofocus/>

                              <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                          </div>

                          <div class="form-group has-feedback">
                            <div id="checkbox_append">
                              <h6 style="color:red">정보를 입력해주세요</h6>
                            </div>
                          </div>

                          <div class="form-group has-feedback">
                              <button class="btn btn-success" id="bt_regist" style="width:100%;" type="submit"  >가입</button>
                          </div>

                      </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
        <input type="hidden" name="" id="idCheck" value="">

    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>

$(document).ready(function() {
  var button_joinus = document.getElementById('idCheck');
        var idCheck = $('#idCheck').val();
        if(idCheck == 0){
          button_joinus.disabled = false;
        }
    });
//아이디 입력란에 keyup 이벤트가 일어 났을때 실행할 함수 등록
// $("#user_email").keyup(function(){
//     //입력한 문자열을 읽어온다.
//     var id=$(this).val();
//     //ajax 요청을 해서 서버에 전송한다.
//     $.ajax({
//         method:"post",
//         url:"controller/ct_idCheck.php",
//         data:{inputId:id},
//         success:function(data){
//             var obj=JSON.parse(data);
//             alert(obj);
//             obj.canu
//             if(obj.canUse){//사용 가능한 아이디 라면
//                 $("#overlapErr").hide();
//                 // 성공한 상태로 바꾸는 함수 호출
//                 successState("#user_email");
//
//             }else{//사용 가능한 아이디가 아니라면
//                 $("#overlapErr").show();
//                 errorState("#user_email");
//             }
//         }
//     });
// });

function checkId() { //이메일 형식, 이메일 중복확인
    var inputed = $('#user_email').val();
    var idCheck = 0;

    $.ajax({
        data : {
            inputId : inputed
        },
        url : "controller/ct_idCheck.php",
        success : function(data) {
          var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;
          var str ="";
          if($.trim(data) == 1 && exptext.test(inputed)== true){ //아이디가 있을 때
            $('#checkbox_append').empty();
            var str = '<h6 style="color:red">사용가능</h6>'
            $("#checkbox_append").append(str);
            successState("#user_email")
            //$('#checkbox_append').css.('visibility', 'visible')
          }

          else {
            $('#checkbox_append').empty();
            var str = '<h6 style="color:red">아이디를 체크해주세요.</h6>'
            $("#checkbox_append").append(str);
            errorState("#user_email");
          }

        }
    });
}

function checkPW() { //패스워드 확인
    var password = $('#user_password').val();
    var re_password = $('#re_user_password').val();

    if(password != null && re_password != null && password == re_password){
      $('#checkbox_append').empty();
      var str = '<h6 style="color:red">비밀번호 사용 가능.</h6>'
      $("#checkbox_append").append(str);
      successState("#re_user_password")
      successState("#user_password")
    }

    else {
      $('#checkbox_append').empty();
      var str = '<h6 style="color:red">비밀번호가 맞지 않음.</h6>'
      $("#checkbox_append").append(str);
      errorState("#re_user_password");
      errorState("#user_password");
    }
}

function checkName() { //이름 확인
    var user_name = $('#user_name').val();
    var name_length = user_name.length;

    if(name_length==0){
      $('#checkbox_append').empty();
      var str = '<h6 style="color:red">이름을 적어주세요.</h6>'
      $("#checkbox_append").append(str);
        errorState("#user_name");
    }

    else {
      $('#checkbox_append').empty();
      var str = '<h6 style="color:red">회원가입 가능</h6>'
      $("#checkbox_append").append(str);
      successState("#user_name")
    }
}


// $("#user_password3").keyup(function(){
//     var pwd=$(this).val();
//     // 비밀번호 검증할 정규 표현식
//     var reg=/^.{8,}$/;
//     if(reg.test(pwd)){//정규표현식을 통과 한다면
//                 $("#pwdRegErr").hide();
//                 successState("#pwd");
//     }else{//정규표현식을 통과하지 못하면
//                 $("#pwdRegErr").show();
//                 errorState("#pwd");
//     }
// });
// $("#re_user_password3").keyup(function(){
//     var rePwd=$(this).val();
//     var pwd=$("#pwd").val();
//     // 비밀번호 같은지 확인
//     if(rePwd==pwd){//비밀번호 같다면
//         $("#rePwdErr").hide();
//         successState("#rePwd");
//     }else{//비밀번호 다르다면
//         $("#rePwdErr").show();
//         errorState("#rePwd");
//     }
// });
// $("#user_name").keyup(function(){
//     var email=$(this).val();
//     // 이메일 검증할 정규 표현식
//     var reg=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     if(reg.test(email)){//정규표현식을 통과 한다면
//                 $("#emailErr").hide();
//                 successState("#email");
//     }else{//정규표현식을 통과하지 못하면
//                 $("#emailErr").show();
//                 errorState("#email");
//     }
// });
// 성공 상태로 바꾸는 함수
function successState(sel){
    $(sel)
    .parent()
    .removeClass("has-error")
    .addClass("has-success")
    .find(".glyphicon")
    .removeClass("glyphicon-remove")
    .addClass("glyphicon-ok")
    .show();

    // $("#myForm button[type=submit]")
    //             .removeAttr("disabled");
};
// 에러 상태로 바꾸는 함수
function errorState(sel){
    $(sel)
    .parent()
    .removeClass("has-success")
    .addClass("has-error")
    .find(".glyphicon")
    .removeClass("glyphicon-ok")
    .addClass("glyphicon-remove")
    .show();

    // $("#myForm button[type=submit]")
    //             .attr("disabled","disabled");
};
</script>
