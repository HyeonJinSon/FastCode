<?php 
    session_start();
    if(!$_SESSION['AUID']){
      echo "<script>
              alert('접근 권한이 없습니다');
              history.back();
          </script>";
    };
    $book_mark = $_SESSION['ADBOOK'];
    include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";

?>

<link rel="stylesheet" href="../css/coupon_up.css" />

<?php     
    include $_SERVER['DOCUMENT_ROOT']."/inc/common.php"; 
?>

        <div class="bookmark">
          <input type="checkbox" id="bookmark1" />
          <label for="bookmark1"><i class="fa-solid fa-bookmark"></i></label>
        </div> 
      </div>
      
  <!-- 로고 및 북마크 위치 끝 -->

<!-- 본문시작 -->

<h2 class="page-title">쿠폰등록</h2>

<form action="./coupon_ok.php" method="POST" enctype="multipart/form-data">
  <div class="pd-54">
    <div class="c_title">
      <label for="coupon_title">쿠폰명</label>
      <input
        type="text"
        id="coupon_title"
        name="coupon_name"
        required
        placeholder="쿠폰명을 입력하세요"
      />
    </div>

    <div class="line_second">
      <div class="c_type">
        <label for="coupon_type">쿠폰타입</label>
        <select class="form-select" name="coupon_type" id="coupon_type">
          <option value="1">타입1</option>
          <option value="2">타입2</option>
          <!-- 내가 1 2로 임의수정 -->
        </select>
      </div>
      <div class="c_active">
        <label for="coupon_active">상태</label>
        <select
          class="form-select"
          name="status"
          id="coupon_active"
        >
          <option value="1">활성화</option>
          <option value="2">비활성화</option>
          <!-- 활성화 - 1 , 비활성화 - 2로 임의수정 -->
        </select>
      </div>
      <div class="c_discount">
        <label for="coupon_discount">할인가</label>
        <input
          type="text"
          id="coupon_discount"
          name="coupon_discount"
          required
          placeholder="원"
        />
      </div>
    </div>

    <div class="line_third">
      <div class="c_percent">
        <label for="coupon_percen">할인율</label>
        <input
          type="text"
          id="coupon_percen"
          name="coupon_ratio"
          required
          placeholder="%"
        />
      </div>

      <div class="c_min">
        <label for="coupon_min">최소사용금액</label>
        <input
          type="text"
          id="coupon_min"
          name="min_price"
          required
          placeholder="원"
        />
      </div>

      <div class="c_max">
        <label for="coupon_max">최대사용금액</label>
        <input
          class="ph"
          type="text"
          id="coupon_max"
          name="max_price"
          required
          placeholder="원"
        />
      </div>
    </div>

    <div class="line_fourth">
      <div class="c_use">
        <label for="coupon_use">사용기한</label>
        <select class="form-select" name="coupon_due" id="coupon_use">
          <option value="1">무제한</option>
          <option value="2">제한</option>
        </select>
      </div>

      <div class="c_start">
        <label for="coupon_start_date">시작일</label>
        <input
          type="date"
          name="coupon_start_date"
          id="coupon_start_date"
        />
      </div>

      <div class="c_end">
        <label for="coupon_end_date">종료일</label>
        <input
          type="date"
          name="coupon_end_date"
          id="coupon_end_date"
        />
      </div>
    </div>

    <div class="files">
      <h3>쿠폰이미지</h3>
      <div class="files_container">
        <label for="files" class="files_btn">파일 선택</label>
        <input
          type="file"
          name="file"
          id="files"
          class="form-control form-control-lg"
        />
      </div>
    </div>
  </div>
  <div class="btns">
    <button type="submit" class="y-btn big-btn btn-navy">
      등록완료
    </button>
    <button type="reset" class="y-btn big-btn btn-sky">등록취소</button>
  </div>
</form>

<!-- 본문끝 -->

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>

<script
  src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
</script>

<script>
      $("#coupon_start_date, #coupon_end_date").hide();
      $("#coupon_use").change(function () {
        if ($(this).val() == "2") {
          $("#coupon_start_date, #coupon_end_date").show();
        } else if ($(this).val() == "1") {
          $("#coupon_start_date, #coupon_end_date").hide();
        }
      });

/* ======================= 북마크 ========================= */

//북마크
let bookmark = String(<?php echo json_encode($book_mark);?>);
  // console.log('$_SESSION[ADBOOK] : ' + bookmark);
  if(bookmark != '0') {
    if (bookmark.indexOf('8') != -1 ) {
      $('#bookmark1').attr("checked", true);
    } else {
      $('#bookmark1').attr("checked", false);
    }
  }

  $('#bookmark1').click(function() {
    let checked = $(this).is(":checked");

    if(checked == true) {
      if (bookmark.length < 10) {
        if(bookmark != '0') {
          bookmark += ',8';  
        } else {
          bookmark = bookmark.replace('0', '');
          bookmark += '8';
        }
      } else {
        alert('즐겨찾기는 최대 6개까지만 설정 가능합니다.');
        $('.bookmark input').prop("checked", false);
      }

    } else {
      if(bookmark == '8') {
        bookmark = '0';
      } else if(bookmark.length == 1) {
        bookmark = bookmark.replace('8' , '');
      } else {
        bookmark = bookmark.replace(',8' , '');
      }  
    }
    
    let data = {
        bookmark: bookmark
    }
    $.ajax({
      type: 'POST',
      url: '../dashboard/bookmark.php',
      data: data,
      dataType: 'html',
      error: function(){
        alert('실패');
      },
      success: function (result) {
        bookmark = result;
        console.log(bookmark);
      }
    });
  });

</script>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
?>