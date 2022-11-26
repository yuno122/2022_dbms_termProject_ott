<?php
// database 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");
$sql = "SELECT * FROM contents";
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
    <h2>#Contents table</h2>
    <a href="/index.php">메인으로 돌아가기</a>

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
        <th></th>
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
        <td>
            <form action="delete_contents.php" method="post">
              <input type="hidden" name="contentsid" value="<?=$row['contentsid']?>">
              <input type="submit" value="delete">
            </form>
        </td>
        </tr>
        <?php
      }
      ?>
      </table>
      <form align="center" action="insert_contents.php" method="POST">
        <h3>생성할 컨텐츠의 정보를 입력하세요</h3>

        <p><input type="text" name="contentsid" placeholder="컨텐츠번호" ></p>
        <p><input type="text" name="title" placeholder="제목" ></p>
        <p><input type="text" name="genre" placeholder="장르" ></p>
        <p><input type="text" name="ratings" placeholder="관람등급" </p>
        <p><input type="text" name="country" placeholder="국가" </p>
        <p><input type="text" name="makedate" placeholder="제작일" </p>
        <p><input type="text" name="episode" placeholder="회차" </p>
        <p><input type="submit" value="Submit"></p>

      </form>


  </body>

</html>
