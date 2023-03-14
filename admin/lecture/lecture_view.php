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
    <link rel="stylesheet" href="../css/lecture_view.css" />
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/common.php";  

  $lecid = $_GET['lecid'];
  // echo $lecid;

  //강좌 정보 조회
  $query = "SELECT * from lectures where lecid=".$lecid;
  $result = $mysqli ->query($query) or die("Query Error =>".$mysqli->error);
  $rs = $result ->fetch_object();

  //추가이미지 조회
  $query2 = "SELECT * from lecture_image_table where lecid=".$lecid;
  $result2 = $mysqli ->query($query2) or die("Query Error =>".$mysqli->error);
      
  while($rs2 = $result2 ->fetch_object()){
      $attached_imgs[] = $rs2;
  }

  //강의목록 조회
  $query3 = "SELECT * from lecture_class where lecid=".$lecid;
  $result3 = $mysqli ->query($query3) or die("Query Error =>".$mysqli->error);
      
  while($rs3 = $result3 ->fetch_object()){
          $classes[] = $rs3;
  }
?>
    </div>
    <main>
          <h2 class="page-title hidden">강좌 상세보기</h2>
          <div class="lec_view_container">
            <div class="lec_view_title_container row">
              <figure class="col-md-4">
                <!-- <img src="https://placehold.co/442x301" alt="" /> -->
                <img src="<?php echo $rs->thumbnail;?>" alt="" class="thumbnail_img_preview"/>
              </figure>
              <div class="lec_view_title col-md-8">
                <p>
                <?php 
                    $cb_code = $rs->cate_big;
                    $cm_code = $rs->cate_mid;
                    $cs_code = $rs->cate_sm;

                    $cs_query = "SELECT * from category where step=3 and code='".$cs_code."'";
                    $cs_result = $mysqli -> query($cs_query) or die("query error =>".$mysqli-->error);
                    $csr = $cs_result -> fetch_object();

                    $cm_query = "SELECT * from category where step=2 and code='".$cm_code."'";
                    $cm_result = $mysqli -> query($cm_query) or die("query error =>".$mysqli-->error);
                    $cmr = $cm_result -> fetch_object();

                    $cb_query = "SELECT * from category where step=1 and code='".$cb_code."'";
                    $cb_result = $mysqli -> query($cb_query) or die("query error =>".$mysqli-->error);
                    $cbr = $cb_result -> fetch_object();
                  ?>
                  <em><?php echo $cbr->name ;?></em><i class="fa-solid fa-chevron-right"></i
                  ><em><?php echo $cmr->name ;?></em
                  ><i class="fa-solid fa-chevron-right"></i>
                  <em><?php echo $csr->name ;?></em>
                </p>
                <h3 class="content-title"><?php echo $rs->name;?></h3>
              </div>
            </div>
            <div class="lec_view_info">
              <div class="lec_view_info1">
                <p>판매가격 : <span><?php echo number_format($rs->price);?>원</span></p>
                <p>상태 : <span><?php echo $rs->sale_status;?></span></p>
              </div>
              <div class="bar"></div>
              <div class="lec_view_info2 row flex-column justify-content-center align-items-center">
                <a class="mini-tag limit-tag col-auto"><?php echo $rs->lec_date;?></a>
                <?php 
                if($rs->lec_date=='무제한'){
                  echo "";
                }else if($rs->lec_date=='제한'){
                  ?>
                  <p class="col">
                    <?php echo "<span>".$rs->lec_start_date."</span> - <span>".$rs->lec_end_date."</span>"; ?>
                  </p>
                <?php
                };
                ?>
              </div>
              <div class="bar"></div>
              <div class="lec_view_info3">
                <!-- db에 저장되어 있는 체크 여부가 checked 속성 여부로 출력되면서(db 연결하면서 바꿔야 될 수도..), 이 화면에서 체크박스를 바꾸지는 못하도록 disabled 속성을 추가했음, 스타일은 브라우저에서 지정한 스타일이라 label:before로 따로 만듦 -->
                <div
                class="row lec_option justify-content-between align-items-center"
              >
                <input type="checkbox" name="recom" id="" value="1" class="col" disabled <?php if($rs->recom){echo "checked";}?>/>
                <label for="" class="col">추천</label>
                <input type="checkbox" name="forbegin" id="" value="1" class="col" disabled  <?php if($rs->forbegin){echo "checked";}?>/>
                <label for="" class="col">입문</label>
                <input type="checkbox" name="forbasic" id="" value="1" class="col" disabled <?php if($rs->forbasic){echo "checked";}?>/>
                <label for="" class="col">초급</label>
                <input type="checkbox" name="forinter" id="" value="1" class="col" disabled <?php if($rs->forinter){echo "checked";}?>/>
                <label for="" class="col">중급</label>
                <input type="checkbox" name="foradv" id="" value="1" class="col" disabled <?php if($rs->foradv){echo "checked";}?>/>
                <label for="" class="col">상급</label>
                </div>
              </div>
            </div>
            <div class="lec_view_desc">
              <h4>강좌 설명</h4>
              <p> <?php echo nl2br($rs->content); ?> </p>
            </div>
            <div class="lec_view_img_slide">
              <h4>강좌 추가 이미지</h4>
              <div class="lec_img_slide_wrapper">
                <ul class="lec_img_slides">
                <?php foreach($attached_imgs as $ai) { ?>
                  <li>
                    <figure>
                      <img src="../../pdata/<?php echo $ai -> filename; ?>" alt="">
                    </figure>
                  </li>
                <?php } ?>
                  <!-- <li>
                    <figure>
                      <img src="https://placehold.co/278x190" alt="">
                    </figure>
                  </li> -->
                </ul>
              </div>	
              <p class="lec_img_controls row justify-content-between">
                <span class="prev col-auto"><i class="fa-solid fa-chevron-left"></i></span>
                <span class="next col-auto"><i class="fa-solid fa-chevron-right"></i></span>
              </p>
            </div>
            <div class="lec_view_video_container">
              <h4>강의 영상</h4>
              <ul class="lec_video_list">
              <?php if($classes) {
                foreach($classes as $cl) {
              ?>
                <li class="row justify-content-between">
                  <em class="col-auto"><?php echo $cl -> class_name; ?></em>
                  <button class="lec_play col-auto"><i class="fa-regular fa-circle-play modal_open" ></i></button>

                  <div class="modal_bg">
                    <dialog class="videoModal">
                      <div class="modal-content">
                        <div class="modal-header row justify-content-center">
                          <h2 class="content-title"><?php echo $cl -> class_name; ?></h2>
                        </div>
                        <div class="modal-body">
                          <iframe width="560" height="315" src="<?php echo $cl -> class_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="modal-footer row justify-content-center">
                          <button type="button" class="modal_close y-btn mid-btn btn-sky">닫기</button>
                        </div>
                      </div>
                    </dialog>
                  </div>

                </li>
              <?php }} ?>
              </ul>
            </div>
          </div>
          </form>
          <div class="lec_view_btn_container row">
            <a href="lecture_list.php" class="y-btn small-btn btn-sky">목록</a>
            <a href="#" class="y-btn small-btn btn-navy">수정</a>
            <a href="#" class="y-btn small-btn btn-red">삭제</a>
          </div>
        </main>
    <?php
        include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
      $('.lec_play').click(function(){
        console.log($(this).next('.modal_bg dialog'));
        $(this).next('.modal_bg').find('dialog').show();
        $(this).next('.modal_bg').addClass('active');
      });

      //.modal_close를 click하면 dialog hide()
      $(".modal_close").click(()=>{
        $('.modal_bg dialog').hide();
        $('.modal_bg').removeClass('active');
      });


      let slideWrapper = $('.lec_img_slide_wrapper'),
          slides = slideWrapper.find('.lec_img_slides'),
          slide = slides.find('li'),
          currentIdx = 0,
          slideCount = slide.length,
          slideWidth = 278,
          slideMargin = 50,
          moveAmt = slideWidth + slideMargin,
          maxSlides = 4,
          prevBtn = $('.lec_img_controls').find('.prev'),
          nextBtn = $('.lec_img_controls').find('.next');

          for(let i = 0;i<slideCount;i++){
              let cloneNode = slide.eq(i).clone();
                  cloneNode.addClass('clone');
                  slides.append(cloneNode);
          }
          for(let i = slideCount - 1;i>=0;i--){
              let cloneNode = slide.eq(i).clone();
                  cloneNode.addClass('clone');
                  slides.prepend(cloneNode);
          }
          function slideLayout(sw,sm){
            let allSlide = slides.find('li');
            allSlide.each(function(idx){
              $(this).css({left:`${idx*(sw+sm)}px`});
            });
            moveAmt = sw + sm;
            setSlideCenter(moveAmt);
          }
          slideLayout(slideWidth,slideMargin);
          
          function setSlideCenter(ma){
            slides.each(function(){
                $(this).css({transform:`translateX(-${slideCount*ma}px)`});
                $(this).addClass('animated');
              });
          }
          
          
          function moveSlide(idx){
            slides.each(function(){
              if(idx >= 0){
                $(this).stop().animate({left:`-${idx*moveAmt}px`},100);
              }else {
                $(this).stop().animate({left:`${Math.abs(idx)*moveAmt}px`},100);
              }
            });
            currentIdx = idx;
            console.log(slideCount);
            if(currentIdx == slideCount || currentIdx == -slideCount){
                setTimeout(()=>{
                  slides.removeClass('animated');
                  slides.css({left:'0px'});
                  currentIdx = 0;
                },500);
                setTimeout(()=>{
                  slides.addClass('animated');
                },600);
            }
          }

          prevBtn.click(debounce(()=>{
            moveSlide(currentIdx-1)
          },500));
          nextBtn.click(debounce(()=>{
            moveSlide(currentIdx+1)
          },500));

          function debounce(callback, time){
            let slideTrigger = true;
            return ()=>{
                if(slideTrigger){
                    callback();
                    slideTrigger = false;
                    setTimeout(()=>{
                        slideTrigger = true;
                    },time);
                }
            }
          }
    </script>
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
?>