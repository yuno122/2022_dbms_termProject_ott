<?php

// ottyoon database에 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");

$filtered = array(
  'userid'=>mysqli_real_escape_string($conn,$_POST['userid']),
  'username'=>mysqli_real_escape_string($conn,$_POST['username']),
  'userpassword'=>mysqli_real_escape_string($conn,$_POST['userpassword']),
  'phone'=>mysqli_real_escape_string($conn,$_POST['phone']),
  'address'=>mysqli_real_escape_string($conn,$_POST['address'])
);


//user 테이블의 insert sql문
$sql = "
  INSERT INTO user VALUES
  (
        '{$filtered['userid']}',
        '{$filtered['username']}',
        '{$filtered['userpassword']}',
        '{$filtered['phone']}',
        '{$filtered['address']}'
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
