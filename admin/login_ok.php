<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";
    
    $_SESSION['AUID'];
    $_SESSION['ADBOOK'] = 0;
    $_SESSION['ADIDX'];
    $_SESSION['ADIMG'];

    $userid = $_POST["userid"];
    $passwd = $_POST["passwd"];
    $passwd = hash('sha512',$passwd);

    $sql = "SELECT * FROM admins WHERE userid='{$userid}' AND passwd='{$passwd}'";
    $result = $mysqli -> query($sql);
    $rs = $result ->fetch_object();


    if($rs){
        $sql = "UPDATE admins SET last_login = now() WHERE idx = '{$rs->idx}'";
        $result = $mysqli -> query($sql);
        $_SESSION['AUID'] = $rs->userid;
        $_SESSION['AUNAME'] = $rs->username;
        $_SESSION['ADLEVEL'] = $rs->level;
        $_SESSION['ADIDX'] = $rs->idx;
        $_SESSION['ADIMG'] = $rs->profile_img;
        
        if($rs->bookmark_code == null) {
            $sql_null = "UPDATE admins SET bookmark_code = 0 WHERE idx='{$rs->idx}' ";
            $result_null = $mysqli -> query($sql_null);
        } else {
            $_SESSION['ADBOOK'] = $rs->bookmark_code;
        }

        echo "<script>
            alert('{$rs->username}님 어서오세요');
            location.href='dashboard/index.php';
        </script>";
        exit;
    } else{
        echo "<script>
            alert('아이디 또는 암호가 일치하지 않습니다.');
            history.back();
        </script>";
        exit;
    }
?>
