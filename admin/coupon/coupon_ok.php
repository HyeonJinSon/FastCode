<?php 
    session_start();
    if(!$_SESSION['AUID']){
      echo "<script>
              alert('접근 권한이 없습니다');
              history.back();
          </script>";
    };
        
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

    
    $coupon_name = $_POST["coupon_name"];//쿠폰명
    $coupon_type = $_POST["coupon_type"];//쿠폰타입
    $coupon_discount = $_POST["coupon_discount"];//할인가
    $coupon_ratio = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $_POST["coupon_ratio"]);
    $status = $_POST["status"];//상태
    $max_price = $_POST["max_price"];//최대사용금액
    $min_price = $_POST["min_price"];//최소사용가능금액
    $regdate = date('Y-m-d'); //등록일 //now()가 php 함수네... 그래서 안되네요 sql 문장에는

    $coupon_due = $_POST["coupon_due"];// 쿠폰 무제한/기한 select메뉴
    // 무제한일때 date 값 NULL
    if($coupon_due == 1){
        $start_date = "NULL";
        $end_date = "NULL";
        }else{
            $start_date = $_POST["coupon_start_date"];
            $end_date = $_POST["coupon_end_date"];
        }

    if($_FILES["file"]["name"]){//첨부한 파일이 있으면

        if($_FILES['file']['size'] > 10240000){//10메가
            echo "<script>alert('10메가 이하만 첨부할 수 있습니다.');history.back();</script>";
            exit;
        }

        if($_FILES['file']['type']!='image/jpeg' and $_FILES['file']['type']!='image/gif' and $_FILES['file']['type']!='image/png'){ //이미지가 아니면, 다른 type은 and로 추가
            echo "<script>alert('이미지만 첨부할 수 있습니다.');history.back();</script>";
            exit;
        }

        $save_dir = $_SERVER['DOCUMENT_ROOT']."/admin/coupon/coupon_image/";//파일을 업로드할 디렉토리
        $filename = $_FILES["file"]["name"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION); //확장자 구하기
        $newfilename = "coupon_".date("YmdHis").substr(rand(),0,6);
        $coupon_image = $newfilename.".".$ext; //파일명
        
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $save_dir.$coupon_image)){
            $coupon_image = "coupon_image/".$coupon_image;
        }else{
            echo "<script>alert('이미지를 등록할 수 없습니다. 관리자에게 문의해주십시오.');history.back();</script>";
            exit;
        }
    }


    if($coupon_due == 1){
        $sql = "INSERT INTO coupons 
        (coupon_name, coupon_type, coupon_discount, coupon_ratio, status, max_price, min_price, coupon_due, coupon_start_date, coupon_end_date, file, regdate) VALUES
        ('{$coupon_name}','{$coupon_type}','{$coupon_discount}','{$coupon_ratio}','{$status}','{$max_price}','{$min_price}','{$coupon_due}',{$start_date},{$end_date}, '{$coupon_image}','{$regdate}')";   
    } else{
        $sql = "INSERT INTO coupons 
        (coupon_name, coupon_type, coupon_discount, coupon_ratio, status, max_price, min_price, coupon_due, coupon_start_date, coupon_end_date, file, regdate) VALUES
        ('{$coupon_name}','{$coupon_type}','{$coupon_discount}','{$coupon_ratio}','{$status}','{$max_price}','{$min_price}','{$coupon_due}','{$start_date}','{$end_date}', '{$coupon_image}','{$regdate}')";    
    }

    $result = $mysqli -> query($sql) or die("Query Error! => ".$mysqli->error);

    if($result){
        echo "<script> alert('쿠폰 등록이 완료되었습니다.');
        location.href = './coupon_list.php';</script>";
    }else{
        echo "<script> alert('글쓰기에 실패했습니다.');
        location.href = './coupon_list.php';</script>";
    }





?>