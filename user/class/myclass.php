<?php
  session_start();
  include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";

  if(!isset($_SESSION['USERID'])){
    echo "<script>
      alert('로그인이 필요합니다.');
      history.back();
    </script>";
  };

  $userid = $_SESSION['USERID'];
  $username = $_SESSION['USERNAME'];

  $query4 = "SELECT my_lec from members where userid='".$userid."'";
  $result4 = $mysqli->query($query4) or die("query error =>".$mysqli->error);
  // while($rs4 = $result4->fetch_object()){
  //   $r4[]=$rs4;
  // }
  $rs4 = $result4->fetch_object();
  $rs4v = $rs4->my_lec;
  $r4 = explode(',',$rs4v);
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
          <img src="../img/profile_avatar.png" alt="">
        </figure>
        <h2><a href="myclass.php" class="title"><?php echo $username; ?> 님의 강의실</a></h2>
      </div>
      <div>
        수강중인 강좌<span>5</span>
      </div>
      <div>
        수강완료 강좌<span>4</span>
      </div>
      <div>
        Today 학습 시간<span>2.8</span>
      </div>
    </div>
    <div class="class_content row">
      <aside class="col-md-2">
        <h2><a href="myclass.php" class="sub-title">My 강의실</a></h2>
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
        <ul class="myLec_container d-flex container flex-wrap justify-content-center">
        <?php 
        if($r4){
          for($i=0;$i<=count($r4);$i++){
          $query5 = "SELECT * FROM lectures where lecid='".$r4[$i]."'";
          $result5 = $mysqli->query($query5) or die("query error =>".$mysqli->error);
          while($rs5 = $result5->fetch_object()){
            $r5[]=$rs5;
          }
          

            foreach($r5 as $ml){
        ?>
            <li class="myLec">
                    <figure class="myLec_img">
                      <img src="<?php echo $ml->thumbnail; ?>" alt="<?php echo $ml->name; ?>">
                    </figure>
                    <div class="myLec_info d-flex flex-nowrap">
                      <div class="myLec_title d-flex justify-content-between align-items-center flex-nowrap">
                        <h3 class="content-title"><?php echo $ml->name; ?></h3>
                        <a href="class_view.php?lecid=24&c_idx=1" class="myLec_go_btn"><i class="fa-solid fa-arrow-right"></i></a>
                      </div>
                      <div class="d-flex justify-content-between flex-nowrap">
                        <em class="content-text-2"><?php echo $ml->teacher_name; ?></em>
                        <span class="content-text-2">수강률 14.08%</span>
                      </div>
                    </div>
                  </li>
                <?php
                 }} }
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
  <?php
  include $_SERVER["DOCUMENT_ROOT"]."/inc/user/tail.php";
?>
