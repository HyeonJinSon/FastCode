<?php
    $post_time = $lr->reg_date;
    $week = date("Y-m-d", strtotime($time_now."-14 days"));
    if($post_time >= $week){
        $icon_new = '<span class="mini-tag new-tag">new</span>';
    } else{
        $icon_new='';
    }

    $sale_cnt = $lr->sale_cnt;
    if($sale_cnt >= 10){
        $icon_hit = '<span class="mini-tag hit-tag">hit</span>';
    }else{
        $icon_hit ='';
    }
    $recom = $lr->recom;
    if($recom == 1){
        $icon_recom = '<span class="mini-tag hit-tag">추천</span>';
    }else{
        $icon_recom ='';
    }

    $forbegin = $lr->forbegin;
    if($forbegin == 1){
        $icon_begin = '<span class="mini-tag easy-tag">입문</span>';
    }else{
        $icon_begin ='';
    }
    $forbasic = $lr->forbasic;
    if($forbasic == 1){
        $icon_basic = '<span class="mini-tag easy-tag">초급</span>';
    }else{
        $icon_basic ='';
    }
    $forinter = $lr->forinter;
    if($forinter == 1){
        $icon_inter = '<span class="mini-tag difficult-tag">중급</span>';
    }else{
        $icon_inter ='';
    }
    $foradv = $lr->foradv;
    if($foradv == 1){
        $icon_adv = '<span class="mini-tag difficult-tag">고급</span>';
    }else{
        $icon_adv ='';
    }
?>
<?php echo $icon_new; ?><?php echo $icon_hit; ?><?php echo $icon_recom; ?><?php echo $icon_begin; ?><?php echo $icon_basic; ?><?php echo $icon_inter; ?><?php echo $icon_adv; ?>
