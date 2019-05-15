<?php
session_start();
$_SESSION['userid'] = $userid;

echo("<script>window.alert('로그아웃 합니다.'); history.go(-1)</script>");
echo("<script>top.location.href = '../index.php'; </script>");

?>
