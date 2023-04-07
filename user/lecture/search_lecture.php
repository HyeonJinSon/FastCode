<?php
  include $_SERVER['DOCUMENT_ROOT']."/fastcode/inc/db.php";

  // 4단계 - ajax데이터 php 정상 호출
  $recomCategory = $_POST['recomCategory'] != "" ? $_POST['recomCategory'] : "";
  $soCategory = $_POST['soCategory'] != "" ? $_POST['soCategory'] : "";
  $checkedCate = isset($_POST['checkedCate']) ? $_POST['checkedCate'] : "";
  $checkedLevels = isset($_POST['checkedLevels']) ? $_POST['checkedLevels'] : "";
  $checkedDate = isset($_POST['checkedDate']) ? $_POST['checkedDate'] : "";
  $checkedPeriod = $_POST['checkedPeriod'] != "" ? $_POST['checkedPeriod'] : "";
  $checkedPrice = isset($_POST['checkedPrice']) ? $_POST['checkedPrice'] : "";
  // 5단계 - 쿼리 생성
  // 5-1. 필요한 값 작성
 
  $sql_search = "SELECT L.*, C.big_name, C.mid_name, C.sm_name,
                        TIMESTAMPDIFF(DAY, L.lec_start_Date, L.lec_end_date) AS date_calc
                 FROM lectures L
                 JOIN category_sh C 
                 ON L.cate_big = C.big_code 
                 AND L.cate_mid = C.mid_code 
                 AND L.cate_sm = C.sm_code
                 WHERE 1=1";

  /* 수업 난이도 완료 */
  if($checkedLevels != "") {
    if(in_array('입문', $checkedLevels)) {
      $sql_search .= ' AND L.forbegin = 1';  
    }

    if(in_array('초급', $checkedLevels)) {
      $sql_search .= ' AND L.forbasic = 1';  
    }
    
    if(in_array('중급', $checkedLevels)) {
      $sql_search .= ' AND L.forinter = 1';  
    }
    
    if(in_array('상급', $checkedLevels)) {
      $sql_search .= ' AND L.foradv = 1';  
    }
  }



  /* 수강 기간 */
  //무제한
  if($checkedPeriod != "") {
    //해당 배열에 값 여부 확인! 
    $sql_search .= ' AND L.lec_date = "무제한"';  
  } 

  // /* 가격 */
  // if(!in_array('0', $checkedPeriod)) {
  //   // $sql_search .= ' WHERE 1=1';//~~~~~0이아니면 조회~~~~~~~
  //   $sql_search .= ' BETWEEN DATE_ADD(NOW(), INTERVAL -1 month) AND now()';  
  // } else {  // ~~~~0면 조회~~~~~~~

  // }


  /* 카테고리 분류 */
  if($checkedCate != "") {
    //AND L.cate_mid IN ('B001','B002','B011')
    $sql_search .= " AND L.cate_mid IN (";
    foreach($checkedCate as $cate) {
      if($cate == '프론트엔드'){
        $sql_search .= "'B001',";
      } else if($cate == '백엔드'){
        $sql_search .= "'B002',";
      } else if($cate == 'UX/UI'){
        $sql_search .= "'B011',";
      } else if($cate == '일반 디자인'){
        $sql_search .= "'B012',";
      } else if($cate == '기타'){
        $sql_search .= "'B003',";
      }
    }
    $sql_search = substr($sql_search, 0, (strlen($sql_search) - 1));
    $sql_search .= ")";
  }

  /* 소카테고리 버튼 분류 */
  if($soCategory != "") {
    $sql_search .= " AND C.sm_name='소카테'";
  }
  /* 추천 카테고리 버튼 분류 */
  if($recomCategory != "") { 
    $sql_search .= " AND L.recom = 1";
  }
  
  //제한
  if($checkedDate != "") {
    if(count($checkedDate) == 2){
      $sql_search .= ' HAVING L.date_calc <= 30';
      $sql_search .= ' OR L.date_calc > 30';
    } else{
      if(in_array('1개월', $checkedDate)){
        $sql_search .= ' HAVING L.date_calc > 30';
      } else{
        $sql_search .= ' HAVING L.date_calc <= 30';
      }
    }
  }


  $result_search = $mysqli->query($sql_search);


  $search = array();
  while ($rs_search = $result_search->fetch_object()) {
    $search[] = $rs_search;
  }

  // echo json_encode($search, JSON_UNESCAPED_UNICODE); //배열 출력 확인
  echo $sql_search;  //쿼리문 확인

?>