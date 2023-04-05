<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/user/head.php";
?>
        <link rel="stylesheet" href="css/common.css" />
        <link rel="stylesheet" href="css/index.css" />
<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/user/index_header.php";
?>
        <section class="banner swiper mySwiper">
            <h2 class="hidden">main banner</h2>
            <ul class="swiper-wrapper">
                <li class="slide1 swiper-slide">
                    <div class="container">
                        <div class="row">
                            <div class="banner_text col-7 d-flex flex-column">
                                <h3 class="order-2">
                                    HTML CSS Javascript <br />
                                    통합과정 프리패스 개강
                                </h3>
                                <h4 class="order-1">이젠 나도 웹퍼블리셔!</h4>
                                <p class="content-text-1 order-3">프리패스 신청 : 2023.03.24 - 2023.04.24</p>
                            </div>
                            <img class="col-5" src="img/banner1.png" alt="" />
                        </div>
                    </div>
                </li>
                <li class="slide2 swiper-slide">
                    <div class="container">
                        <div class="row">
                            <div class="banner_text col-7 d-flex flex-column">
                                <h3 class="order-2">
                                    이용자를 생각하는<br />
                                    UX/UI Design 심화과정
                                </h3>
                                <h4 class="order-1">예쁘기만한 디자인 시대는 끝!</h4>
                                <p class="content-text-1 order-3">프리패스 신청 : 2023.03.24 - 2023.04.24</p>
                            </div>
                            <img class="col-5" src="img/banner2.png" alt="" />
                        </div>
                    </div>
                </li>
                <li class="slide3 swiper-slide">
                    <div class="container">
                        <div class="row">
                            <div class="banner_text col-7 d-flex flex-column">
                                <h3 class="order-2">오늘의 해결사는 누구?! <br />커뮤니티 코딩 대회</h3>
                                <h4 class="order-1">함께 해서 더 즐겁고 더 창의적으로!</h4>
                                <p class="content-text-1 order-3">대회참가 신청 : 2023.03.24 - 2023.04.24</p>
                            </div>
                            <img class="col-5" src="img/banner3.png" alt="" />
                        </div>
                    </div>
                </li>
                <li class="slide4 swiper-slide">
                    <div class="container">
                        <div class="row">
                            <div class="banner_text col-7 d-flex flex-column">
                                <h3 class="order-2">
                                    웹퍼블리셔들을 위한<br />
                                    PHP&SQL 신규강좌 개강
                                </h3>
                                <h4 class="order-1">기능까지 갖춘 웹페이지 제작</h4>
                                <p class="content-text-1 order-3">강좌 신청 : 2023.03.24 - 2023.04.24</p>
                            </div>
                            <img class="col-5" src="img/banner4.png" alt="" />
                        </div>
                    </div>
                </li>
            </ul>
            <div class="banner-next swiper-button-next"></div>
            <div class="banner-prev swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </section>

        <section class="go_category container">
            <h2 class="hidden">카테고리별 강좌보기</h2>
            <h3 class="sub-title">어떤 강의를 찾으세요?</h3>
            <ul class="d-flex justify-content-evenly content-text-1">
                <li><a href="" class="sprite html">HTML</a></li>
                <li><a href="" class="sprite css">CSS</a></li>
                <li><a href="" class="sprite javascript">Javascript</a></li>
                <li><a href="" class="sprite react">React</a></li>
                <li><a href="" class="sprite sql">PHP&SQL</a></li>
                <li><a href="" class="sprite python">Python</a></li>
                <li><a href="" class="sprite mobile">Mobile</a></li>
                <li><a href="" class="sprite figma">Figma</a></li>
                <li><a href="" class="sprite adobexd">AdobeXd</a></li>
                <li><a href="" class="sprite sketch">Sketch</a></li>
                <li><a href="" class="sprite photoshop">Photoshop</a></li>
                <li><a href="" class="sprite illustrator">illustrator</a></li>
            </ul>
        </section>

        <section class="class_slide container">
            <h2 class="hidden">추천강좌 슬라이드</h2>
            <?php 
                $query = "SELECT * from members where userid = '".$userid."'";
                $result = $mysqli -> query($query) or die("query error =>".$mysqli-->error);
                $rs = $result -> fetch_object();
                $catelike1 = $rs -> cate_like1;
                $catelike2 = $rs -> cate_like2;
            ?>
            <?php
                if(isset($catelike1)){
                    if($catelike1 !== 'none'){
            ?>
            <div class="class cate1 swiper lectureSwiper">
                <?php
                    $cate1_query = "SELECT * from category where step=3 and code='".$catelike1."'";
                    $cate1_result = $mysqli -> query($cate1_query) or die("query error =>".$mysqli-->error);
                    $ct1_rs = $cate1_result -> fetch_object();
                ?>
                <h3 class="sub-title">내가 관심있는 <em><?php echo $ct1_rs -> name ; ?></em> 분야 인기 강좌</h3>
                <?php
                    $cate1lec_sql = "SELECT * from lectures where cate_sm='".$catelike1."' order by sale_cnt desc limit 0,8";
                    $cate1lec_result = $mysqli->query($cate1lec_sql) or die("query error => ".$mysqli->error);
                    while($c1l_rs = $cate1lec_result -> fetch_object()){
                        $c1lrs[]=$c1l_rs;
                    }
                ?>
                <ul class="swiper-wrapper">
                    <?php
                        if(isset($c1lrs)){
                            foreach($c1lrs as $lr){
                    ?>
                        <li class="swiper-slide">
                            <a href="">
                                <img src="<?php echo $lr -> thumbnail; ?>" alt="<?php echo $lr -> name; ?> 대표 이미지입니다." />
                                <h4 class="content-text-1"><?php echo $lr -> name; ?></h4>
                                <?php include $_SERVER['DOCUMENT_ROOT']."/inc/user/tag.php"; ?>
                            </a>
                        </li>
                    <?php
                            }
                        }else{
                    ?>
                    <li class="no_class content-text-1">해당 강좌가 없습니다</li>
                    <?php
                        }
                    ?>
                </ul>
                <div class="lecture-next swiper-button-next"></div>
                <div class="lecture-prev swiper-button-prev"></div>
            </div>
            <?php }else if($catelike1 == 'none'){ ?>
                <div class="hidden">값이 없습니다</div>
            <?php }} ?>
            <?php
                if(isset($catelike2)){
                    if($catelike2 !== 'none'){
            ?>
            <div class="class cate2 swiper lectureSwiper">
                <?php
                    $cate2_query = "SELECT * from category where step=3 and code='".$catelike2."'";
                    $cate2_result = $mysqli -> query($cate2_query) or die("query error =>".$mysqli-->error);
                    $ct2_rs = $cate2_result -> fetch_object();
                ?>
                <h3 class="sub-title">내가 관심있는 <em><?php echo $ct2_rs -> name ; ?></em> 분야 인기 강좌</h3>
                <?php
                    $cate2lec_sql = "SELECT * from lectures where cate_sm='".$catelike2."' order by sale_cnt desc limit 0,8";
                    $cate2lec_result = $mysqli->query($cate2lec_sql) or die("query error => ".$mysqli->error);
                    while($c2l_rs = $cate2lec_result -> fetch_object()){
                        $c2lrs[]=$c2l_rs;
                    }
                ?>
                <ul class="swiper-wrapper">
                    <?php
                        if(isset($c2lrs)){
                            foreach($c2lrs as $lr){
                    ?>
                        <li class="swiper-slide">
                            <a href="">
                                <img src="<?php echo $lr -> thumbnail; ?>" alt="<?php echo $lr -> name; ?> 대표 이미지입니다." />
                                <h4 class="content-text-1"><?php echo $lr -> name; ?></h4>
                                <?php include $_SERVER['DOCUMENT_ROOT']."/inc/user/tag.php"; ?>
                            </a>
                        </li>
                    <?php
                            }
                        }else{
                    ?>
                    <li class="no_class content-text-1">해당 강좌가 없습니다</li>
                    <?php
                        }
                    ?>
                </ul>
                <div class="lecture-next swiper-button-next"></div>
                <div class="lecture-prev swiper-button-prev"></div>
            </div>
            <?php }else if($catelike2 == 'none'){ ?>
                <div class="hidden">값이 없습니다</div>
            <?php }} ?>
            <div class="class new swiper lectureSwiper">
                <h3 class="sub-title">따끈따끈 신규 강좌</h3>
                <?php
                    $newlec_sql = "SELECT * from lectures where sale_status='판매중' order by lecid desc limit 0,8";
                    $newlec_result = $mysqli->query($newlec_sql) or die("query error => ".$mysqli->error);
                    while($nl_rs = $newlec_result -> fetch_object()){
                        $nlrs[]=$nl_rs;
                    }
                ?>
                <ul class="swiper-wrapper">
                    <?php
                        if(isset($nlrs)){
                            foreach($nlrs as $lr){
                    ?>
                        <li class="swiper-slide">
                            <a href="">
                                <img src="<?php echo $lr -> thumbnail; ?>" alt="<?php echo $lr -> name; ?> 대표 이미지입니다." />
                                <h4 class="content-text-1"><?php echo $lr -> name; ?></h4>
                                <?php include $_SERVER['DOCUMENT_ROOT']."/inc/user/tag.php"; ?>
                            </a>
                        </li>
                    <?php
                            }
                        }else{
                    ?>
                    <li class="no_class content-text-1">해당 강좌가 없습니다</li>
                    <?php
                        }
                    ?>
                </ul>
                <div class="lecture-next swiper-button-next"></div>
                <div class="lecture-prev swiper-button-prev"></div>
            </div>
            <div class="class recom swiper lectureSwiper">
                <h3 class="sub-title">믿고 보는 전문가 추천 강의</h3>
                <?php
                    $recomlec_sql = "SELECT * from lectures where recom=1 order by lecid desc limit 0,8";
                    $recomlec_result = $mysqli->query($recomlec_sql) or die("query error => ".$mysqli->error);
                    while($rl_rs = $recomlec_result -> fetch_object()){
                        $rlrs[]=$rl_rs;
                    }
                ?>
                <ul class="swiper-wrapper">
                    <?php
                        if(isset($rlrs)){
                            foreach($rlrs as $lr){
                    ?>
                        <li class="swiper-slide">
                            <a href="">
                                <img src="<?php echo $lr -> thumbnail; ?>" alt="<?php echo $lr -> name; ?> 대표 이미지입니다." />
                                <h4 class="content-text-1"><?php echo $lr -> name; ?></h4>
                                <?php include $_SERVER['DOCUMENT_ROOT']."/inc/user/tag.php"; ?>
                            </a>
                        </li>
                    <?php
                            }
                        }else{
                    ?>
                    <li class="no_class content-text-1">해당 강좌가 없습니다</li>
                    <?php
                        }
                    ?>
                </ul>
                <div class="lecture-next swiper-button-next"></div>
                <div class="lecture-prev swiper-button-prev"></div>
            </div>
            <div class="class best swiper lectureSwiper">
                <h3 class="sub-title">Best Seller 대표 강좌</h3>
                <?php
                    $hitlec_sql = "SELECT * from lectures where sale_status='판매중' and sale_cnt>10 order by sale_cnt limit 0,8";
                    $hitlec_result = $mysqli->query($hitlec_sql) or die("query error => ".$mysqli->error);
                    while($hl_rs = $hitlec_result -> fetch_object()){
                        $hlrs[]=$hl_rs;
                    }
                ?>
                <ul class="swiper-wrapper">
                    <?php
                        if(isset($hlrs)){
                            foreach($hlrs as $lr){
                    ?>
                        <li class="swiper-slide">
                            <a href="">
                                <img src="<?php echo $lr -> thumbnail; ?>" alt="<?php echo $lr -> name; ?> 대표 이미지입니다." />
                                <h4 class="content-text-1"><?php echo $lr -> name; ?></h4>
                                <?php include $_SERVER['DOCUMENT_ROOT']."/inc/user/tag.php"; ?>
                            </a>
                        </li>
                    <?php
                            }
                        }else{
                    ?>
                    <li class="no_class content-text-1">해당 강좌가 없습니다</li>
                    <?php
                        }
                    ?>
                </ul>
                <div class="lecture-next swiper-button-next"></div>
                <div class="lecture-prev swiper-button-prev"></div>
            </div>
        </section>

        <section class="ad_fastcode">
            <h2 class="hidden">fastcode 소개</h2>
            <div class="container">
                <div class="ad_fastcode_title text-center">
                    <span>왜 </span>
                    <div id="main-logo">
                        <a href="#">
                            <img src="img/fastcode_logo.png" alt="Fastcode" />
                            <span>fastcode</span>
                        </a>
                    </div>
                    <span> 에서 배워야할까?</span>
                </div>
                <div id="tabs">
                    <ul class="row">
                        <li class="col sub-title">
                            <a href="#tabs-1"><i class="fa-solid fa-rocket"></i>빠르게 배우는 코딩</a>
                        </li>
                        <li class="col sub-title">
                            <a href="#tabs-2"><i class="fa-regular fa-lightbulb"></i>쉽게 배우는 코딩</a>
                        </li>
                        <li class="col sub-title">
                            <a href="#tabs-3"><i class="fa-solid fa-music"></i>재밌게 배우는 코딩</a>
                        </li>
                    </ul>
                    <div id="tabs-1" class="row">
                        <div class="description text-end col-6">
                            <h3>빠르게 배우는 코딩 <i class="fa-solid fa-rocket"></i></h3>
                            <h4>fast learning</h4>
                            <span class="num text-start">01</span>
                            <div class="paragraph">
                                <p>빠르게 배우는 코딩에 대한 설명글</p>
                                <p>빠르게 배우는 코딩에 대한 설명글</p>
                                <p>빠르게 배우는 코딩에 대한 설명글</p>
                            </div>
                            <a href="" class="more content-text-2">자세히 보기 <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>

                        <div class="tab_thumbnail col-6">
                            <img src="img/ad_fastcode_tab1.png" alt="" />
                            <svg xmlns="http://www.w3.org/2000/svg" width="596" height="487" viewBox="0 0 596 487" fill="none">
                                <circle cx="160" cy="68" r="50" fill="#1D3557" class="svg-elem-1"/>
                                <circle cx="80" cy="118" r="80" fill="#457B9D" class="svg-elem-2"/>
                                <circle cx="555.5" cy="37.5" r="37.5" fill="#457B9D" class="svg-elem-3"/>
                                <circle cx="96" cy="437" r="50" fill="#1D3557" class="svg-elem-4"/>
                                <circle cx="546" cy="392" r="50" fill="#A8DADB" class="svg-elem-5"/>
                            </svg>
                        </div>
                    </div>
                    <div id="tabs-2" class="row">
                        <div class="description text-end col-6">
                            <h3>쉽게 배우는 코딩 <i class="fa-regular fa-lightbulb"></i></h3>
                            <h4>easy learning</h4>
                            <span class="num text-start">02</span>
                            <div class="paragraph">
                                <p>쉽게 배우는 코딩에 대한 설명글</p>
                                <p>쉽게 배우는 코딩에 대한 설명글</p>
                                <p>쉽게 배우는 코딩에 대한 설명글</p>
                            </div>
                            <a href="" class="more content-text-2">자세히 보기 <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>

                        <div class="tab_thumbnail col-6">
                            <img src="img/ad_fastcode_tab2.png" alt="" />
                            <svg xmlns="http://www.w3.org/2000/svg" width="596" height="487" viewBox="0 0 596 487" fill="none">
                                <circle cx="160" cy="68" r="50" fill="#1D3557" class="svg-elem-1"/>
                                <circle cx="80" cy="118" r="80" fill="#457B9D" class="svg-elem-2"/>
                                <circle cx="555.5" cy="37.5" r="37.5" fill="#457B9D" class="svg-elem-3"/>
                                <circle cx="96" cy="437" r="50" fill="#1D3557" class="svg-elem-4"/>
                                <circle cx="546" cy="392" r="50" fill="#A8DADB" class="svg-elem-5"/>
                            </svg>
                        </div>
                    </div>
                    <div id="tabs-3" class="row">
                        <div class="description text-end col-6">
                            <h3>재밌게 배우는 코딩 <i class="fa-solid fa-music"></i></h3>
                            <h4>funny learning</h4>
                            <span class="num text-start">03</span>
                            <div class="paragraph">
                                <p>재밌게 배우는 코딩에 대한 설명글</p>
                                <p>재밌게 배우는 코딩에 대한 설명글</p>
                                <p>재밌게 배우는 코딩에 대한 설명글</p>
                            </div>
                            <a href="" class="more content-text-2">자세히 보기 <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                        <div class="tab_thumbnail col-6">
                            <img src="img/ad_fastcode_tab3.png" alt="" />
                            <svg xmlns="http://www.w3.org/2000/svg" width="596" height="487" viewBox="0 0 596 487" fill="none">
                                <circle cx="160" cy="68" r="50" fill="#1D3557" class="svg-elem-1"/>
                                <circle cx="80" cy="118" r="80" fill="#457B9D" class="svg-elem-2"/>
                                <circle cx="555.5" cy="37.5" r="37.5" fill="#457B9D" class="svg-elem-3"/>
                                <circle cx="96" cy="437" r="50" fill="#1D3557" class="svg-elem-4"/>
                                <circle cx="546" cy="392" r="50" fill="#A8DADB" class="svg-elem-5"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="notice container">
            <div class="row">
                <h2 class="col-1 sub-title">공지사항</h2>
                <?php 
                    $board_sql = "SELECT * from board order by idx desc limit 0,3";
                    $b_result = $mysqli -> query($board_sql) or die("Query Error! => ".$mysqli->error);
                    while($b_rs = $b_result->fetch_object()){
                        $brsc[] = $b_rs;
                    }
                ?>
                <ul class="notice_list col-11 content-text-1">
                    <?php 
                        if(isset($brsc)){
                            foreach($brsc as $br){
                    ?>
                        <li class="row">
                            <h3 class="col-9"><a href="#"><?php echo $br -> title; ?></a></h3>
                            <span class="col-3 text-center"><?php echo $br -> date; ?><i class="fa-solid fa-angle-right"></i></span>
                        </li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </div>
        </section>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/user/footer.php";
?>        
        <script src="js/common.js"></script>
        <script src="js/index.js"></script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/user/tail.php";
?> 
