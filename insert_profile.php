<?php

// ottyoon database에 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");

//user 테이블의 insert sql문
$sql = "
  INSERT INTO profile VALUES
  (
        '{$_POST['profileid']}',
        '{$_POST['userid']}',
        '{$_POST['nickname']}',
        '{$_POST['ratings']}'
  )
";

//sql문 실행
$result = mysqli_query($conn,$sql);

//sql문 실행 에러 발생 시
if($result === false){
  echo '데이터 삽입 에러 발생';
  echo mysqli_error($conn);
}else{
  echo '데이터 삽입 성공! <a href="select_profile.php">돌아가기</a>';
}
?>
