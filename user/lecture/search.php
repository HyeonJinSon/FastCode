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

  $cateSearch = $_POST["search_cate"];
  $searchKeyword = $_POST['search_keyword'];

  if(isset($cateSearch)){
    $sql_code = "SELECT * from category where name = '".$cateSearch."'";
    $result = $mysqli -> query($sql_code) or die("query error =>".$mysqli-->error);
    $rs = $result -> fetch_object();
    $cateSearch = $rs -> code;
    $sql_and .= " and L.cate_sm = '".$cateSearch."'";
  }else{
    $sql_and .="";
  }
  if(isset($searchKeyword)){
    $sql_and .= " and L.name like '%".$searchKeyword."%'";
  }else{
    $sql_and .="";
 }

  $sql_cate = "SELECT A.lecid, A.name, A.thumbnail, A.recom, A.forbegin, 
                      A.forbasic, A.forinter, A.foradv, A.lec_date, A.lec_end_date, 
                      A.mid_name, A.sm_name, A.date_calc, A.rownum,
               CASE WHEN price = 0 THEN '무료'
                  ELSE CONCAT(FORMAT(price, 0), '원')
               END price
               FROM (
                      SELECT L.*, C.big_name, C.mid_name, C.sm_name,
                             TIMESTAMPDIFF(DAY, now(), L.lec_end_date) AS date_calc, 
                   		      ROW_NUMBER() OVER(ORDER BY L.lecid DESC) AS rownum
                      FROM lectures L
                      JOIN category_sh C 
                      ON L.cate_big = C.big_code 
                      AND L.cate_mid = C.mid_code 
                      AND L.cate_sm = C.sm_code
                      WHERE L.sale_status != '판매대기'
                      ".$sql_and."
               ) A
               WHERE 1=1
               AND A.rownum BETWEEN 1 AND 9";
  $result_cate = $mysqli -> query($sql_cate);

  while($rs_cate = $result_cate ->fetch_object()) {
    $lecture_list[] = $rs_cate;
    // $labels[] = $rs_cate->mid_name; 그룹화해야함
  }

  $sql_minMaxPrice = "SELECT MIN(PRICE) AS min, MAX(PRICE) AS max FROM lectures";
  $result_minMaxPrice = $mysqli -> query($sql_minMaxPrice);

  while($rs_minMaxPrice = $result_minMaxPrice ->fetch_object()) {
    $minMaxPrice[] = $rs_minMaxPrice;
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
          <p>수강 기간(/)</p><i class="fa-solid fa-chevron-up"></i>
        </div>
        <div class="check_wrap">
          <label><input type="checkbox" name="period" data-period="time" value="무제한"> 무제한</label>
          <label><input type="checkbox" name="period" data-period="time" value="30일"> 30일 이내</label>
          <label><input type="checkbox" name="period" data-period="time" value="1개월"> 1개월 이상</label>
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
              <label for="amount1">최소금액<input type="text" id="amount1" value="" readonly></label>
              <span>~</span>
              <label for="amount2">최대금액<input type="text" id="amount2" value="" readonly></label>
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="lecture_list">
        <h2 class="hidden">Lecture List</h2>
        <div class="recommend">
          <button class="course_recom" id="recom" name="recommond" value="추천강좌"><img src="../img/recommend1.png" alt="">추천강좌</button>

          <button class="course_recom" value="Javascript" name="soCategory"><img src="../img/javascript_icon1.png" alt="">Javascript</button>
          <button class="course_recom" value="HTML" name="soCategory"><img src="../img/html1.png" alt="">HTML</button>
          <button class="course_recom" value="Figma" name="soCategory"><img src="../img/figma_icon1.png" alt="">Figma</button>
          <button class="course_recom" value="Photoshop" name="soCategory"><img src="../img/photoshop1.png" alt="">Photoshop</button>
          <button class="course_recom" value="Python" name="soCategory"><img src="../img/python1.png" alt="">Python</button>
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
                      <p><?php echo $list->price ?></p>
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
 <!-- Footer -->
  <?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/user/footer.php";
  ?> 
   <script src="../js/common.js"></script>


  <script>
  let minMaxPrice = <?php echo json_encode($minMaxPrice); ?>;

  $(".box_title").click(function () {
    let icon = $(this).find(".fa-chevron-up");

    $(this).next(".check_wrap").stop().slideToggle(300);
    $(this).toggleClass("on").siblings().removeClass("on");
    icon.toggleClass("rotate");
    
  }); 
  
  
  
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
  let checkedCate = [];
  let checkedLevels = []; 
  let checkedPrice = []; 
  let checkedPeriod = []; 
  let rangePrice = [];

  $(document).ready(function(e) {
    $( "#slider-range" ).slider({
      range: true,
      min: Number(minMaxPrice[0].min),
      max: Number(minMaxPrice[0].max),
      step: 1000,
      values: [Number(minMaxPrice[0].min), Number(minMaxPrice[0].max)],
      slide: function( event, ui ) {
        $( "#amount1" ).val( ui.values[ 0 ] + "원");
        $( "#amount2" ).val( ui.values[ 1 ] + "원");
      },
      stop: function(event, ui){
         getLecture();
      }
    });
    $( "#amount1" ).val( $( "#slider-range" ).slider( "values", 0 ) + "원");
    $( "#amount2" ).val( $( "#slider-range" ).slider( "values", 1 ) + "원");


    // 1단계 - 이벤트 생성
    //1. 카테고리 click 이벤트
    $('.course_recom').click(function() {

      $('input[type="checkbox"]').each(function() {
        $(this).prop('checked', false);

      });
      
      // 2단계 - 데이터 조작
      if(recomCategory == $(this).val()){
        $('.active').removeClass('active');
        recomCategory = '';
      } else{
        $('.active').removeClass('active');
        recomCategory = $(this).val();
        $(this).addClass('active');
      }
      checkedCate = [];
      checkedLevels = [];
      checkedPrice = [];
      checkedPeriod = [];

      // 3단계 - ajax 호출
      getLecture();
        
    });

    //2. 왼쪽 filter changed 이벤트
    $('input[type="checkbox"]').change(function() {
      
      $('.active').removeClass('active');
      recomCategory = '';

      // 2단계 - 데이터 조작
      checkedCate = [];
      checkedLevels = [];
      checkedPrice = [];
      checkedPeriod = [];

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

      //무제한, 제한
      let unlimitPeriod = $('input[name="period"]');
      unlimitPeriod.each(function() {
        if($(this).is(':checked') == true){
          checkedPeriod.push($(this).val());
        }
      });
      
      //가격 로직
      //무료
      let inputPrice = $('input[name="price"]');
      inputPrice.each(function() {
        if($(this).is(':checked') == true){
          checkedPrice.push($(this).val());
          $( "#slider-range" ).slider('disable');
        } else {
          $( "#slider-range" ).slider('enable');
        }
      });
      
      // 3단계 - ajax 호출
      getLecture();
    });


    let footerScroll = $('footer').outerHeight(); // footer 크기
    let windowHeight = window.innerHeight;        // 현재 내 화면 크기
    let fullHeight = document.body.scrollHeight;  // 문서 전체 크기
    let myScrollLocation = $(window).scrollTop();   //현재 스크롤 위치
    let eventScroll = (fullHeight - footerScroll) - windowHeight - 10;
    let listCount = $('.lecture').length;
    let lectureCount = listCount;
    let scrollIndex = 2;

if(listCount >= 9){
    $(window).scroll(function() {
      myScrollLocation = $(window).scrollTop();
      
      if(myScrollLocation > eventScroll) {
        lectureCount = 6 * scrollIndex + 3;
        scrollIndex++;
        eventScroll += (fullHeight - footerScroll) - windowHeight - 10;

        // console.log(fullHeight);
        console.log(eventScroll);        
        // console.log(scrollIndex);
        // console.log(lectureCount);

        getLecture();
      }
    })};

    // 3단계 - ajax 호출
    //강좌 조회
    function getLecture() {
      rangePrice = [];
      if(checkedPrice.length == 0){
        rangePrice.push($( "#slider-range" ).slider( "values", 0 ));
        rangePrice.push($( "#slider-range" ).slider( "values", 1 ));
      }

      let data = {
        recomCategory: recomCategory,
        checkedCate: checkedCate,
        checkedLevels: checkedLevels,
        checkedPeriod: checkedPeriod,
        checkedPrice: checkedPrice,
        rangePrice: rangePrice,
        lectureCount : lectureCount

      };
      // console.log(rangePrice);
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
          // console.log(response);
          $('.lecture_handle').html('');
          let jsonData = JSON.parse(response);

          let data_aa = jsonData;
          let lectureHTML = '';

          
            $.each(data_aa, function(index, aa) {
              lectureHTML += `
                <li class="lecture">
                  <a href="lecture_view.php?lecid=${aa.lecid}" >
                    <figure>
                      <img src="../..${aa.thumbnail}" alt="">
                    </figure>
                    <div class="info_wrap">
                      <p class="title">${aa.name}</p>
                      <div class="lecture_info d-flex">
                        <p>${aa.mid_name}</p>
                        <p>${aa.price}</p>
                      </div>
                    </div>
                  </a>
                </li>`;
            });
          if(data_aa == '') {  
            lectureHTML += "<li class='lecture_empty'><p><i class='fa-regular fa-face-sad-tear'></i> 검색 결과가 없습니다.</p></li>";
          }

          if(data_aa.length < 7) {
            $('html, body').animate({scrollTop: 0 , behavior : 'smooth'}, 500);
          }

          $('.lecture_handle').html(lectureHTML);
        }

      });
    }

  });





  </script>
  <script>
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
<?php
  include $_SERVER["DOCUMENT_ROOT"]."/inc/user/tail.php";
?>