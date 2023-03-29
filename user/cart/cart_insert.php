<?php session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/inc/dbcon.php";
    ini_set( 'display_errors', '0' );

    $pid = $_POST['pid'];
    $ssid = session_id();
    $userid = $_SESSION['UID'];

    $query = "select cartid from cart where ssid='".$ssid."' and pid='".$pid."'";
    $result = $mysqli->query($query) or die("query error => ".$mysqli->error);
    $rs = $result->fetch_object();
    if($rs->cartid){
        $sql="update cart set where ssid='".$ssid."' and pid='".$pid."'";
        $result=$mysqli->query($sql) or die($mysqli->error);
    }else{
        $sql="INSERT INTO `cart`
        (`pid`,
        `userid`,
        `ssid`,
        `regdate`)
        VALUES
        ('".$pid."',
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
