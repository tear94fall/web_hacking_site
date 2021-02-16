<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>issue</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/hack_issue_sty.css">
    <link rel="stylesheet" href="../css/top_level.css">
    <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">
    <style>
        #number{
            width: 8%;
        }
        #subject{
            width: 22%;
        }
        #writer{
            width: 15%;
        }
        #reg_date{
            width: 15%;
        }
        #view_count{
            width: 5%;
        }
    </style>
</head>
<body>
    <iframe src="../top_and_top.html" id="top" frameborder="0" width="100%" height="80px"></iframe>
    <h1>자유게시판</h1>
    <p class="issue_cnt">자유롭게 여러분의 소식을 올려주세요
    </p>
    <div class="issue_table">
        <table class="table table-hover">
            <thead>
                <tr id="freeboard_content">
                    <th id="number">번호</th>
                    <th id="subject"->제목</th>
                    <th id="writer">작성자</th>
                    <th id="reg_date">등록일</th>
                    <th id="view_count">조회수</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../dbconn.php";
                $max_list_size = 5;
                $sql = "SELECT * FROM freeboard order by idx desc;";
                $result = $connect->query($sql) or die($this->_connect->error);
                $row = $result->fetch_array();
                $total_record = mysqli_num_rows($result);
                $page = NULL;

                if(isset($_REQUEST['page'])){
                    $page = $_REQUEST['page'];
                }
        // 전체 페이지 수($total_page) 계산
                if ($total_record % $max_list_size == 0)
                    $total_page = floor($total_record / $max_list_size);
                else
                    $total_page = floor($total_record / $max_list_size) + 1;
        if (!$page)                 // 페이지번호($page)가 0 일 때
            $page = 1;              // 페이지 번호를 1로 초기화

        // 표시할 페이지($page)에 따라 $start 계산
            $start = ($page - 1) * $max_list_size;

            $number = $total_record - $start;

            for ($i = $start; $i < $start + $max_list_size && $i < $total_record; $i++) {
                mysqli_data_seek($result, $i);
            // 가져올 레코드로 위치(포인터) 이동
                $row = mysqli_fetch_array($result);
            // 하나의 레코드 가져오기

                mysqli_data_seek($result, $i);
                $row = mysqli_fetch_array($result);
                $index = $row['idx'];
                $subject = $row['subject'];
                $register_date = $row['register_date'];
                $register_date = substr($register_date, 0, 10);
                $writer = $row['writer'];
                $view = $row['view'];
                echo "<tr>
                <td>$number</td>
                <td><a href='freeboard_view.php?index=$index&page=$page'>$subject</a></td>
                <td>$writer</td>
                <td>$register_date</td>
                <td>$view</td>
                </tr>";
                $number--;
            }
            ?>
        </tbody>
    </table>
	<div>
	<?php
    session_start();
    $userid = NULL;
    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
    }

    if ($userid) {
        echo "<a class='btn btn-default pull-right' href='freeboard_write.php'>글쓰기</a><br><br>";
    }
    ?>
	</div>
    <div class="text-center">
        <ul class="pagination">
            <?php
            // 게시판 목록 하단에 페이지 링크 번호 출력
            if($total_page==0){
				echo "게시물 없음";
            }else{
            	for ($i = 1; $i <= $total_page; $i++) {
                	if ($page == $i) {
                    	echo "<li><a href=\"#\">$i</a></li>";
                	} else {
                    	echo "<li><a href='freeboard_list.php?page=$i'>$i</a></li>";
                	}
            	}
        	}
            ?>
        </ul>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>
