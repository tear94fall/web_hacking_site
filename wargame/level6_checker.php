<?php

include "../dbconn.php";

$id = $_REQUEST['id'];
$passwd = $_REQUEST['pw'];

$level6_passowrd="linux1234";



session_start();
$userid = $_SESSION['userid'];

$sql = "select * from member where userid ='" . $userid . "';";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

$level6 = $row['level6'];

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


if($level6=="yes")
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
		//로그인에 성공했을때 로직
	}else{
		if($passwd==$level6_passowrd){
			session_start();
			$userid = $_SESSION['userid'];

			$level6_point = 600;

			$sql = "select point from member where userid ='" . $userid . "';";
			$result = $connect->query($sql) or die($this->_connect->error);
			$row = $result->fetch_array();

			$point = $row['point'];
			$new_point = $point + $level6_point;

			$level6_clear_checker = "yes";

			$sql = "update member set point='$new_point', level6= '$level6_clear_checker'";
			$sql .= "where userid='$userid'";

			$result = $connect->query($sql) or die($this->_connect->error);

			echo("<script>window.alert('로그인에 성공했습니다.'); history.go(-1)</script>");
		}
	}			
}
?>
