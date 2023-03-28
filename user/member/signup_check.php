<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    $username=$_POST["username"];
    $userid=$_POST["userid"];

    $sql = "SELECT COUNT(*) AS cnt FROM members WHERE username='".$username."' or userid='".$userid."'";
    $result = $mysqli -> query($sql) or die("query error=>".$mysqli->error);
    $rs = $result -> fetch_object();

    $data = array("cnt"=>$rs->cnt);
    echo json_encode($data);
?>