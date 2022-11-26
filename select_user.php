<?php
// database 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");
$sql = "SELECT * FROM user";
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
    <h2>#User table</h2>
    <a href="index.php">메인으로 돌아가기</a>

    <table border="1" width="1000" height="300" align="center">
      <thead>
        <tr>
        <th>uesrid</th>
        <th>username</th>
        <th>userpassword</th>
        <th>phone</th>
        <th>address</th>
        <th></th>
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
        <td>
            <form action="delete_user.php" method="post">
              <input type="hidden" name="userid" value="<?=$row['userid']?>">
              <input type="submit" value="delete">
            </form>
        </td>
        </tr>
        <?php
      }
      ?>
      </table>
      <form align="center" action="insert_user.php" method="POST">
        <h3>생성할 사용자의 정보를 입력하세요</h3>

        <p><input type="text" name="userid" placeholder="아이디" ></p>
        <p><input type="text" name="username" placeholder="이름" ></p>
        <p><input type="password" name="userpassword" placeholder="비밀번호" ></p>
        <p><input type="tel" name="phone" placeholder="전화번호" </p>
        <p><input type="text" name="address" placeholder="주소" </p>
        <p><input type="submit" value="Submit"></p>

      </form>


  </body>

</html>
