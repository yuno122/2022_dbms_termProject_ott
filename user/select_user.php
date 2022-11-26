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
    <a href="/index.php">메인으로 돌아가기</a>

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
        $filtered = array(
          'userid'=>htmlspecialchars($row['userid']),
          'username'=>htmlspecialchars($row['username']),
          'userpassword'=>htmlspecialchars($row['userpassword']),
          'phone'=>htmlspecialchars($row['phone']),
          'address'=>htmlspecialchars($row['address'])
        );
        ?>
        <tr align = "center">
        <td><?=$filtered['userid']?></td>
        <td><?=$filtered['username']?></td>
        <td><?=$filtered['userpassword']?></td>
        <td><?=$filtered['phone']?></td>
        <td><?=$filtered['address']?></td>
        <td>
            <form action="delete_user.php" method="post">
              <input type="hidden" name="userid" value="<?=$row['userid']?>">
              <input type="submit" value="delete">
            </form>
        </td>
        <td>
            <a href="select_user.php?userid=<?=$filtered['userid']?>">update</a>
        </td>
        </tr>
        <?php
      }
      ?>
      </table>
      <?php

      $escaped = array(
        'userid'=>'',
        'username'=>'',
        'userpassword'=>'',
        'phone'=>'',
        'address'=>''
      );

      // 사용자 생성
      $form_action = 'insert_user.php';
      // 사용자 수정
      if(isset($_GET['userid'])){
        $filtered_id = mysqli_real_escape_string($conn, $_GET['userid']);
        $sql = "SELECT * FROM user WHERE userid = '{$filtered_id}'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $escaped['userid'] = htmlspecialchars($row['userid']);
        $escaped['username'] = htmlspecialchars($row['username']);
        $escaped['userpassword'] = htmlspecialchars($row['userpassword']);
        $escaped['phone'] = htmlspecialchars($row['phone']);
        $escaped['address'] = htmlspecialchars($row['address']);
        $form_action = 'update_user.php';
      }

      ?>
      <form align="center" action="<?=$form_action?>" method="POST">
        <h3>생성 & 수정할 사용자의 정보를 입력하세요</h3>

        <p><input type="text" name="userid" placeholder="아이디" value="<?=$escaped['userid']?>" ></p>
        <p><input type="text" name="username" placeholder="이름" value="<?=$escaped['username']?>"></p>
        <p><input type="password" name="userpassword" placeholder="비밀번호" value="<?=$escaped['userpassword']?>"></p>
        <p><input type="tel" name="phone" placeholder="전화번호" value="<?=$escaped['phone']?>"> </p>
        <p><input type="text" name="address" placeholder="주소" value="<?=$escaped['address']?>"> </p>
        <p><input type="submit" value="Submit"></p>

      </form>


  </body>

</html>
