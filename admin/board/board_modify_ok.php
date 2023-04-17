<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    $bno = $_POST['idx'];
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

    $sql = "UPDATE board SET name='{$username}', title='{$title}', authority ='{$authority}', content='{$content}', date='{$date}', file='{$file_orgname}', is_img ='{$is_img}' WHERE idx='{$bno}'";

    $result = $mysqli -> query($sql) or die("Query Error! => ".$mysqli->error);

    if($result){
        echo "<script> alert('글 수정이 완료되었습니다.');
        location.href = './board_read.php?idx=$bno';</script>";
    }else{
        echo "<script> alert('글 수정에 실패했습니다.');
        location.href = './board_index.php?idx=$bno';</script>";
    }


?>