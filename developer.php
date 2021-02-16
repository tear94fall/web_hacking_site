<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>개발자들</title>
    <link rel="stylesheet" href="css/developer_sty.css">
    <!-- 글꼴 추가 -->
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
    <link rel="stylesheet" href="css/layer_popup.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="js/layer_popup.js"></script>
</head>
<body>
<iframe src="top_and_top.html" id="top" frameborder="0" width="100%" height="80px"></iframe>
<h1>개발 정보 소개</h1>
    <div id="btn_group">
        <button id="popup_btn" onClick="javascript:goDetail('테스트');">개발 정보</button>
    </div>
    
    <!-- 팝업뜰때 배경 -->
    <div id="mask"></div>

    <!--Popup Start -->
    <div id="layerbox" class="layerpop"
        style="width: 700px; height: 350px;">
        <article class="layerpop_area">
        <div class="title">개발 환경 정보</div>
        <a href="javascript:popupClose();" class="layerpop_close" id="layerbox_close">
            <img src="image/close_icon.png" style="width:20px; height:20px;">
        </a>
        <div class="content">
            apache 2.4.46<br>
            mysql 8.0.22<br>
            php 8.0.2<br>
        </div>
        </article>
    </div>
    
<h1>개발자들 소개</h1>
<p class="issue_cnt">늦은 시간까지 게속 개발을 진행하며 고생한 개발자들을 소개합니다.</p>
<div id="lim_intro_box">
    <div id="lim_profile">
        <img src="image/sub.jpg" width="250px" height="250px">
    </div>
    <div class="lim_intro">
        <span>임준섭(26)</span>
        <br><br>
        <p>
            정보보안학과 4학년<br>
            백 엔드 담당<br>
        </p>
    </div>
</div>
<div id="na_intro_box">
    <div id="na_profile">
        <img src="image/one.jpg" width="250px" height="250px">
    </div>
    <div class="na_intro">
        <span>나창원(22)</span>
        <br><br>
        <p>
            정보보안학과 3학년<br>
            프론트 엔드 담당<br>
        </p>
    </div>
</div>
<br><br><br><br><br>
</body>
</html>