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


//user 테이블의 UPDATE sql문
$sql = "
  UPDATE user
    SET
        userid = '{$filtered['userid']}',
        username = '{$filtered['username']}',
        userpassword = '{$filtered['userpassword']}',
        phone = '{$filtered['phone']}',
        address = '{$filtered['address']}'
    WHERE
      userid = '{$filtered['userid']}'
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
