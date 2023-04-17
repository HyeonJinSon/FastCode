<?php 
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/inc/lib.php";

$username=$_POST["username"];
$userid=$_POST["userid"];
$passwd=$_POST["passwd"];
$passwd=hash('sha512',$passwd);
$cate1=$_POST["cate1"];
$cate2=$_POST["cate2"];
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
    
        $save_dir = "./member_profile/";
        $filename = $_FILES['profile_img']['name'];
        $ext = pathinfo($filename,PATHINFO_EXTENSION);
        $newfilename = iconv_substr($userid,0,5).date("ymdHis").substr(rand(),0,6);
        $profile_img = $newfilename.'.'.$ext ;
        if(move_uploaded_file($_FILES['profile_img']['tmp_name'], $save_dir.$profile_img)){
            $profile_img = "member/member_profile/".$profile_img;
        }else{
            echo "<script>
                alert('이미지를 등록할 수 없습니다. 관리자에게 문의해주세요.');
                
            </script>";
            exit;
        }
    };


$mysqli->autocommit(FALSE);

try {
    //회원가입
    $query="INSERT INTO members
    (username, userid, userpw, profile_img, cate_like1, cate_like2, ability, use_agree, personalinfo_agree, marketing_agree)
    VALUES('".$username."','".$userid."','".$passwd."','".$profile_img."','".$cate1."','".$cate2."','".$ability."','".$use_agree."','".$personalinfo_agree."','".$marketing_agree."')";
    $rs=$mysqli->query($query) or die($mysqli->error);
    
    //쿠폰
    user_coupon($userid, 167, '회원가입 축하 쿠폰');

    $mysqli->commit();

    echo "<script>alert('회원가입 성공!, 10,000원 쿠폰을 발행해 드렸습니다.');
    location.href='../index.php';</script>";
    exit;
}catch (Exception $e) {
    $mysqli->rollback();
    echo "<script>alert('회원가입에 실패했습니다');history.back();</script>";
    exit;
}


?>