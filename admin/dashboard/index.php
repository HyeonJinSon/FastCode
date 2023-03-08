<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";
?>
  <link rel="stylesheet" href="../css/dashboard.css" />
  <script type="text/javascript" src="caleandar.min.js"></script>
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/common.php";
?>
<section id="bookmark-menu">
  <h2 class="popup-title"><i class="fa-solid fa-bookmark"></i>즐겨찾기 메뉴</h2>
  <ul class="bookmark-list d-flex flex-wrap">
    <li>
      <a href="../lecture/lecture_list.php" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fa-solid fa-school"></i>
        <span>강좌리스트</span>
      </a>
    </li>
    <li>
      <a href="../category/category_list.php" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fa-solid fa-list-check"></i>
        <span>카테고리 리스트</span>
      </a>
    </li>
    <li>
      <a href="../board/board_list.html" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fas fa-bullhorn"></i>
        <span>공지사항</span>
      </a>
    </li>
    <li>
      <a href="../coupon/coupon_llist.php" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fa-solid fa-ticket"></i>
        <span>쿠폰 리스트</span>
      </a>
    </li>
    <li>
      <a href="../category/category.php" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fa-solid fa-list-check category-add"></i>
        <span>카테고리 추가</span>
      </a>
    </li>
    <li>
      <a href="../lecture/lecture_up.php" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fa-solid fa-school lecture-add"></i>
        <span>강좌 추가</span>
      </a>
    </li>
  </ul>
</section>
<div class="dashboard-data d-flex flex-wrap">
  <section id="course-data">
    <h3 class="main-menu-ft">카테고리 별 강좌 비율</h3>
    <div></div>
    <span><a href="#">더보기 &#43;</a></span>
  </section>
  <section id="click-data">
    <h3 class="main-menu-ft">카테고리 별 조회수</h3>
    <div></div>
    <span><a href="#">더보기 &#43;</a></span>
  </section>
  <section id="newcourse">
    <h3 class="main-menu-ft">신규 강좌</h3>
    <ul>
      <li class="newcourse-item content-text-1">Javascript 기초강의</li>
      <li class="newcourse-item content-text-1">PHP 개발 환경 구축하기</li>
      <li class="newcourse-item content-text-1">Figma 컴포넌트 활용하기</li>
      <li class="newcourse-item content-text-1">Javascript와 JQuery 응용</li>
    </ul>
    <span><a href="../lecture/lecture_list.php">더보기 &#43;</a></span>
  </section>
  <section id="calendar-data">
    <h3 class="main-menu-ft">일정</h3>
    <div id="calendar"></div>
    <span><a href="#">더보기 &#43;</a></span>
  </section>
</div>
<script>
  let element = caleandar(document.querySelector('#calendar'));
</script>
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
?>