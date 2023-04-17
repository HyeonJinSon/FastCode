<?php
  session_start();
  include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";

  $userid = $_SESSION['USERID'];
  $username = $_SESSION['USERNAME'];

  if(!$userid){
    echo "<script>
      alert('로그인이 필요합니다.');
      location.href = '../index.php';
    </script>";
  };

  //클래스 배너 프로필 이미지 출력
  $queryP = "SELECT profile_img from members where userid='".$userid."'";
  $resultP = $mysqli->query($queryP) or die ("query error =>".$mysql->error);
  $rsP = $resultP->fetch_object();


  //해당 유저의 수강 완료 강좌
  $csql = "SELECT lecid from user_lectures where userid='".$userid."' and progress='100.00'";
  $cresult = $mysqli->query($csql) or die ("query error =>".$mysql->error);
  // $cr = $cresult->fetch_object();
  while($cr = $cresult->fetch_object()){
    $crarr[]=$cr->lecid;
  }
  $ccsql = "SELECT COUNT(*) AS cnt from user_lectures where userid='".$userid."' and progress='100.00'";
  $ccresult = $mysqli->query($ccsql) or die ("query error =>".$mysql->error);
  $ccr = $ccresult->fetch_object();

  //해당 유저의 수강중 강좌 총 수
  $ucsql = "SELECT COUNT(*) AS cnt from user_lectures where userid='".$userid."'";
  $ucresult = $mysqli->query($ucsql) or die ("query error =>".$mysql->error);
  $ucrs = $ucresult->fetch_object();


  //수강 만료 임박 강좌 
  $dquery = "SELECT ul.lecid from user_lectures ul join lectures lc on ul.lecid=lc.lecid where DATEDIFF(lc.lec_end_date, now()) < 5 and ul.userid='".$userid."'";
  $dresult = $mysqli->query($dquery) or die("query error =>".$mysqli->error);
  while($dr = $dresult->fetch_object()){
    $drarr[]=$dr->lecid;
  }

  $ddquery = "SELECT COUNT(*) AS cnt from user_lectures ul join lectures lc on ul.lecid=lc.lecid where DATEDIFF(lc.lec_end_date, now()) < 5 and ul.userid='".$userid."'";
  $ddresult = $mysqli->query($ddquery) or die("query error =>".$mysqli->error);
  $ddr = $ddresult->fetch_object();


  //해당 유저의 총 수강 시간 합계
  $tquery = "SELECT HOUR(SEC_TO_TIME(SUM(TIME_TO_SEC(H.total_time))))AS total_hour,
  MINUTE(SEC_TO_TIME(SUM(TIME_TO_SEC(H.total_time)))) AS total_minute,
  SECOND(SEC_TO_TIME(SUM(TIME_TO_SEC(H.total_time)))) AS total_second,
  H.userid
  FROM user_lectures H
  JOIN lectures L
  ON H.lecid=L.lecid
  WHERE H.userid='".$userid."'";
  $tresult = $mysqli -> query($tquery) or die("query error =>".$mysqli->error);
  $trs = $tresult -> fetch_object();


  //해당 유저의 수강중 강좌 리스트 출력
  $query4 = "SELECT ul.lecid, ul.userid, ul.total_time, lc.* from user_lectures ul join lectures lc on ul.lecid=lc.lecid where ul.userid='".$userid."' order by ul.ulid desc";
  $result4 = $mysqli->query($query4) or die("query error =>".$mysqli->error);
  while($rs4 = $result4->fetch_object()){
    $r4[]=$rs4;
  }

?>

<?php
  include $_SERVER["DOCUMENT_ROOT"]."/inc/user/head.php";
?>

  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/myclass.css">

<?php
  include $_SERVER["DOCUMENT_ROOT"]."/inc/user/header.php";
