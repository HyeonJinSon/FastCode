<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>fastcode</title>
        <link rel="stylesheet" href="css/common.css" />
    </head>
    <body>
        <header class="">
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
                <ul class="member-info d-flex content-text-2">
                    <li>
                        <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                        <span>장바구니</span>
                    </li>
                    <?php
                        if($_SESSION['USERID']){
                    ?>
                    <li>
                        <button type="submit" id="logout" onclick="location.replace('member/logout.php');"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                        <span>로그아웃</span>
                    </li>
                    <li>
                        <a href=""><i class="fa-solid fa-user"></i></a>
                        <span>나의 정보</span>
                    </li>
                    <?php
                        } else{
                    ?>
                    <li>
                        <a href="member/login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                        <span>로그인</span>
                    </li>
                    <li>
                        <a href="member/signup.php"><i class="fa-solid fa-user-plus"></i></a>
                        <span>회원가입</span>
                    </li>
                    <?php
                        }
                    ?>   
                </ul>

            </div>
        </header>

        <div class="top-btn">
            <i class="fa-solid fa-arrow-up"></i>
        </div>
        <hr />

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="footer_top d-flex">
                    <ul class="footer_menu d-flex">
                        <li class="content-text-2"><a href="#">회사소개</a></li>
                        <li class="content-text-2"><a href="#">개인정보처리 방침</a></li>
                        <li class="content-text-2"><a href="#">서비스이용약관</a></li>
                        <li class="content-text-2"><a href="#">취소환불규정</a></li>
                        <li class="content-text-2"><a href="#">자료실</a></li>
                        <li class="content-text-2"><a href="#">고객센터</a></li>
                        <li class="content-text-2"><a href="#">사이트맵</a></li>
                    </ul>
                    <ul class="footer_sns d-flex">
                        <li>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-blog"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer_bottom d-flex">
                    <h6 id="main-logo">
                        <a href="/"><img src="img/fastcode_logo.png" alt="Fastcode" /><span>fastcode</span></a>
                    </h6>
                    <div class="footer_contents">
                        <h5 class="content-title">(주) FASTCODE</h5>
                        <span class="content-text-3">대표자 김유미 | 사업자 등록 번호 123-45-67890</span>
                        <span class="content-text-3">주소: 서울 특별시 종로구 수표로 96 국일관드림팰리스 | 이메일: yumi@fastcode.com |전화: 02-1212-1212</span>
                    </div>
                    <div class="footer_copyright"><span class="content-text-3">Copyright@2023 Fastcode. All Rights reserved</span></div>
                </div>
            </div>
        </footer>
    </body>
</html>
