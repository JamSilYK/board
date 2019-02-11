<!doctype html>
<?php session_start();
if($_SESSION["user_email"] != null){
  echo("<script>location.href='myinfo.php';</script>");
}
?>
<html class="no-js" lang="en">

<?php
include 'include/head.php';
?>

<body>
    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>PLEASE LOGIN TO APP</h3>
                    <p>This is the best app ever!</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" method="post" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">ID</label>
                                <input type="text" placeholder="" title="Please enter you username" required="" value="" name="user_email" id="user_email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="" required="" value="" name="user_password" id="user_password" class="form-control">
                            </div>
                            <div class="col-sm-12">
                              <button class="btn btn-success btn-block loginbtn" id="bt_login" style="margin:auto; margin-top:10px; width:50%">Login</button>
                            </div>
                            <div class="col-sm-12">
                              <a class="btn btn-default btn-block" style="width:50%; margin:auto; margin-top:20px;" href="register.php" style="width:50%">Register</a>
                            </div>
                            <!-- <div class="col-sm-12">
                              <a  id ="bt_test" style="width:50%; margin:auto; margin-top:20px;" href="#" style="width:50%">앙기모띠</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
		$('#bt_login').on("click", function(evt) {
			evt.preventDefault();
      var user_email = $('#user_email').val();
      var user_password = $('#user_password').val();
      if(user_email != null && user_password != null){
        $.ajax({
        url: "controller/ct_login.php",
        type: "post",
        data: $("#loginForm").serialize(),
      }).done(function(data) {

        if($.trim(data) == 0){
          location.href="myinfo.php";
        }

        else {
          location.reload();
          alert("로그인 실패");
        }

      });
      }
      });
		});
</script>
