<?php
  session_start();
  ini_set('display_errors',1);
  include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
  
  $userid = $_SESSION['USERID'];
  $username = $_SESSION['USERNAME'];

  if(!$userid){
    alert('로그인이 필요합니다.');
    exit;
  } 

?>
<script>
let href = `'class_view.php?lecid='+${$lecid}+'&c_idx='+${$c_idx}`;
let c_title = $(this).attr('data-name');
  let src = $(this).attr('data-src');
  let c_idx = $(this).attr('data-idx');
  let href = `'class_view.php?lecid='+${$lecid}+'&c_idx='+${$c_idx}`;
  let data = {
    href : href,
    c_title : c_title,
    src : src,
    c_idx : c_idx
  }
$.ajax({
  async:true,
  type:'post',
  url:'class_view.php',
  data:data,
  dataType:'json',
  success:function(data){
    location.href(data.href);
    $('iframe').attr('src',data.src);
    let text = `${data.c_idx}강  ${data.c_title}`;
    $('#lec_desc').find('h2').text(text);
  }
});
</script>