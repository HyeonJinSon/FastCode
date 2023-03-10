<?php 
    session_start();
    $_SESSION['AUID'];
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";
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
        $_SESSION['ALEVEL'] = $rs->level;
        echo "<script>
            alert('{$rs->username}님 어서오세요');
            location.href='/admin/dashboard/index.php';
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
