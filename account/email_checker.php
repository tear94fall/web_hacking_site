<?php

include "dbconn.php";       // dconn.php 파일을 불러옴
session_start();
$userid = $_SESSION['userid'];

if(!$userid){
    $userid = "Client";
}


$target_mail = $_REQUEST['email'];

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$auth_str = generateRandomString();


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
    $mail -> Password = "";           s        // 메일 비밀번호
    $mail -> SMTPSecure = "ssl";                             // SSL을 사용함
    $mail -> Port = 465;                                        // email 보낼때 사용할 포트를 지정
    $mail -> CharSet = "utf-8";                                // 문자셋 인코딩
    // 보내는 메일
    $mail -> setFrom("", "관리자");

    // 받는 메일
    //$mail -> addAddress("", "고객님");
    $mail -> addAddress($target_mail, $userid);
    // 첨부파일
    //$mail -> addAttachment("./test.zip");
    //$mail -> addAttachment("./test.jpg");

    // 메일 내용
    $mail -> isHTML(true);                                                         // HTML 태그 사용 여부
    $mail -> Subject = "저희 사이트를 이용해 주셔서 감사합니다.";                  // 메일 제목
    $mail -> Body = $auth_str;    // 메일 내용

    // 메일 전송
    $mail -> send();
    echo("<script>window.alert('이메일 전송 성공. 인증을 진행해주세요.'); history.go(-1)</script>");
} catch (Exception $e) {
    echo("<script>window.alert('이메일 전송 실패. 다시 시도해 주세요.'); history.go(-1)</script>");
}

//echo "<script>alert('회원가입을 계속 진행해주세요.');document.location='member_insert.php'</script>";


?>