<?php

include "../dbconn.php";

$id = $_REQUEST['id'];
$passwd = $_REQUEST['password'];

// 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
// 메시지 출력
if(!$id) {
    echo("<script>window.alert('아이디를 입력하세요.'); history.go(-1)</script>");
    exit;
}

if(!$passwd) {
    echo("<script>window.alert('비밀번호를 입력하세요.'); history.go(-1)</script>");
    exit;
}


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

        echo "<script>alert('축하 합니다! 로그인에 성공하셨습니다. 반갑습니다~!.');document.location='../index.php'</script>";
    }
}

?>
