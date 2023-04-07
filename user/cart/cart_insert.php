<?php
    session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
    ini_set( 'display_errors', '0' );

    $lecid = $_POST['lecid'];
    $userid = $_POST['userid'];

    if(!$userid){//로그인 안되어있으면
      echo '<script>
      alert("로그인을 해주세요.");
      location.href="http://fastcode.dothome.co.kr/user/member/login.php";
      </script>';
    }

    // $query = "SELECT * from cart where userid='".$userid."'";
    // $result1 = $mysqli->query($query) or die("query error => ".$mysqli->error);
    // $rs = $result1->fetch_object();

    // if($rs->lecid){ //cart 테이블에 동일한 lecid가 있으면
    //     echo "<script>alert('동일한 강좌가 있습니다.')</script>";
    // }else{ //lecid가 없으면 cart에 넣어줌
        $sql="INSERT INTO `cart`(`lecid`,`userid`,`cnt`,`regdate`)
            VALUES('".$lecid."','".$userid."','1',now())";
        $result=$mysqli->query($sql) or die($mysqli->error);
    // }
    if($result){
        $data = array("result"=>"ok");
    }else{
        $data = array("result"=>"fail");
    }
    echo json_encode($data);


?>