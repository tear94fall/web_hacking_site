<?php

include "../dbconn.php";       // dconn.php 파일을 불러옴

session_start();

$userid = $_SESSION['userid'];

/* userid를 통해 우선 비밀번호의 값을 가져온다음 비교후 일치하면 작성 완료 아니면 작성 불가능*/
$sql = "select * from member where userid ='" . $userid . "';";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();


$password_checker = $row['password'];
/* 입력된 비밀번호와 일치하면 게시글 저장 */


$writer = $userid;
$password = $_REQUEST['password'];
$subject = $_REQUEST['subject'];
$content = $_REQUEST['content'];

if(!$subject){
    echo("<script>window.alert('제목을 입력해주세요.'); history.go(-1)</script>");
    exit;
}

if(!$content){
    echo("<script>window.alert('내용을 입력해주세요.'); history.go(-1)</script>");
    exit;
}

if($password != $password_checker){
    echo("<script>window.alert('비밀번호가 다릅니다..'); history.go(-1)</script>");
    exit;
}

$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
$ip = $_SERVER["REMOTE_ADDR"];         // 방문자의 IP 주소를 저장


$sql = "insert into hack_issue(subject, content, writer, register_date)";
$sql .= "values('$subject', '$content', '$writer', '$regist_day')";

// 레코드 삽입 명령
$result = $connect->query($sql) or die($this->_connect->error);

$connect->close();

echo "<script>alert('글 작성이 완료되었습니다.');document.location='hack_issue_list.php'</script>";
?>

