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
	include "../dbconn.php";

	$username = $_REQUEST['username'];
	$email = $_REQUEST['email'];

	$sql = "select * from member where username= '$username';";

	$result = $connect->query($sql) or die($this->_connect->error);
	$num_record = mysqli_num_rows($result);
	$row = $result->fetch_array();

	if ($num_record!=0)
	{
		if($row['email']==$email){
			$userid = $row['userid'];
			echo"<div>회원님의 아이디는 <span>".$userid."</span> 입니다.</div>";
		}else{
			echo"<div>올바른 <span>이메일</span>을 입력해주세요.</div>";
		}
	}
	else
	{
		echo"<div>존재 하지 않는 <span>아이디</span> 입니다.</div>";
	}
	?>
</body>
</html>