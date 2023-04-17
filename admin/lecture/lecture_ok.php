<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    if(!$_SESSION['AUID']){
        echo "<script>
                alert('권한이 없습니다.');
                history.back();
            </script>";
        exit;
    };

    $cate=$_POST["cate1"].$_POST["cate2"].$_POST["cate3"]; //카테고리
    $cate_big=$_POST["cate1"]; //카테고리 대분류
    $cate_mid=$_POST["cate2"]; //카테고리 중분류
    $cate_sm=$_POST["cate3"]; //카테고리 소분류
    $name=$_POST["name"]; //강좌명
    $price=$_POST["price"]; //가격
    $sale_status=$_POST["sale_status"]; //판매상태
    $recom=$_POST["recom"] ?? 0; //추천
    $forbegin=$_POST["forbegin"] ?? 0; //입문
    $forbasic=$_POST["forbasic"] ?? 0; //초급
    $forinter=$_POST["forinter"] ?? 0; //중급
    $foradv=$_POST["foradv"] ?? 0; //상급
    $lec_date=$_POST["lec_date"]; //수강기한 옵션
    $lec_start_date=$_POST["lec_start_date"]; //수강기한 시작일
    $lec_end_date=$_POST["lec_end_date"]; //수강기한 종료일
    $content=rawurldecode($_POST["content"]); //강좌설명
    $thumbnail=$_POST["thumbnail"]; //썸네일이미지
    $sale_cnt = 0; //판매량
    $file_table_id=$_POST["file_table_id"];//이미지 num1,num2,
    $file_table_id=rtrim($file_table_id,",");//오른쪽 끝에 , 삭제 num1,num2

    //썸네일 이미지
    if($_FILES['thumbnail']['name']){
        if($_FILES['thumbnail']['size']>10240000){
            echo "<script>
                alert('10Mb 이하만 첨부 가능합니다.');
                history.back();
            </script>";
            exit;
        }
    
        if($_FILES['thumbnail']['type'] != 'image/png' and $_FILES['thumbnail']['type'] != 'image/gif' and $_FILES['thumbnail']['type'] != 'image/jpeg'){ 
            echo "<script>
                alert('이미지만 첨부 가능합니다.');
                history.back();
            </script>";
            exit;
        }

        $save_dir = $_SERVER['DOCUMENT_ROOT']."/pdata/";
        $filename = $_FILES['thumbnail']['name'];
        $ext = pathinfo($filename,PATHINFO_EXTENSION); //확장자
        $newfilename = iconv_substr($name,0,10).date("ymdHis").substr(rand(),0,6);
        $thumbnail = $newfilename.'.'.$ext ;
        if(move_uploaded_file($_FILES['thumbnail']['tmp_name'], $save_dir.$thumbnail)){
            $thumbnail = "/pdata/".$thumbnail;
        }else{
            echo "<script>
                alert('이미지를 등록할 수 없습니다. 관리자에게 문의해주세요.');
                history.back();
            </script>";
            exit;
        }
    }

    //수강기한 설정
    if($lec_date == '무제한'){
        $lec_start_date = date("Y-m-d");
        $lec_end_date = date("Y-m-d", strtotime($time_now."+100 years"));
    }

    $mysqli->autocommit(FALSE);
    try{

        $sql = "INSERT into lectures (name, cate, teacher_name, content, thumbnail, price, sale_status, sale_cnt, recom, forbegin, forbasic, forinter, foradv, userid, reg_date, lec_date, lec_start_date, lec_end_date, cate_big, cate_mid, cate_sm) 
        VALUES ('$name','".$cate."', '김동주', ".$content."','".$thumbnail."','".$price."','".$sale_status."','".$sale_cnt."','".$recom."','".$forbegin."','".$forbasic."','".$forinter."','".$foradv."','".$_SESSION['AUID']."',now(),'".$lec_date."','".$lec_start_date."','".$lec_end_date."','".$cate_big."','".$cate_mid."','".$cate_sm."')";

        $rs = $mysqli -> query($sql) or die($mysqli -> error);
        $lecid = $mysqli -> insert_id;

        $className = $_REQUEST['class_name']; //강의명
        $classUrl = $_REQUEST['class_url']; //강의 영상 링크

        $k=0;
        foreach($className as $cn){
            if($cn){
                $clsql = "INSERT into lecture_class (lecid, class_name, class_url) VALUES ('".$lecid."','".$cn."','".$classUrl[$k]."')";
                $rcs = $mysqli -> query($clsql) or die($mysqli->error);
                $k++;
            }
        }

        if($file_table_id){//첨부한 이미지 테이블 업데이트
            $upquery="UPDATE lecture_image_table set lecid=".$lecid." where imgid in (".$file_table_id.")";
            $iuq=$mysqli->query($upquery) or die($mysqli->error);
        }

        $mysqli->commit(); //DB 커밋

        echo "<script>alert('등록되었습니다'); location.href='/admin/lecture/lecture_list.php';</script>";
        exit;

    }catch(Exception $e){
        $mysqli->rollback(); //롤백
        echo "<script>alert('등록 실패했습니다'); history.back();</script>";
        exit;
    }


?>