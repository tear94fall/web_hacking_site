<?php
include "../dbconn.php";       // dconn.php 파일을 불러옴

session_start();
$userid = NULL;

if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}

// 글번호
$index = $_REQUEST['index'];

$sql = "select * from hack_issue where idx ='" . $index . "';";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

$writer = $row['writer'];

if($writer!=$userid){
    echo("<script>window.alert('수정 권한이 없습니다.'); history.go(-1)</script>");
    exit;
}


$subject = $_REQUEST['subject'];
$content = $_REQUEST['content'];
$page = $_REQUEST['page'];

// 쿼리문
$sql = "update hack_issue set subject='$subject', content='$content'";
$sql .= " where idx='$index'";

$result = $connect->query($sql) or die($this->_connect->error);
echo "<script>alert('수정이 완료 되었습니다.');document.location='hack_issue_list.php?page=$page'</script>";
?>