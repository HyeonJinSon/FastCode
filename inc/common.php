<?php
  $Session_ID = $_SESSION['AUID'];
  $Session_Img = $_SESSION['ADIMG'];
?>

</head>

<body>
  <div class="common-wrap">
    <div class="gnb-body">
      <div class="h-100" data-simplebar>
        <div class="admin-profile">
          <div class="profile-img-wrap">
            <img src="../img/<?php echo $Session_Img;?>" alt="admin-img">
          </div>
          <h2 style="text-transform:capitalize;"><?php echo $Session_ID; ?></h2>
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
              <a class="accordion-button" role="button" data-bs-toggle="collapse" data-bs-target="#menuDashboard"
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
              <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#menuUser"
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
              <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#menuCourse"
                aria-expanded="false" aria-controls="menuCourse">
                <i class="fa-solid fa-book"></i>
                <span class="main-menu-ft">강좌 관리</span>
              </a>
            </h2>
            <div id="menuCourse" class="accordion-collapse collapse" aria-labelledby="hdCourse"
              data-bs-parent="#main-menu-wrap">
              <ul class="accordion-body">
                <li>
                  <a href="../category/category_list.php" class="sub-menu-ft">
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
              <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#menuSales"
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
              <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#menuEvent"
                aria-expanded="false" aria-controls="menuEvent">
                <i class="fas fa-bullhorn"></i>
                <span class="main-menu-ft">이벤트 관리</span>
              </a>
            </h2>
            <div id="menuEvent" class="accordion-collapse collapse" aria-labelledby="hdEvent"
              data-bs-parent="#main-menu-wrap">
              <ul class="accordion-body">
                <li>
                  <a href="../coupon/coupon_list.php" class="sub-menu-ft">
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
              <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#menuBoard"
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
        <h1 id="main-logo"><a href="../dashboard/index.php"><img src="../img/fastcode_logo.png" alt="Fastcode"><span>fastcode</span></a></h1>
      <!-- <div class="bookmark">
          <input type="checkbox" id="bookmark1" />
          <label for="bookmark1"><i class="fa-solid fa-bookmark"></i></label>
        </div> 
      </div> -->
      <!-- 로고 및 북마크 위치 끝 -->
