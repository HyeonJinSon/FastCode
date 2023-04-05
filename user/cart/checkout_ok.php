<?php

    session_start();

    include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
    ini_set( 'display_errors', '0' );

    $lecid = $_POST['lecid'];
    $ssid = session_id();
    $userid = $_SESSION['USERID'];

    //lectures 테이블에서 lecid 값을 조회
    // $query = "SELECT lecid from lectures where ssid='".$ssid."'";
    // $result = $mysqli->query($query) or die("query error => ".$mysqli->error);
    // $rs = $result->fetch_object();

    //user_lectures 테이블에서 결제완료된 lecid의 값을 lecid 칼럼에 넣어준다.
    $sql="INSERT INTO `user_lectures`(`lecid`,`userid`) VALUES ('".$lecid."','".$userid."')";
    $result2 = $mysqli->query($sql) or die($mysqli->error);

    if($result2){
      echo "<script> alert('결제가 완료되었습니다.');
        location.href = '../class/myclass.php';</script>";
    }else{
      echo "<script> alert('결제되지 않았습니다.')";
    }
    
    echo json_encode($data);

?>