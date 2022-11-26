<?php

// ottyoon database에 접속
$conn = mysqli_connect("192.168.56.101:4567","yhshin","1234","ottyoon");

//user 테이블의 delete sql문
$sql = "
  DELETE FROM contents WHERE contentsid='{$_POST['contentsid']}';
";

//sql문 실행
$result = mysqli_query($conn,$sql);

//sql문 실행 에러 발생 시
if($result === false){
  echo '데이터 삭제 에러, 삭제할 contentsid를 확인해보세요.';
  echo mysqli_error($conn);
}else{
  echo '데이터 삭제 성공! <a href="select_contents.php">돌아가기</a>';
}
?>
