<?php

include "../dbconn.php";
include "level3_password.php";

$id = $_REQUEST['id'];
$passwd = $_REQUEST['pw'];

$level3_pw="what level3 password?";

session_start();
$userid = $_SESSION['userid'];

$sql = "select * from member where userid ='" . $userid . "';";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

$level3 = $row['level3'];

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


if($level3=="yes")
{
    echo("<script>window.alert('이미 클리어한 스테이지 입니다.'); history.go(-1)</script>");
    exit;
}


if(!$id){
	echo("<script>window.alert('빈칸 입니다. 아이디를 입력해주세요.'); history.go(-1)</script>");
	exit;
}else{
	if(!$passwd){
		echo("<script>window.alert('비밀번호를 입력해주세요.'); history.go(-1)</script>");
		exit; 
	}else{
		if($passwd==$level3_pw){
			$level3_point = 300;

			$sql = "select point from member where userid ='" . $userid . "';";
			$result = $connect->query($sql) or die($this->_connect->error);
			$row = $result->fetch_array();

			$point = $row['point'];
			$new_point = $point + $level3_point;

			$level3_clear_checker = "yes";

			$sql = "update member set point='$new_point', level3= '$level3_clear_checker'";
			$sql .= "where userid='$userid'";

			$result = $connect->query($sql) or die($this->_connect->error);


			echo("<script>window.alert('로그인에 성공했습니다.'); history.go(-1)</script>");
		}else{
			echo("<script>window.alert('로그인에 실패 했습니다.'); history.go(-1)</script>");
		}
	}			
}

/*
if(!$num_match)
{
	echo("<script>window.alert('등록되지 않은 아이디입니다.'); history.go(-1)</script>");
}
else
{
	$userid = $row['userid'];

	session_start();
	$_SESSION['userid'] = $userid;

	echo "<script>alert('축하 합니다! 로그인에 성공하셨습니다. 반갑습니다~!.');</script>";

	echo "<h1>축하합니다. 통과하셨습니다. 다음 단계 비밀 번호는 1234 입니다.</h1>"."<br>";
}
*/
?>
