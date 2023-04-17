<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    ini_set('display_errors','1');

    $cate1 = $_POST['cate1'];
    $html = "<option value=\"\">중분류 선택</option>";
    $query = "SELECT * from category where step=2 and pcode='{$cate1}'";

    $result = $mysqli -> query($query) or die("query error =>".$mysqli->error);
    
    while($rs = $result -> fetch_object()){
        $html .= "<option value=\"".$rs->code."\">".$rs->name."</option>";
    }

    echo $html;
?>