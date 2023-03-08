<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";
?>
  <link rel="stylesheet" href="../css/dashboard.css" />
  <script type="text/javascript" src="caleandar.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.3/dist/simplebar.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/simplebar@5.3.3/dist/simplebar.min.js"></script>
</head>
<body>
  <div class="common-wrap">
    <div class="gnb-body">
      <div class="h-100" data-simplebar>
        <div class="admin-profile">
          <div class="profile-img-wrap">
            <img src="/admin/img/admin-profile.png" alt="admin-img">
          </div>
          <h2>Manager</h2>
          <div class="profile-menu-wrap">
            <ul class="profile-menu d-flex justify-content-center">
              <li><a href=""><i class="fa-brands fa-whmcs"></i></a></li>
              <li><a href=""><i class="fa-regular fa-calendar-check"></i></a></li>
              <li><a href=""><i class="fa-brands fa-weixin"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="accordion" id="main-menu-wrap">
          <div class="accordion-item">
            <h2 class="accordion-header" id="hdDashboard">
              <a class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#menuDashboard"
                aria-expanded="true" aria-controls="menuDashboard"  onclick="location.href='/admin/dashboard/index.php'">
                <i class="fa-solid fa-wrench"></i>
                <span class="main-menu-ft">대시보드</span>
              </a>
            </h2>
            <div id="menuDashboard" class="accordion-collapse collapse show" aria-labelledby="hdDashboard"
              data-bs-parent="#main-menu-wrap">
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="hdUser">
              <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuUser"
                aria-expanded="false" aria-controls="menuUser">
                <i class="fas fa-user-friends"></i>
                <span class="main-menu-ft">회원 관리</span>
              </a>
            </h2>
            <div id="menuUser" class="accordion-collapse collapse" aria-labelledby="hdUser"
              data-bs-parent="#main-menu-wrap">
              <ul class="accordion-body">
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>회원관리</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>강사관리</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>관리자관리</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>회원그룹관리</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>회원휴면/탈퇴관리</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>개인정보조회기록</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>메일발송관리</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="hdCourse">
              <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuCourse"
                aria-expanded="false" aria-controls="menuCourse">
                <i class="fa-solid fa-book"></i>
                <span class="main-menu-ft">강좌 관리</span>
              </a>
            </h2>
            <div id="menuCourse" class="accordion-collapse collapse" aria-labelledby="hdCourse"
              data-bs-parent="#main-menu-wrap">
              <ul class="accordion-body">
                <li>
                  <a href="/admin/category/category.php" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>과정카테고리</span>
                  </a>
                </li>
                <li>
                  <a href="/admin/lecture/lecture_list.php" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>강좌리스트</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>강좌관리</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="hdSales">
              <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuSales"
                aria-expanded="false" aria-controls="menuSales">
                <i class="fas fa-money-check-alt"></i>
                <span class="main-menu-ft">매출 관리</span>
              </a>
            </h2>
            <div id="menuSales" class="accordion-collapse collapse" aria-labelledby="hdSales"
              data-bs-parent="#main-menu-wrap">
              <ul class="accordion-body">
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>월별매출통계</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>과정매출통계</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="hdEvent">
              <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuEvent"
                aria-expanded="false" aria-controls="menuEvent">
                <i class="fas fa-bullhorn"></i>
                <span class="main-menu-ft">이벤트 관리</span>
              </a>
            </h2>
            <div id="menuEvent" class="accordion-collapse collapse" aria-labelledby="hdEvent"
              data-bs-parent="#main-menu-wrap">
              <ul class="accordion-body">
                <li>
                  <a href="/admin/coupon/coupon_list.php" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>쿠폰관리</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>프리패스</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="hdBoard">
              <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuBoard"
                aria-expanded="false" aria-controls="menuBoard">
                <i class="fas fa-th-list"></i>
                <span class="main-menu-ft">게시판 관리</span>
              </a>
            </h2>
            <div id="menuBoard" class="accordion-collapse collapse" aria-labelledby="hdBoard"
              data-bs-parent="#main-menu-wrap">
              <ul class="accordion-body">
                <li>
                  <a href="/admin/board/board_list.html" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>공지사항 게시판</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>수강후기 게시판</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>수강문의 게시판</span>
                  </a>
                </li>
                <li>
                  <a href="" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>커뮤니티 게시판</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body content-pd">
      <!-- 로고 및 북마크 위치 시작 -->
      <div class="content-top">
        <h1 id="main-logo"><a href="/"><img src="/admin/img/fastcode_logo.png" alt="Fastcode"><span>fastcode</span></a></h1>
      </div>
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
          <h3 class="main-menu-ft">카테고리 별 판매량</h3>
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
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>
<script>
    //달력 caleandar.js 
    // https://github.com/jackducasse/caleandar
    let element = caleandar(document.querySelector('#calendar'));
    // caleandar(element, events, settings);
    // 이벤트 넣을때 사용하면 될.. 함수?
</script>
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
?>