<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>강좌 리스트</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/simplebar@5.3.3/dist/simplebar.min.js"></script>
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/lecture_list.css" />
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
                  aria-expanded="true" aria-controls="menuDashboard">
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
                    <a href="" class="sub-menu-ft">
                      <span>&middot;</span>
                      <span>과정카테고리</span>
                    </a>
                  </li>
                  <li>
                    <a href="" class="sub-menu-ft">
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
                    <a href="" class="sub-menu-ft">
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
                    <a href="" class="sub-menu-ft">
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
        <div class="content-top">
            <h1 id="main-logo"><a href="/"><img src="img/fastcode_logo.png" alt="Fastcode"><span>fastcode</span></a></h1>
            <div class="bookmark">
              <input type="checkbox" id="bookmark1" />
              <label for="bookmark1"><i class="fa-solid fa-bookmark"></i></label>
            </div>
        </div>
        <main>
          <h2 class="page-title">강좌 리스트</h2>
          <a href="lecture_up.php" class="y-btn big-btn btn-navy">강좌 추가하기</a>
          <form action="" method="get" id="sort_container">
            <div class="row justify-content-between align-items-start">
              <div class="col-md-4 row">
                <select name="cate1" id="cate1" class="col form-select">
                  <option selected>대분류 선택</option>
                  <!-- {category1} -->
                  <option value="프로그래밍">프로그래밍</option>
                  <option value="디자인">디자인</option>
                </select>
              </div>
              <div class="col-md-4 row">
                <select name="cate2" id="cate2" class="col form-select">
                  <option selected>중분류 선택</option>
                    <!-- {category2} category2.php -->
                    <option value="프론트">프론트</option>
                    <option value="백">백</option>
                    <option value="기타">기타</option>
                </select>
              </div>
              <div class="col-md-4 row">
                <select name="cate3" id="cate3"  class="col form-select">
                  <option selected>소분류 선택</option>
                    <!-- {category3} category3.php -->
                    <option value="html">html</option>
                    <option value="css">css</option>
                    <option value="javascript">javascript</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-between align-items-start">
              <!-- lec_option_change.php -->
              <div class="row justify-content-between lec_option align-items-center col-md-4">
                <input type="checkbox" name="recom" id="recom" value="1" class="col">
                <label for="recom" class="col">추천</label>
                <input type="checkbox" name="forbegin" id="forbegin" value="1" class="col">
                <label for="forbegin" class="col">입문</label>
                <input type="checkbox" name="forbasic" id="forbasic" value="1" class="col">
                <label for="forbasic" class="col">초급</label>
                <input type="checkbox" name="forinter" id="forinter" value="1" class="col">
                <label for="forinter" class="col">중급</label>
                <input type="checkbox" name="foradv" id="foradv" value="1" class="col">
                <label for="foradv" class="col">상급</label>
              </div>
              <!-- <label for="search_keyword"><i class="fa-solid fa-magnifying-glass"></i></label> -->
              <input type="text" class="col-md-6" name="search_keyword" id="search_keyword">
              <!--  placeholder="&#xF002;"  style="font-family:Pretendard, FontAwesome" -->
              <button type="submit" id="search" class="col-md-2 y-btn mid-btn btn-sky">검색하기</button>
            </div>
          </form>
          <form id="lec_list_container" action="lec_option_change.php" method="get">
            <!-- lecture list table 조회 및 출력 -->
            <ul id="lec_list">
              <li class="row">
                <figure class="col-md-2">
                  <img src="https://placehold.co/198x135" alt="">
                </figure>
                <div class="lec_info_box col-md-6">
                  <div class="lec_info_title">
                    <h3 class="content-title">Javascript와 JQuery 응용</h3><a class="mini-tag new-tag">new</a><a class="mini-tag limit-tag">무제한</a>
                  </div>
                  <p><em>프로그래밍</em><i class="fa-solid fa-chevron-right"></i><em>프론트엔드</em><i class="fa-solid fa-chevron-right"></i> <em>Javascript</em></p>
                  <p>판매가격 : <span>250000원</span></p>
                </div>
                <div class="lec_option_box col-md-4">
                  <p class="row">
                    <select name="status" id="status" class="form-select col-auto">
                      <option value="판매중">판매중</option>
                      <option value="판매대기">판매대기</option>
                      <option value="판매중지">판매중지</option>
                    </select>
                    <a href="lecture_view.php" class="y-btn mid-btn btn-navy col-auto">보기</a>
                  </p>
                  <div class="row lec_option justify-content-between align-items-center">
                    <input type="checkbox" name="recom" id="" value="1" class="col">
                    <label for="" class="col">추천</label>
                    <input type="checkbox" name="forbegin" id="" value="1" class="col">
                    <label for="" class="col">입문</label>
                    <input type="checkbox" name="forbasic" id="" value="1" class="col">
                    <label for="" class="col">초급</label>
                    <input type="checkbox" name="forinter" id="" value="1" class="col">
                    <label for="" class="col">중급</label>
                    <input type="checkbox" name="foradv" id="" value="1" class="col">
                    <label for="" class="col">상급</label>
                  </div>
                </div>
              </li>
            </ul>
            <p>
              <button class="y-btn mid-btn btn-navy">변경내용 저장</button>
            </p>
          </form>
          <div class="lec_pagination row">
            <ul class="row col justify-content-center">
              <li class="col-auto"><a href=""><i class="fa-solid fa-chevron-left"></i></a></li>
              <li class="col-auto"><a href="" class="active">1</a></li>
              <li class="col-auto"><a href="">2</a></li>
              <li class="col-auto"><a href="">3</a></li>
              <li class="col-auto"><a href=""><i class="fa-solid fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
