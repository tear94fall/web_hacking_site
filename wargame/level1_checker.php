<?php

include "../dbconn.php";

$id = $_REQUEST['id'];
$passwd = $_REQUEST['pw'];

$sql = "SELECT * FROM member WHERE userid='$id' AND password='$passwd'";

$result = $connect->query($sql) or die($this->_connect->error);

$num_match = mysqli_num_rows($result);

session_start();
$userid = $_SESSION['userid'];

$sql = "select * from member where userid ='" . $userid . "';";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();

$level1 = $row['level1'];

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

if($level1=="yes")
{
    echo("<script>window.alert('이미 클리어한 스테이지 입니다.'); history.go(-1)</script>");
    exit;
}


if(!$num_match)
{
	echo("<script>window.alert('다시 시도해 주세요.'); history.go(-1)</script>");
    exit;
}
else
{
	$level1_point = 100;

    $sql = "select point from member where userid ='" . $userid . "';";
    $result = $connect->query($sql) or die($this->_connect->error);
    $row = $result->fetch_array();

    $point = $row['point'];
    $new_point = (int)$point + $level1_point;

    $level1_clear_checker = "yes";

    $sql = "update member set point='$new_point', level1= '$level1_clear_checker'";
    $sql .= "where userid='$userid'";

    $result = $connect->query($sql) or die($this->_connect->error);

    echo "<script>alert('축하 합니다! 로그인에 성공하셨습니다. 반갑습니다~!.');</script>";
    exit;
}
?>
