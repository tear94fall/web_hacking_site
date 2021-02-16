<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원가입</title>
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
    #idchecker_btn input {
        background-color: rgba(109,109,109, 0.5);
        color : white;
        border-style: none;
        widht : 220px;
        height:  50px;
        font-size : 17px;
    }
</style>
<body>
<?php
session_start();
$userid = NULL;
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}
if ($userid) {
    echo("<script>window.alert('이미 회원 가입을 완료 하셨습니다.'); history.go(-1)</script>");
}
?>
<div class="logo">
    <h1 class="main"><a href="../index.php">Security</a></h1>
</div>
<hr>
<h2 class="member_title">회원가입</h2>
<div id="login_box">
    <form method="post" action="member_register.php">
        <span>아래의 정보를 입력해주세요.</span>
        <ul id="input_button">
            <li id="id_pass">
                <ul>
                    <li>
                        <div class="tag">아이디</div>
                        <input type="text" name="id" id="userid" placeholder="아이디">
                    </li> <!-- id -->
                    <li id="idchecker_btn">
                        <input src="../image/help.png" type="button" value="중복검사" onclick="checkid();"/>
                    </li>
                    <li id="pass">
                        <div class="tag">비밀번호</div>
                        <input type="password" name="password" placeholder="비밀번호">
                        <input type="password" name="password_check" placeholder="비밀번호 확인">
                    </li>
                    <li id="login_help">
                        도움말
                        <button style="cursor:pointer" onmousedown="alert();">
                            <img src="../image/help.png" style="width:20px; height:20px;"></button>
                    </li>
                    <li>
                        <div class="tag">이메일</div>
                        <input type="text" name="email" id="mail" placeholder="email@co.kr" onclick="verifyEmail()">
                    </li>
                    <li>
                        <div class="tag">정보 입력</div>
                        <input type="text" name="username" placeholder="이름">
                        <input type="text" maxlength="6" name="birthday"
                               onKeypress="return numkeyCheck(event)" placeholder="생년월일 6자리">
                    </li>
                </ul>
            </li>
            <li id="member_btn">
                <button style="cursor:pointer">가입완료</button>
            </li>
        </ul>
    </form>
</div> <!-- login_box -->
<script type="text/javascript">
    function checkid() {
        var userid = document.getElementById("userid").value;
        if (userid) {
            url = "member_insert_id_check.php?userid=" + userid;
            window.open(url, "chkid", "width=600,height=200");
        }else{
            url = "member_insert_id_check.php?userid=" + userid;
            window.open(url, "chkid", "width=600,height=200");
        }
    }

    function checkEmailAuth() {
        var email = document.getElementById("mail").value;
        if (email) {
            url = "email_checker.php?email=" + email;
            window.open(url, "chkid", "width=600,height=200");
        } else {
            alert("이메일을 입력해주세요..");
        }
    }

    function alert() {
        Swal.fire(
            '도움이 필요하신가요?',
            '관리자에게 문의 주세요',
            '문의 하기'
        )
    }

    function numkeyCheck(e) {
        var keyValue = event.keyCode;
        if (((keyValue >= 48) && (keyValue <= 57))) return true;
        else return false;
    }

    verifyEmail = function () {
        // 이메일 검증 스크립트 작성
        var emailVal = $("#email").val();

        var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
        // 검증에 사용할 정규식 변수 regExp에 저장

        if (emailVal.match(regExp) != null) {
            alert('Good!');
        } else {
            alert('Error');
        }
    };

</script>
</body>
</html>
