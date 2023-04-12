<?php
  include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";

  $lecid = $_POST['lecid']; //강좌 번호
  $userid = $_POST['userid']; //사용자 번호
  $date = date("Y-m-d:H-i-s");
  
  //1. 등록전 userid와 lecid 가 모두 일치하는 값이 있으면
  $sql_duplicate = "SELECT lecid, userid
                    FROM user_lectures
                    WHERE lecid='".$lecid."' 
                    AND userid='".$userid."'";

  $result_dup = $mysqli->query($sql_duplicate) or die($mysqli->error);
  $rs_dup =  $result_dup -> fetch_object();
  
  //2. 해당강의 있다는 알림띄우기
  if($rs_dup->lecid) {
    //3. 등록 처리 안함
    echo '이미 신청한 강의입니다.';
  } else {
    $sql="INSERT INTO user_lectures (`lecid`,`userid`,`reg_date`) VALUES ('".$lecid."','".$userid."','".$date."')";
    $result2 = $mysqli->query($sql) or die($mysqli->error);

    // echo '해당 강의가 신청되었습니다.|index.php';
    echo '해당 강의가 신청되었습니다.';
  }

?>