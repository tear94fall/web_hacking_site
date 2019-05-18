<!-- 커밋 테스트 -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Security</title>
  <link rel="stylesheet" href="css/home_sty.css">
</head>
<body>
  <script language="JavaScript">
    var count=0;
    var target_count = makeRandom(5,10);

    function button_onclick(){
      count++;
      if(count>=target_count){
        location.href="secret.php";
      }
    }

    function makeRandom(min, max){
      var RandVal = Math.floor(Math.random()*(max-min+1)) + min;
      return RandVal;
    }

  </script>
  <div class="top">
    <h1 class="main"><a onclick="button_onclick()">Security</a></h1>
  </div>
  <div class="top_sub">
    <?php
    session_start();
    $userid = $_SESSION['userid'];

    if (!$userid)
    {
      echo "<td><a href='login_home.html'  target='_self'>로그인</a></td>&nbsp;&nbsp;&nbsp;";
    }
    else
    {
      echo "<td><a href='logoff.php'  target='_self'>로그아웃</a></td>&nbsp;&nbsp;&nbsp;";
    }
    if (!$userid)
    {
      echo "<td><a href='member_register.php'>회원가입</a></td>&nbsp;&nbsp;&nbsp;";
    }
    else
    {
      echo "<td><a href='my_account_info.php'>내정보보기</a></td>&nbsp;&nbsp;&nbsp;";
    }
    ?>
    <input type="text" class="search_txt"><button class="search_btn">검색</button>
  </div>
  <div class="menubar">
    <ul>
     <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
     <li><a href="index.php">홈</a></li>
     <li><a href="hack_issue.php" target="home_re">해킹 보안 이슈</a></li>
     <li><a href="tutorial.html" target="home_re">튜토리얼</a></li>
     <li><a href="question_home.html" target="home_re" id="current">문제풀기</a>
       <ul>
         <li><a href="question_1.html" target="home_re">1</a></li>
         <li><a href="question_2.html" target="home_re">2</a></li>
         <li><a href="question_3.html" target="home_re">3</a></li>
         <li><a href="question_4.html" target="home_re">4</a></li>
       </ul>
     </li>
     <li><a href="comment_home.html" target="home_re" id="current">해설</a>
      <ul>
        <li><a href="comment_1.html" target="home_re">1</a></li>
        <li><a href="comment_2.html" target="home_re">2</a></li>
        <li><a href="comment_3.html" target="home_re">3</a></li>
        <li><a href="comment_4.html" target="home_re">4</a></li>
      </li>
    </ul>
    <li><a href="developer.html" target="home_re">개발자들</a></li>
  </ul>
</div>
<iframe src="home_1.php" name="home_re" id="main" frameborder="0" width="100%" height="800px">
  표시 안됨
</iframe>
</body>
</html>
