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
    

    /* ======================== search =========================== */

    $keyword = $_GET['search']; //넘어온 키워드

    /* ================== 페이지네이션 =================== */

    $page = $_GET['page'] ?? 1; //넘어오는거 없으면 1페이지

    $searchsql = "SELECT COUNT(*) as cnt FROM coupons WHERE coupon_name like '%$keyword%'"; //보드의 모든 것을 cnt 로 받고 개수를 구함
    $page_result = $mysqli -> query($searchsql);
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
  
      $sql = "SELECT * from coupons WHERE coupon_name like '%$keyword%' order by cid desc limit $start_num, $list";
      $result = $mysqli -> query($sql) or die("Query Error! => ".$mysqli->error);
      while($rs = $result->fetch_object()){
          $rsc[] = $rs;
      }  
?>

<link rel="stylesheet" href="../css/coupon_delete.css" />
<link rel="stylesheet" href="../css/coupon_list.css" />

<?php     
    include $_SERVER['DOCUMENT_ROOT']."/inc/common.php"; 
?>

<!-- 본문시작 -->

<h2 class="page-title"><?= $keyword ?> 검색 결과</h2>

<div class="coupon_top">
  <a href="./coupon_up.php" class="y-btn big-btn btn-navy">쿠폰추가하기</a>
  <form action="./coupon_search_ok.php" method="GET" class="coupon_search">
    <input
      class="form-control"
      type="search"
      name="search"
      placeholder="검색어를 입력하세요."
      required
    />
    <button
      type="submit"
      id="search"
      class="col-md-2 y-btn mid-btn btn-sky">
      검색하기
    </button>
  </form>
</div>

<!-- <form action="coupon" method="GET"> -->
    <!-- 내가임의추가  --- 이거 안넣고 ajax로 먼저 .... -->
        <?php
            if(isset($rsc)){
                foreach($rsc as $r){ //조회된 쿠폰 출력
              
        ?>    
        <!-- 이거 리스트인데 이렇게짜도되나...? -->
    <ul class="coupon_list">

        <li id="<?= $r -> cid;?>" class="list_contents">
            <figure>
                <img src="<?= $r -> file; ?>" alt="" />
                <!-- <img src="https://placehold.co/198x135" alt="" /> -->
            </figure>
            <div class="titles">
                <div class="big_titles">
                    <h3 class="lititle"><?= $r -> coupon_name;?></h3>
                    <!-- mini-tag 클릭시 기능 있는지 ? 물어보기... span으로 바꿔도되는지 -->
                   <?php 
                            // 태그 =================================
                            $published_time = $r -> coupon_start_date; // 쿠폰시작날짜
                            $now = date('Y-m-d'); //오늘날짜

                            // ====== new ======
                            if($published_time == $now){// 날짜 같으면
                                $newtag = '<a class="mini-tag new-tag">new</a>';
                            } else{
                                $newtag = '';
                            }

                            // ====== unlimited ======
                            if($r -> coupon_due == 1){// 날짜 같으면
                              $unlimittag = '<a class="mini-tag limit-tag">무제한</a>';
                            } else{
                                $unlimittag = '';
                            }

                            echo $newtag;
                            echo $unlimittag;

                          ?> 
                      <!-- <a class="mini-tag new-tag">new</a>
                      <a class="mini-tag limit-tag">무제한</a> -->  
                </div>
                <div class="sub_titles">
                    <p>최소금액 : <span><?= $r -> min_price;?>원 이상</span></p>
                    <p>할인율 : <span><?= $r -> coupon_ratio;?></span></p>
                </div>
            </div>
            <div class="coupon_select">
                <!-- form으로 바꿔야되는거? -->
                <select class="form-select" name="coupon" id="coupon">
                    <option value="1" <?php if($r -> status == 1) echo "selected"; ?>>활성화</option>
                    <option value="0" <?php if($r -> status == 0) echo "selected"; ?> >비활성화</option>
                    <!-- 활성화 - 1 , 비활성화 - 0로 임의수정 -->
                </select>
            </div>
            <div class="btns">
                <!-- <button class="y-btn small-btn btn-navy">수정하기</button> -->
                <a href="./coupon_modify.php?cid=<?= $r -> cid; ?>" class="y-btn small-btn btn-navy">수정하기</a>
                <button class="y-btn small-btn btn-red del">삭제하기</button>
                <!-- 내가 클래스명 del 추가함 -->
            </div>
        </li>

    </ul>
        <?php  }
            } ?>
<!-- </form> -->

<!-- 페이지네이션 -->
<div class="coupon_pagination row">
  <ul class="row col justify-content-center">
        <?php 
        // if($block_num = 1){
        // echo "<li class='col-auto'><a href='?search=$keyword&page=1'></a></li>";
        // }

        if($block_num > 1){
        $prev = ($block_num - 2)*$list + 1;
        echo "<li class='col-auto'><a href='?search=$keyword&page=$prev'><i class='fa-solid fa-chevron-left'></i></a></li>";
        }

        for($i=$block_start; $i<= $block_end; $i++){
            if($page == $i){
                echo "<li class='col-auto'><a href='?search=$keyword&page=$i' class='active'>$i</a></li>";
            }else{
                echo "<li class='col-auto'><a href='?search=$keyword&page=$i'>$i</a></li>";
            }
        }

        if($page < $total_page){
            if($total_block > $block_num){ 
                $next = $block_num * $list + 1;
                echo "<li class='col-auto'><a href='?search=$keyword&page=$next'><i class='fa-solid fa-chevron-right'></i></a></li>";
            }
        } ?>
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
<script src="../board/functions.js"></script>

<script>
    // 삭제 팝업 모달
    function show() {
    document.querySelector(".background").className = "background show";
  }

  // 삭제 버튼(바깥)을 누르면 할일
  $(".del").click(function(){
    $(".background").addClass('show');
    let li = $(this).closest('li');
    let cid = li.attr('id');
    let title = li.find('.lititle').text();
    // console.log(title);
    $(".background").find('input').attr('placeholder',title);

    //삭제하시겠습니까? 안쪽 삭제 버튼 누르면 할일.
    $('#deletebtn').click(()=>{
      delAjax(cid, './coupon_delete.php', './coupon_list.php')
    });
    
  });
  
  // 취소 버튼 누르면 할일
  $("#close").click(function(){
    $(".background").removeClass('show');
  });

// ======================= form 안쓰고 옵션 바꾸기 실험 ==============================

  $(".coupon_select .form-select").change(function(){
    let selectedStatus = $(this).find("option:selected").val(); //여기 바꿔놨음 this로
    let selectedidx = $(this).closest('li').attr('id');

    let data = {
        selectedStatus : selectedStatus,
        selectedidx : selectedidx
    };
        $.ajax({
            async : false ,
            type : 'post' ,
            url : './coupon_option_change.php' ,
            data  : data ,
            dataType : 'html' ,
            error : function() {
                alert('에러');
            },
            success : function(returned_data) {
                alert('옵션이 변경되었습니다.');
            }
        });
    });
</script>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
 ?>