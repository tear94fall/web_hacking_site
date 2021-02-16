<!doctype html>
<meta charset="utf-8">
<html>
<head>
    <link rel="stylesheet" href="css/home_sty.css">
    <script src=js/frcnt_scroll.js></script>
    <style>
        table {
            width: 90%;
        }

        table, th, td {
            border-collapse: collapse;
            border: 1px solid #bcbcbc;
        }

        tr {
            height: 30px;
        }

        .train {
            background-color: #fbdbf2;
            color: #f1477b;
            text-decoration: underline;
            font-weight: bold;
        }

        #table_title {
            height: 30px;
            background-color: #eeeeee;
        }
    </style>
</head>
<body>
<div id="bottom">
    <div id="freeboard">
        <div class="frttl">자유게시판</div>
        <div class="frcnt">
            <ul id="scroll">
                <?php
                    include "dbconn.php";
                    $sql = "SELECT * FROM freeboard ORDER BY idx DESC";
                    $result = $connect->query($sql) or die($this->_connect->error);
                    $row = $result->fetch_array();
                    $num_match = mysqli_num_rows($result);

                    if($num_match==0){
                        echo "게시물이 없습니다.";
                    }else{
                        for ($i = 0; $i < $num_match; $i++) {
                            mysqli_data_seek($result, $i);
                            $row = mysqli_fetch_array($result);
                            $subject = $row['subject'];
                            $index = $row['idx'];
                            echo "<li><a href='freeboard/freeboard_view.php"."?subject=".$subject."&index=".$index."' target='_parent'>" . $subject . "</a></li>";
                        }
                    }
                ?>
            </ul>
        </div>
    </div>

    <div id="notice">
        <?php
            include "dbconn.php";
            $sql = "SELECT * FROM notice_board limit 1";
            $result = $connect->query($sql) or die($this->_connect->error);
            $row = $result->fetch_array();
            $subject = NULL;
            $content = NULL;
            $num_match = mysqli_num_rows($result);

            if($num_match==0){
                echo "게시물이 없습니다.";
            }else{
                $subject = $row['subject'];
                $content = $row['content'];
                
                if(!is_null($content) && !is_null($subject)){
                    echo "<h3>" . $subject . "</h3>";
                    echo $content;
                }
            }
        ?>
    </div>
    <div id="rank" align="center">
        <?php
        include "dbconn.php";
        session_start();

        $myuserid = NULL;

        if(isset($_SESSION['userid'])){
            $myuserid = $_SESSION['userid'];
        }

        if ($myuserid) {
            echo "        <table class=\"ranking_table\">
            <caption></caption>
            <thead>
            <tr id=\"table_title\">
                <th id='col2'>아이디</th>
                <th id='col3'>이름</th>
                <th id='col2'>이메일</th>
                <th id='col4'>포인트</th>
            </tr>
            </thead>
            <tbody><br>
            <span><h3>내정보</h3></span><br>";
            $sql = "select * from member where userid ='" . $myuserid . "';";
            $result = $connect->query($sql) or die($this->_connect->error);
            $row = $result->fetch_array();

            $my_name = $row['username'];
            $my_point = $row['point'];
            $my_email = $row['email'];

            echo "<tr>
                        <td align='center'>$myuserid</td>
                        <td align='center'>$my_name</td>
                        <td align='center' >$my_email</td>
                        <td align='center'>$my_point</td>
                        </tr></tbody></table><br>";
        }
        ?>
        <span class="rank_title"><h3>포인트 랭킹</h3></span><br>

        <table class="ranking_table">
            <caption></caption>
            <thead>
            <tr id="table_title">
                <th id='col1'>순위</th>
                <th id='col2'>아이디</th>
                <th id='col3'>이름</th>
                <th id='col4'>포인트</th>
            </tr>
            </thead>
            <tbody>
            <?php
            /* 나머지 순위 표시 */

            $sql = "select * from member order by point desc;";
            $result = $connect->query($sql) or die($this->_connect->error);
            $row = $result->fetch_array();
            $num_match = mysqli_num_rows($result);

            $ranking = 1;

            if ($num_match > 10) {
                $num_match = 10;
            }

            for ($i = 0; $i < $num_match; $i++) {
                mysqli_data_seek($result, $i);
                $row = mysqli_fetch_array($result);

                $index = $row['idx'];
                $userid = $row['userid'];
                $username = $row['username'];
                $point = $row['point'];

                echo "<tr>
                        <th align='center' class='train'>$ranking</th>
                        <td align='center'>$userid</td>
                        <td align='center'>$username</td>
                        <td align='center'>$point</td>
                        </tr>";

                $ranking++;
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <!--
                <td colspan="4" align="center">순위는 각 문제별 포인트에 따라 채점됩니다.</td>
            -->
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<script type="text/javascript">
    var real_search_keyword = new textScroll('scroll'); // 스크롤링 하고자하는 ul 엘리먼트의 id값을 인자로 넣습니다
    real_search_keyword.name = "real_search_keyword"; // 인스턴스 네임을 등록합니다
    real_search_keyword.start(); // 스크롤링 시작
</script>
<script src=js/home_script.js></script>
</body>
</html>
