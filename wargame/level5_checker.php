<?php
include "../dbconn.php";
setcookie("cookie", "site-title", time() + 3600, "/");

if(isset($_COOKIE["cookie"])){
	$cookie = $_COOKIE["cookie"];
}

$answer = "security";

session_start();
$userid = $_SESSION['userid'];

$sql = "select * from member where userid ='" . $userid . "';";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

$level5 = $row['level5'];

$tutorial = $row['tutorial'];

if(!$userid)
{
    echo("<script>window.alert('로그인 후 이용가능합니다.'); history.go(-1)</script>");
    exit;
}
if($tutorial=="no")
{
    echo("<script>window.alert('튜토리얼을 클리어 하고 와주세요'); history.go(-1)</script>");
    exit;
}


if($level5=="yes")
{
    echo("<script>window.alert('이미 클리어한 스테이지 입니다.'); history.go(-1)</script>");
    exit;
}

echo $cookie;

if($cookie==$answer){
	$level5_point = 500;

	$sql = "select point from member where userid ='" . $userid . "';";
	$result = $connect->query($sql) or die($this->_connect->error);
	$row = $result->fetch_array();

	$point = $row['point'];
	$new_point = $point + $level5_point;

	$level5_clear_checker = "yes";

	$sql = "update member set point='$new_point', level5= '$level5_clear_checker'";
	$sql .= "where userid='$userid'";

	$result = $connect->query($sql) or die($this->_connect->error);

	echo("로그인에 성공했습니다.");
}else{
	echo("다시 시도 해주세요.");
}
?>