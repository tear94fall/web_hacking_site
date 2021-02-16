<?php
include "../dbconn.php";
session_start();
$userid = NULL;

if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}

/*로그인이 되어어야함*/
if (!$userid) {
    echo("<script>window.alert('로그인후 이용해주세요.'); history.go(-1)</script>");
    exit;
} else {
    $sql = "select tutorial from member where userid ='".$userid."';";
    $result = $connect->query($sql) or die($this->_connect->error);

    $row = $result->fetch_array();

    $tutorial_clear =$row['tutorial'];

    if ($tutorial_clear=="yes") {
        echo "<script>alert('이미 튜토리얼을 완료 하셨습니다.');document.location='../index.php'</script>";
    } else {
        echo("<script>document.location.href = 'tutorial.php';</script>");
    }
}
?>