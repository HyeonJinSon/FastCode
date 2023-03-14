<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";
    $ad_idx = $_SESSION['ADIDX'];
    
    $bookmark = $_POST['bookmark'];
    

    $sql_up = "UPDATE admins SET bookmark_code='{$bookmark}' WHERE idx='{$ad_idx}' ";
    $result_up = $mysqli->query($sql_up);

    $_SESSION['ADBOOK'] = $bookmark;

  
    echo $bookmark;
?>