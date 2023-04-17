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

    $sql = "SELECT * from board where idx='".$bno."'"; 
    $result = $mysqli -> query($sql) or die("Query Error ! => ".$mysqli -> error);

    $rsc = $result -> fetch_object();
?>

<link rel="stylesheet" href="../css/board_delete.css" />
<link rel="stylesheet" href="../css/board_read.css" />

<?php     
    include $_SERVER['DOCUMENT_ROOT']."/inc/common.php"; 
?>


</div>
<!-- 로고 및 북마크 위치 끝 -->

     <!-- 본문시작 -->
    <h2 class="page-title">공지사항</h2>
        <div>
          <div class="board_area pd-81">
            <div class="read_top">
              <ul>
                <li class="title"><?= $rsc -> title; ?></li>
                <li class="name"><?= $rsc -> name; ?></li>
                <li class="date"><?= $rsc -> date; ?></li>
              </ul>
            </div>
            <div class="read_content">
                <?php 
                if($rsc -> is_img == 1){
                ?>
                <!-- 이미지일때 -->
                <img src="./board_files/<?= $rsc -> file; ?> " target="blank"><br><br>
              <?php } ?>
              <?= nl2br($rsc -> content); ?>
              <br>
              <div class="read_btns">
                <a href="./board_modify.php?idx=<?= $bno; ?>" class="edit">수정</a>
                <button id="show" class="del" onclick="show();">삭제</button>
              </div>
            </div>
            <div class="file_bottom">
            <?php if($rsc -> is_img == 1 || $rsc -> is_img == 0){  ?>
              <p class="file">첨부파일: <a href="./board_files/<?= $rsc -> file; ?>" target="_blank"><?= $rsc -> file; ?></a></p>
              <?php } ?>
            </div>
          </div>
          <div class="list_btn">
            <a href="./board_index.php" class="y-btn big-btn btn-navy">목록으로</a>
          </div>
        </div>

        <!-- 삭제 팝업 HTML -->
        <div class="background">
          <div class="window">
            <div class="popup">
              <div class="flex">
                <p class="title">글을 삭제하시겠습니까?</p>
                <input type="text" placeholder="<?= $rsc -> title; ?>">
                <div class="popup_btns">
                  <a id="close" class="y-btn big-btn btn-sky">취소하기</a>
                  <a class="y-btn big-btn btn-red" id="deletebtn">삭제하기</a>
                  <!-- 내가 deletebtn 추가 -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- 팝업 HTML 끝 -->

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>
<script
  src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
</script>
<script src="./functions.js"></script>

<script>
  function show() {
    document.querySelector(".background").className = "background show";
  }

  $("#close").click(function(){
    $(".background").removeClass('show');
  });

  //삭제하시겠습니까? 안쪽 삭제 버튼 누르면 할일.
  $('#deletebtn').click(function(){

    let idx = <?= $bno; ?>;

    let data = {
      idx:idx,
    }
    delAjax(idx, './board_delete.php', './board_index.php')

  });
</script>


<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
 ?>