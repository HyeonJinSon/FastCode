<?php
  // session_start();
  include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";
  include $_SERVER['DOCUMENT_ROOT']."/inc/user/head.php";

  $userID = $_SESSION['USERID'];
  // echo $userID;
  ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="../css/common.css" />
  <link rel="stylesheet" href="../css/lecture_list.css" />

<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/user/header.php";

  $sql_cate = "SELECT L.*, C.big_name, C.mid_name, C.sm_name 
               FROM lectures L
               JOIN category_sh C 
               ON L.cate_big = C.big_code 
               AND L.cate_mid = C.mid_code 
               AND L.cate_sm = C.sm_code";
  $result_cate = $mysqli -> query($sql_cate);

  while($rs_cate = $result_cate ->fetch_object()) {
    $lecture_list[] = $rs_cate;
    // $labels[] = $rs_cate->mid_name; 그룹화해야함
  }
  

  //카테고리분류
  $sql = "SELECT D.name AS 'labels'
  FROM lectures L
  JOIN category D ON L.cate_mid = D.code
  GROUP by D.name ";
  $result = $mysqli -> query($sql);

  while($rs = $result ->fetch_object()) {
    $labels[] = $rs->labels; 
  }

  //가격 placeholder 쿼리
  $MaxPrice = " AND L.PRICE IN (SELECT MAX(PRICE) FROM lectures)"; //50000
  $MinPrice = " AND L.PRICE IN (SELECT MIN(PRICE) FROM lectures)";  //
