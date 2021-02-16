<?php
include "../dbconn.php";
session_start();
$userid = $_SESSION['userid'];

$secret_stage_password = "아무에게도 말하지 마세요.";
$answer = $_REQUEST['answer'];

$sql = "select * from member where userid ='" . $userid . "';";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

$secret = $row['secret'];
if($secret=="yes")
{
    echo("<script>window.alert('이미 시크릿 스테이지를 클리어 하셨습니다.'); history.go(-1)</script>");
    exit;
}

if($secret_stage_password==$answer){
	$secret_stage_point = 123;

	$sql = "select * from member where userid ='" . $userid . "';";
	$result = $connect->query($sql) or die($this->_connect->error);
	$row = $result->fetch_array();

	$point = $row['point'];
	$new_point = $point + $secret_stage_point;

	$secret_stage_clear_checker = "yes";

	$sql = "update member set point='$new_point', secret= '$secret_stage_clear_checker'";
	$sql .= "where userid='$userid'";

	$result = $connect->query($sql) or die($this->_connect->error);
	echo "<script>alert('축하합니다! 시크릿 스테이지를 완료 하셨습니다.');document.location='../index.php'</script>";
}else{
	echo("<script>window.alert('다시 시도 해주세요.'); history.go(-1)</script>");
}
?>