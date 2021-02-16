<?php

include "../dbconn.php";

$id = $_REQUEST['id'];
$passwd = $_REQUEST['pw'];

$level4_passowrd="test1234";


session_start();
$userid = $_SESSION['userid'];

$sql = "select * from member where userid ='" . $userid . "';";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

$level4 = $row['level4'];

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


if($level4=="yes")
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
		if($passwd==$level4_passowrd){
			session_start();
			$userid = $_SESSION['userid'];

			$level4_point = 400;

			$sql = "select point from member where userid ='" . $userid . "';";
			$result = $connect->query($sql) or die($this->_connect->error);
			$row = $result->fetch_array();

			$point = $row['point'];
			$new_point = $point + $level4_point;

			$level4_clear_checker = "yes";

			$sql = "update member set point='$new_point', level4= '$level4_clear_checker'";
			$sql .= "where userid='$userid'";

			$result = $connect->query($sql) or die($this->_connect->error);


			echo("<script>window.alert('로그인에 성공했습니다.'); history.go(-1)</script>");
		}else{

			echo("<script>window.alert('다시시도 해주세요.'); history.go(-1)</script>");
		}
	}			
}
?>
