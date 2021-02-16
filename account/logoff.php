<?php
session_start();
unset($_SESSION['userid']);
echo "<script>alert('로그아웃 합니다. 방문 해주셔서 감사합니다.');document.location='../index.php'</script>";
?>