?>

  <main class="container-xxl d-flex">
    <section class="select_box">
      <h2 class="hidden">Select Box</h2>
      <div class="category_box">
        <form method="get" action="">
          <div class="box_title d-flex">
            <p>카테고리 분류</p><i class="fa-solid fa-chevron-up"></i>
          </div>
          <div class="check_wrap">
            <?php foreach($labels as $label) { ?>
            <label><input type="checkbox" name="category" value="<?php echo $label; ?>"><?php echo $label; ?></label>
            <!-- <label><input type="checkbox" name="category" value="백엔드"> 백엔드</label>
            <label><input type="checkbox" name="category" value="UX / UI"> UX / UI</label>
            <label><input type="checkbox" name="category" value="일반디자인"> 일반디자인</label>
            <label><input type="checkbox" name="category" value="기타"> 기타</label> -->
            <?php } ?>
          </div>
        </form>
      </div>
      <div class="level_box">     
        <div class="box_title d-flex">
          <p>수업 난이도</p><i class="fa-solid fa-chevron-up"></i>
        </div>
        <div class="check_wrap">
          <?php 
              // if(isset($lecture_list)){
              //   foreach($lecture_list as $level){
          ?>
          <label><input type="checkbox" name="level" value="입문"> 입문</label>
          <label><input type="checkbox" name="level" value="초급"> 초급</label>
          <label><input type="checkbox" name="level" value="중급"> 중급</label>
          <label><input type="checkbox" name="level" value="상급"> 상급</label>
          <?php //} } ?>
        </div>
      
      </div>
      <div class="period_box">
        <div class="box_title d-flex">
          <p>수강 기간</p><i class="fa-solid fa-chevron-up"></i>
        </div>
        <div class="check_wrap">
          <label><input type="checkbox" name="period" value="무제한"> 무제한</label>
          <label><input type="checkbox" name="date_limit" value="30일"> 30일 이내</label>
          <label><input type="checkbox" name="date_limit" value="1개월"> 1개월 이상</label>
        </div>
      </div>
      <div class="price_box">
        <div class="box_title d-flex">
          <p>가격</p><i class="fa-solid fa-chevron-up"></i>
        </div>
        <div class="check_wrap">
          <label><input type="checkbox" name="price" id="free" value="무료"> 무료</label>
          <div class="price_show d-flex" >
            <div id="slider-range"></div>
            <p>
              <label for="amount1">최소금액<input type="text" id="amount1" name="price" value="" readonly></label>
              <span>~</span>
              <label for="amount2">최대금액<input type="text" id="amount2" name="price" value="" readonly></label>
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="lecture_list">
        <h2 class="hidden">Lecture List</h2>
        <div class="recommend">
          <button class="course_recom" id="recom" name="recommondAuto" value="추천강좌"><i class="fa-solid fa-crown"></i>추천강좌</button>
          <button class="course_recom" value="Javascript" name="recommond">Javascript</button>
          <button class="course_recom" value="HTML" name="recommond">HTML</button>
          <button class="course_recom" value="Figma" name="recommond">Figma</button>
          <button class="course_recom" value="Photoshop" name="recommond">Photoshop</button>
          <button class="course_recom" value="PHP & SQL" name="recommond">PHP & SQL</button>
        </div>
        <div class="lecture_wrap">
            <!-- 강좌리스트 출력 -->
            <ul class="lecture_handle">
            <?php 
            if($lecture_list) {
                foreach($lecture_list as $list) { ?>
                <li class="lecture">
                  <a href="lecture_view.php?lecid=<?php echo $list->lecid;?>" >
                  <figure>
                    <img src="../..<?php echo $list->thumbnail; ?>" alt="">
                  </figure>
                  <div class="info_wrap">
                    <p class="title"><?php echo $list->name; ?></p>
                    <div class="lecture_info d-flex">
                      <p><?php echo $list->mid_name; ?></p>
                      <p>
                        <?php if($list->price == 0) { ?>
                          무료
                          <?php } else { ?>
                          <?php echo number_format($list->price); ?>원

                        <?php } ?></p>
                    </div>
                  </div>
                 </a>
                </li>
            <?php } } else { ?>
                <p>검색결과가 없습니다.</p>
            <?php } ?>
          </ul>
        </div>
    </section>
  </main>
  <div class="top-btn">
    <i class="fa-solid fa-arrow-up"></i>
  </div>
 <!-- Footer -->
 <!-- <?php
      include $_SERVER['DOCUMENT_ROOT']."/inc/user/footer.php";
    ?>  -->
  <!-- <script
      src="https://code.jquery.com/jquery-3.6.3.min.js"
      integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
      crossorigin="anonymous"
    ></script> -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script> -->
  <script>
  

  $(".box_title").click(function () {
    let icon = $(this).find(".fa-chevron-up");

    $(this).next(".check_wrap").stop().slideToggle(300);
    $(this).toggleClass("on").siblings().removeClass("on");
    icon.toggleClass("rotate");
    
  }); 
  
  $( "#slider-range" ).slider({
    range: true,
    min: 0,
    max: 45000,
    step: 1000,
    values: [ 0, 45000 ],
    slide: function( event, ui ) {
      $( "#amount1" ).val( ui.values[ 0 ] + "원");
      $( "#amount2" ).val( ui.values[ 1 ] + "원") ;
    }
  });
  $( "#amount1" ).val( $( "#slider-range" ).slider( "values", 0 ) + "원");
  $( "#amount2" ).val( $( "#slider-range" ).slider( "values", 1 ) + "원");


  function number_format(num){
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g,',');
  }



  /********** 체크 *********/
  let jsonArray = <?php echo json_encode($lecture_list);?>;
  let levelsArray = new Array();

  //수간기간 제한
  let i = 0;
  while(i < levelsArray.length) {
    levelsArray[i] = jsonArray[i].labels;
    i++;
  }

  let recomCategory = '';
  let soCategory = [];
  let checkedPeriod = ''; 
  let checkedCate = [];
  let checkedLevels = []; 
  let checkedPrice = []; 
  let checkedDate = []; 

  $(document).ready(function(e) {
      // 1단계 - 이벤트 생성
      //1. 카테고리 click 이벤트
      $('.course_recom').click(function() {

        soCategory = [];
        
        // let recomCategory = $('input[name="recommondAuto"]').val();
        // soCategory = $('input[name="recommond"]').val();
        
        // 2단계 - 데이터 조작
          let active = $(this).hasClass('active');
          $('.active').removeClass('active');

          if (!active) {
              $(this).addClass('active');
              $(this).val('');
              recomCategory = "";
          } else {
            recomCategory = $('#recom').val();

            let btnSocate = $('button[name="recommond"]'); //소분류 변수
            btnSocate.each(function() {
              soCategory.push($(this).val());
            });
          }


          // let btnSocate = $('button[name="recommond"]'); //소분류 변수
          // btnSocate.each(function() {
          //     soCategory.push($(this).val());
          // });


          // if ($('#recom').hasClass('active')) {
          //   recomCategory = $('#recom').val();
          // } else {
          //   recomCategory = "";
          // }

          
          // 3단계 - ajax 호출
          getLecture();
          
        });
        console.log(soCategory);
       console.log(recomCategory);

      //2. 왼쪽 filter changed 이벤트
      $('input[type="checkbox"]').change(function() {
        
          // 2단계 - 데이터 조작
          checkedCate = [];
          checkedLevels = [];
          checkedPrice = [];
          checkedDate = [];

         let inputCate = $('input[name="category"]');
          inputCate.each(function() {
            if($(this).is(':checked') == true){
              checkedCate.push($(this).val());
            }
          });
          
         let inputLevel = $('input[name="level"]');
          inputLevel.each(function() {
            if($(this).is(':checked') == true){
              checkedLevels.push($(this).val());
            }
          });

          let unlimitPeriod = $('input[name="period"]');  //ok
           if (unlimitPeriod.is(':checked')) {
             checkedPeriod = unlimitPeriod.val();
           } else {
            checkedPeriod = "";
           }
          
         let inputPeriodLimit = $('input[name="date_limit"]');
          inputPeriodLimit.each(function() {
            if($(this).is(':checked') == true){
              checkedDate.push($(this).val());
            }
          });

         let inputPrice = $('input[name="price"]');
          inputPrice.each(function() {
            if($(this).is(':checked') == true){
              checkedPrice.push($(this).val());
            }
          });
         
          // 3단계 - ajax 호출
          getLecture();
      });

      // 3단계 - ajax 호출
      //강좌 조회
      function getLecture()
      {
        let data = {
          recomCategory: recomCategory,
          soCategory: soCategory,
          checkedCate: checkedCate,
          checkedLevels: checkedLevels,
          checkedPeriod: checkedPeriod,
          checkedDate: checkedDate,
          checkedPrice: checkedPrice
        };

        $.ajax({

          url:'search_lecture.php',
          type: 'post',
          dataType: 'html',
          data: data,
          contentType: "application/x-www-form-urlencoded; charset=UTF-8",
          error: function(){
            alert('실패');
          },
          success: function(response){
            console.log(response);
         
          }
        });

      }

  });



  </script>
  <script>
    //  console.log(implode(', ', $tags));
   $(window).scroll(function () {
		if ($(this).scrollTop() > 250) {
			$('.top-btn').fadeIn(100);
		} else {
			$('.top-btn').fadeOut(400);
		}
	});

	$('.top-btn').click(function (e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: 0 ,behavior:'smooth'}, 300);
	});
</script>
</body>
</html>