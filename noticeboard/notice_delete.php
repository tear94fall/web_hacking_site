<?php
include "../dbconn.php";
session_start();
$userid = NULL;

if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}

$index = $_REQUEST['index'];
$page = $_REQUEST['page'];

$sql = "select * from notice_board where idx ='" . $index . "';";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

$writer = $row['writer'];

if($writer!=$userid){
    echo("<script>window.alert('삭제 권한이 없습니다.'); history.go(-1)</script>");
    exit;
}

$sql = "delete from notice_board where idx = '$index'";
$result = $connect->query($sql) or die($this->_connect->error);

if($result){
	echo "<script>alert('게시글이 삭제되었습니다.');document.location='notice_list.php?page=$page'</script>";
}else{
	echo "<script>alert('다시 시도해주세요.');document.location='notice_view.php?page=$page'</script>";
}
?>