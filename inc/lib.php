<?php
    function user_coupon($userid, $cid, $reason){
        global $mysqli;
        $query="select cid from coupons where cid=".$cid;
        $result = $mysqli->query($query) or die("query error => ".$mysqli->error);
        $rs = $result->fetch_object();


        if($rs->cid==167){//회원가입시 지급되는 쿠폰은 1회만 지급해야 하므로 지급한 내역이 있는지 확인
            $query2="select count(*) as cnt from user_coupons where couponid=".$rs->cid." and userid='".$userid."'";
            $result2 = $mysqli->query($query2) or die("query error => ".$mysqli->error);
            $rs2 = $result2->fetch_object();


            if(!$rs2->cnt){//이미 지급된 적이 없으면
                $last_date = date("Y-m-d 23:59:59", strtotime("+30 days"));
                //30일이 지나면 못쓴다.
                $sql="INSERT INTO user_coupons
                (couponid, userid, status, use_max_date, regdate, reason)
                VALUES(".$rs->cid.", '".$userid."', 1, '".$last_date."', now(), '".$reason."')";
                $ins=$mysqli->query($sql) or die($mysqli->error);
            }
        }else{
            if($rs->status==2){//실제 사용중인 쿠폰이면 쿠폰 발급
                $last_date = date("Y-m-d 23:59:59", strtotime("+30 days")); //30일이 지나면 못쓴다.
                $sql="INSERT INTO user_coupons
                (couponid, userid, status, use_max_date, regdate, reason)
                VALUES(".$rs->cid.", '".$userid."', 1, '".$last_date."', now(), '".$reason."')";
                $ins=$mysqli->query($sql) or die($mysqli->error);
            }
        }
    }
?>
