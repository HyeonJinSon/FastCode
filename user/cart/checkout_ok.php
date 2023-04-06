<?php

  include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
  ini_set( 'display_errors', '0' );

  $lecids = $_POST['lecid'];
  $cartids = $_POST['cartid'];
  $userid = $_POST['userid'];
  $ucid = $_POST['ucid'];

  foreach($lecids as $lecid){
    //user_lectures 테이블에서 결제완료된 lecid와 userid 의 값을 각 칼럼에 넣어준다.
    $sql="INSERT INTO user_lectures (`lecid`,`userid`) VALUES ('".$lecid."','".$userid."')";
    $result2 = $mysqli->query($sql) or die($mysqli->error);
    
    foreach($cartids as $cartid){
    //완료되면 cart 테이블에서 결제되어 넘어간 강좌의 값을 없애준다.
      $sql2 ="DELETE from cart where cartid='".$cartid."' and userid='".$userid."'" ;
      $mysqli->query($sql2);
    }
    //완료되면 usercoupons 테이블에서 사용한 쿠폰의 값을 없애준다.
      $sql3 ="DELETE from user_coupons where ucid='".$ucid."' and userid='".$userid."'" ;
      $mysqli->query($sql3);
  }
  if($result2){
    $data = array("result"=>"ok");
  }else{
    $data = array("result"=>"fail");
  }
  echo json_encode($data);


?>