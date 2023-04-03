<?php ob_start();
  include $_SERVER["DOCUMENT_ROOT"]."/inc/dbcon.php";

  if($_SESSION['UID']){
    $added_condition = " and c.userid= '".$_SESSION['UID']."'";
  } else{
    $added_condition = " and c.ssid= '".session_id()."'";
  }

  $sql = "SELECT *, c.cnt
    from cart c
    join lectures l on c.ledid=l.ledid where 1=1 ".$added_condition;

    $result = $mysqli->query($query) or die("query error => ".$mysqli->error);
    while($rs = $result->fetch_object()){
      $rsc[]=$rs;
    }
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>나의 장바구니 | Fastcode</title>
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/cart.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  </head>
  <body>
    <header class="">
      <div class="container d-flex justify-content-between align-items-center">
        <h1 id="main-logo">
          <a href="/"
            ><img src="../img/fastcode_logo.png" alt="Fastcode" /><span
              >fastcode</span
            ></a
          >
        </h1>
        <nav class="main-menu-ft">
          <ul class="d-flex">
            <li><a href="">about us</a></li>
            <li><a href="">강의</a></li>
            <li>
              <a href="">커뮤니티</a>
              <ul class="sub-menu-ft">
                <li><a href="">질문/답변</a></li>
                <li><a href="">스터디</a></li>
                <li><a href="">자유게시판</a></li>
              </ul>
            </li>
            <li>
              <a href="">이벤트</a>
              <ul class="sub-menu-ft">
                <li><a href="">할인</a></li>
                <li><a href="">프리패스</a></li>
                <li><a href="">특강</a></li>
              </ul>
            </li>
            <li>
              <a href="">고객지원</a>
              <ul class="sub-menu-ft">
                <li><a href="">공지사항</a></li>
                <li><a href="">문의하기</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">이용가이드</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <form action="" class="search">
          <input type="text" placeholder="검색어를 입력하세요" /><i
            class="fa-solid fa-magnifying-glass"
          ></i>
        </form>
        <ul class="member-info d-flex content-text-2">
          <li>
            <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
            <span>장바구니</span>
          </li>
          <li>
            <a href=""><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
            <span>로그인</span>
          </li>
          <li>
            <a href=""><i class="fa-solid fa-user-plus"></i></a>
            <span>회원가입</span>
          </li>
        </ul>
      </div>
    </header>
    <div class="container">
      <h2 class="title">나의 장바구니</h2>
      <div class="cart_area d-flex">
        <div class="cart_list">
          <ul>
            <!-- 장바구니에 담겨 있는 것 반복문으로 출력 -->
            <?php
            foreach($rsc as $l){
            ?>
            <li class="d-flex"> 
              <img src="<?php echo $l->thumbnail; ?>" alt="" />
              <div class="cart_list_contents">
                <h3 class="content-text-1 lititle"><?php echo $l->name; ?></h3>
                <span class="content-text-1"><?php echo number_format($l->price);?>원</span>
                <span class="content-text-1">
                  <?php 
                  //lec_date 가 무제한이면 그대로 출력하고
                    if($l->lec_date == '무제한'){ 
                      echo $l->lec_date;
                    } else {
                      //아니면 start date와 end date를
                      //2023-04-01 - 2023-04-30 이런식으로 출력
                      echo $l->lec_start_date.' - '.$l->lec_end_date;
                    }
                  ?>
                </span>
              </div>
              <button class="cart_item_del" id="<?php echo $c->cartid;?>">삭제</button>
            </li>
            <?php
            }
            ?>
          </ul>
        </div>
        <form action="">
          <div class="cart_cal">
            <h3 class="title">쿠폰</h3>
            <select name="coupon" id="coupon">
              <?php
                //사용 가능한 쿠폰을 확인
                $q2 = "SELECT ucid,coupon_name from user_coupons uc
                join coupons c on c.cid=uc.couponid
                where c.status = 2 and uc.status = 1 and uc.use_max_date >= now() and uc.userid='".$_SESSION['UID']."'";
                $r2 = $mysqli->query($q2) or die("query error => ".$mysqli->error);
                while($cs2 = $r2->fetch_object()){
                    $csa[]=$cs2;
                }
              ?>
              <option value="" readonly>쿠폰 선택</option>
              <?php
                foreach ($csa as $c){
                  // 유저가 가지고 있는 쿠폰 출력되게
              ?>
              <option value="<?php echo $c->ucid;?>"><?php echo $c->coupon_name;?></option>
              <?php } ?>
            </select>
            <input type="hidden" name="cart_total" id="cart_total" value="<?php echo $cart_total;?>">
            <div class="price d-flex justify-content-between">
              <span class="main-menu-ft">가격</span>
              <span class="main-menu-ft" id="subtotal"></span>
              <!-- 총 더한 가격 -->
            </div>
            <div class="discount_price d-flex justify-content-between">
              <span class="main-menu-ft">할인가격</span>
              <span class="main-menu-ft" id="coupon_price"></span>
              <!-- 할인쿠폰의 할인될 가격 출력 -->
            </div>
            <div class="total_price">
              <h3 class="title">총 가격</h3>
              <span class="title" id="total_amount"></span>
              <!-- 총가격 - 할인가격 으로 계산된 가격 -->
            </div>
            <a href="myclass.php" class="y-btn big-btn btn-sky" >결제하기</a>
          </div>
        </form>
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
    <footer>
      <div class="container">
        <div class="footer_top">
          <ul class="footer_menu d-flex">
            <li class="content-text-2"><a href="#">회사소개</a></li>
            <li class="content-text-2"><a href="#">개인정보처리 방침</a></li>
            <li class="content-text-2"><a href="#">서비스이용약관</a></li>
            <li class="content-text-2"><a href="#">취소환불규정</a></li>
            <li class="content-text-2"><a href="#">자료실</a></li>
            <li class="content-text-2"><a href="#">고객센터</a></li>
            <li class="content-text-2"><a href="#">사이트맵</a></li>
          </ul>
          <ul class="footer_sns d-flex">
            <li>
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-twitter"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-blog"></i></a>
            </li>
          </ul>
        </div>
        <div class="footer_bottom d-flex">
          <h6 id="main-logo">
            <a href="#"
              ><img src="../img/fastcode_logo.png" alt="Fastcode" /><span
                >fastcode</span
              ></a
            >
          </h6>
          <div class="footer_contents d-flex">
            <h5 class="content-title">(주) FASTCODE</h5>
            <span class="content-text-3"
              >대표자 김유미 | 사업자 등록 번호 123-45-67890</span
            >
            <span class="content-text-3"
              >주소: 서울 특별시 종로구 수표로 96 국일관드림팰리스 | 이메일:
              yumi@fastcode.com |전화: 02-1212-1212</span
            >
          </div>
          <div class="footer_copyright">
            <span class="content-text-3"
              >Copyright@2023 Fastcode. All Rights reserved</span
            >
          </div>
        </div>
      </div>
    </footer>
    <script>

      //모든 강좌 더하기
      function cal_Sum(){
        let cart_item = $('.cart_list > li'); //장바구니 리스트 
        let sum = 0;
        cart_item.each(function(){
            let total = $(this).find('.total_price span').text(); //가격
            let totalmd = parseInt(total.replace(',',''));
            sum+=totalmd;
        });
        $('#subtotal').text(number_format(sum)+'원');
      }

      //쿠폰 계산
      $('#coupon').change(function(){
        var ucid = $("#coupon option:selected").val();//사용자 쿠폰 번호
        var cart_total = $("#cart_total").val();//구매 합계
        var data = {
            ucid : ucid,
            cart_total : cart_total
        };
        $.ajax({
            async:false,
            type:'post',
            url:'coupon_cal.php',
            data:data,
            dataType:'json',
            success:function(data){
                if(data.result == false){
                    alert(data.msg);
                    $('#coupon_price').text(0);
                    return false;
                } else if(data.result == true){
                    $('#coupon_price').text('-'+data.coupon_price+'원');
                    $('#total_amount').text(number_format(cart_total - parseInt(data.coupon_price)+'원'));
                }
            }
        });
      });

      //금액 단위
      function number_format(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      }

      // 삭제 팝업
        function show() {
        document.querySelector(".background").className = "background show";
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
            // delAjax(cid, './cart_del.php', './cart.php')
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
                  $('#'+cid).remove();
                  cal_Sum(); //삭제되고 다시 계산
                }                
              }
            });
          });
        });
        
      // 취소 버튼 누르면 할일
        $("#close").click(function(){
          $(".background").removeClass('show');
        });
    </script>
  </body>
</html>
