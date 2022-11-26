<?php

// ottyoon database에 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");

//user 테이블의 insert sql문
$sql = "
  INSERT INTO contents VALUES
  (
        '{$_POST['contentsid']}',
        '{$_POST['title']}',
        '{$_POST['genre']}',
        '{$_POST['ratings']}',
        '{$_POST['country']}',
        '{$_POST['makedate']}',
        '{$_POST['episode']}'
  )
";

//sql문 실행
$result = mysqli_query($conn,$sql);

//sql문 실행 에러 발생 시
if($result === false){
  echo '데이터 삽입 에러 발생';
  echo mysqli_error($conn);
}else{
  header('Location: select_user.php');
}
?>
