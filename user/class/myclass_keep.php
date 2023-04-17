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

  $queryP = "SELECT profile_img from members where userid='".$userid."'";
  $resultP = $mysqli->query($queryP) or die ("query error =>".$mysql->error);
  $rsP = $resultP->fetch_object();


  $query4 = "SELECT my_lec from members where userid='".$userid."'";
  $result4 = $mysqli->query($query4) or die("query error =>".$mysqli->error);
  // while($rs4 = $result4->fetch_object()){
  //   $r4[]=$rs4;
  // }
  $rs4 = $result4->fetch_object();
  $rs4v = $rs4->my_lec;
  if($rs4v != null){
    $r4 = explode(',',$rs4v);
  } else {
    $r4 = null;
  }
 

  $h = 100.00;
  // $f = (int)$h;
  $where = 'and progress='.$h.' and userid='.$userid;


  $query6 = "SELECT * from user_lectures where 1=1 ".$where."";
  $result6 = $mysqli->query($query6) or die("query error =>".$mysqli->error);
  $rs6 = $result6->fetch_array();
  if(!$rs6){
    $rs6 = null;
  }
  $ongoing = count($rs4) - count($rs6);
  $ongoing = (int)$ongoing;

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
          <img src="../<?php echo $rsP->profile_img; ?>" alt="<?php echo $username; ?>님의 프로필 이미지">
        </figure>
        <h2><a href="myclass.php" class="title"><?php echo $username; ?> 님의 강의실</a></h2>
      </div>
      <div>
        수강중인 강좌<span data-rate="<?php echo $ongoing; ?>">0</span>
      </div>
      <div>
        수강완료 강좌<span data-rate="<?php echo count($rs6); ?>">0</span>
      </div>
      <div>
        Today 학습 시간<span data-rate="6">0</span>
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
          for($i=0;$i<=count($r4);$i++){
          // $con1 = 'and ul.userid='.$userid;
          $query5 = "SELECT * FROM lectures where lecid='".$r4[$i]."'";
          // $query5 = "SELECT l.lecid, l.teacher_name, l.name, l.thumbnail, ul.lecid, ul.progress, ul.userid
          // FROM user_lectures ul
          // JOIN lectures l
          // on ul.lecid = l.lecid
          // where ul.lecid='".$r4[$i]."'".$con1."'";
          $result5 = $mysqli->query($query5) or die("query error =>".$mysqli->error);
          while($rs5 = $result5->fetch_object()){
            $r5[]=$rs5;
          }
        }
        
        foreach($r5 as $ml){
          $tg = $ml->lecid;
          $query7 = "SELECT progress FROM user_lectures where lecid='".$tg."'";
          $result7 = $mysqli->query($query7) or die("query error =>".$mysqli->error);
          $rs7 = $result7->fetch_object();
          ?>
            <li class="myLec">
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
                        <span class="content-text-3">수강률 <?php echo $rs7->progress; ?>%</span>
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
