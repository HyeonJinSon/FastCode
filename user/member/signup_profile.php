<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    //썸네일 이미지
    if($_FILES['savefile']['size']>10240000){
      $return_data = array("result" => "size");
      echo json_encode($return_data);
      exit;
    }
    
    if($_FILES['savefile']['type'] != 'image/png' and $_FILES['savefile']['type'] != 'image/gif' and $_FILES['savefile']['type'] != 'image/jpeg' and $_FILES['savefile']['type'] != 'image/jpg'){
        $return_data = array("result" => "image");
        echo json_encode($return_data);
        exit;
      }
  
        $save_dir = $_SERVER['DOCUMENT_ROOT']."/pdata/";
        $filename = $_FILES['savefile']['name'];
        $ext = pathinfo($filename,PATHINFO_EXTENSION); //확장자
        $newfilename = iconv_substr($userid,0,10).date("ymdHis").substr(rand(),0,6);
        $profile_img = $newfilename.'.'.$ext ;
        if(move_uploaded_file($_FILES['savefile']['tmp_name'], $save_dir.$savefile)){
            $profile_img = "/pdata/".$profile_img;
            $return_data = array("result" => $profile_img);
            echo json_encode($return_data);
            exit;
        }else{
            $return_data = array("result"=>"error");
            echo json_encode($return_data);
            exit;
        }
    
?>