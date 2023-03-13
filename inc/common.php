</head>

<body>
  <div class="common-wrap">
    <div class="gnb-body">
      <div class="h-100" data-simplebar>
        <div class="admin-profile">
          <div class="profile-img-wrap">
            <img src="../img/admin-profile.png" alt="admin-img">
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
                aria-expanded="false" aria-controls="menuDashboard"  onclick="location.href='../dashboard/index.php'">
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
                  <a href="#" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>회원관리</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>강사관리</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>관리자관리</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>회원그룹관리</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>회원휴면/탈퇴관리</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>개인정보조회기록</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
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
                  <a href="../category/category.php" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>과정카테고리</span>
                  </a>
                </li>
                <li>
                  <a href="../lecture/lecture_list.php" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>강좌리스트</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
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
                  <a href="#" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>월별매출통계</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
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
                  <a href="../coupon/coupon_llist.php" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>쿠폰관리</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
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
                  <a href="../board/board_index.php" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>공지사항 게시판</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>수강후기 게시판</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
                    <span>&middot;</span>
                    <span>수강문의 게시판</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="sub-menu-ft">
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
        <h1 id="main-logo"><a href="../dashborad/inde.php"><img src="../img/fastcode_logo.png" alt="Fastcode"><span>fastcode</span></a></h1>
      <!-- <div class="bookmark">
          <input type="checkbox" id="bookmark1" />
          <label for="bookmark1"><i class="fa-solid fa-bookmark"></i></label>
        </div> -->
      </div>
      <!-- 로고 및 북마크 위치 끝 -->
<script>
let menu = $('.accordion-item'); //메인메뉴
let menus = $('.accordion-body li a'); //메인메뉴
let currentUrl = location.href; //주소확인

//서브메뉴 마다할일
  menus.each(function(){
    let submenuUrl = $(this).attr('href');
    let targetUrl = submenuUrl.replace('../','');
    let active = currentUrl.indexOf(targetUrl);
    console.log(submenuUrl);
    console.log(active);
    if(active > -1){
      //모든 메인메뉴 접는다.
        menu.find('.accordion-button').attr('aria-expanded', 'false');
        menu.find('.accordion-button').removeClass('aria-expanded', 'false');
        menu.find('.accordion-button').addClass('collapsed');
      //서브메뉴의 가까운 메뉴를 연다
      $(this).closest('.accordion-item').find('.accordion-button').attr('aria-expanded', 'true');
      $(this).closest('.accordion-item').find('.accordion-button').removeClass('collapsed');
      $(this).closest('.accordion-collapse').addClass('show');
      $(this).css('color','#e53945');
    };
  });


</script>