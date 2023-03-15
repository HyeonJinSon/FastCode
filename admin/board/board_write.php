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

<link rel="stylesheet" href="../css/board_write.css" />

<!-- ========= 본문시작 =========== -->

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

 <h2 class="page-title">새 글 작성</h2>

<form action="./board_write_ok.php" method="post" enctype="multipart/form-data" >
  <div class="pd-54">
    <div class="subject">
      <label for="subject">제목</label>
      <input
        type="text"
        id="subject"
        name="title"
        required
        placeholder="제목을 입력하세요"
      >
    </div>
    <div class="content">
      <label for="usermsg">내용</label>
      <textarea
        name="content"
        id="usermsg"
        cols="30"
        rows="10"
        placeholder="내용을 입력하세요"
      ></textarea>
    </div>

    <div class="files">
      <h3>첨부파일</h3>
      <div class="files_container">
        <label for="files" class="files_btn">파일 선택</label>
        <input
          type="file"
          name="file"
          id="files"
          class="form-control form-control-lg"
        >
      </div>
    </div>

    <div class="user_select">
        <label for="user_cat">작성권한</label>
        <select class="form-select" name="authority" id="user_cat">
          <option value="1">관리자</option>
          <option value="2">관리자2</option>
        </select>
    </div>
    </div>
  <!-- 내가수정- form 안으로 옮김 -->
    <div class="btns">
    <button type="submit" class="y-btn big-btn btn-navy">등록완료</button>
    <button type="reset" class="y-btn big-btn btn-sky">등록취소</button>
    </div>
</form>

  
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>

<script>
/* ======================= 북마크 ========================= */
//북마크
let bookmark = String(<?php echo json_encode($book_mark);?>);
  // console.log('$_SESSION[ADBOOK] : ' + bookmark);
  if(bookmark != '0') {
    if (bookmark.indexOf('2') != -1 ) {
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
          bookmark += ',2';  
        } else {
          bookmark = bookmark.replace('0', '');
          bookmark += '2';
        }
      } else {
        alert('즐겨찾기는 최대 6개까지만 설정 가능합니다.');
        $('.bookmark input').prop("checked", false);
      }

    } else {
      if(bookmark == '2') {
        bookmark = '0';
      } else {
        bookmark = bookmark.replace(',2' , '');
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