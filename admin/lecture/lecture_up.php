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
    <link rel="stylesheet" href="../css/lecture_up.css" />

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/common.php";  

  //카테고리 select
  $query = "SELECT * from category where step=1";
  $result = $mysqli -> query($query) or die("query error =>".$mysqli-->error);
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
          <h2 class="page-title">강좌 등록</h2>
          <form action="lecture_ok.php" onsubmit="return save();" method="post" class="d-flex flex-column" enctype="multipart/form-data">
            <input type="hidden" name="file_table_id" id="file_table_id" value="">
            <h3>카테고리</h3>
            <div class="row justify-content-between">
              <div class="col-md-4 d-flex">
                <select name="cate1" id="cate1" class="col form-select" aria-label="Default select example">
                  <option selected>대분류 선택</option>
                  <!-- {category1} -->
                    <?php 
                        foreach($cate1 as $c){
                    ?>
                          <option value="<?php echo $c->code; ?>"><?php echo $c->name; ?></option>
                    <?php
                        }
                    ?>
                </select>
              </div>
              <div class="col-md-4 d-flex">
                <select name="cate2" id="cate2" class="col form-select">
                  <option selected>중분류 선택</option>
                    <!-- {category2} category2.php -->
                    <!-- <option value="프론트">프론트</option> -->
                </select>
              </div>
              <div class="col-md-4 d-flex">
                <select name="cate3" id="cate3" class="col form-select">
                  <option selected>소분류 선택</option>
                    <!-- {category3} category3.php -->
                    <!-- <option value="html">html</option> -->
                </select>
              </div>
            </div>
            <div class="d-flex flex-column">
              <h3>강좌명</h3>
              <input type="text" name="name" id="name" placeholder="강좌명을 입력하세요" class="col-md-12 form-control">
            </div>
            <div class="row justify-content-between">
                <div class="col-md-4 d-flex flex-column">
                    <h3>가격</h3>
                    <input type="number" name="price" id="price" placeholder="가격을 입력하세요" class="col form-control">
                </div>
                <div class="col-md-4 d-flex flex-column">
                    <h3>판매상태</h3>
                    <select name="sale_status" id="sale_status" class="col form-select">
                        <option selected>옵션을 선택해주세요</option>
                        <option value="판매중">판매중</option>
                        <option value="판매대기">판매대기</option>
                        <option value="판매중지">판매중지</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex flex-column">
                    <h3>강좌옵션</h3>
                    <div class="d-flex lec_option">
                        <input type="checkbox" name="recom" id="recom" value="1" class="col">
                        <label for="recom" class="col">추천</label>
                        <input type="checkbox" name="forbegin" id="forbegin" value="1" class="col">
                        <label for="forbegin" class="col">입문</label>
                        <input type="checkbox" name="forbasic" id="forbasic" value="1" class="col">
                        <label for="forbasic" class="col">초급</label>
                        <input type="checkbox" name="forinter" id="forinter" value="1" class="col">
                        <label for="forinter" class="col">중급</label>
                        <input type="checkbox" name="foradv" id="foradv" value="1" class="col">
                        <label for="foradv" class="col">상급</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between g30">
                <div class="col-md-4 d-flex flex-column">
                    <h3>수강기한</h3>
                    <select name="lec_date" id="lec_date" class="col lec_date form-select">
                        <option selected>옵션을 선택해주세요</option>
                        <option value="제한">제한</option>
                        <option value="무제한">무제한</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex flex-column">
                    <h4 class="hidden">시작일</h4>
                    <input type="date" name="lec_start_date" id="datepicker_start" class="col">
                </div>
                <div class="col-md-4 d-flex flex-column">
                    <h4 class="hidden">종료일</h4>
                    <input type="date" name="lec_end_date" id="datepicker_end" class="col">
                </div>
            </div>
            <div class="d-flex flex-column">
                <h3>강좌설명</h3>
                <textarea name="content" id="content" placeholder="강좌설명을 입력하세요" class="col-md-12"></textarea>
            </div>
            <div class="d-flex flex-column">
              <h3>썸네일 이미지</h3>
              <div class="thumbnail_container">
                <label for="lec_thumbnail" class="lec_thumbnail_btn">파일 선택</label>
                <input type="file" name="thumbnail" id="lec_thumbnail" class="col-md-12 form-control form-control-lg">
              </div>
            </div>
            <div class="d-flex flex-column">
              <h3>이미지 추가 업로드</h3>
              <div id="drop" class="box">
                  <p>
                    <i class="fa-solid fa-arrow-up-from-bracket"></i><br>
                    <span class="content-text-1">Drag and Drop Images Here</span>
                  </p>
                  <div id="thumbnails">
                  </div>
              </div>
            </div>
            <div class="d-flex flex-column">
              <div class="d-flex">
                <h3 class="col-auto lec_upload_title">강의 영상 업로드</h3>
                <span class="lec_upload col-auto"><i class="fa-solid fa-square-plus" onclick="classplus()"></i></span>
              </div>
              <div id="classplus">
                <div class="d-flex justify-content-between g35 lec_video_up" id="class_content">
                    <input type="text" id="class_name" name="class_name[]" class="col-md-4" placeholder="강의명을 입력하세요">
                    <input type="url" id="class_url" name="class_url[]" class="col-md-7" placeholder="주소를 입력하세요">
                </div>
              </div>
            </div>
            <div class="d-flex up_btn_container">
              <button class="y-btn big-btn btn-navy">등록 완료</button>
              <a href="lecture_list.php" class="y-btn big-btn btn-sky">등록 취소</a>
            </div>
          </form>
        </main>
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
      // $('main h4 + input').hide();
      $('#lec_date').change(function(){
        if($(this).val() == "제한"){
          $('#datepicker_start, #datepicker_end').show();
        }else if($(this).val() == "무제한"){
          $('#datepicker_start, #datepicker_end').hide();
        }
      });

      //강의리스트 추가
      function classplus(){
        let addHtml2 = $('#class_content').html();
        let addHtml = `<div class="row justify-content-between g35 lec_video_up">${addHtml2}</div>`;

        $('#classplus').append(addHtml);
      };

      //drag and drop
      var uploadFiles = [];
      var $drop = $("#drop");
      $drop.on("dragenter", function(e) {
        $(this).addClass('drag-over');
      }).on("dragleave", function(e) {
        $(this).removeClass('drag-over');
      }).on("dragover", function(e) {
        e.stopPropagation();
        e.preventDefault();
      }).on('drop', function(e) {
        e.preventDefault();
        $(this).removeClass('drag-over');
        var files = e.originalEvent.dataTransfer.files;
            console.log(files);
        for(var i = 0; i < files.length; i++) {
            var file = files[i];
            var size = uploadFiles.push(file);
            
            attachImg(files[i]);
        }  
      });
      function preview(file, idx) {
        console.log(idx);
        var reader = new FileReader();
        reader.onload = (function(f, idx) {
          return function(e) {
          var div = '<div class="thumb" id="f_'+ idx +'"> \
            <div class="close" data-idx="' + idx + '">X</div> \
            <img src="' + e.target.result + '"/> \
          </div>';
          $("#thumbnails").append(div);
          };
        })(file, idx);
        reader.readAsDataURL(file);
      }
      $("#thumbnails").on("click", ".close", function(e) {
        var $target = $(e.target);
        var idx = $target.attr('data-idx');
        file_del(idx);
      });
      //drag & drop

      //추가 이미지 업로드
      function attachImg(file){
        var formData = new FormData();
        formData.append('savefile', file);

        $.ajax({
          url:'lecture_image_save.php',
          cache: false,
          contentType: false,
          processData: false,
          data: formData,
          type: 'post',
          dataType: 'json',
          success: function(return_data){
            if(return_data.result == "member"){
              alert('관리자로 로그인하세요');
              return;
            }else if(return_data.result == "size"){
              alert('10MB 이하만 첨부할 수 있습니다');
              return;
            }else if(return_data.result == "image"){
              alert('이미지만 첨부할 수 있습니다');
              return;
            }else if(return_data.result == "error"){
              alert('첨부실패');
              return;
            }else{
              let imgid = $("#file_table_id").val() + return_data.imgid + ",";
              $("#file_table_id").val(imgid);
              preview(file, return_data.imgid); //미리보기 만들기
            }
          }

        })
      };

      // 추가 이미지 업로드 삭제
      function file_del(imgid){
        if(!confirm('삭제하시겠습니까?')){
          return false;
        }
        let data = {
          imgid : imgid
        }

        $.ajax({
          async:false,
          url: 'lecture_image_del.php',
          type: 'post',
          data: data,
          // dataType: 'text',
          success: function(return_data){
            if(return_data.result == "member"){
              alert('관리자로 로그인하세요');
              return;
            }else if(return_data.result == "my"){
              alert('본인이 작성한 제품의 이미지만 삭제할 수 있습니다');
              return;
            }else if(return_data.result == "no"){
              alert('삭제 실패');
              return;
            }else{
              $('#f_'+imgid).hide();
            }
          }
        })
      };

      function save(){
        // if(!$('#thumbnail').val()){
        //   alert('썸네일을 추가하세요');
        //   return false;
        // }
        if(!$('#file_table_id').val()){
          alert('추가이미지를 최소한 한 개 이상 등록하세요');
          return false;
        }
      };

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
      //북마크
      let bookmark = String(<?php echo json_encode($book_mark);?>);
        // console.log('$_SESSION[ADBOOK] : ' + bookmark);
        if(bookmark != '0') {
          if (bookmark.indexOf('6') != -1 ) {
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
              bookmark += ',6';  
            } else {
              bookmark = bookmark.replace('0', '');
              bookmark += '6';
            }
          } else {
            alert('즐겨찾기는 최대 6개까지만 설정 가능합니다.');
            $('.bookmark input').prop("checked", false);
          }


        } else {
          if(bookmark == '6') {
            bookmark = '0';
          } else {
            bookmark = bookmark.replace(',6' , '');
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