<?php session_start();
include $_SERVER["DOCUMENT_ROOT"]."/inc/dbcon.php";
ini_set( 'display_errors', '0' );

$lecid = $_POST['lecid'];
$ssid = session_id();
$userid = $_SESSION['UID'];

$query = "select cartid from cart where ssid='".$ssid."' and lecid='".$lecid."'";
$result = $mysqli->query($query) or die("query error => ".$mysqli->error);
$rs = $result->fetch_object();
if($rs->cartid){
    $sql="update cart set where ssid='".$ssid."' and lecid='".$lecid."'";
    $result=$mysqli->query($sql) or die($mysqli->error);
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
