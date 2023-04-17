<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/db.php";

  // 4단계 - ajax데이터 php 정상 호출
  $searchKeyword = $_POST['searchKeyword'] != "" ? $_POST['searchKeyword'] : "";
  $lectureCount = $_POST['lectureCount'] != "" ? $_POST['lectureCount'] : "";
  $recomCategory = $_POST['recomCategory'] != "" ? $_POST['recomCategory'] : "";
  $checkedCate = isset($_POST['checkedCate']) ? $_POST['checkedCate'] : "";
  $checkedLevels = isset($_POST['checkedLevels']) ? $_POST['checkedLevels'] : "";
  $checkedPeriod = $_POST['checkedPeriod'] != "" ? $_POST['checkedPeriod'] : "";
  $checkedPrice = isset($_POST['checkedPrice']) ? $_POST['checkedPrice'] : "";
  $rangePrice = isset($_POST['rangePrice']) != "" ? $_POST['rangePrice'] : "";
  // 5단계 - 쿼리 생성


  $sql_and = "";
 
  /* 소카테고리 버튼 분류 */
  /* 추천 카테고리 버튼 분류 */
  if($recomCategory != "") {
    if($recomCategory == "추천강좌") { 
      $sql_and .= " AND A.recom = 1";
    } else {
      $sql_and .= " AND A.sm_name = '$recomCategory'";
    }
  }
  
  /* 카테고리 분류 */
  if($checkedCate != "") {
    //AND L.cate_mid IN ('B001','B002','B011')
    $sql_and .= " AND A.cate_mid IN (";
    foreach($checkedCate as $cate) {
      if($cate == '프론트엔드'){
        $sql_and .= "'B001',";
      } else if($cate == '백엔드'){
        $sql_and .= "'B002',";
      } else if($cate == 'UX/UI'){
        $sql_and .= "'B011',";
      } else if($cate == '일반디자인'){
        $sql_and .= "'B012',";
      } else if($cate == '기타'){
        $sql_and .= "'B003',";
      }
    }
    $sql_and = substr($sql_and, 0, (strlen($sql_and) - 1));
    $sql_and .= ")";
  }

  /* 검색 키워드 */
  if($searchKeyword != '') {
    $sql_and = " AND A.name LIKE '%".$searchKeyword."%' ";
  } 

  /* 수업 난이도 */
  if($checkedLevels != "") {
    if(in_array('입문', $checkedLevels)) {
      $sql_and .= ' AND A.forbegin = 1';  
    }

    if(in_array('초급', $checkedLevels)) {
      $sql_and .= ' AND A.forbasic = 1';  
    }
    
    if(in_array('중급', $checkedLevels)) {
      $sql_and .= ' AND A.forinter = 1';  
    }
    
    if(in_array('상급', $checkedLevels)) {
      $sql_and .= ' AND A.foradv = 1';  
    }
  }

  /* 수강 기간 */
  //무제한, 제한
  if($checkedPeriod != "") {
    $sql_and .= " AND (";
    foreach($checkedPeriod as $period) {
      if($period == '무제한'){
        $sql_and .= " A.lec_date = '무제한' OR";
      } else{
        $sql_and .= $period == "30일" ? " A.date_calc <= 30 OR" : " A.date_calc > 30 OR";   
      }
    }
    $sql_and = substr($sql_and, 0, (strlen($sql_and) - 2));
    $sql_and .= ") ";
  } 
  
  /* 가격 */
  // 무료
  if($checkedPrice != ''){
    if(in_array('무료', $checkedPrice)) {
      $sql_and .= ' AND A.priceComp = 0';
    }
  }
  
  if($rangePrice != ''){
      $sql_and .= ' AND A.priceComp BETWEEN '.$rangePrice[0].' AND '.$rangePrice[1];
  }

  $sql_search = "SELECT X.*
                 FROM (
                         SELECT A.*
                               , ROW_NUMBER() OVER(ORDER BY A.lecid DESC) AS rownum
                         FROM (
                                 SELECT L.lecid, L.name, L.thumbnail, L.recom
                                       , L.forbegin, L.forbasic, L.forinter, L.foradv
                                       , L.lec_date, L.lec_end_date, L.cate_big, C.big_name, L.cate_mid, C.mid_name, L.cate_sm, C.sm_name
                                       , TIMESTAMPDIFF(DAY, now(), L.lec_end_date) AS date_calc
                                       , CASE WHEN L.price = 0 THEN '무료'
                                              ELSE CONCAT(FORMAT(L.price, 0), '원')
                                         END AS price
                                       , L.price AS priceComp
                                 FROM lectures L
                                 INNER JOIN category_sh C ON L.cate_big = C.big_code AND L.cate_mid = C.mid_code AND L.cate_sm = C.sm_code
                                 WHERE L.sale_status != '판매대기'
                             ) A
                         WHERE 1=1
                         ".$sql_and."
                 ) X
                 WHERE X.rownum BETWEEN 1 AND ".$lectureCount;

  // echo $sql_search;  //쿼리문 확인
  $result_search = $mysqli->query($sql_search);


  $search = array();
  while ($rs_search = $result_search->fetch_object()) {
    $search[] = $rs_search;
  }

  echo json_encode($search, JSON_UNESCAPED_UNICODE); //배열 출력 확인

?>