<?php 
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";

$userid=$_POST["userid"];
$passwd=$_POST["passwd"];
$passwd=hash('sha512', $passwd);


$sql = "SELECT * from members where userid='".$userid."' and userpw='".$passwd."'";
$result = $mysqli -> query($sql) or die('Query error=>'.$mysqli->error);
$rs = $result->fetch_object();

if($rs){
    $_SESSION['USERID'] = $rs->userid;
    $_SESSION['USERNAME'] = $rs->username;
    $sql = "UPDATE cart set userid='".$userid."' where ssid='".session_id()."'"; 
    $result = $mysqli -> query($sql) or die('Query error=>'.$mysqli->error);
    echo "<script>location.href='../index.php';</script>";
    exit;
} else{
    echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다.'); history.back()</script>";
    exit;
}
?>