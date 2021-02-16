<?php
session_start();
$userid = $_SESSION['userid'];

if (!$userid) {
    echo("<script>window.alert('로그인후 이용해주세요.'); history.go(-1)</script>");
    exit;
}
?>
<!DOCTYPE html>
<html lang= "ko">
<head>
   <meta charset="utf-8">
   <title>Secret Stage!!</title>
   <script>
   arr = new Array("red","green","blue","pink", "yellow");

    var i=0;
   function bgChange(){
       document.bgColor = arr[i++];
       if(i == arr.length) i=0;

      setTimeout("bgChange()" , 300);
   }

</script>
</head>
<body onLoad="bgChange()">
   <center>
      <br>
      <img src="../image/secret_stage.jpg" alt="penguin" width="700" height="350">
      <form action="secret_checker.php" method="post">
         <br>
         <label>
           <span style="color:red;">★</span>
           <span style="color:orange;">☆</span>
           <span style="color:#ffba37;">정</span>
           <span style="color:green;">답</span>
           <span style="color:blue;">☆</span>
           <span style="color:purple;">★</span>
         </label>
         <input name="answer" type="text">&nbsp;
         <input type="submit" value="제출 하기" class="btn">
      </form>
   </center>
</body>
</html>