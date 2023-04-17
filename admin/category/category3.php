<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    ini_set('display_errors','1');

    $cate2 = $_POST['cate2'];
    $html = "<option value=\"\">소분류 선택</option>";
    $query = "SELECT * from category where step=3 and pcode='{$cate2}'";

    $result = $mysqli -> query($query) or die("query error =>".$mysqli->error);
    
    while($rs = $result -> fetch_object()){
        $html .= "<option value=\"".$rs->code."\">".$rs->name."</option>";
    }

    echo $html;
?>