?>
  <div class="class_container container">
    <div class="class_banner d-flex justify-content-between align-items-end">
      <div class="class_title d-flex align-items-center">
        <figure class="class_profile">
          <img src="../<?php if($rsP->profile_img != null){echo $rsP->profile_img;} else {echo 'img/noprofile.png';} ?>" alt="<?php echo $username; ?>님의 프로필 이미지">
        </figure>
        <h2><a href="myclass.php" class="title"><?php echo $username; ?> 님의 강의실</a></h2>
      </div>
      <div class="count_container d-flex justify-content-between">
        <div class="count">
          수강중인 강좌<span data-rate="<?php echo $ucrs->cnt; ?>">0</span>
        </div>
        <div class="count">
          수강완료 강좌<span data-rate="<?php echo $ccr->cnt; ?>">0</span>
        </div>
        <div class="count">
          만료 임박 강좌<span data-rate="<?php echo $ddr->cnt; ?>">0</span>
          <!-- 만료 임박 강좌<span id="bye" data-rate="1">0</span> -->
        </div>
        <div class="count">
          총 학습 시간<span data-rate="<?php echo $trs->total_hour; ?>">0</span>
        </div>
      </div>
    </div>
    <div class="class_content row">
      <aside class="col-md-2">
        <h2><a href="myclass.php" class="content-title">My 강의실</a></h2>
        <ul class="class_nav">
          <li>
            <a href="#">작성한 글</a>
          </li>
          <li>
            <a href="#">스터디</a>
          </li>
          <li>
            <a href="#">학습 통계</a>
          </li>
          <li>
            <a href="#">고객센터</a>
          </li>
          <li>
            <a href="#">설정</a>
          </li>
        </ul>
      </aside>
      <div class="myLec_wrapper col-md-10">
        <ul class="myLec_container d-flex container flex-wrap">
        <?php 
        if($r4 != null){

        foreach($r4 as $ml){
          $num = 1;
          $class = '';

          $key1 = in_array($ml->lecid, $crarr);
          $key2 = in_array($ml->lecid, $drarr);
    
          if($key2){
            $class = 'impending';
            $num = 2;
          }
          
          if($key1){
            $class = 'finish';
            $num = 0;
          }


        ?>
            <li class="myLec <?php echo $class; ?>" data-id="<?php echo $ml->lecid; ?>"  data-sort="<?php echo $num; ?>">
                    <figure class="myLec_img">
                      <img src="<?php echo $ml->thumbnail; ?>" alt="<?php echo $ml->name; ?>">
                    </figure>
                    <div class="myLec_info d-flex flex-nowrap">
                      <div class="myLec_title d-flex justify-content-between align-items-center flex-nowrap">
                        <h3 class="content-title-1"><?php echo $ml->name; ?></h3>
                        <a href="class_view.php?lecid=<?php echo $ml->lecid; ?>&c_idx=1" class="myLec_go_btn"><i class="fa-solid fa-arrow-right"></i></a>
                      </div>
                      <div class="d-flex justify-content-between flex-nowrap">
                        <em class="content-text-3"><?php echo $ml->teacher_name; ?> 강사</em>
                        <span class="content-text-3">수강률 <?php 
                          //강좌의 총 시간 합계
                          $tglecid = $ml->lecid;
                          $sql_time = "SELECT SUM(TIME_TO_SEC(time)) AS c_total_time
                          FROM lecture_class
                          WHERE lecid='".$tglecid."'";
                          $result_time = $mysqli->query($sql_time) or die ("query error =>".$mysql->error);
                          $rs_time = $result_time -> fetch_object();

                          $lec_time = $rs_time -> c_total_time;
                          $mltime = $ml -> total_time;
                          $mltime_explode = explode(':',$mltime);
                          $std = mktime(0,0,0,date('n'),date('j'),date('Y'));
                          $scd = mktime(intval($mltime_explode[0]), intval($mltime_explode[1]), intval($mltime_explode[2]));
                          $lec_total_time = intval($scd-$std);
                          $target = ($lec_total_time/$lec_time)*100;
                          $lec_progress = number_format($target, 2);
                          if($lec_progress > 99.00){
                            $lec_progress = 100.00;
                          }
                          echo $lec_progress;

                          $prgquery = "UPDATE user_lectures set progress='".$lec_progress."' where lecid='".$tglecid."'";
                          $prgresult= $mysqli -> query($prgquery) or die("query error =>".$mysqli->error);

                        ?>%</span>
                      </div>
                    </div>
                  </li>
        <?php
            }
        } else {
        ?>
                <li class="lec_empty text-center">
                  <p class="sub-title">아직 강의실이 비어 있네요 <i class="fa-regular fa-face-surprise"></i></p>
                  <div>
                    <p class="sub-title">강좌 리스트로 바로 가볼까요?</p>
                    <p><a href="../lecture/lecture_list.php"><i class="fa-solid fa-arrow-right"></i></a></p>
                  </div>
                </li>
                <?php  
                 }
            ?>

        </ul>
      </div>
    </div>
  </div>
<?php
  include $_SERVER["DOCUMENT_ROOT"]."/inc/user/footer.php";
?>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="../js/common.js"></script>
  <script src="../js/class.js"></script>
  <?php
  include $_SERVER["DOCUMENT_ROOT"]."/inc/user/tail.php";
?> 