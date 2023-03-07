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

  $query = "SELECT * from category where step=3";

  $result = $mysqli -> query($query) or die("query error =>".$mysqli-->error);
  
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
              <?php while($row = $result->fetch_assoc()) { ?>
              <tr class="cate_list">
                <!-- colspan="각 cate1 아래의 cate3 총 개수" -->
                <td class="cate1" colspan=""></td>
                <!-- colspan="각 cate2 아래의 cate3 총 개수" -->
                <td class="cate2" colspan=""></td>
                <td class="cate3" data-pcode="<?php echo $row['pcode']; ?>"><?php echo $row['name']; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </main>
    
    
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>
  <script
    src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
  </script>
  <script> 
    $('.cate_list').each(function(){
      let cate2 = $(this).find('.cate3').attr('data-pcode');
      let cate2name = $(this).find(".cate2");
      let cate1name = $(this).find(".cate1");
      let data = {
        cate2 : cate2
      };

      $.ajax({
          async: false,
          type:'post',
          data:data,
          url: "category_list2.php", 
          success: function(returned_data){
            console.log(returned_data);
            cate2name.text(returned_data);
          }
      });

      $.ajax({
            async: false,
            type:'post',
            data:data,
            url: "category_list1.php", 
            success: function(returned_data){
              console.log(returned_data);
              cate1name.text(returned_data);
            }
        });


    });
  </script>

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
?>
