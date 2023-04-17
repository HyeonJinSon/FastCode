<?php 
    session_start();
    if(!$_SESSION['AUID']){
      echo "<script>
              alert('접근 권한이 없습니다');
              history.back();
          </script>";
    };

    include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";

    $bno = $_GET['idx'];
    $sql = "SELECT * from board WHERE idx='{$bno}'";
    $result = $mysqli -> query($sql); 
    $row = $result -> fetch_assoc(); 

?>

<link rel="stylesheet" href="../css/board_write.css">

<?php     
    include $_SERVER['DOCUMENT_ROOT']."/inc/common.php"; 
?>

</div>
<!-- 로고 및 북마크 위치 끝 -->

<!-- 본문시작 -->

<h2 class="page-title">글 수정</h2>

<form action="./board_modify_ok.php" method="POST" enctype="multipart/form-data" >
  <input type="hidden" name="idx" value="<?= $bno ?>">
  <div class="pd-54">
    <div class="subject">
      <label for="subject">제목</label>
      <input
        type="text"
        id="subject"
        name="title"
        required
        placeholder="제목을 입력하세요"
        value="<?= $row['title']; ?>"
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
      ><?= $row['content']; ?>
      </textarea>
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
        value="<?= $row['file']; ?>"
        >
      </div>
    </div>

    <div class="user_select">
        <label for="user_cat">작성권한</label>
        <select class="form-select" name="authority" id="user_cat">
          <option value="1" <?php if($row['authority'] == 1) echo 'selected' ?>>관리자</option>
          <option value="2" <?php if($row['authority'] == 2) echo 'selected' ?> >관리자2</option>
        </select>
    </div>
  </div>
  <!-- 내가수정 -->
  <div class="btns">
    <button type="submit" class="y-btn big-btn btn-navy">등록완료</button>
    <a href="./board_read.php?idx=<?= $bno ?>" class="y-btn big-btn btn-sky">등록취소</a>
  </div>
</form>



<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
?>