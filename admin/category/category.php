<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>카테고리 등록</title>
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/category.css" />
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
            <h2 class="page-title pd-81">카테고리 등록</h2>
            <div class="category_wrapper">
              <form action="" class="row justify-content-between align-items-center text-center">
                <div class="select_container col row col-md-4">
                  <select name="cate1" id="cate1" class="row">
                    <option selected>대분류</option>
                    <!-- {category1} -->
                    <option value="프로그래밍">프로그래밍</option>
                    <option value="디자인">디자인</option>
                  </select>
                  <button type="button" class="y-btn big-btn btn-navy modal_open" onclick="open_Modal(0)">대분류 등록</button> 
                </div>
                <div class="select_container col row col-md-4">
                  <select name="cate2" id="cate2">
                    <option selected>중분류</option>
                    <!-- {category2} category2.php -->
                    <option value="프론트">프론트</option>
                    <option value="백">백</option>
                    <option value="기타">기타</option>
                  </select>
                  <button type="button" class="y-btn big-btn btn-navy modal_open" onclick="open_Modal(1)">중분류 등록</button>
                </div>
                <div class="select_container col row col-md-4">
                  <select name="cate3" id="cate3">
                    <option selected>소분류</option>
                    <!-- {category3} category3.php -->
                    <option value="html">html</option>
                    <option value="css">css</option>
                    <option value="javascript">javascript</option>
                  </select>
                  <button type="button" class="y-btn big-btn btn-navy modal_open" onclick="open_Modal(2)">소분류 등록</button>
                </div>
              </form>
            </div>
          </main>
          <dialog class="cate1Modal" id="cate1Modal">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="content-title">대분류 등록</h2>
              </div>
              <div class="modal-body row">
                <input type="text" name="name1" id="name1" placeholder="카테고리명" />
                <input type="text" name="code1" id="code1" placeholder="코드 입력" />
              </div>
              <div class="modal-footer row justify-content-between">
                <button type="button" class="mid-btn btn-navy"  onclick="category_save(1)">추가하기</button>
                <button type="button" class="modal_close y-btn mid-btn btn-sky">취소하기</button>
              </div>
            </div>
          </dialog>
          <dialog class="cate2Modal" id="cate2Modal">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="content-title">중분류 등록</h2>
              </div>
              <div class="modal-body row">
                <input type="text" name="name2" id="name2" placeholder="카테고리명" />
                <select name="pcode" id="pcode2_1">
                  <option selected>대분류 선택</option>
                  <!-- {category1} select#cate1에서 선택된 값이 있을 경우 이 자리에 해당 option을 selected하여 보이게 -->
                  <option value="프로그래밍">프로그래밍</option>
                  <option value="디자인">디자인</option>
                </select>
                <input type="text" name="code2" id="code2" placeholder="코드 입력" />
              </div>
              <div class="modal-footer row justify-content-between">
                <button type="button" class="mid-btn btn-navy"  onclick="category_save(2)">추가하기</button>
                <button type="button" class="modal_close y-btn mid-btn btn-sky">취소하기</button>
              </div>
            </div>
          </dialog>
          <dialog class="cate3Modal" id="cate3Modal">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="content-title">소분류 등록</h2>
              </div>
              <div class="modal-body row">
                <input type="text" name="name3" id="name3" placeholder="카테고리명" />
                <select name="pcode3_1" id="pcode3_1">
                  <option selected>대분류 선택</option>
                  <!-- {category1} select#cate1에서 선택된 값이 있을 경우 이 자리에 해당 option을 selected하여 보이게 -->
                  <option value="프로그래밍">프로그래밍</option>
                  <option value="디자인">디자인</option>
                </select>
                <select name="pcode3_2" id="pcode3_2">
                  <option selected>대분류를 먼저 선택해주세요</option>
                  <!-- {category2} category4.php  select#cate2에서 선택된 값이 있을 경우 이 자리에 해당 option을 selected하여 보이게-->
                </select>
                <input type="text" name="code3" id="code3" placeholder="코드 입력" />
              </div>
              <div class="modal-footer row justify-content-between">
                <button type="button" class="mid-btn btn-navy" onclick="category_save(3)">추가하기</button>
                <button type="button" class="modal_close y-btn mid-btn btn-sky">취소하기</button>
              </div>
            </div>
          </dialog>
        </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.6.3.min.js"
      integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
      integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0="
      crossorigin="anonymous"
    ></script>
    <script>
      //div.select-container:nth-child button 누르면 각각 dialog show()
      function open_Modal(idx){
        $('dialog').eq(idx).show();
      }

      //.modal_close를 click하면 dialog hide()
      $(".modal_close").click(()=>{
        $('dialog').hide();
      });
      //cate1 change 할일  category2.php cate1에 아래 중분류 cate2를 #cate2에 html로 넣어주기
      //.select-container:nth-child(2) button show(), (option 중 가장 첫 번째가 선택된 경우 button hide())
      $("#cate1").change(() => {
        let cate1 = $(this).val();
        let data = {
          cate1: cate1,
        };
        $.ajax({
          async: false,
          type: "post",
          data: data,
          url: "category2.php",
          dataType: "html",
          success: function (return_data) {
            $("#cate2").html(return_data);
          },
        });
      });

      //cate2 change 할일  category3.php cate2에 아래 소분류 cate3를 #cate3에 html로 넣어주기
      //.select-container:nth-child(3) button show(), (option 중 가장 첫 번째가 선택된 경우 button hide())
      $("#cate2").change(() => {
        let cate2 = $(this).val();
        let data = {
          cate2: cate2,
        };
        $.ajax({
          async: false,
          type: "post",
          data: data,
          url: "category3.php",
          dataType: "html",
          success: function (return_data) {
            $("#cate3").html(return_data);
          },
        });
      });

      //pcode3_1 change 할일 > pcode3_1의 cate1 아래 중분류 cate2를 pcode3_2에 출력  category4.php
      $("#pcode3_1").change(() => {
        let cate1 = $(this).val();
        let data = {
          cate1: cate1,
        };
        $.ajax({
          async: false,
          type: "post",
          data: data,
          url: "category4.php",
          dataType: "html",
          success: function (return_data) {
            $("#pcode3_2").html(return_data);
          },
        });
      });

      //function category_save(){}   save_category.php
      function category_save(step) {
        let name = $("#name" + step).val();
        let code = $("#code" + step).val();
        let pcode = $("#pcode" + step + " option:selected").val();

        if(step>1 && !pcode){
          alert('상위 분류를 선택해주세요.');
          return;
        }
        if(!code){
          alert('분류 코드를 입력해주세요.');
          return;
        }
        if(!name){
          alert('카테고리명을 입력해주세요.');
          return;
        }
        let data = {
          name : name,
          code : code,
          pcode : pcode,
          step : step,
        }
        $.ajax({
          async: false,
          type: 'post',
          data: data,
          url: "save_category.php",
          dataType: 'json',
          success:function(return_data){
            if(return_data.result == 1){
              alert('새 카테고리가 등록되었어요.').
              location.reload();
            }else if(return_data.result == -1){
              alert('입력한 코드명 또는 카테고리명이 이미 존재하네요!');
              location.reload();
            }else{
              alert('카테고리 등록에 실패했어요!');
            }
          }
        });
      }
    </script>
  </body>
</html>
