<?php
  session_start();
  include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
  include $_SERVER['DOCUMENT_ROOT']."/inc/user/head.php";
  $lecid = $_GET['lecid'];

  $userID = $_SESSION['USERID'];

?>

  <link rel="stylesheet" href="../css/common.css" />
  <link rel="stylesheet" href="../css/lecture_view.css" />

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/user/header.php";

  if($_SESSION['USERID']){
    $added_condition = " and c.userid= '".$_SESSION['USERID']."'";
  } else{
    $added_condition = " and c.ssid= '".session_id()."'";
  }



  $lecid = $_GET['lecid'];

  //중분류   
  $sql_cate = "SELECT * , C.name AS C_name , L.name AS L_name 
            FROM lectures L
            JOIN category C ON L.cate_mid = C.code
            WHERE lecid=".$lecid;
  $result_cate = $mysqli -> query($sql_cate);
  
  while($rs_cate = $result_cate ->fetch_object()) {
  $lecture[] = $rs_cate;
  }
  //소분류
  $sql2 = "SELECT C.name AS C_name 
          FROM lectures L
          JOIN category C ON L.cate_sm = C.code
          WHERE lecid=".$lecid;
  $result2 = $mysqli -> query($sql2);
  
  while($rs2 = $result2 -> fetch_object()) {
      $class[] = $rs2;
  };

  //강의리스트
  $sql = "SELECT * FROM lecture_class WHERE lecid=".$lecid;
  $result = $mysqli -> query($sql);
  
  while($rs = $result -> fetch_object()) {
      $list[] = $rs;
  };
  
  //동영상
  $sql_video = "SELECT class_url, class_name FROM lecture_class WHERE lecid='".$lecid."'limit 1";
  $result_video = $mysqli -> query($sql_video);
  
  while($rs_video = $result_video -> fetch_object()) {
      $video[] = $rs_video;
  };

  //시간 합계
  $sql_time = "SELECT HOUR(SEC_TO_TIME(SUM(TIME_TO_SEC(H.time))))AS total_hour,
  MINUTE(SEC_TO_TIME(SUM(TIME_TO_SEC(H.time)))) AS total_minute,
  SECOND(SEC_TO_TIME(SUM(TIME_TO_SEC(H.time)))) AS total_second
  FROM lecture_class H
  WHERE lecid =".$lecid;
  $result_time = $mysqli -> query($sql_time);
  
  while($rs_time = $result_time -> fetch_object()) {
      $time[] = $rs_time;
  };

  // NEW TAG 
  $sql_new = "SELECT reg_date
  FROM lectures 
  WHERE lecid = '".$lecid."'
  AND reg_date 
  BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH)
  AND NOW()";
  
  $result_new = $mysqli -> query($sql_new);

  while($rs_new = $result_new ->fetch_object()) {
  $newTag[]=$rs_new;
  }

  //수강평
  $sql_review = "SELECT *
  FROM lec_review 
  WHERE lecid='".$lecid."'
  ORDER BY rvid DESC LIMIT 0 , 4";
  $result_review = $mysqli -> query($sql_review);
  
  while($rs_review = $result_review -> fetch_object()) {
      $reviews[] = $rs_review;
  };
  //수강평 합
  $sql_reviewCnt = "SELECT COUNT(*) AS cnt
  FROM lec_review 
  WHERE lecid='".$lecid."'";
  $result_reviewCnt = $mysqli -> query($sql_reviewCnt);
  
  while($rs_reviewCnt = $result_reviewCnt -> fetch_object()) {
      $reviewCnt[] = $rs_reviewCnt;
  };
  

