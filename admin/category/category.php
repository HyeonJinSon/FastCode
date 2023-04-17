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
?>

  <link rel="stylesheet" href="../css/category.css" />

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
            <div class="bookmark">
              <input type="checkbox" id="bookmark1" />
              <label for="bookmark1"><i class="fa-solid fa-bookmark"></i></label>
            </div>
          </div>
          <main>
            <h2 class="page-title">카테고리 등록</h2>
            <div class="category_wrapper">
              <form action="" class="row justify-content-between align-items-center text-center">
                <div class="select_container col row col-md-4">
                  <select name="cate1" id="cate1" class="row">
                    <option selected>대분류</option>
                    <?php 
                        foreach($cate1 as $c){
                    ?>
                            <option value="<?php echo $c->code; ?>"><?php echo $c->name; ?></option>
                    <?php
                        }
                    ?>
                    <!-- {category1} -->
                    <!-- <option value="프로그래밍">프로그래밍</option>
                    <option value="디자인">디자인</option> -->
                  </select>
                  <button type="button" class="y-btn big-btn btn-navy modal_open" onclick="open_Modal(0)">대분류 등록</button> 
                </div>
                <div class="select_container col row col-md-4">
                  <select name="cate2" id="cate2">
                    <option selected>중분류</option>
                    <!-- {category2} category2.php -->
                    <!-- <option value="프론트">프론트</option>
                    <option value="백">백</option>
                    <option value="기타">기타</option> -->
                  </select>
                  <button type="button" class="y-btn big-btn btn-navy modal_open" onclick="open_Modal(1)">중분류 등록</button>
                </div>
                <div class="select_container col row col-md-4">
                  <select name="cate3" id="cate3">
                    <option selected>소분류</option>
                    <!-- {category3} category3.php -->
                    <!-- <option value="html">html</option>
                    <option value="css">css</option>
                    <option value="javascript">javascript</option> -->
                  </select>
                  <button type="button" class="y-btn big-btn btn-navy modal_open" onclick="open_Modal(2)">소분류 등록</button>
                </div>
              </form>
            </div>
          </main>

          <div class="modal_bg">
            <!-- cate1 Modal -->
            <dialog class="cate1Modal" id="cate1Modal">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="content-title">대분류 등록</h2>
                </div>
                <div class="modal-body row">
                  <input type="text" name="name1" id="name1" placeholder="카테고리명" />
                  <input type="text" name="code1" id="code1" placeholder="코드 입력" />
                </div>
                <div class="modal-footer row justify-content-between">
                  <button type="button" class="y-btn  mid-btn btn-navy"  onclick="category_save(1)">추가하기</button>
                  <button type="button" class="modal_close y-btn mid-btn btn-sky">취소하기</button>
                </div>
              </div>
            </dialog>
  
            <!-- cate2 Modal -->
            <dialog class="cate2Modal" id="cate2Modal">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="content-title">중분류 등록</h2>
                </div>
                <div class="modal-body row">
                  <input type="text" name="name2" id="name2" placeholder="카테고리명" />
                  <select name="pcode" id="pcode2">
                    <option selected>대분류 선택</option>
                    <?php 
                          foreach($cate1 as $c){
                      ?>
                              <option value="<?php echo $c->code; ?>"><?php echo $c->name; ?></option>
                      <?php
                          }
                      ?>
                    <!-- {category1} select#cate1에서 선택된 값이 있을 경우 이 자리에 해당 option을 selected하여 보이게 -->
                    <!-- <option value="프로그래밍">프로그래밍</option>
                    <option value="디자인">디자인</option> -->
                  </select>
                  <input type="text" name="code2" id="code2" placeholder="코드 입력" />
                </div>
                <div class="modal-footer row justify-content-between">
                  <button type="button" class="y-btn  mid-btn btn-navy"  onclick="category_save(2)">추가하기</button>
                  <button type="button" class="modal_close y-btn mid-btn btn-sky">취소하기</button>
                </div>
              </div>
            </dialog>
  
            <!-- cate3 Modal -->
            <dialog class="cate3Modal" id="cate3Modal">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="content-title">소분류 등록</h2>
                </div>
                <div class="modal-body row">
                  <input type="text" name="name3" id="name3" placeholder="카테고리명" />
                  <select name="pcode" id="pcode2_1">
                    <option selected>대분류 선택</option>
                    <?php 
                        foreach($cate1 as $c){
                    ?>
                            <option value="<?php echo $c->code; ?>"><?php echo $c->name; ?></option>
                    <?php
                        }
                    ?>
                    <!-- {category1} select#cate1에서 선택된 값이 있을 경우 이 자리에 해당 option을 selected하여 보이게 -->
                    <!-- <option value="프로그래밍">프로그래밍</option>
                    <option value="디자인">디자인</option> -->
                  </select>
                  <select name="pcode" id="pcode3">
                    <option selected>중분류 선택</option>
                    <!-- {category2} category4.php  select#cate2에서 선택된 값이 있을 경우 이 자리에 해당 option을 selected하여 보이게-->
                  </select>
                  <input type="text" name="code3" id="code3" placeholder="코드 입력" />
                </div>
                <div class="modal-footer row justify-content-between">
                  <button type="button" class="y-btn mid-btn btn-navy" onclick="category_save(3)">추가하기</button>
                  <button type="button" class="modal_close y-btn mid-btn btn-sky">취소하기</button>
                </div>
              </div>
            </dialog>
          </div>

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>

    <script
      src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
    </script>
    <script
      src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous">
    </script>
    <script>
      //div.select-container:nth-child button 누르면 각각 dialog show()
      function open_Modal(idx){
        $('.modal_bg dialog').eq(idx).show();
        $('.modal_bg').addClass('active');
      }

      //.modal_close를 click하면 dialog hide()
      $(".modal_close").click(()=>{
        $('.modal_bg dialog').hide();
        $('.modal_bg').removeClass('active');
      });

      //cate1 change 할일  category2.php cate1에 아래 중분류 cate2를 #cate2에 html로 넣어주기
      //.select-container:nth-child(2) button show(), (option 중 가장 첫 번째가 선택된 경우 button hide())
      $("#cate1").change(function(){
        let cate1 = $(this).val();
        let data = {
          cate1: cate1
        }
        $.ajax({
          async: false,
          type: "post",
          data: data,
          url: "category2.php",
          dataType: "html",
          success: function (return_data) {
            $("#cate2").html(return_data);
          }
        });
      }); // #cate1 change

      //cate2 change 할일  category3.php cate2에 아래 소분류 cate3를 #cate3에 html로 넣어주기
      //.select-container:nth-child(3) button show(), (option 중 가장 첫 번째가 선택된 경우 button hide())
      $("#cate2").change(function(){
        let cate2 = $(this).val();
        let data = {
          cate2: cate2
        };
        $.ajax({
          async: false,
          type: "post",
          data: data,
          url: "category3.php",
          dataType: "html",
          success: function (return_data) {
            $("#cate3").html(return_data);
          }
        });
      }); //#cate2 change

      //pcode3_1 change 할일 > pcode3_1의 cate1 아래 중분류 cate2를 pcode3_2에 출력  category4.php
      $("#pcode2_1").change(function(){
        let cate = $(this).val();
        let data = {
          cate: cate
        };
        $.ajax({
          async: false,
          type: "post",
          data: data,
          url: "category4.php",
          dataType: "html",
          success: function (return_data) {
            $("#pcode3").html(return_data);
          },
        });
      });

      //function category_save(){}   save_category.php
      function category_save(step) {
        let name = $('#name'+step).val();
        let code = $('#code'+step).val();
        let pcode = $('#pcode'+step+' option:selected').val();

        if(step>1 && !pcode){
          alert('상위 분류를 선택하세요');
          return;
        }
        if(!code){
          alert('분류 코드를 입력하세요');
          return;
        }
        if(!name){
          alert('카테고리명을 입력하세요');
          return;
        }
        let data = {
          name : name,
          code : code,
          pcode : pcode,
          step : step
        }
        $.ajax({
          async: false,
          type: 'post',
          data: data,
          url: "save_category.php",
          dataType: 'json',
          error:function(){},
          success:function(return_data){
            if(return_data.result == 1){
              alert('새 카테고리가 등록되었습니다').
              location.reload();
            }else if(return_data.result == -1){
              alert('입력한 코드명 또는 카테고리명이 이미 존재합니다');
              location.reload();
            }else{
              alert('카테고리 등록에 실패했습니다');
            }
          }
        });
      }
      //북마크
      let bookmark = String(<?php echo json_encode($book_mark);?>);
        // console.log('$_SESSION[ADBOOK] : ' + bookmark);
        if(bookmark != '0') {
          if (bookmark.indexOf('4') != -1 ) {
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
              bookmark += ',4';  
            } else {
              bookmark = bookmark.replace('0', '');
              bookmark += '4';
            }
          } else {
            alert('즐겨찾기는 최대 6개까지만 설정 가능합니다.');
            $('.bookmark input').prop("checked", false);
          }

        } else {
          if(bookmark == '4') {
            bookmark = '0';
          } else {
            bookmark = bookmark.replace(',4' , '');
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