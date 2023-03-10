<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- title에 강좌명 출력 ?? -->
    <title>강좌 1</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/simplebar@5.3.3/dist/simplebar.min.js"></script>
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/lecture_view.css" />
  </head>
  <body>
    <div class="common-wrap">
      <div class="gnb-body">
        <div class="h-100" data-simplebar>
          <div class="admin-profile">
            <div class="profile-img-wrap">
              <img src="../img/admin-profile.png" alt="admin-img" />
            </div>
            <h2>Manager</h2>
            <div class="profile-menu-wrap">
              <ul class="profile-menu d-flex justify-content-center">
                <li>
                  <a href=""><i class="fa-brands fa-whmcs"></i></a>
                </li>
                <li>
                  <a href=""><i class="fa-regular fa-calendar-check"></i></a>
                </li>
                <li>
                  <a href=""><i class="fa-brands fa-weixin"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="accordion" id="main-menu-wrap">
            <div class="accordion-item">
              <h2 class="accordion-header" id="hdDashboard">
                <a
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#menuDashboard"
                  aria-expanded="true"
                  aria-controls="menuDashboard"
                >
                  <i class="fa-solid fa-wrench"></i>
                  <span class="main-menu-ft">대시보드</span>
                </a>
              </h2>
              <div
                id="menuDashboard"
                class="accordion-collapse collapse show"
                aria-labelledby="hdDashboard"
                data-bs-parent="#main-menu-wrap"
              ></div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="hdUser">
                <a
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#menuUser"
                  aria-expanded="false"
                  aria-controls="menuUser"
                >
                  <i class="fas fa-user-friends"></i>
                  <span class="main-menu-ft">회원 관리</span>
                </a>
              </h2>
              <div
                id="menuUser"
                class="accordion-collapse collapse"
                aria-labelledby="hdUser"
                data-bs-parent="#main-menu-wrap"
              >
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
                <a
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#menuCourse"
                  aria-expanded="false"
                  aria-controls="menuCourse"
                >
                  <i class="fa-solid fa-book"></i>
                  <span class="main-menu-ft">강좌 관리</span>
                </a>
              </h2>
              <div
                id="menuCourse"
                class="accordion-collapse collapse"
                aria-labelledby="hdCourse"
                data-bs-parent="#main-menu-wrap"
              >
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
                <a
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#menuSales"
                  aria-expanded="false"
                  aria-controls="menuSales"
                >
                  <i class="fas fa-money-check-alt"></i>
                  <span class="main-menu-ft">매출 관리</span>
                </a>
              </h2>
              <div
                id="menuSales"
                class="accordion-collapse collapse"
                aria-labelledby="hdSales"
                data-bs-parent="#main-menu-wrap"
              >
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
                <a
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#menuEvent"
                  aria-expanded="false"
                  aria-controls="menuEvent"
                >
                  <i class="fas fa-bullhorn"></i>
                  <span class="main-menu-ft">이벤트 관리</span>
                </a>
              </h2>
              <div
                id="menuEvent"
                class="accordion-collapse collapse"
                aria-labelledby="hdEvent"
                data-bs-parent="#main-menu-wrap"
              >
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
                <a
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#menuBoard"
                  aria-expanded="false"
                  aria-controls="menuBoard"
                >
                  <i class="fas fa-th-list"></i>
                  <span class="main-menu-ft">게시판 관리</span>
                </a>
              </h2>
              <div
                id="menuBoard"
                class="accordion-collapse collapse"
                aria-labelledby="hdBoard"
                data-bs-parent="#main-menu-wrap"
              >
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
          <h1 id="main-logo">
            <a href="/"
              ><img src="../img/fastcode_logo.png" alt="Fastcode" /><span
                >fastcode</span
              ></a
            >
          </h1>
          <div class="bookmark">
            <input type="checkbox" id="bookmark1" />
            <label for="bookmark1"><i class="fa-solid fa-bookmark"></i></label>
          </div>
        </div>
        <main>
          <h2 class="page-title hidden">강좌 상세보기</h2>
          <div class="lec_view_container">
            <div class="lec_view_title_container row">
              <figure class="col-md-4">
                <img src="https://placehold.co/442x301" alt="" />
              </figure>
              <div class="lec_view_title col-md-8">
                <p>
                  <em>프로그래밍</em><i class="fa-solid fa-chevron-right"></i
                  ><em>프론트엔드</em
                  ><i class="fa-solid fa-chevron-right"></i>
                  <em>Javascript</em>
                </p>
                <h3 class="content-title">Javascript와 JQuery 응용</h3>
              </div>
            </div>
            <div class="lec_view_info">
              <div class="lec_view_info1">
                <p>판매가격 : <span>250000원</span></p>
                <p>상태 : <span>판매중</span></p>
              </div>
              <div class="bar"></div>
              <div class="lec_view_info2">
                <a class="mini-tag limit-tag">제한</a>
                <p><span>2023.03.28</span> - <span>2023.06.28</span></p>
              </div>
              <div class="bar"></div>
              <div class="lec_view_info3">
                <!-- db에 저장되어 있는 체크 여부가 checked 속성 여부로 출력되면서(db 연결하면서 바꿔야 될 수도..), 이 화면에서 체크박스를 바꾸지는 못하도록 disabled 속성을 추가했음, 스타일은 브라우저에서 지정한 스타일이라 label:before로 따로 만듦 -->
                <div
                class="row lec_option justify-content-between align-items-center"
              >
                <input
                  type="checkbox"
                  name="recom"
                  id=""
                  value="1"
                  class="col"
                  disabled
                  checked
                />
                <label for="" class="col">추천</label>
                <input
                  type="checkbox"
                  name="forbegin"
                  id=""
                  value="1"
                  class="col"
                  disabled
                />
                <label for="" class="col">입문</label>
                <input
                  type="checkbox"
                  name="forbasic"
                  id=""
                  value="1"
                  class="col"
                  disabled
                />
                <label for="" class="col">초급</label>
                <input
                  type="checkbox"
                  name="forinter"
                  id=""
                  value="1"
                  class="col"
                  disabled
                  checked
                />
                <label for="" class="col">중급</label>
                <input
                  type="checkbox"
                  name="foradv"
                  id=""
                  value="1"
                  class="col"
                  disabled
                  checked
                />
                <label for="" class="col">상급</label>
                </div>
              </div>
            </div>
            <div class="lec_view_desc">
              <h4>강좌 설명</h4>
              <p>
                지난 3년간 강의평점 최고점을 달성한 000 선생님과 함께 하는 Javascript & JQuery 수업!<br>
                이 강의를 수강하면 Javascript와 JQuery를 구분하고 상황에 따라 능숙하게 기능을 수행할 수 있는 사람이 됩니다!<br><br>

                다음과 같은 사람에게 추천합니다!<br>
                HTML과 CSS 작업을 어느 정도 수행할 수 있는 사람<br>
                동적 효과와 다양한 기능을 수행할 수 있는 사이트를 만들고 싶은 사람<br>
                Javascript와 JQuery를 사용할 수는 있지만 둘의 구분을 명확하게 알지 못하는 사람<br><br>

                초보자들은 이 강의 수강 전 HTML 기본 강의, CSS Master 강의를 선행하는 것을 추천합니다.<br><br>

                강좌에 대한 질문이나 문의사항은 강의문의사항 게시판을 이용해주세요.<br>
              </p>
            </div>
            <div class="lec_view_img_slide">
              <h4>강좌 추가 이미지</h4>
              <div class="lec_img_slide_wrapper">
                <ul class="lec_img_slides">
                  <li>
                    <figure>
                      <img src="https://placehold.co/278x190" alt="">
                    </figure>
                  </li>
                  <li>
                    <figure>
                      <img src="https://placehold.co/278x190" alt="">
                    </figure>
                  </li>
                  <li>
                    <figure>
                      <img src="https://placehold.co/278x190" alt="">
                    </figure>
                  </li>
                  <li>
                    <figure>
                      <img src="https://placehold.co/278x190" alt="">
                    </figure>
                  </li>
                  <li>
                    <figure>
                      <img src="https://placehold.co/278x190" alt="">
                    </figure>
                  </li>
                  <li>
                    <figure>
                      <img src="https://placehold.co/278x190" alt="">
                    </figure>
                  </li>
                </ul>
              </div>	
              <p class="lec_img_controls row justify-content-between">
                <span class="prev col-auto"><i class="fa-solid fa-chevron-left"></i></span>
                <span class="next col-auto"><i class="fa-solid fa-chevron-right"></i></span>
              </p>
            </div>
            <div class="lec_view_video_container">
              <h4>강의 영상</h4>
              <ul class="lec_video_list">
                <li class="row justify-content-between">
                  <em class="col-auto">1강. 강의 영상 제목 1</em><a href="" class="lec_play col-auto"><i class="fa-regular fa-circle-play"></i></a>
                </li>
              </ul>
            </div>
          </div>
          </form>
          <div class="lec_view_btn_container row">
            <a href="lecture_list.php" class="y-btn small-btn btn-sky">목록</a>
            <a href="#" class="y-btn small-btn btn-navy">수정</a>
            <a href="#" class="y-btn small-btn btn-red">삭제</a>
          </div>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
      let slideWrapper = $('.lec_img_slide_wrapper'),
          slides = slideWrapper.find('.lec_img_slides'),
          slide = slides.find('li'),
          currentIdx = 0,
          slideCount = slide.length,
          slideWidth = 278,
          slideMargin = 50,
          moveAmt = slideWidth + slideMargin,
          maxSlides = 4,
          prevBtn = $('.lec_img_controls').find('.prev'),
          nextBtn = $('.lec_img_controls').find('.next');

          for(let i = 0;i<slideCount;i++){
              let cloneNode = slide.eq(i).clone();
                  cloneNode.addClass('clone');
                  slides.append(cloneNode);
          }
          for(let i = slideCount - 1;i>=0;i--){
              let cloneNode = slide.eq(i).clone();
                  cloneNode.addClass('clone');
                  slides.prepend(cloneNode);
          }
          function slideLayout(sw,sm){
            let allSlide = slides.find('li');
            allSlide.each(function(idx){
              $(this).css({left:`${idx*(sw+sm)}px`});
            });
            moveAmt = sw + sm;
            setSlideCenter(moveAmt);
          }
          slideLayout(slideWidth,slideMargin);
          
          function setSlideCenter(ma){
            slides.each(function(){
                $(this).css({transform:`translateX(-${slideCount*ma}px)`});
                $(this).addClass('animated');
              });
          }
          
          
          function moveSlide(idx){
            slides.each(function(){
              if(idx >= 0){
                $(this).stop().animate({left:`-${idx*moveAmt}px`},100);
              }else {
                $(this).stop().animate({left:`${Math.abs(idx)*moveAmt}px`},100);
              }
            });
            currentIdx = idx;
            console.log(slideCount);
            if(currentIdx == slideCount || currentIdx == -slideCount){
                setTimeout(()=>{
                  slides.removeClass('animated');
                  slides.css({left:'0px'});
                  currentIdx = 0;
                },500);
                setTimeout(()=>{
                  slides.addClass('animated');
                },600);
            }
          }

          prevBtn.click(debounce(()=>{
            moveSlide(currentIdx-1)
          },500));
          nextBtn.click(debounce(()=>{
            moveSlide(currentIdx+1)
          },500));

          function debounce(callback, time){
            let slideTrigger = true;
            return ()=>{
                if(slideTrigger){
                    callback();
                    slideTrigger = false;
                    setTimeout(()=>{
                        slideTrigger = true;
                    },time);
                }
            }
          }
    </script>
  </body>
</html>
