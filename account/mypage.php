<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>내 정보</title>
    <link rel="stylesheet" href="../css/login_sty.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
    }

    body {
        display: inline;
    }

    /*        최상단 메뉴        */
    .main {
        text-align: left;
        margin: 12px 0 20px 22px;
        display: inline-block;
    }

    .logo {
        margin-left: 2%;
        display: inline-block;
    }

    .logo a {
        text-decoration: none;
        color: rgb(80, 155, 232);
    }
</style>
<body>
<?php
include "../dbconn.php";       // dconn.php 파일을 불러옴

session_start();
$userid = $_SESSION['userid'];


$sql = "select * from member where userid ='" . $userid . "';";
$result = $connect->query($sql) or die($this->_connect->error);

$row = $result->fetch_array();

$id = $row['userid'];
$password = $row['password'];
$name = $row['username'];
$email = $row['email'];
$birthday = $row['birthday'];
$permission = $row['permission'];

?>
<div class="logo">
    <h1 class="main"><a href="../index.php" target="_parent">Security</a></h1>
</div>
<hr>
<h2 class="member_title">My Page</h2>
<div id="login_box">
    <form method="post" action="mypage_modify.php">
        <ul id="input_button">
            <li id="id_pass">
                <ul>
                    <li>
                        <?php
                            $subtitle = "아이디";
                            $readonly_flag = "";

                            if($permission=="admin"){
                                $subtitle = "관리자 계정";
                                $readonly_flag = "readonly";
                            }

                            echo "<div class=\"tag\">$subtitle</div>";
                            echo "<input type=\"text\" name=\"id\" $readonly_flag value=$id>"
                        ?>
                    </li> <!-- id -->
                    <li id="pass">
                        <div class="tag">비밀번호</div>
                        <?php
                        echo "<input type=\"password\" name=\"password\" value=$password>";
                        ?>
                    </li>
                    <li id="login_help">
                        도움말
                        <button style="cursor:pointer" onmousedown="alert();">
                            <img src="../image/help.png" style="width:20px; height:20px;"></button>
                    </li>
                    <li>
                        <div class="tag">이메일</div>
                        <?php
                        echo "<input type=\"text\" name=\"email\" value=$email>";
                        ?>
                    </li>
                    <li>
                        <div class="tag">입력 정보 확인</div>

                        <?php
                        echo "<input type=\"text\" name=\"username\" value='$name'>";
                        echo "<input type=\"text\" name=\"userdate\" value='$birthday'>";
                        ?>
                    </li>
                </ul>
            </li>
            <li id="member_btn">
                <button style="cursor:pointer">수정확인</button>
            </li>
        </ul>
    </form>
</div> <!-- login_box -->
<script type="text/javascript">
    function alert() {
        Swal.fire(
            '도움이 필요하신가요?',
            '뭐라고 쓰죠?',
            'question'
        )
    }
</script>
</body>
</html>
