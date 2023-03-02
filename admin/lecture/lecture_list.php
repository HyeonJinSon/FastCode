<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>강좌 리스트</title>
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/lecture_list.css" />
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
        <main>
          <h2 class="page-title">강좌 리스트</h2>
          <a href="lecture_up.php" class="y-btn big-btn btn-navy">강좌 추가하기</a>
          <!-- action="<?php echo $_SERVER['PHP_SELF'] ?>" -->
          <form action="" method="get">
            <div class="row justify-content-between align-items-start">
              <div class="col-md-4">
                <select name="cate1" id="cate1">
                  <option selected>대분류 선택</option>
                  <!-- {category1} -->
                  <option value="프로그래밍">프로그래밍</option>
                  <option value="디자인">디자인</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="cate2" id="cate2">
                  <option selected>중분류 선택</option>
                    <!-- {category2} category2.php -->
                    <option value="프론트">프론트</option>
                    <option value="백">백</option>
                    <option value="기타">기타</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="cate3" id="cate3">
                  <option selected>소분류 선택</option>
                    <!-- {category3} category3.php -->
                    <option value="html">html</option>
                    <option value="css">css</option>
                    <option value="javascript">javascript</option>
                </select>
              </div>
            </div>
            <div class="row align-items-start">
              <!-- lec_option_change.php -->
              <div class="check_container col-md-4">
                <input type="checkbox" name="recom" id="recom" value="1">
                <label for="recom">추천</label>
                <input type="checkbox" name="forbegin" id="forbegin" value="1">
                <label for="forbegin">입문</label>
                <input type="checkbox" name="forbasic" id="forbasic" value="1">
                <label for="forbasic">초급</label>
                <input type="checkbox" name="forinter" id="forinter" value="1">
                <label for="forinter">중급</label>
                <input type="checkbox" name="foradv" id="foradv" value="1">
                <label for="foradv">상급</label>
              </div>
              <!-- <label for="search_keyword"><i class="fa-solid fa-magnifying-glass"></i></label> -->
              <input type="text" class="col-md-4" name="search_keyword" id="search_keyword">
              <!--  placeholder="&#xF002;"  style="font-family:Pretendard, FontAwesome" -->
              <button type="submit" id="search" class="col-md-2 y-btn mid-btn btn-sky">검색하기</button>
            </div>
          </form>
          <form name="lec_list_container" action="lec_option_change.php" method="get">
            <button class="col-md-2 y-btn mid-btn btn-navy">변경내용 저장</button>
            <!-- lecture list table 조회 및 출력 -->
            <ul id="lec_list">
              <li class="row">
                <img src="" alt="" class="col-md-2">
                <div class="lec_info_box col-md-5 row">
                  <p class="lec_info_title col">
                    <h3 class="content-title">Javascript와 JQuery 응용</h3><a class="mini-tag new-tag">new</a><a class="mini-tag limit-tag">무제한</a>
                  </p>
                  <p class="col">프로그래밍 > 프론트엔드 > Javascript</p>
                  <span class="col">판매가격 : 250000원</span>
                </div>
                <div class="lec_option_box col-md-5">
                  <p>
                    <select name="status" id="status">
                      <option value="판매중">판매중</option>
                      <option value="판매대기">판매대기</option>
                      <option value="판매중지">판매중지</option>
                    </select>
                    <a href="lecture_view.php" class="y-btn mid-btn btn-navy">보기</a>
                  </p>
                  <p>
                    <input type="checkbox" name="recom" id="lo_recom" value="">
                    <label for="lo_recom">추천</label>
                    <input type="checkbox" name="forbegin" id="lo_forbegin" value="">
                    <label for="lo_forbegin">입문</label>
                    <input type="checkbox" name="forbasic" id="lo_forbasic" value="">
                    <label for="lo_forbasic">초급</label>
                    <input type="checkbox" name="forinter" id="lo_forinter" value="">
                    <label for="lo_forinter">중급</label>
                    <input type="checkbox" name="foradv" id="lo_foradv" value="">
                    <label for="lo_foradv">상급</label>
                  </p>
                </div>
              </li>
            </ul>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>
