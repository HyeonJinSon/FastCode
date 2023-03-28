<?php 
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";

$username=$_POST["username"];
$userid=$_POST["userid"];
$passwd=$_POST["passwd"];
$passwd=hash('sha512',$passwd);
$profile_img=$_POST["profile_img"];
$cate_like1=$_POST["cate_like1"];
$cate_like2=$_POST["cate_like2"];
$ability=$_POST["ability_range"];
$use_agree=$_POST["use_agree"];
$personalinfo_agree=$_POST["personalinfo_agree"];
$marketing_agree=$_POST["marketing_agree"] ?? 0;


    //썸네일 이미지
    if($_FILES['profile_img']['name']){
        if($_FILES['profile_img']['size']>10240000){
            echo "<script>
                alert('10Mb 이하만 첨부 가능합니다.');
                history.back();
            </script>";
            exit;
        }
    
        if($_FILES['profile_img']['type'] != 'image/png' and $_FILES['profile_img']['type'] != 'image/gif' and $_FILES['profile_img']['type'] != 'image/jpeg'){ 
            echo "<script>
                alert('이미지만 첨부 가능합니다.');
                history.back();
            </script>";
            exit;
        }

        $save_dir = $_SERVER['DOCUMENT_ROOT']."/pdata/";
        $filename = $_FILES['profile_img']['name'];
        $ext = pathinfo($filename,PATHINFO_EXTENSION); //확장자
        $newfilename = iconv_substr($userid,0,10).date("ymdHis").substr(rand(),0,6);
        $profile_img = $newfilename.'.'.$ext ;
        if(move_uploaded_file($_FILES['profile_img']['tmp_name'], $save_dir.$profile_img)){
            $profile_img = "/pdata/".$profile_img;
        }else{
            echo "<script>
                alert('이미지를 등록할 수 없습니다. 관리자에게 문의해주세요.');
                history.back();
            </script>";
            exit;
        }
    }

$mysqli->autocommit(FALSE);

try {
    //회원가입
    $query="INSERT INTO members
    (username, userid, userpw, profile_img, cate_like1, cate_like2, ability, use_agree, personalinfo_agree, marketing_agree)
    VALUES('".$username."','".$userid."','".$passwd."','".$profile_img."','".$cate_like1."','".$cate_like2."','".$ability."','".$use_agree."','".$personalinfo_agree."','".$marketing_agree."')";
    $rs=$mysqli->query($query) or die($mysqli->error);
     
    $mysqli->commit();//디비에 커밋한다.

    echo "<script>alert('회원가입이 되었습니다.');
    location.href='/index.php';</script>";
    exit;
}catch (Exception $e) {
    $mysqli->rollback();
    echo "<script>alert('회원가입에 실패했습니다');history.back();</script>";
    exit;
}




?>