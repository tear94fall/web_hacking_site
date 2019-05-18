<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>issue</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hack_issue_sty.css">
    <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">
  </head>
  <body>
    <h1>해킹 보안 이슈</h1>
    <p class="issue_cnt">해킹, 보안과 관련된 이슈를 전해 드립니다.
    </p>
    <div class="issue_table">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>번호</th>
            <th>제목</th>
            <th>등록일</th>
            <th>조회수</th>
          </tr>
        </thead>
        <tbody>
        <?php
        include "dbconn.php";
        $sql = "SELECT * FROM hack_issue";
        $result = $connect->query($sql) or die($this->_connect->error);
        $row = $result->fetch_array();
        $num_match = mysqli_num_rows($result);

        for ($i=0; $i<$num_match; $i++)
        {
            mysqli_data_seek($result, $i);
            $row = mysqli_fetch_array($result);
            $index = $row['idx'];
            $subject = $row['subject'];
            $register_date = $row['register_date'];
            $view = $row['view'];
            echo "<tr>
            <td>$index</td>
            <td><a href='#'>$subject</a></td>
            <td>$register_date</td>
            <td>$view</td>
          </tr>";
        }
        ?>
        </tbody>
      </table>
      <div class="text-center">
        <ul class="pagination">
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
        </ul>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>
