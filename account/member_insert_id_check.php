<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <title>정보 확인</title>
   <style>
      * {
         margin : 0;
         padding : 0;
         text-align : center;
      }
      div {
         font-family: 'Do Hyeon', sans-serif;
         margin : 4% 6%;
         padding : 5% 2%;
         border : 2px solid gray;
         color : rgb(109,109,109);
         font-size: 38px;
      }
      span {
         color : black;
      }
   </style>
   <link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
</head>
<body>
<?php

$id = $_REQUEST['userid'];

if(!$id)
{
   echo "<div><span>아이디</span>를 입력해주세요.</div>";
}
else
{
   include "../dbconn.php";

   $sql = "select * from member where userid= '$id';";

   $result = $connect->query($sql) or die($this->_connect->error);
   $num_record = mysqli_num_rows($result);

   if ($num_record!=0)
   {
      echo "<div>이미 존재하는 <span>아이디</span> 입니다.<br>다른 <span>아이디</span>를 사용하세요.</div>";
   }
   else
   {
      echo "<div>사용 가능한 <span>아이디</span> 입니다.</div>";
   }
}
?>
</body>
</html>
