<?php

include "../dbconn.php";
session_start();
$userid = $_SESSION['userid'];


$answer = $_REQUEST['answer'];

$answer_validate = "00af7u32tz59q";

if ($answer == $answer_validate) {
    $tutorial_point = 1000;

    $sql = "select point from member where userid ='" . $userid . "';";
    $result = $connect->query($sql) or die($this->_connect->error);
    $row = $result->fetch_array();

    $point = $row['point'];
    $new_point = $point + $tutorial_point;

    $tutorial_clear_checker = "yes";

    $sql = "update member set point='$new_point', tutorial= '$tutorial_clear_checker'";
    $sql .= "where userid='$userid'";

    $result = $connect->query($sql) or die($this->_connect->error);

    echo "<script>alert('축하합니다! 튜토리얼을 완료 하셨습니다.');document.location='index.php'</script>";
} else {
    echo("<script>window.alert('다시 시도 해주세요.'); history.go(-1)</script>");
}

/*
$sql = "select * from member where userid= '$id'";

$result = $connect->query($sql) or die($this->_connect->error);

$num_match = mysqli_num_rows($result);

if(!$num_match)
{
    echo("<script>window.alert('등록되지 않은 아이디입니다.'); history.go(-1)</script>");
}
else
{
    $row = $result->fetch_array();
    $db_passwd = $row['password'];

    if($passwd != $db_passwd)
    {
        echo("<script>window.alert('비밀번호가 틀립니다.'); history.go(-1)</script>");

        exit;
    }
    else
    {
        $userid = $row['userid'];

        session_start();
        $_SESSION['userid'] = $userid;



        // 새로 추가
        $last_url = $_SERVER["HTTP_REFERER"];
        $last_url_array = explode( '/', $last_url );
        $last_page = $last_url_array[count($last_url_array)-1];

        Header("Location:index.php");
    }
}
*/

?>
