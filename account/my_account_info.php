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
<div class="logo">
    <h1 class="main"><a href="index.html">Security</a></h1>
</div>
<hr>
<h2 class="member_title">My Page</h2>
<div id="login_box">
    <form method="post" action="#">
        <ul id="input_button">
            <li id="id_pass">
                <ul>
                    <li>
                        <div class="tag">아이디</div>
                        <input type="text" name="id" placeholder="아이디">
                    </li> <!-- id -->
                    <li id="pass">
                        <div class="tag">비밀번호</div>
                        <input type="password" name="password" placeholder="비밀번호">
                    </li>
                    <li id="login_help">
                        도움말
                        <button style="cursor:pointer" onmousedown="alert();">
                            <img src="image/help.png" style="width:20px; height:20px;"></button>
                    </li>
                    <li>
                        <div class="tag">이메일</div>
                        <input type="text" name="id" placeholder="email@co.kr">
                    </li>
                    <li>
                        <div class="tag">입력 정보 확인</div>
                        <input type="text" name="username" placeholder="이름">
                        <input type="text" maxlength="6" name="userdate" placeholder="생년월일 6자리">
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
