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

    $bno = $_GET['idx'];

    
    $sql = "SELECT * from board where idx='".$bno."'"; 
    $result = $mysqli -> query($sql) or die("Query Error ! => ".$mysqli -> error);
    // while($rs = $result -> fetch_object()){
    //   $rsc[] = $rs;
    // } 글 하나있으면 하나 둘 ... > rsc 안에는 글 하나 안에 있는 컬럼이 다있음
    // 글 하나만 출력할거니까 while 을 쓸필요가없어요

    // foreach로... 1번글 - id,tt, desc... 얘네가 다 rsc안에... 컬럼들 안에 있는거
    // 그냥 rsc 는 배열로 돼있어서 foreach 

    $rsc = $result -> fetch_object(); //객체형식으로 저장
    // while문을 안쓰고 그냥 객체에서 뽑아서 쓰면 됨!! while 에서 배열로 했기 떄문에 출력이 안된거였음
?>

<link rel="stylesheet" href="../css/board_delete.css" />
<link rel="stylesheet" href="../css/board_read.css" />

<?php     
    include $_SERVER['DOCUMENT_ROOT']."/inc/common.php"; 
?>

     <!-- 본문시작 -->
    <!-- 글쓰는화면 > 에디터 > HTML 코드 직접 넣으면 됨 -->
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

              <?= nl2br($rsc -> content); ?>
              <br>
              <?php 
              if($rsc -> is_img == 1){
              ?>
              <!-- 이미지일때 -->
              <img src="./board_files/<?= $rsc -> file; ?> " target="blank">
             <?php } ?>

              <!-- <p>클릭한 글 내용이 나옵니다.</p>
              <br />
              <p>
                ex 안녕하십니까 FAST CODE 입니다.<br />
                원활하고 안정된 서비스 제공을 위하여 2023년 2월 새벽 시스템 점검
                작업이 예정되어 있습니다.<br />
                점검 시간 중 홈페이지 및 모바일의 모든 서비스가 중단될
                예정이오니 이용에 불편 없으시기 바랍니다.<br />
                <br />
                1. 일시<br />
                : 2/01(수) 03am ~ 05am<br />
                <br />
                2. 내용<br />
                : 정기 PM작업, DB 최적화<br />
                더욱 안정적이고 편리한 서비스를 제공하는 FAST CODE가
                되겠습니다.<br />
                감사합니다.
              </p> -->

              <div class="read_btns">
                <a href="./board_modify.php?idx=<?= $bno; ?>" class="edit">수정</a>
                <!-- <a href="" id="show" class="del">삭제</a> -->
                <button id="show" class="del" onclick="show(); console.log('클릭');">삭제</button>
              </div>
            </div>
            <div class="file_bottom">
            <?php if($rsc -> is_img == 1 || $rsc -> is_img == 0){  ?>
              <p class="file">첨부파일: <a href="./board_files/<?= $rsc -> file; ?>"><?= $rsc -> file; ?></a></p>
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



        <!-- <script>
          console.log(<?php echo $rsc -> content ?>);
        </script> -->
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

  // function close() {
  //   // document.querySelector(".background").className = "background";

  // }

  // document.querySelector("#show").addEventListener("click", ()=>{
    
  // });
  // document.querySelector("#close").addEventListener("click", close);


  // 삭제 버튼(바깥)을 누르면 할일
  // $("#show").click(function(e){
  //   e.preventDefault();
  //   // $(".background").addClass('show');
  //   $(".background").show();
  // });

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