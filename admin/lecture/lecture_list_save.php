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

    foreach($lecid as $l){
        $status[$l] = $status[$l];
        $recom[$l] = $recom[$l]?? 0;
        $forbegin[$l] = $forbegin[$l]?? 0;
        $forbasic[$l] = $forbasic[$l]?? 0;
        $forinter[$l] = $forinter[$l]?? 0;
        $foradv[$l] = $foradv[$l]?? 0;

        $query = "UPDATE lectures set sale_status='".$status[$l]."', recom='".$recom[$l]."', forbegin='".$forbegin[$l]."', forbasic='".$forbasic[$l]."', forinter='".$forinter[$l]."', foradv='".$foradv[$l]."' where lecid=".$l;
        $rs = $mysqli -> query($query) or die($mysqli -> error);
    }

    if($rs){
        echo "<script>
                alert('수정 완료');
                history.back();
            </script>";
        exit;
    }else{
        echo "<script>
                alert('수정 실패');
                history.back();
            </script>";
        exit;
    }

?>