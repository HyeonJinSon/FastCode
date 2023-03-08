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

    
    $sql = "SELECT * from board WHERE idx=".$bno;
    $result = $mysqli -> query($sql) or die("Query error ! => ".$mysqli -> error);
    while($rs = $result -> fetch_object()){
      $rsc[] = $rs;
    }
?>

    
<link rel="stylesheet" href="../css/board_read.css" />

<?php     
    include $_SERVER['DOCUMENT_ROOT']."/inc/common.php"; 
?>

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
              <p>클릭한 글 내용이 나옵니다.</p>
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
              </p>
              <div class="read_btns">
                <a href="./board_modify.php?idx=<?= $rsc -> idx; ?>" class="edit" type="button">수정</a>
                <a href="./board_delete.php?idx=<?= $rsc -> idx; ?>" class="del" type="button">삭제</a>
              </div>
            </div>
            <div class="file_bottom">
              <p class="file">첨부파일:</p>
            </div>
          </div>
          <div class="list_btn">
            <a href="#" class="y-btn big-btn btn-navy">글쓰기</a>
          </div>
        </div>

        
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
 ?>