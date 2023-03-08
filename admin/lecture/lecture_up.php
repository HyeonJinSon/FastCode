<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>강좌 등록</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.3/dist/simplebar.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/simplebar@5.3.3/dist/simplebar.min.js"></script>
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/lecture_up.css" />
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
          <h2 class="page-title">강좌 등록</h2>
          <form action="lecture_ok.php" method="post" class="row">
            <h3>카테고리</h3>
            <div class="row justify-content-between">
              <div class="col-md-4 row">
                <select name="cate1" id="cate1" class="col form-select" aria-label="Default select example">
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
                <select name="cate3" id="cate3" class="col form-select">
                  <option selected>소분류 선택</option>
                    <!-- {category3} category3.php -->
                    <option value="html">html</option>
                    <option value="css">css</option>
                    <option value="javascript">javascript</option>
                </select>
              </div>
            </div>
            <div class="row">
              <h3>강좌명</h3>
              <input type="text" name="" placeholder="강좌명을 입력하세요" class="col-md-12 form-control">
            </div>
            <div class="row justify-content-between">
                <div class="col-md-4 row">
                    <h3>가격</h3>
                    <input type="text" name="" placeholder="가격을 입력하세요" class="col form-control">
                </div>
                <div class="col-md-4 row">
                    <h3>판매상태</h3>
                    <select name="" id="" class="col form-select">
                        <option selected>옵션을 선택해주세요</option>
                        <option value="판매중">판매중</option>
                        <option value="판매대기">판매대기</option>
                        <option value="판매중지">판매중지</option>
                    </select>
                </div>
                <div class="col-md-4 row">
                    <h3>강좌옵션</h3>
                    <div class="col row justify-content-between lec_option">
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
                </div>
            </div>
            <div class="row justify-content-between g35">
                <div class="col-md-4 row">
                    <h3>수강기한</h3>
                    <select name="" id="lec_date" class="col lec_date form-select">
                        <option selected>옵션을 선택해주세요</option>
                        <option value="제한">제한</option>
                        <option value="무제한">무제한</option>
                    </select>
                </div>
                <div class="col-md-4 row">
                    <h4 class="hidden">시작일</h4>
                    <input type="text" id="datepicker_start" placeholder="----년 --월 --일"  class="col">
                </div>
                <div class="col-md-4 row">
                    <h4 class="hidden">종료일</h4>
                    <input type="text" id="datepicker_end" placeholder="----년 --월 --일" class="col">
                </div>
            </div>
            <div class="row">
                <h3>강좌설명</h3>
                <textarea name="" id="" placeholder="강좌설명을 입력하세요" class="col-md-12"></textarea>
            </div>
            <div class="row">
              <h3>썸네일 이미지</h3>
              <div class="thumbnail_container">
                <label for="lec_thumbnail" class="lec_thumbnail_btn">파일 선택</label>
                <input type="file" name="" id="lec_thumbnail" class="col-md-12 form-control form-control-lg">
              </div>
            </div>
            <div class="row">
              <h3>이미지 추가 업로드</h3>
              <div id="drop" class="box">
                  <p>
                    <i class="fa-solid fa-arrow-up-from-bracket"></i><br>
                    <span class="content-text-1">Drag and Drop Images Here</span>
                  </p>
                  <div id="thumbnails">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row">
                <h3 class="col-auto">강의 영상 업로드</h3>
                <span class="lec_upload col-auto"><i class="fa-solid fa-square-plus" onclick=""></i></span>
              </div>
              <div class="row justify-content-between g35 lec_video_up">
                  <input type="text" class="col-md-4" placeholder="강의명을 입력하세요">
                  <div class="thumbnail_container col-md-8">
                    <label for="lec_thumbnail" class="lec_thumbnail_btn">파일 선택</label>
                    <input type="file" name="" id="lec_thumbnail" class="col-md-12 form-control form-control-lg">
                  </div>
              </div>
            </div>
            <div class="row up_btn_container">
              <button class="y-btn big-btn btn-navy">등록 완료</button>
              <a href="lecture_list.php" class="y-btn big-btn btn-sky">등록 취소</a>
            </div>
          </form>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( "#datepicker_start" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
        $( "#datepicker_end" ).datepicker({
            changeMonth: true,
            changeYear: true
        });

        // $('main h4 + input').hide();
        $('#lec_date').change(function(){
          if($(this).val() == "제한"){
            $('#datepicker_start, #datepicker_end').show();
          }else if($(this).val() == "무제한"){
            $('#datepicker_start, #datepicker_end').hide();
          }
        });

        var uploadFiles = [];
        var $drop = $("#drop");
        $drop.on("dragenter", function(e) {
        $(this).addClass('drag-over');
        }).on("dragleave", function(e) {
        $(this).removeClass('drag-over');
        }).on("dragover", function(e) {
        e.stopPropagation();
        e.preventDefault();
        }).on('drop', function(e) {
        e.preventDefault();
        $(this).removeClass('drag-over');
        var files = e.originalEvent.dataTransfer.files;
            console.log(files);
        for(var i = 0; i < files.length; i++) {
            var file = files[i];
            var size = uploadFiles.push(file);
            
            attachFile(files[i]);

        }  
        });

        function preview(file, idx) {
        console.log(idx);
        var reader = new FileReader();
        reader.onload = (function(f, idx) {
            return function(e) {
            var div = '<div class="thumb" id="f_'+ idx +'"> \
                <div class="close" data-idx="' + idx + '">X</div> \
                <img src="' + e.target.result + '"/> \
            </div>';
            $("#thumbnails").append(div);
            };
        })(file, idx);
        reader.readAsDataURL(file);
        }

        $("#thumbnails").on("click", ".close", function(e) {
        var $target = $(e.target);
        var idx = $target.attr('data-idx');

        file_del(idx);
    });
  </script>
  </body>
</html>
