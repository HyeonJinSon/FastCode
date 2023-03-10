<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    $username = '관리자';
    $title = $_POST['title'];
    $authority = $_POST['authority']; // 보류..
    // 만약 쓴사람과 다를경우 유저네임: $_SESSION['AUID'] // 세션연결?

    $content = $_POST['content'];
    $date = date('Y-m-d');
    
    var_dump(strpos('text/plain', 'image'));
    
    // 인덱스번호 알려줌
    // 파일 테이블 명
    // $file_table_id = $_POST["file_table_id"]; 얘 없어도 될듯???
 
 
    $file_orgname = $_FILES['file']['name'] ;
    $tmpfile_path = $_FILES['file']['tmp_name'];

    // 파일 업로드할 경로, 이미지 판단 
    $upload_path = "./board_files/".$file_orgname;
    $file_type = $_FILES['file']['type'];
    if(strpos($file_type, 'image') !== false) {$is_img = 1;} else {$is_img = 0;}
    move_uploaded_file($tmpfile_path, $upload_path);
    // false가 아니면... 이라고 작성!!! 해야되네요... 왜인지모르겠지만.... 아예 없는값이라그럴수도?
    // 앞에 값이 있으면 true

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
  /*  */




?>

