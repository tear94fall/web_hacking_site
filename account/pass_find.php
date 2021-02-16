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

	$id = $_REQUEST['id'];
	$birthday = $_REQUEST['birthday'];

	$sql = "select * from member where userid= '$id';";

	$result = $connect->query($sql) or die($this->_connect->error);
	$num_record = mysqli_num_rows($result);
	$row = $result->fetch_array();

	if ($num_record!=0)
	{
		if($row['birthday']==$birthday){
			$password = $row['password'];
			echo"<div>회원님의 비밀 번호는 <span>".$password."</span> 입니다.</div>";
		}else{
			echo"<div>올바른 <span>생년월일</span>을 입력해주세요.</div>";
		}
	}
	else
	{
		echo"<div>존재 하지 않는 <span>회원</span> 입니다.</div>";
	}
	?>
</body>
</html>