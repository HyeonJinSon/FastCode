<?php
    session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
    ini_set( 'display_errors', '0' );



    if(!isset($_SESSION['USERID'])){ //로그인 안되어있으면
        echo '<script> alert("로그인을 해주세요.");
        location.href="http://fastcode.dothome.co.kr/user/member/login.php";
        </script>';
        exit;
    } 
    
    $lecid = $_POST['lecid'];
    $userid = $_POST['userid'];
    $endDate = $_POST['endDate'];
    $dateover = date("Y-m-d");

    //cart 테이블과 user_lectures에 동일한 lecid가 있는지 조회.
    $query1 = "SELECT lecid from cart where userid='".$userid."'AND lecid='".$lecid."'";
    $result1 = $mysqli->query($query1) or die("query error => ".$mysqli->error);
    $rs1 = $result1->fetch_object();

    $query2 = "SELECT lecid from user_lectures where userid='".$userid."' AND lecid='".$lecid."'";
    $result2 = $mysqli->query($query2) or die("query error => ".$mysqli->error);
    $rs2 = $result2->fetch_object();

    if($rs1){
        $data = array("result"=>"fail","msg"=>"이미 장바구니에 담겼습니다.");
    } else if($rs2){
        $data = array("result"=>"fail","msg"=>"수강중인 강좌입니다.");
    } else if($endDate < $dateover){
        $data = array("result"=>"fail","msg"=>"수강신청이 불가능한 강의입니다.");
    } else{
        $sql = "INSERT INTO `cart`(`lecid`,`userid`,`cnt`,`regdate`) VALUES('".$lecid."','".$userid."','1',now())";
        $result = $mysqli->query($sql) or die($mysqli->error);
        if($result){
            $data = array("result"=>"ok","msg"=>"장바구니에 담겼습니다.");
        }
    }
    echo json_encode($data);
    


?>