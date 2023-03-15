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

    /* ================== 페이지네이션 =================== */

  $page = $_GET['page'] ?? 1;

  $pagesql = "SELECT COUNT(*) as cnt FROM board"; 
  $page_result = $mysqli -> query($pagesql);
  $page_row = $page_result ->fetch_assoc();
  $row_num = $page_row['cnt'];//전체 게시물 수

  $list = 5;
  $block_ct = 5;
  $block_num = ceil($page/$block_ct);
  $block_start = (($block_num -1 )*$block_ct) + 1; 
  $block_end = $block_start + $block_ct - 1;

  $total_page = ceil($row_num/$list); 
  if($block_end > $total_page) $block_end = $total_page;
  $total_block = ceil($total_page/$block_ct);
  $start_num = ($page - 1) * $list;


    /* ================== 값 조회 =================== */

    $sql = "SELECT * from board order by idx desc limit $start_num, $list";
    $result = $mysqli -> query($sql) or die("Query Error! => ".$mysqli->error);
    while($rs = $result->fetch_object()){
        $rsc[] = $rs;
    }  
?>

<link rel="stylesheet" href="../css/board_delete.css" />
<link rel="stylesheet" href="../css/board_index.css" />

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

        <h2 class="page-title">공지사항</h2>

        <div class="borad_top">
          <a href="./board_write.php" class="y-btn big-btn btn-navy">글쓰기</a>
          <form action="./board_search_ok.php" method="GET" class="board_forms">
            <select class="form-select" name="search_board" id="search_board">
              <option value="title">제목</option>
              <option value="name">글쓴이</option>
              <option value="content">내용</option>
            </select>
            <input
              class="form-control"
              type="search"
              name="search"
              placeholder="검색어를 입력하세요."
              required>
            <button
              type="submit"
              id="search"
              class="col-md-2 y-btn mid-btn btn-sky">
              검색하기
            </button>
          </form>
        </div>

        <table>
          <thead>
            <tr>
              <th>번호</th>
              <th>제목</th>
              <th>작성자</th>
              <th>등록일</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
                if(isset($rsc)){
                    foreach($rsc as $r){ //조회된 글 출력
            ?>
            <tr id="<?= $r -> idx;?>">
              <td><?= $r -> idx;?></td>
              <!-- 내가임의추가 아이디 -->
              <td>
                <a class="trtitle" href="./board_read.php?idx=<?= $r -> idx; ?>"><?= $r -> title;?></a>  
              </td>
              <td><?= $r -> name;?></td>
              <td><?= $r -> date;?></td>
              <th>
                <a href="./board_modify.php?idx=<?= $r -> idx; ?>" class="edit">수정</a>
                <button class="del">삭제</button>
                <!-- 임의로 #show 를 삭제, 클래스명 del으로 통일... -->
              </th>
            </tr>
            <?php 
                } 
              }  ?>
            
          </tbody>
        </table>

        <div class="board_pagination row">
          <ul class="row col justify-content-center">
            <?php 
              if($block_num > 1){
                $prev = ($block_num - 2)*$list + 1;
                echo "<li class='col-auto'><a href='?page=$prev'><i class='fa-solid fa-chevron-left'></i></a></li>";
              }

            for($i=$block_start; $i<= $block_end; $i++){
              if($page == $i){
                  echo "<li class='col-auto'><a href='?page=$i' class='active'>$i</a></li>";
              }else{
                  echo "<li class='col-auto'><a href='?page=$i'>$i</a></li>";
              }
            }

            if($page < $total_page){
              if($total_block > $block_num){ 
                  $next = $block_num * $list + 1;
                  echo "<li class='col-auto'><a href='?page=$next'><i class='fa-solid fa-chevron-right'></i></a></li>";
              }
            }

            ?>
          </ul>
        </div>
        <!-- 본문끝 -->
        
        <!-- 삭제 팝업 HTML -->
        <div class="background">
          <div class="window">
            <div class="popup">
              <div class="flex">
                <p class="title">글을 삭제하시겠습니까?</p>
                <input type="text" placeholder="">
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

  // 삭제 버튼(바깥)을 누르면 할일
  $(".del").click(function(){
    $(".background").addClass('show');
    let tr = $(this).closest('tr');
    let idx = tr.attr('id');
    let title = tr.find('.trtitle').text();
    $(".background").find('input').attr('placeholder',title);

    //삭제하시겠습니까? 안쪽 삭제 버튼 누르면 할일.
    $('#deletebtn').click(()=>{
      delAjax(idx, './board_delete.php', './board_index.php')
    });
    
  });
  
  // 취소 버튼 누르면 할일
  $("#close").click(function(){
    $(".background").removeClass('show');
  });


/* ======================= 북마크 ========================= */

//북마크
let bookmark = String(<?php echo json_encode($book_mark);?>);
  // console.log('$_SESSION[ADBOOK] : ' + bookmark);
  if(bookmark != '0') {
    if (bookmark.indexOf('1') != -1 ) {
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
          bookmark += ',1';  
        } else {
          bookmark = bookmark.replace('0', '');
          bookmark += '1';
        }
      } else {
        alert('즐겨찾기는 최대 6개까지만 설정 가능합니다.');
        $('.bookmark input').prop("checked", false);
      }

    } else {
      if(bookmark == '1') {
        bookmark = '0';
      } else {
        bookmark = bookmark.replace(',1' , '');
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