<?php
include "../dbconn.php";       // dconn.php 파일을 불러옴

session_start();
$userid = $_SESSION['userid'];


$id = $_REQUEST['id'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];
$name = $_REQUEST['username'];
$birth_day = $_REQUEST['userdate'];

if ($id != $userid) {
    echo("<script>window.alert('아이디를는 변경 할수 없습니다.'); history.go(-1)</script>");
    exit;
} else {
    /* 사용자 정보 업데이트 로직 */
    $sql = "update member set password='$password', email='$email' , ";
    $sql .= "username='$name', birthday='$birth_day' where userid='$userid'";
    $result = $connect->query($sql) or die($this->_connect->error);

    //echo("<script>window.alert('정보 변경이 완료되었습니다.'); history.go(-1)</script>");

    echo "<script>alert('정보 변경이 완료되었습니다.');document.location='index.php'</script>";
}
?>