<?php
    session_start();

    if(!$_SESSION['AUID']){
        echo "<script>
                alert('접근 권한이 없습니다');
                history.back();
            </script>";
    };
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    ini_set('display_errors','1');

    $name = $_POST['name'];
    $code = $_POST['code'];
    $pcode = $_POST['pcode'];
    $step = $_POST['step'];

    //코드와 분류명 있는지 확인
    $sql = "SELECT cid from category where step='{$step}' and (name='{$name}' or code='{$code}')";
    $result = $mysqli -> query($sql);
    $rs = $result->fetch_object();
    if($rs->cid){
        $return_data = array("result" => '-1');
        echo json_encode($return_data);
        exit;
    }

    $sql2 = "INSERT INTO category (code, pcode, name, step) VALUES ('{$code}','{$pcode}','{$name}','{$step}')";
    $result2 = $mysqli -> query($sql2);

    if($result2){
        $return_data = array("result" => '1');
        echo json_encode($return_data);
    }else{
        $return_data = array("result" => '0');
        echo json_encode($return_data);
    }
?>