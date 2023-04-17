<?php ob_start();
  include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
  include $_SERVER['DOCUMENT_ROOT']."/inc/user/head.php";
?>
<link rel="stylesheet" href="../css/common.css" />
<link rel="stylesheet" href="../css/cart.css" />
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/user/header.php";

  if($_SESSION['USERID']){
    $added_condition = " and c.userid= '".$_SESSION['USERID']."'";
  } else{
    $added_condition = " and c.ssid= '".session_id()."'";
  }

  if(!$userid){//로그인 안되어있으면
    echo '<script>
    alert("로그인을 해주세요.");
    location.href="http://fastcode.dothome.co.kr/user/member/login.php";
    </script>';
  }


  // if($result2){
  //   echo '<script>location.reload();</script>';
  // }

  $sql = "SELECT * from lectures l join cart c on l.lecid=c.lecid where l.lec_end_date >= now()".$added_condition;
  $result = $mysqli->query($sql) or die("query error => ".$mysqli->error);
  while($rs = $result->fetch_object()){
    $rsc[]=$rs;
  }
?>
<div class="container cart_main">
  <h2 class="title">나의 장바구니</h2>
  <div class="cart_area d-flex">
    <div class="cart_list">
      <ul>
        <!-- 장바구니에 담겨 있는 것 반복문으로 출력 -->
        <?php
        if(isset($rsc)){ // 장바구니에 담긴게 있으면
          foreach($rsc as $l){
          // lec_end_date가 오늘 날짜 보다 전이면 카트에서 삭제
          $sql2 = "DELETE c.* from cart c join lectures l on l.lecid=c.lecid where l.lec_end_date < now()".$added_condition;
          $result2 = $mysqli->query($sql2) or die("query error => ".$mysqli->error);
        ?>
        <li class="d-flex cart_plus" id="<?php echo $l->cartid;?>" data-id="<?php echo $l->lecid;?>"> 
          <img src="<?php echo $l->thumbnail; ?>" alt="" />
          <div class="cart_list_contents">
            <h3 class="content-text-1 lititle"><?php echo $l->name; ?></h3>
            <span class="content-text-1 liprice" data-price="<?php echo $l->price; ?>"><?php echo number_format($l->price);?>원</span>
            <span class="content-text-1">
              <?php 
              //lec_date 가 무제한이면 그대로 출력하고
                if($l->lec_date == '무제한'){ 
                  echo $l->lec_date;
                } else {
                  //아니면 start date와 end date를 2023-04-01 - 2023-04-30 이런식으로 출력
                  echo $l->lec_start_date.' - '.$l->lec_end_date;
                }
              ?>
            </span>
          </div>
          <button class="cart_item_del" id="<?php echo $c->cartid;?>">삭제</button>
        </li>
        <?php
            } //장바구니에 담긴게 없으면
          } else { ?>
          <li class="main-menu-ft cart_empty">장바구니가 비었습니다.</li>
        <?php } ?>
      </ul>
    </div>
    <div class="checkout_area">
      <form method="post">
        <div class="cart_cal">
          <h3 class="title">쿠폰</h3>
          <select name="coupon" id="coupon">
            <?php
              //사용 가능한 쿠폰을 확인
              $q2 = "SELECT ucid,coupon_name from user_coupons uc
              join coupons c on c.cid=uc.couponid
              where c.status = 1 and uc.status = 1 and uc.use_max_date >= now() and uc.userid='".$_SESSION['USERID']."'";
              $r2 = $mysqli->query($q2) or die("query error => ".$mysqli->error);
              while($cs2 = $r2->fetch_object()){
                  $csa[]=$cs2;
              }
            ?>
            <!-- 쿠폰선택 옵션이 선택됐을때 계산이 되지 않게 val값을 만들어준다 문자는 인식안됌.. -->
            <option value="-1">쿠폰 선택</option>
            <?php
              if(isset($csa)){
                foreach ($csa as $c){ // 유저가 가지고 있는 쿠폰 출력되게
            ?>
              <option value="<?php echo $c->ucid;?>"><?php echo $c->coupon_name;?></option>
            <?php } } ?>
          </select>
          <!-- <input type="hidden" name="cart_total" id="cart_total" value=""> -->
          <div class="price d-flex justify-content-between">
            <span class="main-menu-ft">가격</span>
            <span class="main-menu-ft" id="subtotal"></span>
            <!-- 총 더한 가격 -->
          </div>
          <div class="discount_price d-flex justify-content-between">
            <span class="main-menu-ft">할인가격</span>
            <span class="main-menu-ft" id="coupon_price">0원</span>
            <!-- 할인쿠폰의 할인될 가격 출력 -->
          </div>
          <div class="total_price">
            <h3 class="title">총 가격</h3>
            <span class="title" id="total_amount"></span>
            <!-- 총가격 - 할인가격 으로 계산된 가격 -->
          </div>
          <button type="button" class="y-btn big-btn btn-sky" onclick="checkout_ok()">결제하기</button>
        </div>
      </form>
    </div>
  </div>
  <!-- 삭제 팝업 -->
  <div class="background">
    <div class="window">
      <div class="popup">
        <div class="d-flex align-items-center">
          <p class="title sub-title">강좌를 삭제하시겠습니까?</p>
          <input type="text" placeholder="">
          <div class="popup_btns d-flex">
            <a id="close" class="y-btn small-btn btn-navy">취소하기</a>
            <a id="deletebtn" class="y-btn small-btn btn-red" >삭제하기</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer -->
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/user/footer.php";
?> 
<script src="../js/common.js"></script>
<script>
  let lecidarr = [];
  let cartidarr = [];
  let userid = '<?php echo $_SESSION['USERID']; ?>';
  let ucid = '<?php echo $c->ucid;?>';
  cal_Sum();

  //모든 강좌 더하기
  function cal_Sum(){
    let cart_item = $('.cart_list li.cart_plus'); //장바구니 리스트 
    let sum = 0;
    cart_item.each(function(){
       //강좌번호
      let dataid = $(this).attr('data-id');
      lecidarr.push(dataid);
      //장바구니번호
      let id = $(this).attr('id');
      cartidarr.push(id);
      //가격
      let total = $(this).find('.liprice').attr('data-price'); 
      sum+=Number(total);
    });
    $('#subtotal').text(number_format(sum)+'원');
    $('#total_amount').text(number_format(sum)+'원');
  }

  //쿠폰 계산
  $('#coupon').change(function(){
    var ucid = $("#coupon option:selected").val();//사용자 쿠폰 번호
    var subtotal = $("#subtotal").text();//구매 합계 100,000원
    var subtotal2 = subtotal.replace(/\,/g,"");
    var cart_total = subtotal2.replace(/\원/g,"");
    var data = {
        ucid : ucid,
        cart_total : cart_total
    };

    $.ajax({
        async:false,
        type:'post',
        url:'coupon_cal.ajax.php',
        data:data,
        dataType:'json',
        success:function(data){
            if(data.result == false){
              if(data.msg){
                  alert(data.msg);
                  $('#coupon option:nth-child(1)').prop("selected", true);
                }
                $('#coupon_price').text(0);
                $('#total_amount').text(number_format(cart_total+'원'));
                return false;
            } else if(data.result == true){
                if(data.msg){
                  alert(data.msg);
                }
                $('#coupon_price').text(number_format(data.coupon_price+'원'));
                $('#total_amount').text(number_format(cart_total - parseInt(data.coupon_price)+'원'));
            }
        }
    });
  });

  //금액 단위
  function number_format(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  }

  //장바구니 페이지에서 삭제 버튼 누르면
  //배경색 살짝 어둡게, 팝업 보이게
  $(".cart_item_del").click(function(){
    $(".background").addClass('show');
    let li = $(this).closest('li');
    let cid = li.attr('id');
    let title = li.find('.lititle').text();
    $(".background").find('input').attr('placeholder',title);

    //팝업에서 삭제 버튼 누르면
    $('#deletebtn').click(()=>{
      let data = {
      cid:cid
      }
      $.ajax({
        async:false,
        type:'post',
        url:'cart_del.php',
        data:data,
        dataType:'json',
        error:function(){
          console.log('error');
        },
        success:function(result){              
          if(result.result == true){
            $('#'+cid).remove(); //삭제되고
            alert('강좌가 삭제되었습니다.');
            location.reload();
            //cal_Sum(); //다시 계산
          }                
        }
      });
    });
  });
    
  // 취소 버튼 누르면 할일
  $("#close").click(function(){
    $(".background").removeClass('show');
  });
    
  //결제하기 버튼 누르면 할일
  function checkout_ok(){
    let data = {
        userid : userid,
        lecid : lecidarr,
        cartid : cartidarr,
        ucid : ucid
    }
    $.ajax({
      async: false,
      type:'post',
      url:'checkout_ok.php',
      data: data,
      dataType :'json',
      success:function(result){
        console.log(result);
        if(result.result == 'ok'){
          alert('결제가 완료되었습니다.');
          location.href="../class/myclass.php";
        } else{
          alert('결제가 실패했습니다. 다시 시도해주세요.');
        }
      }
    });
  }
</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/user/tail.php";
?> 
