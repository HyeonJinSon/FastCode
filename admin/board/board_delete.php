<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";
    // include $_SERVER['DOCUMENT_ROOT']."/board/lib.php";

    $idx = $_POST['idx'];
    $sql = "DELETE from board WHERE idx='".$idx."'"; 

    $result = $mysqli -> query($sql) or die("query Error! =>".$mysqli->error);

    if($result){
        $data = array('result' => true);
    } else{
        $data = array('result' => false);
    }

    echo json_encode($data);

?>