<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>글쓰기</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/top_level.css">
    <style>

        .filebox input[type="file"] {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }

        .filebox label {
            display: inline-block;
            margin: 0;
            padding: .5em .75em;
            color: #999;
            font-size: inherit;
            line-height: normal;
            vertical-align: middle;
            background-color: #fdfdfd;
            cursor: pointer;
            border: 1px solid #ebebeb;
            border-bottom-color: #e2e2e2;
            border-radius: .25em;
        }

        /* named upload */
        .filebox .upload-name {
            display: inline-block;
            padding: .5em .75em;
            font-size: inherit;
            font-family: inherit;
            line-height: normal;
            vertical-align: middle;
            background-color: #f5f5f5;
            border: 1px solid #ebebeb;
            border-bottom-color: #e2e2e2;
            border-radius: .25em;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .filebox.bs3-primary label {
            color: rgb(0, 0, 0);
            background-color: rgb(255, 255, 255);
            border-color: rgba(109, 109, 109, 0.3);
        }
    </style>
</head>
<body>
    <iframe src="../top_and_top.html" frameborder="0" width="100%" height="80px"></iframe>
    <?php
    include "../dbconn.php";       // dconn.php 파일을 불러옴

    session_start();
    $userid = NULL;

    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
    }
    $index = $_REQUEST['index'];
    $page = $_REQUEST['page'];

    $sql = "select * from hack_issue where idx ='" . $index . "';";
    $result = $connect->query($sql) or die($this->_connect->error);
    $row = $result->fetch_array();

    $subject = $row['subject'];
    $content = $row['content'];
    $writer = $row['writer'];
    $view = $row['view'];
    $register_date = $row['register_date'];
    $register_date = substr($register_date, 0, 10);

    $view += 1;

    $sql = "update hack_issue set view='$view'";
    $sql .= " where idx='$index'";

    $result = $connect->query($sql) or die($this->_connect->error);
    ?>
    <div class="container">
        <br>
        <table class="table table-bordered">
            <style>
                th {
                    width: 230px;
                }
            </style>
            <thead>
                <caption>게시글 작성</caption>
            </thead>
            <tbody>
                <form id="insert_hack_issue" action="hack_issue_modify.php?index=<?php echo $index ?>&page=<?php echo $page ?>"
                  method="post" encType="multiplart/form-data">
                  <tr>
                    <th style="height:51px;">작성자 </th>
                    <td style="vertical-align:middle;"><?php echo$writer; ?></td>
                </tr>
                <tr>
                    <th>제목</th>
                    <td colspan="2">
                        <input type="text" value="<?php echo $subject ?>" name="subject" class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td colspan="2">
                        <textarea cols="10" rows="15" name="content"
                        class="form-control"><?php echo $content; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th style="height:51px;">작성 날짜 </th>
                    <td style="vertical-align:middle;"><?php echo$register_date; ?></td>
                </tr>
                <tr>
                    <th style="height:51px;">조회수 </th>
                    <td style="vertical-align:middle;"><?php echo$view; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <a class="btn btn-default" href="hack_issue_list.php?page=<?php echo $page ?>">글 목록으로</a>
                        <a class="btn btn-default pull-right"
                        onclick="document.getElementById('insert_hack_issue').submit();"> 수정하기 </a>
                        <a class="btn btn-default pull-right"
                        href="hack_issue_delete.php?index=<?php echo $index ?>&page=<?php echo $page ?>"> 삭제하기 </a>
                    </td>
                </tr>
            </form>
        </table>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous">
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var fileTarget = $('.filebox .upload-hidden');

        fileTarget.on('change', function () {
            if (window.FileReader) {
                var filename = $(this)[0].files[0].name;
            } else {
                var filename = $(this).val().split('/').pop().split('\\').pop();
            }

            $(this).siblings('.upload-name').val(filename);
        });
    });
</script>
</body>
</html>
