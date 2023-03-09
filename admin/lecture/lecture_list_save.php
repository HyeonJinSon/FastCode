<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    if(!$_SESSION['AUID']){
        echo "<script>
                alert('권한이 없습니다.');
                history.back();
            </script>";
        exit;
    };

    $lecid = $_REQUEST['lecid'];
    $status = $_REQUEST['status'];
    $recom = $_REQUEST['recom'];
    $forbegin = $_REQUEST['forbegin'];
    $forbasic = $_REQUEST['forbasic'];
    $forinter = $_REQUEST['forinter'];
    $foradv = $_REQUEST['foradv'];

    

?>