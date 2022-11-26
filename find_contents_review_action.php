<?php

// ottyoon database에 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");

//사용자 별 카드 검색 sql 문
$sql = "
  SELECT contents.contentsid,title,genre,userid,content,gpa
  FROM contents,review
  WHERE contents.contentsid = review.contentsid
  and review.contentsid = '{$_POST['contentsid']}';
";

//sql문 실행
$result = mysqli_query($conn,$sql);

//sql문 실행 에러 발생 시
if($result === false){
  echo '데이터 검색 에러, 검색 할 contentsid를 확인해보세요.';
  echo mysqli_error($conn);
}else{
  echo '데이터 검색 성공! <a href="index.php">돌아가기</a>';
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ottyoon</title>
  </head>
  <body>
    <h1>Ott platfrom database management system_yoonho</h1>
    <h2>#creditCard table</h2>
    <a href="index.php">메인으로 돌아가기</a>

    <table border="1" width="1000" height="300" align="center">
      <thead>
        <tr>
        <th>contentsid</th>
        <th>title</th>
        <th>genre</th>
        <th>userid</th>
        <th>content</th>
        <th>gpa</th>
      </tr>
      </thead>

      <?php
      while($row = mysqli_fetch_array($result)){
        ?>
        <tr align = "center">
        <td><?php echo $row['contentsid'];?></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['genre'];?></td>
        <td><?php echo $row['userid'];?></td>
        <td><?php echo $row['content'];?></td>
        <td><?php echo $row['gpa'];?></td>
        </tr>
        <?php
      }
      ?>
      </table>

  </body>

</html>
