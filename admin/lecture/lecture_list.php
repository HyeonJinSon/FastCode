<?php 
  session_start();
  if(!$_SESSION['AUID']){
    echo "<script>
            alert('접근 권한이 없습니다');
            history.back();
        </script>";
  };

  include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";
?>

  <link rel="stylesheet" href="../css/lecture_list.css" />

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/common.php";  

  //리스트 개수
  $pageNumber = $pageNumber??1;
  if($pageNumber < 1) $pageNumber = 1;
  $pageCount  = $_GET['pageCount']??10;
  $startLimit = ($pageNumber-1)*$pageCount;
  $firstPageNumber = $_GET['firstPageNumber'];

  //변수명 설정
  $cate1 = $_GET['cate1']?? '';
  $cate2 = $_GET['cate2']?? '';
  $cate3 = $_GET['cate3']?? '';
  $recom = $_GET['recom']?? '';
  $forbegin = $_GET['forbegin']?? '';
  $forbasic = $_GET['forbasic']?? '';
  $forinter = $_GET['forinter']?? '';
  $foradv = $_GET['foradv']?? '';
  $search_keyword=$_GET["search_keyword"]??'';

  //카테고리 select
  $query = "SELECT * from category where step=1";
  $result = $mysqli -> query($query) or die("query error =>".$mysqli-->error);
  while($rs = $result -> fetch_object()){
    $cate1array[]=$rs;
  }
  if($cate1){
    $query = "SELECT * from category where step=2 and pcode='{$cate1}'";
    $result = $mysqli -> query($query) or die("query error =>".$mysqli-->error);
    while($rs = $result -> fetch_object()){
      $cate2array[]=$rs;
    }
  }
  if($cate2){
    $query = "SELECT * from category where step=3 and pcode='{$cate2}'";
    $result = $mysqli -> query($query) or die("query error =>".$mysqli-->error);
    while($rs = $result -> fetch_object()){
      $cate3array[]=$rs;
    }
  }
  $scate = $cate1.$cate2.$cate3;
  if($scate){
    $search_where = " and cate like '".$scate."%'";
  }

  //장좌옵션 check
  if($recom){
    $search_where = " and recom=1";
  }
  if($forbegin){
    $search_where = " and forbegin=1";
  }
  if($forbasic){
    $search_where = " and forbasic=1";
  }
  if($forinter){
    $search_where = " and forinter=1";
  }
  if($foradv){
    $search_where = " and foradv=1";
  }

  //검색
  if($search_keyword){
    $search_where = " and (name like '%".$search_keyword."%' or content like '%".$search_keyword."%')";
  }

  //강좌 리스트 조회
  $sql = "SELECT * from lectures where 1=1";
  $sql .=$search_where;
  $order = " order by lecid desc";//최근 등록 순 정렬
  $limit = " limit $startLimit, $pageCount"; //10개씩 조회
  $query = $sql.$order.$limit; //쿼리 문장 조합

  $result = $mysqli->query($query) or die("query error => ".$mysqli->error);
  while($rs = $result->fetch_object()){
              $rsc[]=$rs; //검색된 상품 목록 배열에 담기
          }

