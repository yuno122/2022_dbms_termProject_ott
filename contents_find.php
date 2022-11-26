<?php

// ottyoon database에 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");

//user 테이블의 select sql문
$sql = "
  SELECT * FROM contents WHERE title ='{$_POST['title']}';
";

//sql문 실행
$result = mysqli_query($conn,$sql);

//sql문 실행 에러 발생 시
if($result === false){
  echo '데이터 검색 에러, 검색 할 title을 확인해보세요.';
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
    <h2>#검색한 컨텐츠 목록</h2>

    <table border="1" width="1000" height="300" align="center">
      <thead>
        <tr>
        <th>contentsid</th>
        <th>title</th>
        <th>genre</th>
        <th>ratings</th>
        <th>country</th>
        <th>makedate</th>
        <th>episode</th>
      </tr>
      </thead>
      <?php
      while($row = mysqli_fetch_array($result)){
        ?>
        <tr align = "center">
        <td><?php echo $row['contentsid'];?></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['genre'];?></td>
        <td><?php echo $row['ratings'];?></td>
        <td><?php echo $row['country'];?></td>
        <td><?php echo $row['makedate'];?></td>
        <td><?php echo $row['episode'];?></td>
        </tr>
        <?php
      }
      ?>

      </table>


  </body>

</html>
