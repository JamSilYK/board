<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();
echo "<script>alert('정상적으로 로그아웃 되었습니다.')</script>";
echo("<script>location.href='../login.php';</script>");

?>
