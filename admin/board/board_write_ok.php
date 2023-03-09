<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    $username = $_POST['name'];
    $title = $_POST['title'];
    $authority = $_POST['authority'];

    $content = $_POST['content'];
    $date = date('Y-m-d');
    $file_table_id = $_POST["file_table_id"];
    $file_orgname = $_FILES['file']['name'] ;
    $tmpfile_path = $_FILES['file']['tmp_name'];

    $upload_path = "./board_files/".$file_orgname;
    $file_type = $_FILES['b_file']['type'];
    if(strpos($file_type, 'image') >= 0) {$is_img = 1;} else{$is_img = 0;}



?>

