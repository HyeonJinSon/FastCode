<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
ini_set( 'display_errors', '0' );


$ucid = $_POST['ucid']; //유저쿠폰 번호 
$cart_total = $_POST['cart_total'];

//쿠폰과 유저쿠폰 테이블에서 조회해보자
$query2="SELECT c.* from user_coupons uc
        join coupons c on c.cid=uc.couponid
        where c.status = 1 and uc.status = 1 and uc.use_max_date >= now() and uc.ucid={$ucid} and uc.userid='".$_SESSION['USERID']."'";
$result2 = $mysqli->query($query2) or die("query error => ".$mysqli->error);
$rs2 = $result2->fetch_object();

if($ucid == '-1'){ //readonly 일때 (쿠폰선택 옵션을 다시 선택하면! 할인금액 0이 되게)
    $data = array("result"=>false);
    echo json_encode($data);    
    exit;
}
if(!$rs2){//사용하려고 하는 쿠폰이 없으면
    $data = array("result"=>false, "msg"=>"사용할 수 없는 쿠폰입니다.");
    echo json_encode($data);    
    exit;
} else{
    if($rs2->min_price>$cart_total){//구매금액이 최소 금액 미만이면
        $data = array("result"=>false, "msg"=>"구매 금액이 최소 ".$rs2->min_price."원 이상이어야 합니다.");
        echo json_encode($data);    
        exit;
    }
    if($rs2->coupon_type==1){//정액 쿠폰이면 1
        $data = array("result"=>true, "coupon_price"=>$rs2->coupon_discount);
        echo json_encode($data);    
        exit;
    }else if($rs2->coupon_type==2){//정률 쿠폰이면 2
        $coupon_price = $cart_total*($rs2->coupon_ratio/100);
        if($rs2->max_price<$coupon_price){//최대 할인 금액을 초과 하면
            $coupon_price = $rs2->max_price;
        }
        $data = array("result"=>true, "coupon_price"=>$coupon_price);
        echo json_encode($data);    
        exit;
    }
}
?>
