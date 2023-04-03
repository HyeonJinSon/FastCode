</head>
    <body>
        <header class="">
            <div class="header">
                <div class="container d-flex justify-content-between align-items-center">
                    <h1 id="main-logo">
                        <a href="/"><img src="img/fastcode_logo.png" alt="Fastcode" /><span>fastcode</span></a>
                    </h1>
                    <nav class="main-menu-ft">
                        <ul class="d-flex">
                            <li><a href="">about us</a></li>
                            <li><a href="">강의</a></li>
                            <li>
                                <a href="">커뮤니티</a>
                                <ul class="sub-menu-ft">
                                    <li><a href="">질문/답변</a></li>
                                    <li><a href="">스터디</a></li>
                                    <li><a href="">자유게시판</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">이벤트</a>
                                <ul class="sub-menu-ft">
                                    <li><a href="">할인</a></li>
                                    <li><a href="">프리패스</a></li>
                                    <li><a href="">특강</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">고객지원</a>
                                <ul class="sub-menu-ft">
                                    <li><a href="">공지사항</a></li>
                                    <li><a href="">문의하기</a></li>
                                    <li><a href="">FAQ</a></li>
                                    <li><a href="">이용가이드</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <form action="" class="search"><input type="text" placeholder="검색어를 입력하세요" /><i class="fa-solid fa-magnifying-glass"></i></form>
                    <ul class="member-info d-flex sub-menu-ft">
                        <li>
                            <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                            <span class="tip">장바구니</span>
                        </li>

                    <?php
                        if($_SESSION['USERID']){
                            $userid = $_SESSION['USERID'];
                    ?>
                        <li>
                            <button type="submit" id="logout" onclick="location.replace('member/logout.php');"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                            <span class="tip">로그아웃</span>
                        </li>
                        <li>
                            <a href=""><i class="fa-solid fa-user"></i></a>
                            <span class="hidden">나의 정보</span>
                            <ul class="my_info text-start content-text-2">
                                <li class="my_profile">
                                    <?php 
                                    $query = "SELECT * FROM members where userid = '".$userid."'";
                                    $result = $mysqli -> query($query) or die("query error =>".$mysqli-->error);
                                    $rs = $result -> fetch_object();
                                    ?>
                                    <a href="" class="d-flex">
                                        <img class="profile_img" src="<?php echo $rs -> profile_img;?>" alt="" cover-fit />
                                        <span><?php echo $rs -> username;?>님</span>
                                        <i class="fa-solid fa-angle-right ms-auto"></i>
                                    </a>
                                    <?php
                                    ?>
                                </li>
                                <li>
                                    <a href=""><i class="fa-solid fa-chart-pie"></i><span>대시보드</span></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa-solid fa-play"></i><span>나의 강의실</span></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa-solid fa-clipboard"></i><span>강의노트</span></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa-solid fa-comments"></i><span>나의 커뮤니티</span></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa-solid fa-ticket"></i><span>쿠폰함</span></a>
                                </li>
                                <li class="alarm">
                                    <a href="" class="d-flex align-items-center"><i class="fa-solid fa-bell"></i><span>알림</span></a>
                                </li>

                    <?php
                        } else{
                    ?>
                    <li>
                        <a href="member/login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                        <span class="tip">로그인</span>
                    </li>
                    <li>
                        <a href="member/signup.php"><i class="fa-solid fa-user-plus"></i></a>
                        <span class="tip">회원가입</span>
                    </li>
                    <?php
                        }
                    ?>   
                </ul>

            </div>
        </header>
