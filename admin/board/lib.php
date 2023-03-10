<?php 
    function board_del($tablename, $idx){

        $sql = "SELECT * from $tablename where idx='".$idx."'"; 
        $result = $mysqli -> query($sql) or die("Query Error ! => ".$mysqli -> error);
        $rs = $result -> fetch_object();

?>
  <!-- 팝업 HTML -->
  <div class="background">
    <div class="window">
      <div class="popup">
        <div class="flex">
          <p class="title">글을 삭제하시겠습니까?</p>
          <input type="text" placeholder="<?= $rs -> title; ?>">
          <div class="btns">
            <a href="#" id="close" class="y-btn big-btn btn-sky"
              >취소하기</a>
            <a href="./board_delete.php?idx=<?= $idx; ?>" class="y-btn big-btn btn-red">삭제하기</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 팝업 HTML 끝 -->
  <script>
    // document.querySelector("#show").addEventListener("click", show);
    // document.querySelector("#close").addEventListener("click", close);
    //dl..이렇게들어와도됨??????????????
    document.body.appendChild(".background");
  </script>
  <!--  -->

<?php
    }
?>

<!-- 클릭하면 이 lib을 include??
아니 include 해놓고 클릭하면 실행?
근데 미리 인클루드하면... 얘는 형체가있어서 안될거같은데 화면에 보이지않나
ㄴ 실행을 안해서 ㄱㅊ은거아님?

    include $_SERVER['DOCUMENT_ROOT']."/board/lib.php";


    a태그에 onclick=" <?= board_del(board, $bno); ?> 이렇게넣으면되나? "

    read.php에서
    <div class="read_btns">
    <a href="./board_modify.php?idx=<?= $bno; ?>" class="edit">수정</a>
    <a href="./board_delete.php?idx=<?= $bno; ?>" class="del">삭제</a>
    </div> 
    
    이렇게해놨는데 이게 아닌가?
    delete.php 로 넘기는게 아니라 바로 거기서 출력해서 delete 로 넘기는게 맞나
    아니면 delete 로 넘겨서 delete 에 lib을 인클루드해서 ??? delete ok ? 만들어야함? ㄴㄴ
-->

<!-- 
여기;에서 바로실행  
삭제하기 누르면 할일 ... 로 스크립트

AJAX


 -->