<?php
  // session_start();
  // ini_set('display_errors',1);
  include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";

  $lecid = $_GET['lecid'];


  $query1 = "SELECT * FROM lectures where lecid='".$lecid."'";
  $result1 = $mysqli->query($query1) or die("query error =>".$mysqli->error);
  while($rs1 = $result1->fetch_object()){
    $r1[]=$rs1;
  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/class_view.css">
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
  <div class="container text-center">
    <?php foreach($r1 as $r){ ?>
    <iframe width="1120" height="630" src="https://www.youtube.com/embed/fFz4hI6IuZ4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <div class="lec_desc">
      <h2 class="title"></h2>
      <h3 class="content-text-2"><?php echo $r-> teacher_name; ?></h3>
    </div>
    <?php } ?>
    <div class="lec_btn d-flex justify-content-end">
      <a href="#" class="y-btn small-btn btn-sky">수강평 보기</a>
      <a href="myclass.html" class="y-btn small-btn btn-red">강의실</a>
    </div>
    <div id="lec_container">
      <div id="lec_review">
        <div class="review_title">
          <h2 class="title">강좌 수강평</h2>
          <a href="#"><i class="fa-solid fa-plus"></i> 더 보러가기</a>
        </div>
        <form action="review_ok.php" method="post">
          <input type="text" name="lecReview" id="lecReview">
          <label for="lecReview">수강평을 남겨 주세요</label>
          <button class="review_ok"><i class="fa-solid fa-check"></i></button>
        </form>
        <ul>
          <li class="d-flex align-items-center justify-content-between">
            <p class="content-text-2">도움 많이 됐어요 추천해여 꼭 들으세여</p>
            <span class="content-text-3">수강생 01</span>
          </li>
          <li class="d-flex align-items-center justify-content-between">
            <p class="content-text-2">피그마 어려워용 ㅜㅠ 강사님 친절하시고 답변도 자세하게 남겨 주십니당</p>
            <span class="content-text-3">수강생 02</span>
          </li>
          <li class="d-flex align-items-center justify-content-between">
            <p class="content-text-2">피그마 입문자 분들 추천해요 :D</p>
            <span class="content-text-3">수강생 03</span>
          </li>
        </ul>
      </div>
      <div id="lec_list">
        <?php foreach($r1 as $r){ ?>
        <h2 class="title"><?php echo $r->name; ?></h2>
        <?php } ?>
        <ul>
        <?php
          $query2 = "SELECT *
          FROM lecture_class c
          JOIN lectures l on l.lecid=c.lecid where c.lecid='.$lecid.'";
          $result2 = $mysqli->query($query2);
          while($rs2=$result2->fetch_object()){
            $r2[]=$rs2;
          }
        ?>
        <?php
          foreach($r2 as $c){
            for(i=0;i<=$c.length;i++){
        ?>
          <li class="d-flex align-items-center">
            <figure>
              <img src="" alt="">
            </figure>
            <div class="lec_info_box d-flex align-items-center justify-content-between">
              <h3 class="content-title playing"><?php $c->class_name ?></h3>
              <span class="content-text-2"><?php $c->time ?></span>
            </div>
          </li>
      <?php }} ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="top-btn">
    <i class="fa-solid fa-arrow-up"></i>
  </div>
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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="../js/common.js"></script>
  <script>
    $('.lec_btn').find('a').filter(':first-of-type').click((e)=>{
      e.preventDefault();
      $('#lec_container').toggleClass('slide');
    })
  </script>
</body>
</html>
