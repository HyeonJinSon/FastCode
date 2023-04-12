<?php
    session_start();
    $result = session_destroy();
    $prevPage = $_SERVER['HTTP_REFERER'];

    if($result){
?>
    <script>
        alert('로그아웃 되었습니다');
        location.href='<?php echo $prevPage ?>';
    </script>
<?php
}
?>