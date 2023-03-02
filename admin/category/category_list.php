<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>카테고리 리스트</title>
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/category_list.css" />
  </head>
  <body>
    <div class="common-wrap">
      <div class="gnb-body pd-54">
        <div class="admin-profile">
          <div class="profile-img-wrap">
            <img src="/img/admin-profile.png" alt="admin-img">
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
        <div data-simplebar>
          <ul class="gnb-menu">
            <li class="d-flex flex-column">
              <a href="#" data-bs-toggle="collapse" role="button" class="menu-wrap" aria-expanded="true">
                <i class="fa-solid fa-wrench"></i>
                <span class="main-menu-ft">대시보드</span>
              </a>
            </li>
            <li class="d-flex flex-column">
              <a data-bs-toggle="collapse" role="button" href="#menuUserctrl" class="menu-wrap">
                <i class="fas fa-user-friends"></i>
                <span class="main-menu-ft">회원 관리</span>
              </a>
              <div class="collapse" id="menuUserctrl">
                <ul>
                  <li><a href="" class="sub-menu-ft">회원관리</a></li>
                  <li><a href="" class="sub-menu-ft">강사관리</a></li>
                  <li><a href="" class="sub-menu-ft">관리자관리</a></li>
                  <li><a href="" class="sub-menu-ft">회원그룹관리</a></li>
                  <li><a href="" class="sub-menu-ft">회원휴면/탈퇴관리</a></li>
                  <li><a href="" class="sub-menu-ft">개인정보조회기록</a></li>
                  <li><a href="" class="sub-menu-ft">메일발송관리</a></li>
                </ul>
              </div>
            </li>
            <li class="d-flex flex-column">
              <a data-bs-toggle="collapse" role="button" href="#menuCoursectrl" class="menu-wrap">
                <i class="fa-solid fa-book"></i>
                <span class="main-menu-ft">강좌 관리</span>
              </a>
              <div class="collapse" id="menuCoursectrl">
                <ul>
                  <li><a href="" class="sub-menu-ft">과정카테고리</a></li>
                  <li><a href="" class="sub-menu-ft">강좌리스트</a></li>
                  <li><a href="" class="sub-menu-ft">강좌관리</a></li>
                </ul>
              </div>
            </li>
            <li class="d-flex flex-column">
              <a data-bs-toggle="collapse" role="button" href="#menuSalesctrl" class="menu-wrap">
                <i class="fas fa-money-check-alt"></i>
                <span class="main-menu-ft">매출 관리</span>
              </a>
              <div class="collapse" id="menuSalesctrl">
                <ul>
                  <li><a href="" class="sub-menu-ft">월별매출통계</a></li>
                  <li><a href="" class="sub-menu-ft">과정매출통계</a></li>
                </ul>
              </div>
            </li>
            <li class="d-flex flex-column">
              <a data-bs-toggle="collapse" role="button" href="#menuEventctrl" class="menu-wrap">
                <i class="fas fa-bullhorn"></i>
                <span class="main-menu-ft">이벤트 관리</span>
              </a>
              <div class="collapse" id="menuEventctrl">
                <ul>
                  <li><a href="" class="sub-menu-ft">쿠폰관리</a></li>
                  <li><a href="" class="sub-menu-ft">프리패스</a></li>
                </ul>
              </div>
            </li>
            <li class="d-flex flex-column">
              <a data-bs-toggle="collapse" role="button" href="#menuBoardctrl" class="menu-wrap">
                <i class="fas fa-th-list"></i>
                <span class="main-menu-ft">게시판 관리</span>
              </a>
              <div class="collapse" id="menuBoardctrl">
                <ul>
                  <li><a href="" class="sub-menu-ft">공지사항 게시판</a></li>
                  <li><a href="" class="sub-menu-ft">수강후기 게시판</a></li>
                  <li><a href="" class="sub-menu-ft">수강문의 게시판</a></li>
                  <li><a href="" class="sub-menu-ft">커뮤니티 게시판</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="content-body content-pd">
        <div class="content-top">
          <h1 id="main-logo"><a href="/"><img src="../img/fastcode_logo.png" alt="Fastcode"><span>fastcode</span></a></h1>
          <div class="bookmark">
            <input type="checkbox" id="bookmark1"/>
            <label for="bookmark1"><i class="fa-solid fa-bookmark"></i></label>
          </div>
        </div>
        <main class="">
          <h2 class="page-title">카테고리 리스트</h2>
          <div class="cate_list_btn_wrapper row pd-54">
            <a href="category.php" class="y-btn big-btn btn-navy">카테고리 추가</a>
            <a href="#" class="y-btn big-btn btn-sky">카테고리 수정</a>
            <a href="#" class="y-btn big-btn btn-red">카테고리 삭제</a>
          </div>
          <table class="">
            <thead>
              <tr class="text-center">
                <th scope="col" class="content-text-1">대분류</th>
                <th scope="col" class="content-text-1">중분류</th>
                <th scope="col" class="content-text-1">소분류</th>
              </tr>
            </thead>
            <tbody>
              <!-- 각 cate1, 2, 3의 name이 td 내용으로 출력 -->
              <tr>
                <!-- colspan="각 cate1 아래의 cate3 총 개수" -->
                <td colspan="">프로그래밍</td>
                <!-- colspan="각 cate2 아래의 cate3 총 개수" -->
                <td colspan="">프론트엔드</td>
                <td>html</td>
              </tr>
            </tbody>
          </table>
        </main>
    
    
      </div>
    </div>
  </body>
</html>
