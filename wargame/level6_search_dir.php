<?php
$command = NULL;
if(isset($_REQUEST['command'])){
    $command = $_REQUEST['command'];
}

if($command=="ls -al"||$command=="ls -al "){
	echo"[root@localhost ~]# ls -l<br>
	-rw-------. 1 root root 1693 2014-07-11 22:43 anaconda-ks.cfg<br>
	-rw-r--r--. 1 root root 46634 2014-07-11 22:43 install.log<br>
	-rw-r--r--. 1 root root 10033 2014-07-11 22:42 install.log.syslog<br>
	-rwxr----x. 1 root root 10033 2014-07-11 22:42 level6_password.php<br>";
}else if($command=="ls -al level6_password.php"){
	echo"[root@localhost ~]# ls -l level6_password.php<br>
	-rwxr----x. 1 root root 10033 2014-07-11 22:42 level6_password.php<br>";
}else if($command=="ls"){
	echo"[root@localhost ~]# ls<br>
	anaconda-ks.cfg&nbsp;&nbsp;&nbsp;install.log&nbsp;&nbsp;&nbsp;install.log.syslog&nbsp;&nbsp;&nbsp;level6_password.php<br>";
}else{
	echo("<script>window.alert('올바른 명령어을 입력해주세요.'); history.go(-1)</script>");
}

?>