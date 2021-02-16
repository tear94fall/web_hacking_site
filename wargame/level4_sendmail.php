<?php
session_start();
$userid = $_SESSION['userid'];

$target_mail = $_REQUEST['email_address'];

if(!$userid){
    $userid = "Client";    
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./PHPMailer/src/PHPMailer.php"; 
require "./PHPMailer/src/SMTP.php"; 
require "./PHPMailer/src/Exception.php"; 

$mail = new PHPMailer(true);

try {
    // 서버세팅    
    $mail -> SMTPDebug = 0;    // 디버깅 설정
    $mail -> isSMTP();               // SMTP 사용 설정
    $mail -> Host = "smtp.naver.com";                      // email 보낼때 사용할 서버를 지정
    $mail -> SMTPAuth = true;                                // SMTP 인증을 사용함
    $mail -> Username = "";  // 메일 계정
    $mail -> Password = "";                   // 메일 비밀번호
    $mail -> SMTPSecure = "ssl";                             // SSL을 사용함
    $mail -> Port = 465;                                        // email 보낼때 사용할 포트를 지정
    $mail -> CharSet = "utf-8";                                // 문자셋 인코딩
    // 보내는 메일
    $mail -> setFrom("", "");

    // 받는 메일
    //$mail -> addAddress("", "고객님");
    $mail -> addAddress($target_mail, $userid);
    // 첨부파일
    //$mail -> addAttachment("./test.zip");
    //$mail -> addAttachment("./test.jpg");

    // 메일 내용
    $mail -> isHTML(true);                                                         // HTML 태그 사용 여부
    $mail -> Subject = "저희 사이트를 이용해 주셔서 감사합니다.";                  // 메일 제목
    $mail -> Body = "비밀 번호는 : test123 입니다.";    // 메일 내용

    // 메일 전송
    $mail -> send();
    echo "이메일 전송 성공 입니다.";
} catch (Exception $e) {
    echo "이메일 전송 실패. 실패 이유는 : ", $mail -> ErrorInfo;
}
?>