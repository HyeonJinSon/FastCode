<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    $idx = $_POST['selectedidx'];
    $status = $_POST['selectedStatus'];

    $sql = "UPDATE coupons SET status='{$status}' WHERE cid='{$idx}'";
    $result = $mysqli -> query($sql) or die("Query Error! => ".$mysqli->error);

    if($result){
        $returned_data = array('result' => true);
    } else{
        $returned_data = array('result' => false);
    }

    echo $returned_data;

?>