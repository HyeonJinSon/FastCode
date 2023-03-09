<?php 
    session_start();
    // if(!$_SESSION['AUID']){
    //     echo "<script>
    //     alert('접근 권한이 없습니다.');
    //     history.back();
    //     </script>";
    // };
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";
    include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";

?>

<link rel="stylesheet" href="../css/board_write.css" />

<!-- ========= 본문시작 =========== -->

<?php     
    include $_SERVER['DOCUMENT_ROOT']."/inc/common.php"; 
?>

<!-- 본문시작 -->

<h2 class="page-title">새 글 작성</h2>

<form action="board_write_ok.php" method="post" enctype="multipart/form-data">
  <div class="pd-54">
    <div class="subject">
      <label for="subject">제목</label>
      <input
        type="text"
        id="subject"
        name="title"
        required
        placeholder="제목을 입력하세요"
      />
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
        />
      </div>
    </div>

    <div class="user_select">
      <form>
        <label for="user">작성권한</label>
        <select class="form-select" name="user_cat" id="">
          <option value="user">관리자</option>
          <option value="user2">관리자2</option>
          <option value="user3">관리자3</option>
        </select>
      </form>
    </div>
  </div>
</form>
<div class="btns">
  <a href="#" class="y-btn big-btn btn-navy">등록완료</a>
  <a href="#" class="y-btn big-btn btn-sky">등록취소</a>
</div>

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
 ?>