?>
  <section class="bg">
    <h2 class="hidden">강좌메인타이틀</h2>
    <div class="container-xxl d-flex">
     <?php if($lecture) { ?>
        <?php foreach($lecture as $le) { ?>
        <img src="../../<?php echo $le->thumbnail; ?>" alt="">
        <div class="lecture_title_wrap">
          <div class="lecture_title">
            <h3 class="main-title"><?php echo $le->L_name; ?></h2>
            <p class="lecture_sub">
              <?php echo $le->C_name; ?><span><i class="fa-solid fa-angle-right"></i></span>
              <?php foreach($class as $c) { ?><?php echo $c->C_name; ?></h2><?php  }?>
            </p>
            <p class="lecture_sub">
              <span>기한 :</span>
              <?php 
                if($le->lec_date =='제한'){
                  echo '~ '.$le->lec_end_date;} else {
                    echo $le->lec_date;
                  }
              ?>
            </p>
          </div>
          <div class="tag">
            <!-- 태그에 값이 없을때  -->
            <p class="mini-tag level-tag" <?php if(empty($le->forbegin)){ echo 'style="display: none;"'; } ?>>
              <?php if($le->forbegin == '1'){ echo '입문'; } ?>
            </p>
            <p class="mini-tag level-tag" <?php if(empty($le->forbasic)){ echo 'style="display: none;"'; } ?>>
              <?php if($le->forbasic == '1'){ echo '초급'; } ?>
            </p>
            <p class="mini-tag level-tag" <?php if(empty($le->forinter)){ echo 'style="display: none;"'; } ?>>
              <?php if($le->forinter == '1'){ echo '중급'; } ?>
            </p>
            <p class="mini-tag level-tag" <?php if(empty($le->foradv)){ echo 'style="display: none;"'; } ?>>
              <?php if($le->foradv == '1'){ echo '상급'; } ?>
            </p>
            <?php foreach($newTag as $new) { ?>
              <?php
                $regDate = $new->reg_date;
                $tag = DATE('Y-m-d H:i:s', strtotime('-1 month'));
                if(!empty($regDate) && $regDate >= $tag) {
              ?>
              <p class="mini-tag new-tag">NEW</p>
              <?php } else { ?>
                <p class="mini-tag new-tag" style="display: none;"></p>
              <?php } ?>
            <?php } ?>
            <p class="mini-tag hot-tag">
              <?php 
              if($le->recom =='1'){
                echo '추천';}
              ?>
            </p>
          </div>
          <button type="button" class="y-btn big-btn btn-sky cart_btn">장바구니 담기</button>
        </div>

      </div>
      <?php } }?>
    </div>
  </section>
  <section class="container-xxl">
    <h2 class="hidden">메인타이틀</h2>
   
      <ul class="page_nav popup-title d-flex">
        <li class="active"><a href="#description" data-text="강의소개">강의소개</a></li>
        <li><a href="#list" data-text="강의목록">강의목록</a></li>
        <li><a href="#review" data-text="수강평">수강평</a></li>
      </ul>
    <div class="lecture_wrap d-flex justify-content-between">
      <div class="lecture_info">
        <h3 class="main-title sample_video">강의 맛보기</h3>
        <?php foreach($video as $vid) {?>
        <iframe width="895" height="486" src="<?php echo $vid->class_url; ?>" title="<?php echo $vid->class_name; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <?php }  ?>
        <h3 class="main-title" id="description">강의 소개</h3>
        <p>
          <?php echo  nl2br($le->content); ?>
          <!-- 지난 3년간 강의평점 최고점을 달성한 000 선생님과 함께 하는 Javascript & JQuery 수업! -->
        </p>
        <!-- <p>
          이 강의를 수강하면 Javascript와 JQuery를 구분하고 상황에 따라 능숙하게 기능을 수행할 수 있는 사람이 됩니다!
        </p> -->
       <!-- <h4 class="title">다음과 같은 사람에게 추천합니다!</h4>
        <p>1. HTML과 CSS 작업을 어느 정도 수행할 수 있는 사람</p>
        <p>2. 동적 효과와 다양한 기능을 수행할 수 있는 사이트를 만들고 싶은 사람</p>
        <p>3. Javascript와 JQuery를 사용할 수는 있지만 둘의 구분을 명확하게 알지 못하는 사람</p>
        <h4 class="title">초보자들은 이 강의 수강 전 HTML 기본 강의, CSS Master 강의를 선행하는 것을 추천합니다.</h4>  -->
        <p class="content-title"><i class="fa-solid fa-circle-exclamation"></i>강좌에 대한 질문이나 문의사항은 강의 문의사항 게시판을 이용해주세요.</p>
        <div class="lecture_list" id="list">
           <h3 class="main-title">강의 목록</h3>
          <ol>
          <?php if($list) { 
           ?>
            <?php foreach($list as $li) { ?>
            <li id="lec_list">
              <a href="" class="d-flex link_tag">
                <figure>
                  <img src="<?php echo $li->c_thumbnail; ?>" alt="강의 썸네일 이미지입니다.">
                   <figcaption class="hidden">강의 썸네일 이미지입니다.</figcaption> 
                </figure>
                <!-- 비회원이면 로그인페이지 / 회원이 샀으면 내 강의실, 아니면 결제 -->
                <p><?php echo $li->class_name; ?></p>
                <span class="lec_play"><i class="fa-regular fa-circle-play"></i></span>
              </a>
            </li>
            <?php } } ?>
          </ol>
        </div>
        <div id="review" class="review_wrap d-flex" >
          <h3 class="main-title">수강평</h3>
          <p><i class="fa-solid fa-plus"></i>더 보러가기</p>
        </div>
        <div class="review_list">
          <ul>
          <?php if($reviews) {
              foreach($reviews as $review) {?>
              
              <li class="review">
                <p class="d-flex justify-content-between">
                  <span class="content-text-1"><?php echo $review->content; ?></span>
                  <span><?php echo $review->username; ?></span>
                </p>
              </li>

            <?php } } else {?>
              <li class="review">
                <p class="d-flex">등록된 수강평이 없습니다.</p>
              </li>
            <?php }  ?>
          </ul>
        </div>
      </div>

      <div class="lecture_info_bar">
        <img src="../../<?php echo $le->thumbnail; ?>" alt="썸네일이미지">
        <h4 class="title"><?php echo $le->L_name; ?></h4>
        <p class="content-title">가격 : <?php echo number_format($le->price); ?>원</p>
        <button class="y-btn" id="register_btn">수강 신청하기</button>
        
        <p class="end">판매종료일 : <?php 
            if($le->lec_date =='제한'){
              echo '~ '.$le->lec_end_date;} else {
                echo $le->lec_date;
              }
          ?></p>
        <div class="point_info">
          <p><i class="fa-solid fa-seedling"></i>난이도 :
            <?php
              $tags = array();
              if ($le->forbegin == '1') {
                $tags[] = '입문';
              }
              if ($le->forbasic == '1') {
                $tags[] = '초급';
              }
              if ($le->forinter == '1') {
                $tags[] = '중급';
              }
              if ($le->foradv == '1') {
                $tags[] = '상급';
              }
              if (isset($le->tags) && is_array($le->tags) && count($le->tags) > 0) {
                $tags = array_merge($tags, $le->tags);
              }
              echo implode(', ', $tags);
            ?>
          </p>
          <?php foreach($time as $t) { ?>
          <p>
            <i class="fa-solid fa-book"></i>강의시간 : <?php echo $t->total_hour; ?>시간 <?php echo $t->total_minute; ?>분
          </p>
          <?php } ?>

          <!-- 수강후기, 게시판 연동하기 -->
          <?php if($reviewCnt) { ?>
            <?php foreach($reviewCnt as $re_cnt) { ?>
              <p><i class="fa-regular fa-thumbs-up"></i>후기 : <?php echo $re_cnt->cnt; ?>개의 수강후기</p>
            <?php } }?>

        </div>

        <div class="bar_btns d-flex justify-content-between">
          <button class="heart">
            <i class="fa-regular fa-heart"></i>
            <i class="fa-solid fa-heart hidden"></i>
            <p>찜하기</p>
          </button>
          <button class="cart_btn">
            <i class="fa-solid fa-cart-shopping"></i>
            <p>장바구니</p>
          </button>
          <button>
            <i class="fa-solid fa-share-nodes"></i>
            <p>공유하기</p>
          </button>
        </div>

      </div>
    </div>

  </section>

   <!-- Footer -->
   <?php
      include $_SERVER['DOCUMENT_ROOT']."/inc/user/footer.php";
    ?> 
  <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"
></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script>

  // alert(lectureId); 
  // $('#register_btn').click(function() {
  //   if(userID){//로그인
    //     alert("결제페이지로 이동합니다.");
    //    location.href="http:/.dothome.co.kr/user/cart/cart.php";
    //   } else {
      //     alert("로그인이 필요합니다.");
      //     location.href="http:/.dothome.co.kr/user/member/login.php";
      
      //   }
      
      // });
      $('.cart_btn').click(function() {
        cart_ins();
      });
      
      // let poid1 = $("input[name='poption1']:checked").val() ?? '';
      // let poid2 = $("input[name='poption2']:checked").val() ?? '';
      // let opts = poid1 +'||'+ poid2;
      // let cnt = $('#cnt').val();
      // let data = {
      //   pid : <?php //echo $pid ?>,
      //   opts : opts,
      //   cnt : cnt
      // }
      
    function cart_ins(){

      
      // console.log(data);
      $.ajax({
          async: false,
          type:'post',
          url:'../cart/cart_insert.php',
          data: <?php echo $lecid ?>,
          dataType :'html',
          error:function(){alert('연결에러')},
          success:function(result){
            console.log(result);
            if(result){
                alert('장바구니에 담겼습니다.');
                location.href="../cart/cart.php";
            } else{
                alert('실패했습니다. 다시 시도해주세요.');
            }
          }
        });

  }

    //  console.log(implode(', ', $tags));
   $(window).scroll(function () {
		if ($(this).scrollTop() > 250) {
			$('.top-btn').fadeIn(100);
		} else {
			$('.top-btn').fadeOut(400);
		}
	});

	$('.top-btn').click(function (e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: 0 ,behavior:'smooth'}, 300);
	});

    function number_format(num){
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g,',');
    }
    $('#lec_list a').click(function() {
      // if(!userID){
        alert("로그인이 필요합니다.");
        // location.href="http://redseon15.dothome.co.kr/user/member/login.php";
        return false;
      // }
    });
</script>
</body>
</html>