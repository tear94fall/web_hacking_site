<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>tutorial</title>
    <link href="../css/recycle.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">
</head>
<body>
<iframe src="../top_and_top.html" name="top_re" id="top" frameborder="0" width="100%" height="80px">
    표시안됨
</iframe>
<div class="top_layer">
    <p class="hd_title">튜토리얼</p>
    <span class="content">튜토리얼을 완료 해야 기본 점수를 받을 수 있습니다. </span><br/><br/>
    <!-- 비밀 번호는 "00af7u32tz59q" -->
</div>

<div class="middle_layer">
    <p class="hd_title">비밀번호</p>
    <form action="tutorial_checker.php" method="post">
        <input type="password" name="answer" class="answer_text"><br/><br/>
        <input type="submit" value="제출" class="answer_submit">
    </form>
</div>
<br>
<div class="bottom_layer">
    <span class="hint">힌트!</span>
    <br>
    <span class="content">▶ HTML을 배우셨다면 쉽게 풀수있습니다.</span>
</div>
</body>
</html>
