<?php
// database 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");
$sql = "SELECT * FROM profile";
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
    <h2>#profile table</h2>
    <a href="index.php">메인으로 돌아가기</a>

    <table border="1" width="1000" height="300" align="center">
      <thead>
        <tr>
        <th>profileid</th>
        <th>userid</th>
        <th>nickname</th>
        <th>ratings</th>
        <th></th>
      </tr>
      </thead>

      <?php
      while($row = mysqli_fetch_array($result)){
        ?>
        <tr align = "center">
        <td><?php echo $row['profileid'];?></td>
        <td><?php echo $row['userid'];?></td>
        <td><?php echo $row['nickname'];?></td>
        <td><?php echo $row['ratings'];?></td>
        <td>
            <form action="delete_profile.php" method="post">
              <input type="hidden" name="profileid" value="<?=$row['profileid']?>">
              <input type="submit" value="delete">
            </form>
        </td>
        </tr>
        <?php
      }
      ?>
      </table>
      <form align="center" action="insert_profile.php" method="POST">
        <h3>생성할 프로필의 정보를 입력하세요</h3>

        <p><input type="text" name="profileid" placeholder="프로필번호" ></p>
        <p><input type="text" name="userid" placeholder="아이디" ></p>
        <p><input type="text" name="nickname" placeholder="별명" ></p>
        <p><input type="text" name="ratings" placeholder="관람등급"></p>
        <p><input type="submit" value="Submit"></p>

      </form>


  </body>

</html>
