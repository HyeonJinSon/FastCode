<?php

    session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
    ini_set( 'display_errors', '0' );

    $lecid = $_POST['lecid'];
    $ssid = session_id();
    $userid = $_SESSION['USERID'];

    if(!$userid){//로그인 안되어있으면
      echo '<script>
      alert("로그인을 해주세요.");
      location.href="http://fastcode.dothome.co.kr/user/member/login.php";
      </script>';
    }

    $query = "SELECT cartid from cart where ssid='".$ssid."' and lecid='".$lecid."'";
    $result = $mysqli->query($query) or die("query error => ".$mysqli->error);
    $rs = $result->fetch_object();
    if($rs->cartid){
        echo "<script>alert('동일한 강좌가 있습니다.')</script>";
    }else{
        $sql="INSERT INTO `cart`
        (`lecid`,
        `userid`,
        `ssid`,
        `regdate`)
        VALUES
        ('".$lecid."',
        '".$userid."',
        '".$ssid."',
        now())";
        $result=$mysqli->query($sql) or die($mysqli->error);
    }
    if($result){
        $data = array("result"=>"ok");
    }else{
        $data = array("result"=>"fail");
    }
    echo json_encode($data);


?>