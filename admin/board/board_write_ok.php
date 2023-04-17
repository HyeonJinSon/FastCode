<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    $username = '관리자';
    $title = $_POST['title'];
    $authority = $_POST['authority']; 

    $content = $_POST['content'];
    $date = date('Y-m-d');
 
    $file_orgname = $_FILES['file']['name'] ;
    $tmpfile_path = $_FILES['file']['tmp_name'];

    // 파일 업로드할 경로, 이미지 판단 
    $upload_path = "./board_files/".$file_orgname;
    $file_type = $_FILES['file']['type'];
    if(strpos($file_type, 'image') !== false) {$is_img = 1;} else {$is_img = 0;}
    move_uploaded_file($tmpfile_path, $upload_path);

    $sql = "INSERT INTO board 
    (name, title, content, date, authority, file, is_img) VALUES
    ('{$username}','{$title}','{$content}','{$date}','{$authority}','{$file_orgname}','{$is_img}')"; 

    $result = $mysqli -> query($sql) or die("Query Error! => ".$mysqli->error);

    if($result){
        echo "<script> alert('글쓰기가 완료되었습니다.');
        location.href = './board_index.php';</script>";
    }else{
        echo "<script> alert('글쓰기에 실패했습니다.');
        location.href = './board_index.php';</script>";
    }


?>

