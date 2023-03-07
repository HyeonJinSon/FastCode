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

  <link rel="stylesheet" href="../css/category_list.css" />

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/common.php";

  $query = "SELECT * from category where step=1";

  $result = $mysqli -> query($query) or die("query error =>".$mysqli-->error);
  // $rs = $result -> fetch_object();
  // print_r($rs);
  
  while($rs = $result -> fetch_object()){
      $cate1[]=$rs;
  }
?>

        <main class="">
          <h2 class="page-title">카테고리 리스트</h2>
          <div class="cate_list_btn_wrapper row pd-54">
            <a href="category.php" class="y-btn big-btn btn-navy">카테고리 추가</a>
            <a href="#" class="y-btn big-btn btn-sky">카테고리 수정</a>
            <a href="#" class="y-btn big-btn btn-red">카테고리 삭제</a>
          </div>
          <table class="">
            <thead>
              <tr class="text-center">
                <th scope="col" class="content-text-1">대분류</th>
                <th scope="col" class="content-text-1">중분류</th>
                <th scope="col" class="content-text-1">소분류</th>
              </tr>
            </thead>
            <tbody>
              <!-- 각 cate1, 2, 3의 name이 td 내용으로 출력 -->
              <tr>
                <!-- colspan="각 cate1 아래의 cate3 총 개수" -->
                <td colspan="">프로그래밍</td>
                <!-- colspan="각 cate2 아래의 cate3 총 개수" -->
                <td colspan="">프론트엔드</td>
                <td>html</td>
              </tr>
            </tbody>
          </table>
        </main>
    
    
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>


<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
?>
