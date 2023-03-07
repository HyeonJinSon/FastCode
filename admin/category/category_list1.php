<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    ini_set('display_errors','1');

    $cate2 = $_POST['cate2'];

    $query = "SELECT * from category where step=2 and code='{$cate2}'";

    $result = $mysqli -> query($query) or die("query error =>".$mysqli->error);
    
    while($rs = $result -> fetch_object()){
        $cate1 = $rs->pcode ;
    }

    $query = "SELECT * from category where step=1 and code='{$cate1}'";

    $result = $mysqli -> query($query) or die("query error =>".$mysqli->error);

    while($rs = $result -> fetch_object()){
        $cate1name = $rs->name ;
    }
    echo $cate1name;

?>