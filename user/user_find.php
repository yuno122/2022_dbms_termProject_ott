<?php

// ottyoon database에 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");

//user 테이블의 select sql문
$sql = "
  SELECT * FROM user WHERE username ='{$_POST['username']}';
";

//sql문 실행
$result = mysqli_query($conn,$sql);

//sql문 실행 에러 발생 시
if($result === false){
  echo '데이터 검색 에러, 검색 할 username을 확인해보세요.';
  echo mysqli_error($conn);
}else{
  echo '데이터 검색 성공! <a href="/index.php">돌아가기</a>';
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ottyoon</title>
  </head>
  <body>
    <h2>#검색한 유저 목록</h2>

    <table border="1" width="1000" height="300" align="center">
      <thead>
        <tr>
        <th>uesrid</th>
        <th>username</th>
        <th>userpassword</th>
        <th>phone</th>
        <th>address</th>
      </tr>
      </thead>
      <?php
      while($row = mysqli_fetch_array($result)){
        ?>
        <tr align = "center">
        <td><?php echo $row['userid'];?></td>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['userpassword'];?></td>
        <td><?php echo $row['phone'];?></td>
        <td><?php echo $row['address'];?></td>
        </tr>
        <?php
      }
      ?>

      </table>


  </body>

</html>
