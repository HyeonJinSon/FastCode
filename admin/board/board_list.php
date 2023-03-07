<?php 
    session_start();
    if(!$_SESSION['AUID']){
        echo "<script>
        alert('접근 권한이 없습니다.');
        history.back();
        </script>";
    };
    include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";
?>

<link rel="stylesheet" href="../css/board_list.css" />

<?php     
    include $_SERVER['DOCUMENT_ROOT']."/inc/common.php"; 
?>

        <!-- 본문시작 -->

        <h2 class="page-title">공지사항</h2>

        <div class="borad_top">
          <div class="row pd-54">
            <a href="#" class="y-btn big-btn btn-navy">글쓰기</a>
          </div>
          <div class="borad_search_form">
            <form class="row pd-54">
              <select
                class="form-select"
                name="search_board"
                name="search_board"
              >
                <option value="title">제목</option>
                <option value="name">글쓴이</option>
                <option value="content">내용</option>
              </select>
              <input
                class="form-control"
                type="search"
                name="search"
                required
              />
            </form>
          </div>
        </div>

        <table>
          <thead>
            <tr>
              <th>번호</th>
              <th>제목</th>
              <th>작성자</th>
              <th>등록일</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>5</td>
              <td>신규 회원 월컴 기프트 쿠폰 증정 이벤트 안내</td>
              <td>관리자</td>
              <td>2023.3.12</td>
              <th>
                <a class="edit" type="button">수정</a>
                <a class="del" type="button">삭제</a>
              </th>
            </tr>
            <tr>
              <td>4</td>
              <td>3월 한정! 신규강의 런칭 특가 이벤트 안내</td>
              <td>관리자</td>
              <td>2023.3.10</td>
              <th>
                <a class="edit" type="button">수정</a>
                <a class="del" type="button">삭제</a>
              </th>
            </tr>
            <tr>
              <td>3</td>
              <td>K - 디지털 트레이닝 안내 사항</td>
              <td>관리자</td>
              <td>2023.2.28</td>
              <th>
                <a class="edit" type="button">수정</a>
                <a class="del" type="button">삭제</a>
              </th>
            </tr>
            <tr>
              <td>2</td>
              <td>국비지원 내일배움 아카데미 오픈</td>
              <td>관리자</td>
              <td>2023.2.10</td>
              <th>
                <a class="edit" type="button">수정</a>
                <a class="del" type="button">삭제</a>
              </th>
            </tr>
            <tr>
              <td>1</td>
              <td>2023년 2월 시스템 점검 안내</td>
              <td>관리자</td>
              <td>2023.2.01</td>
              <th>
                <a class="edit" type="button">수정</a>
                <a class="del" type="button">삭제</a>
              </th>
            </tr>
          </tbody>
        </table>

        <div class="pagenation">
          <ul>
            <li><i class="fa-solid fa-chevron-left"></i></li>
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li><i class="fa-solid fa-chevron-right"></i></li>
          </ul>
        </div>

        <!-- 본문끝 -->

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
 ?>