?>
        <main>
          <h2 class="page-title">강좌 리스트</h2>
          <a href="lecture_up.php" class="y-btn big-btn btn-navy">강좌 추가하기</a>

          <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="get" id="sort_container">
            <div class="row justify-content-between align-items-start">
              <div class="col-md-4 row">
                <select name="cate1" id="cate1" class="col form-select">
                  <option selected>대분류 선택</option>
                  <!-- {category1} -->
                    <?php 
                      foreach($cate1array as $c){
                    ?>
                        <option value="<?php echo $c->code; ?>"<?php if($cate1==$c->code){echo "selected";}?>><?php echo $c->name;?></option>
                    <?php
                      }
                    ?>
                </select>
              </div>
              <div class="col-md-4 row">
                <select name="cate2" id="cate2" class="col form-select">
                  <option selected>중분류 선택</option>
                    <?php 
                      foreach($cate2array as $c){
                    ?>
                        <option value="<?php echo $c->code; ?>"<?php if($cate2==$c->code){echo "selected";}?>><?php echo $c->name;?></option>
                    <?php
                      }
                    ?>
                </select>
              </div>
              <div class="col-md-4 row">
                <select name="cate3" id="cate3"  class="col form-select">
                  <option selected>소분류 선택</option>
                    <?php 
                      foreach($cate3array as $c){
                    ?>
                        <option value="<?php echo $c->code; ?>"<?php if($cate3==$c->code){echo "selected";}?>><?php echo $c->name;?></option>
                    <?php
                      }
                    ?>
                </select>
              </div>
            </div>
            <div class="row justify-content-between align-items-start">
              <!-- lec_option_change.php -->
              <div class="row justify-content-between lec_option align-items-center col-md-4">
                <input type="checkbox" name="recom" id="recom" value="1" class="col" <?php if($recom){echo "checked";}?>>
                <label for="recom" class="col">추천</label>
                <input type="checkbox" name="forbegin" id="forbegin" value="1" class="col" <?php if($forbegin){echo "checked";}?>>
                <label for="forbegin" class="col">입문</label>
                <input type="checkbox" name="forbasic" id="forbasic" value="1" class="col" <?php if($forbasic){echo "checked";}?>>
                <label for="forbasic" class="col">초급</label>
                <input type="checkbox" name="forinter" id="forinter" value="1" class="col" <?php if($forinter){echo "checked";}?>>
                <label for="forinter" class="col">중급</label>
                <input type="checkbox" name="foradv" id="foradv" value="1" class="col" <?php if($foradv){echo "checked";}?>>
                <label for="foradv" class="col">상급</label>
              </div>
              <!-- <label for="search_keyword"><i class="fa-solid fa-magnifying-glass"></i></label> -->
              <input type="text" class="col-md-6" name="search_keyword" id="search_keyword" value="<?php echo $search_keyword;?>">
              <!--  placeholder="&#xF002;"  style="font-family:Pretendard, FontAwesome" -->
              <button type="submit" id="search" class="col-md-2 y-btn mid-btn btn-sky">검색하기</button>
            </div>
          </form>

          <form id="lec_list_container" name="lec_list" action="lecture_list_save.php" method="get">
            <!-- lecture list table 조회 및 출력 -->
            <ul id="lec_list">
              <?php 
                if(isset($rsc)){
                  foreach($rsc as $r){
              ?>
              <input type="hidden" name="lecid[]" value="<?php echo $r->lecid; ?>">
              <li class="row">
                <figure class="col-md-2">
                  <!-- <img src="https://placehold.co/198x135" alt=""> -->
                  <img src="<?php echo $r->thumbnail;?>" alt="" class="thumbnail_img_preview">
                </figure>
                <div class="lec_info_box col-md-6">
                  <div class="lec_info_title">
                    <h3 class="content-title"><?php echo $r->name;?></h3><a class="mini-tag new-tag">new</a><a class="mini-tag limit-tag"><?php echo $r->lec_date;?></a>
                  </div>
                  <p><em><?php echo $r->cate_big;?></em><i class="fa-solid fa-chevron-right"></i><em><?php echo $r->cate_mid;?></em><i class="fa-solid fa-chevron-right"></i> <em><?php echo $r->cate_sm;?></em></p>
                  <p>판매가격 : <span><?php echo number_format($r->price);?>원</span></p>
                </div>
                <div class="lec_option_box col-md-4">
                  <p class="row">
                    <select name="status[<?php echo $r->lecid;?>]" id="status" class="form-select col-auto">
                      <option value="판매중" <?php if($r->status=='판매중'){echo "selected";}?>>판매중</option>
                      <option value="판매대기" <?php if($r->status=='판매대기'){echo "selected";}?>>판매대기</option>
                      <option value="판매중지" <?php if($r->status=='판매중지'){echo "selected";}?>>판매중지</option>
                    </select>
                    <a href="lecture_view.php?lecid=<?php echo $r->lecid; ?>" class="y-btn mid-btn btn-navy col-auto">보기</a>
                  </p>
                  <div class="row lec_option justify-content-between align-items-center">
                    <input type="checkbox" name="recom[<?php echo $r->lecid;?>]" id="recom<?php echo $r->lecid;?>" value="1" <?php if($r->recom){echo "checked";}?> class="col">
                    <label for="" class="col">추천</label>
                    <input type="checkbox" name="forbegin[<?php echo $r->lecid;?>]" id="forbegin<?php echo $r->lecid;?>" value="1" <?php if($r->forbegin){echo "checked";}?> class="col">
                    <label for="" class="col">입문</label>
                    <input type="checkbox" name="forbasic[<?php echo $r->lecid;?>]" id="forbasic<?php echo $r->lecid;?>" value="1" <?php if($r->forbasic){echo "checked";}?> class="col">
                    <label for="" class="col">초급</label>
                    <input type="checkbox" name="forinter[<?php echo $r->lecid;?>]" id="forinter<?php echo $r->lecid;?>" value="1" <?php if($r->forinter){echo "checked";}?> class="col">
                    <label for="" class="col">중급</label>
                    <input type="checkbox" name="foradv[<?php echo $r->lecid;?>]" id="foradv<?php echo $r->lecid;?>" value="1" <?php if($r->foradv){echo "checked";}?> class="col">
                    <label for="" class="col">상급</label>
                  </div>
                </div>
              </li>
              <?php 
                  }
                }else{
              ?>
                <li class="text-center"> 검색 결과가 없습니다 </li>
              <?php } ?>
            </ul>
            <p>
              <button class="y-btn mid-btn btn-navy">변경내용 저장</button>
            </p>
          </form>
          <!--
          <div class="lec_pagination row">
            <ul class="row col justify-content-center">
              <li class="col-auto"><a href=""><i class="fa-solid fa-chevron-left"></i></a></li>
              <li class="col-auto"><a href="" class="active">1</a></li>
              <li class="col-auto"><a href="">2</a></li>
              <li class="col-auto"><a href="">3</a></li>
              <li class="col-auto"><a href=""><i class="fa-solid fa-chevron-right"></i></a></li>
            </ul>
          </div>
                -->
        </main>

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
      $("#cate1").change(function(){
        let cate1 = $(this).val();
        let data = {
          cate1: cate1
        }
        $.ajax({
          async: false,
          type: "post",
          data: data,
          url: "../category/category2.php",
          dataType: "html",
          success: function (return_data) {
            $("#cate2").html(return_data);
          }
        });
      }); // #cate1 change

      $("#cate2").change(function(){
        let cate2 = $(this).val();
        let data = {
          cate2: cate2
        };
        $.ajax({
          async: false,
          type: "post",
          data: data,
          url: "../category/category3.php",
          dataType: "html",
          success: function (return_data) {
            $("#cate3").html(return_data);
          }
        });
      }); //#cate2 change
  </script>

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
?>
