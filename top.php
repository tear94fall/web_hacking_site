<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/home_sty.css">
</head>
<body>
    <script language="JavaScript">
        var count = 0;
        var target_count = makeRandom(5, 10);

        function button_onclick() {
            count++;
            if (count >= target_count) {
                // iframe 때문에 이렇게 전달해야 전체 페이지로 넘어간다
                parent.document.location.href = "wargame/secret.php";
            }
        }

        function makeRandom(min, max) {
            var RandVal = Math.floor(Math.random() * (max - min + 1)) + min;
            return RandVal;
        }
    </script>

    <div class="top">
        <h1 class="main"><a onclick="button_onclick()">Security</a></h1>
    </div>
    <div class="top_sub">
        <?php
            include "dbconn.php";
            session_start();

            $userid = NULL;

            if(isset($_SESSION['userid'])){
                $userid = $_SESSION['userid'];
                echo "<td><a href='account/logoff.php'  target='_parent'>로그아웃</a></td>&nbsp;&nbsp;&nbsp;";
                echo "<td><a href='account/mypage.php' target='_parent'>마이페이지</a></td>&nbsp;&nbsp;&nbsp;";

                $permission = NULL;

                $sql = "SELECT * FROM member WHERE userid= '$userid'";
                $result = $connect->query($sql) or die($this->_connect->error);
                $row = $result->fetch_array();

                if(isset($row['permission'])){
                    $permission = $row['permission'];
                    if ($permission=='admin') {
                        echo "<td><a href='admin/admin_home.php' target='_parent'>관리자 페이지</a></td>&nbsp;&nbsp;&nbsp;";
                    }
                }
            }else{
                echo "<td><a href='account/login_home.html' target='_parent'>로그인</a></td>&nbsp;&nbsp;&nbsp;";
                echo "<td><a href='account/member_insert.php' target='_parent'>회원가입</a></td>&nbsp;&nbsp;&nbsp;";
            }
        ?>
        <input type="text" class="search_txt">
        <button class="search_btn">검색</button>
    </div>
    <div class="menubar">
        <ul id="tab" class="clfix">
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href="index.php" target="_parent">홈</a></li>
            <li><a href="noticeboard/notice_list.php" target="_parent">공지사항</a></li>
            <li><a href="freeboard/freeboard_list.php" target="_parent">자유게시판</a></li>
            <li><a href="hackissue/hack_issue_list.php" target="_parent">해킹 보안 이슈</a></li>
            <li><a href="wargame/tutorial_main.php" target="_parent">튜토리얼</a></li>
            <li><a href="wargame/question_home.html" target="_parent" id="current">문제풀기</a>
                <ul>
                    <li><a href="wargame/question_home.html" target="_parent">List</a></li>
                    <li><a href="wargame/question_1.html" target="_parent">level 1</a></li>
                    <li><a href="wargame/question_2.html" target="_parent">level 2</a></li>
                    <li><a href="wargame/question_3.html" target="_parent">level 3</a></li>
                    <li><a href="wargame/question_4.html" target="_parent">level 4</a></li>
                    <li><a href="wargame/question_5.html" target="_parent">level 5</a></li>
                    <li><a href="wargame/question_6.html" target="_parent">level 6</a></li>

                </ul>
            </li>
            <li><a href="developer.php" target="_parent">개발자들</a></li>
        </ul>
    </div>
    <div id="middle"><!-- grid -->
        <div id="slidebox">
            <ul id="slider">
                <li>
                    <img src="image/banner1.jpg" style="max-width:100%; height:auto;"/>
                </li>
                <li>
                    <img src="image/banner2.jpg" style="max-width:100%; height:auto;"/>
                </li>
                <li>
                    <img src="image/banner3.jpg" style="max-width:100%; height:auto;"/>
                </li>
                <li>
                    <img src="image/banner4.jpg" style="max-width:100%; height:auto;"/>
                </li>
            </ul>
        </div>
    </div>
    <script src=js/home_script.js></script>
</body>
</html>
