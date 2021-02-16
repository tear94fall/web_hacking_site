<?php

include "../dbconn.php";       // dconn.php 파일을 불러옴

$id = $_REQUEST['id'];
$password = $_REQUEST['password'];
$password_check = $_REQUEST['password_check'];
$name = $_REQUEST['username'];
$email = $_REQUEST['email'];
$birthday = $_REQUEST['birthday'];
$permission = "user";

/*
$phone1 = $_REQUEST['phone1'];
$phone2 = $_REQUEST['phone2'];
$phone3 = $_REQUEST['phone3'];
$address = $_REQUEST['address'];
*/

$sql = "select * from member where userid= '$id'";
$result = $connect->query($sql) or die($this->_connect->error);
$exist_id = mysqli_num_rows($result);



//아이디 중복 검사 해야함

if($exist_id>0) {
	echo("<script>window.alert('해당 아이디가 존재합니다.'); history.go(-1)</script>");
	exit;
}


if(!$id) {
	echo("<script>window.alert('아이디를 입력해주세요'); history.go(-1)</script>");
	exit;
}

if(!$password) {
	echo("<script>window.alert('비밀 번호를 입력해주세요.'); history.go(-1)</script>");
	exit;
}
if($password != $password_check) {
	echo("<script>window.alert('비밀 번호가 일치하지 않습니다.'); history.go(-1)</script>");
	exit;
}
if(!$name) {
	echo("<script>window.alert('이름을 입력해주세요.'); history.go(-1)</script>");
	exit;
}
if(!$email) {
	$check_email=preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email);

	if($check_email==false)
	{
		echo("<script>window.alert('올바른 이메일 형식이 아닙니다.'); history.go(-1)</script>");
		exit;
	}
}
if(!$birthday) {
	echo("<script>window.alert('생년월일을 입력해주세요.'); history.go(-1)</script>");
	exit;
}

$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
$ip = $_SERVER["REMOTE_ADDR"];         // 방문자의 IP 주소를 저장

/*
if ($phone1 && $phone2 && $phone3)
    $tel = $phone1."-".$phone2."-".$phone3;
else
    $tel = "";
*/

$sql = "insert into member(userid, password, username, email, birthday, register_day, permission)";
$sql .= "values('$id', '$password', '$name', '$email', '$birthday', '$regist_day', '$permission')";

// 레코드 삽입 명령
$result = $connect->query($sql) or die($this->_connect->error);

echo "<script>alert('회원 가입이 완료되었습니다.');document.location='login_home.html'</script>";
?>