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

?>

<link rel="stylesheet" href="../css/board_write.css" />

<!-- ========= 본문시작 =========== -->

<?php     
    include $_SERVER['DOCUMENT_ROOT']."/inc/common.php"; 
?>

 <!-- 본문시작 -->

 <h2 class="page-title">새 글 작성</h2>

<form action="./board_write_ok.php" method="post" enctype="multipart/form-data" >
  <div class="pd-54">
    <div class="subject">
      <label for="subject">제목</label>
      <input
        type="text"
        id="subject"
        name="title"
        required
        placeholder="제목을 입력하세요"
      >
    </div>
    <div class="content">
      <label for="usermsg">내용</label>
      <textarea
        name="content"
        id="usermsg"
        cols="30"
        rows="10"
        placeholder="내용을 입력하세요"
      ></textarea>
    </div>

    <div class="files">
      <h3>첨부파일</h3>
      <div class="files_container">
        <label for="files" class="files_btn">파일 선택</label>
        <input
          type="file"
          name="file"
          id="files"
          class="form-control form-control-lg"
        >
      </div>
    </div>

    <div class="user_select">
        <label for="user_cat">작성권한</label>
        <select class="form-select" name="authority" id="user_cat">
          <option value="1">관리자</option>
          <option value="2">관리자2</option>
        </select>
    </div>
    </div>
  <!-- 내가수정- form 안으로 옮김 -->
    <div class="btns">
    <button type="submit" class="y-btn big-btn btn-navy">등록완료</button>
    <button type="reset" class="y-btn big-btn btn-sky">등록취소</button>
    </div>
</form>

  
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>
<!-- 
<script>
    function attachFile(file){
        
        var formData = new FormData();                  
        formData.append('savefile', file); // === <input name="savefile" value="첨부파일명">
                              
        $.ajax({
                    url: 'product_save_image.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData, //이 파일명으로 만들어줘                        
                    type: 'post',
                    dataType:'json',
                    beforeSend: function(){}, //product_save_img 가 우리에게 응답하기 전에 할일이 있다면...
                    error:function(){}, //혹시나 해당파일(product_save_img.php) 없으면 할일
                    success: function(returned_data){ //product_save_img.php 유무
                        console.log(returned_data);
                        // 관리자 아니면 추가이미지 등록못하게함 > 관리자 유무 파악, admin 아니면 로그인메시지 출력
                        // 첨부파일 10mb 넘으면 첨부할수 없다.
                        // 이미지만 첨부 가능하게
                        // 모두 실패했다고 한다면 첨부실패 메시지...
                        
                        if(returned_data.result == "member"){
                            alert('관리자로 로그인하세요.');
                            return; //이 함수는 우리에게 아무것도 안 되돌려줘요. 그냥 여기서 끝나요
                        } else if(returned_data.result == "size"){
                            alert('10mb 이하만 첨부할 수 있습니다.');
                            return;
                        } else if(returned_data.result == "image"){
                            alert('이미지 첨부할 수 있습니다.');
                            return;
                        } else if(returned_data.result == "error"){
                            alert('첨부 실패, 관리자에게 문의하세요');
                            return;
                        } else{
                           let imgid = $("#file_table_id").val() + returned_data.imgid + ","; //누굴삭제할지 알아야 > 고유넘버 필요 //기존 value 에 이 다음에 넣을거 또 넣고 컴마
                            $("#file_table_id").val(imgid);
                           /*  var html = "<div class='col' id='f_" + returned_data.imgid +
                            "'><div class='card h-100'><img src='/pdata/" + returned_data.savename +
                            "' class='card-img-top'><div class='card-body'><button type='button' class='btn btn-warning' onclick='file_del(" +
                            returned_data.imgid + ")'>삭제</button></div></div></div>";
                           대상.val(값) <이렇게하면 지정됨
                            $('#imageArea').append(html); //html 로 넣으면 그건 내용물이 있으면 계속 교체하는애니까 여러개가안들어감
                            // append로 뒤에 계속 붙임~! */
                            
                            preview(file, returned_data.imgid); //미리보기 만들기
                        }
                    }
        });

    }

</script> -->

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
 ?>