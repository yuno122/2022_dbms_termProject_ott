<?php
// database 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");
$sql = "SELECT * FROM creditCard";
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
    <h2>#creditCard table</h2>
    <a href="/index.php">메인으로 돌아가기</a>

    <table border="1" width="1000" height="300" align="center">
      <thead>
        <tr>
        <th>cardid</th>
        <th>userid</th>
        <th>bank</th>
        <th>validity</th>
        <th>cardpassword</th>
        <th></th>
        <th></th>
      </tr>
      </thead>

      <?php
      while($row = mysqli_fetch_array($result)){
        ?>
        <tr align = "center">
        <td><?php echo $row['cardid'];?></td>
        <td><?php echo $row['userid'];?></td>
        <td><?php echo $row['bank'];?></td>
        <td><?php echo $row['validity'];?></td>
        <td><?php echo $row['cardpassword'];?></td>
        <td>
            <form action="delete_creditcard.php" method="post">
              <input type="hidden" name="cardid" value="<?=$row['cardid']?>">
              <input type="submit" value="delete">
            </form>
        </td>
        </tr>
        <?php
      }
      ?>
      </table>
      <form align="center" action="insert_creditCard.php" method="POST">
        <h3>생성할 결제카드의 정보를 입력하세요</h3>

        <p><input type="text" name="cardid" placeholder="카드번호" ></p>
        <p><input type="text" name="userid" placeholder="아이디" ></p>
        <p><input type="text" name="bank" placeholder="은행" ></p>
        <p><input type="text" name="validity" placeholder="유효기간"> </p>
        <p><input type="password" name="cardpassword" placeholder="비밀번호" </p>
        <p><input type="submit" value="Submit"></p>

      </form>


  </body>

</html>
