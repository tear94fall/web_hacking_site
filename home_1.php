<!doctype html>
<meta charset="utf-8">
<html>
<head>
  <link rel="stylesheet" href="css/home_sty.css">
  <script src=js/frcnt_scroll.js></script>
</head>
<body>
  <div id="middle"><!-- grid -->
   <div id="slidebox">
    <ul id="slider">
     <li>
      <img src="image/banner1.jpg"/>
    </li>
    <li>
      <img src="image/banner2.jpg"/>
    </li>
    <li>
      <img src="image/banner3.jpg"/>
    </li>
  </ul>
</div>


<?php
session_start();
$userid = $_SESSION['userid'];


if (!$userid){
  // 로그인 되어있을때
  echo "
  <form method='post' action='login_check.php'>
  <div id='login_box'>
  <h2>로그인</h2>
  <ul id='input_button'>
  <li id='id_pass'>
  <ul>
  <li>
  <span>ID</span>
  <input type='text' name='id' placeholder='아이디'>
  </li> <!-- id -->
  <li id='pass'>
  <span>PW</span>
  <input type='password' name='password' placeholder='비밀번호'>
  </li> <!-- pass -->
  </ul>
  </li>
  <li id='login_btn'>
  <button>로그인</button>
  </li>
  </ul>
  <ul id='btns'>
  <li><a href='#'>아이디 찾기</a></li>
  <li><a href='#'>비밀번호 찾기</a></li>
  </ul>
  </div> <!-- login_box -->
  </form>";
}else{
  //로그인 되어있지 않을때
  echo"로그인 되어있음";
}
?>





</div><!-- grid -->

<div id="bottom">
<div id="freeboard">
<div class="frttl">자유게시판</div>
<div class="frcnt">
<ul id="scroll">
<?php
include "dbconn.php";
$sql = "SELECT * FROM freeboard";
$result = $connect->query($sql) or die($this->_connect->error);
$row = $result->fetch_array();
$num_match = mysqli_num_rows($result);

for ($i=0; $i<$num_match; $i++)
{
  mysqli_data_seek($result, $i);
  $row = mysqli_fetch_array($result);
  $content = $row['content'];
        echo "<li><a href="."#>".$content."</a></li>";
      }
      ?>
    </ul>
  </div>
</div>

<div id="notice">
  <?php
  include "dbconn.php";
  $sql = "SELECT * FROM notice_board";
  $result = $connect->query($sql) or die($this->_connect->error);
  $row = $result->fetch_array();

  $subject = $row['subject'];
  $content = $row['content'];

  echo"<h3>".$subject."</h3>";
  echo$content;
  ?>
</div>
<div id="rank">
  <span class="rank_title">포인트 순위</span>
  <ol>
    <?php
    include "dbconn.php";
    $sql = "select * from ranking order by point desc;";
    $result = $connect->query($sql) or die($this->_connect->error);
    $row = $result->fetch_array();
    $num_match = mysqli_num_rows($result);

    for ($i=0; $i<$num_match; $i++)
    {
      mysqli_data_seek($result, $i);
      $row = mysqli_fetch_array($result);
      $username = $row['userid'];
      $point = $row['point'];

      echo "<li>".$username."&nbsp;&nbsp;&nbsp;&nbsp;point: ".$point."</li>";
    }
    ?>
  </ol>
</div>
</div>
<script type="text/javascript">
var real_search_keyword = new textScroll('scroll'); // 스크롤링 하고자하는 ul 엘리먼트의 id값을 인자로 넣습니다
real_search_keyword.name = "real_search_keyword"; // 인스턴스 네임을 등록합니다
real_search_keyword.start(); // 스크롤링 시작
</script>
<script src=js/home_script.js></script>
</body>
</html>
