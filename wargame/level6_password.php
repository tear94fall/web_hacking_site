<?php
$key = NULL;
if(isset($_REQUEST['key'])){
    $key = $_REQUEST['key'];
}

if(!$key){
	echo("<script>window.alert('key값을 입력해주세요. 다시 시도 해주세요.'); history.go(-1)</script>");
}else{
	if($key==741){
		echo"비밀 번호는 linux1234 입니다."."<br>";
	}else{
		echo("<script>window.alert('key값이 다릅니다. 다시 시도 해주세요.'); history.go(-1)</script>");
	}
}

?>