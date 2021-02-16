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
    <div class="container">
        <br>
        <table class="table table-bordered">
            <thead>
                <style>
                    th {
                        width: 230px;
                    }
                </style>
                <caption>게시글 작성</caption>
            </thead>
            <tbody>
                <form id="insert_hack_issue"action="hack_issue_insert.php" method="post" encType="multiplart/form-data">
                    <tr>
                        <th>제목:</th>
                        <td><input type="text" placeholder="제목을 입력하세요. " name="subject" class="form-control"/></td>
                    </tr>
                    <tr>
                        <th>내용:</th>
                        <td><textarea cols="10" rows="15" placeholder="내용을 입력하세요. " name="content"
                          class="form-control"></textarea></td>
                      </tr>
                      <tr>
                        <th>비밀번호:</th>
                        <td><input type="password"  name="password" placeholder="비밀번호를 입력하세요" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a class="btn btn-default">글 목록으로</a>
                            <a class="btn btn-default pull-right" onclick="document.getElementById('insert_hack_issue').submit();"> 등록 </a>
                        </td>
                    </tr>
                </form>
            </tbody>
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
