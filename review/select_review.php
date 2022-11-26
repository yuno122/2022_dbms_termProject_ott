<?php
// database 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");
$sql = "SELECT * FROM review";
$result = mysqli_query($conn,$sql);

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ottyoon</title>
  </head>
  <body>
    <h1>Ott platfrom database management system_yoonho</h1>
    <h2>#review table</h2>
    <a href="/index.php">메인으로 돌아가기</a>

    <table border="1" width="1000" height="300" align="center">
      <thead>
        <tr>
        <th>reviewid</th>
        <th>userid</th>
        <th>contentsid</th>
        <th>content</th>
        <th>gpa</th>
        <th></th>
      </tr>
      </thead>

      <?php
      while($row = mysqli_fetch_array($result)){
        ?>
        <tr align = "center">
        <td><?php echo $row['reviewid'];?></td>
        <td><?php echo $row['userid'];?></td>
        <td><?php echo $row['contentsid'];?></td>
        <td><?php echo $row['content'];?></td>
        <td><?php echo $row['gpa'];?></td>
        <td>
            <form action="delete_review.php" method="post">
              <input type="hidden" name="reviewid" value="<?=$row['reviewid']?>">
              <input type="submit" value="delete">
            </form>
        </td>
        </tr>
        <?php
      }
      ?>
      </table>
      <form align="center" action="insert_review.php" method="POST">
        <h3>생성할 사용자의 정보를 입력하세요</h3>

        <p><input type="text" name="reviewid" placeholder="리뷰번호" ></p>
        <p><input type="text" name="userid" placeholder="아이디" ></p>
        <p><input type="text" name="contentsid" placeholder="컨텐츠번호" ></p>
        <p><input type="text" name="content" placeholder="내용" </p>
        <p><input type="text" name="gpa" placeholder="평점" </p>
        <p><input type="submit" value="Submit"></p>

      </form>


  </body>

</html>
