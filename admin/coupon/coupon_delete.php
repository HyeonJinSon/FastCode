<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    $cid = $_POST['idx'];
    $sql = "DELETE from coupons WHERE cid='".$cid."'"; 

    $result = $mysqli -> query($sql) or die("query Error! =>".$mysqli->error);

    if($result){
        $returned_data = array('result' => true);
    } else{
        $returned_data = array('result' => false);
    }

    echo json_encode($returned_data);

?>