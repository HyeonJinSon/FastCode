<?php

  include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
  ini_set( 'display_errors', '0' );

  $lecids = $_POST['lecid']; //강좌 번호
  $cartids = $_POST['cartid']; //장바구니 번호
  $userid = $_POST['userid']; //사용자 번호
  $ucid = $_POST['ucid']; //사용자 쿠폰 번호
  $date = date("Y-m-d:H-i-s");

  foreach($lecids as $lecid){
    //user_lectures 테이블에 결제완료된 lecid와 userid 의 값을 각 칼럼에 넣어준다.
    $sql="INSERT INTO user_lectures (`lecid`,`userid`,`reg_date`) VALUES ('".$lecid."','".$userid."','".$date."')";
    $result2 = $mysqli->query($sql) or die($mysqli->error);
    
    foreach($cartids as $cartid){
    //cart 테이블에 결제되어 넘어간 강좌의 값을 없애준다.
      $sql2 ="DELETE from cart where cartid='".$cartid."' and userid='".$userid."'" ;
      $mysqli->query($sql2);
    }
    //user_coupons 테이블에 사용한 쿠폰의 값을 없애준다.
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