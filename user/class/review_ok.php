<?php
  session_start();
  ini_set('display_errors',1);
  include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

  $userid = $_SESSION['USERID'];
  $username = $_SESSION['USERNAME'];
  $content = $_POST['input'];
  $lIdx = $_POST['lIdx'];
  $date = date('Y-m-d H:i:s');


  $query = "INSERT INTO lec_review (lecid,	content,	date,	userid,	username) VALUES ('{$lIdx}', '{$content}', '{$date}', '{$userid}', '{$username}')";
  $result= $mysqli -> query($query) or die("query error =>".$mysqli->error);

  if($result){
      $data = array("result"=>true);
  }else{
      $data = array("result"=>false);
  }
  echo json_encode($data);
?>