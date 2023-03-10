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
    

// abcmall/product list.php 참조
// ========== 검색
//제목,글쓴이,내용

// $search_where = " like '".$scate."%'";


    /* ================== 페이지네이션 =================== */

$page = $_GET['page'] ?? 1; //넘어오는거 없으면 1페이지

$pagesql = "SELECT COUNT(*) as cnt FROM board"; //보드의 모든 것을 cnt 로 받고 개수를 구함
$page_result = $mysqli -> query($pagesql);
$page_row = $page_result ->fetch_assoc();
$row_num = $page_row['cnt'];//전체 게시물 수

$list = 5; //한페이지에(페이지 당) 출력할 게시물 수
$block_ct = 5; //출력할 페이지네이션 수(버튼5개)
$block_num = ceil($page/$block_ct); //6부터 시작한다면 2블록 - 6/5 -> 1.2 -> 2 2번째 블록카운트부터 시작해야한다
// 6/5 1.2 2 block_num 2

$block_start = (($block_num -1 )*$block_ct) + 1; //페이지 1 -> start 1
$block_end = $block_start + $block_ct - 1; //시작번호 1일때 끝번호가 5가 될수 있도록.

$total_page = ceil($row_num/$list); //몇페이지가 나와야 되냐
// 총 게시물이 32개 > 7페이지가 나와야함 -> total page:7
if($block_end > $total_page) $block_end = $total_page; //10번까지 안만들고 7번까지만 만든다

$total_block = ceil($total_page/$block_ct); //총 32개, total block : 2개 (1~5, 6~7 /// 한세트, 두세트. 이 블록의 개수)

//page가 1이에요 -> 0번째부터 10까지 추출해야해요 / page 2> 10번재부터 10개
$start_num = ($page - 1) * $list;



    /* ================== 값 조회 =================== */

    $sql = "SELECT * from board order by idx desc limit $start_num, $list";
    $result = $mysqli -> query($sql) or die("Query Error! => ".$mysqli->error);
    while($rs = $result->fetch_object()){
        $rsc[] = $rs;
    }  
?>

<link rel="stylesheet" href="../css/board_index.css" />
<link rel="stylesheet" href="../css/board_delete.css" />

<?php     
    include $_SERVER['DOCUMENT_ROOT']."/inc/common.php"; 
?>

        <!-- 본문시작 -->

        <h2 class="page-title">공지사항</h2>

        <div class="borad_top">
          <a href="./board_write.php" class="y-btn big-btn btn-navy">글쓰기</a>
          <form class="board_forms">
            <select
              class="form-select"
              name="search_board"
              name="search_board"
            >
              <option value="title">제목</option>
              <option value="name">글쓴이</option>
              <option value="content">내용</option>
            </select>
            <input
              class="form-control"
              type="search"
              name="search"
              required
            />
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
            <tr id="trid">
              <td><?= $r -> idx;?></td>
              <!-- 내가임의추가 아이디 -->
              <td>
              <a class="trtitle" href="./board_read.php?idx=<?= $r -> idx; ?>">  
             <!-- 얘는 보여주기만하는거잖아!!! 값을 넘기는게 아니라서 조회할필요가없어요. 그냥 여기서 가져다 쓰세요
             text 로 그 안에있는거 가져다가 값을 넣어  -->
                <?= $r -> title;?>
                </a>
              </td>
              <td><?= $r -> name;?></td>
              <td><?= $r -> date;?></td>
              <th>
                <a href="./board_modify.php?idx=<?= $r -> idx; ?>" class="edit">수정</a>
                <button id="show" class="del" >삭제</button>
              </th>
            </tr>
            <?php 
                } 
              }  ?>
              
            <!-- <tr>
              <td>4</td>
              <td>3월 한정! 신규강의 런칭 특가 이벤트 안내</td>
              <td>관리자</td>
              <td>2023.3.10</td>
              <th>
                <a class="edit" type="button">수정</a>
                <a class="del" type="button">삭제</a>
              </th>
            </tr>
            <tr>
              <td>3</td>
              <td>K - 디지털 트레이닝 안내 사항</td>
              <td>관리자</td>
              <td>2023.2.28</td>
              <th>
                <a class="edit" type="button">수정</a>
                <a class="del" type="button">삭제</a>
              </th>
            </tr>
            <tr>
              <td>2</td>
              <td>국비지원 내일배움 아카데미 오픈</td>
              <td>관리자</td>
              <td>2023.2.10</td>
              <th>
                <a class="edit" type="button">수정</a>
                <a class="del" type="button">삭제</a>
              </th>
            </tr>
            <tr>
              <td>1</td>
              <td>2023년 2월 시스템 점검 안내</td>
              <td>관리자</td>
              <td>2023.2.01</td>
              <th>
                <a class="edit" type="button">수정</a>
                <a class="del" type="button">삭제</a>
              </th>
            </tr> -->
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
        //     <li><i class="fa-solid fa-chevron-left"></i></li>
        //     <li>1</li>
        //     <li>2</li>
        //     <li>3</li>
        //     <li><i class="fa-solid fa-chevron-right"></i></li>
        //   </ul>
        // </div>

        ?>

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


<script>
  function show() {
    document.querySelector(".background").className = "background show";
  }

  // document.querySelector("#show").addEventListener("click", ()=>{
    
  // });
  // document.querySelector("#close").addEventListener("click", close);


  // 삭제 버튼(바깥)을 누르면 할일
  $("#show").click(function(){
    $(".background").addClass('show');
  });

  // $("#close").click(function(){
  //   // $(".background").removeClass('show');
  //   $(".background").hide();
  // });


  //삭제하시겠습니까? 안쪽 삭제 버튼 누르면 할일.
  $('#deletebtn').click(function(){

    // let idx = ; //이 번호가 안들어와서...
    let idx = $("#show").closest('tr').find('#trid').val();

    let data = {
      idx:idx,
    }

  $.ajax({
        async:false,
        type:'post',
        url:'./board_delete.php',
        data:data,
        dataType:'json',
        error:function(){
            alert('error');
        },
        success:function(result){               
          if(result.result == true){
              alert('삭제되었습니다.');
              location.href="./board_index.php";
          }                
        }
      });

  });
  
  
  </script>
<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
 ?>