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
    $sql="INSERT INTO `cart`(`lecid`,`userid`,`cnt`,`regdate`)
        VALUES('".$lecid."','".$userid."','1',now())";
    $result=$mysqli->query($sql) or die($mysqli->error);
    if($result){
        $data = array("result"=>"ok","msg"=>"장바구니에 담겼습니다.");
    }else{
        $data = array("result"=>"fail","msg"=>"실패했습니다. 다시 시도해주세요.");
    }
    echo json_encode($data);


?>