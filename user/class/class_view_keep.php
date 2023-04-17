<?php
  session_start();
  ini_set('display_errors',1);
  include $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
  
  $userid = $_SESSION['USERID'];
  $username = $_SESSION['USERNAME'];

  if(!$userid){
    alert('로그인이 필요합니다.');
    exit;
  } 

  $lecid = $_GET['lecid'];
  $c_idx = $_GET['c_idx'];


  // $query1 = "SELECT * FROM lectures where lecid='".$lecid."'";
  $query1 = "SELECT l.lecid, l.teacher_name, l.name, c.c_idx, c.class_name, c.class_url
    FROM lectures l
    JOIN lecture_class c
    ON l.lecid = c.lecid
    where l.lecid='".$lecid."'";
  $result1 = $mysqli->query($query1) or die("query error =>".$mysqli->error);
  // while($rs1 = $result1->fetch_object()){
  //   $r1[]=$rs1;
  // }
  $r1 = $result1->fetch_object();
?>

<?php
  include $_SERVER["DOCUMENT_ROOT"]."/inc/user/head.php";
?>
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/class_view.css">

<?php
  include $_SERVER["DOCUMENT_ROOT"]."/inc/user/header.php";
?>

  <div class="container text-center class_view">
    <iframe width="1120" height="630" src="<?php echo $r1 -> class_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <div id="lec_desc">
      <h2 class="title"><?php echo $c_idx; ?>강 <?php echo $r1 -> class_name; ?></h2>
      <h3 class="content-text-2"><?php echo $r1 -> teacher_name; ?> 강사</h3>
    </div>
    <div class="lec_btn d-flex justify-content-end">
      <a href="#" class="y-btn small-btn">수강평 보기</a>
      <a href="myclass.php" class="y-btn small-btn">강의실</a>
    </div>
    <div id="lec_container">
      <div id="lec_review">
        <div class="review_title">
          <h2 class="title">강좌 수강평</h2>
          <a href="#"><i class="fa-solid fa-plus"></i> 더 보러가기</a>
        </div>
        <form action="review_ok.php?lecid=<?php echo $lecid; ?>" method="post">
          <input type="text" name="lecReview" id="lecReview">
          <label for="lecReview">수강평을 남겨 주세요</label>
          <button type="submit" class="review_ok"><i class="fa-solid fa-check"></i></button>
        </form>
        <ul>
        <?php
          $query3 = "SELECT * from lec_review where lecid='".$lecid."' order by rvid desc limit 0,3";
          $result3 = $mysqli->query($query3) or die("query error =>".$mysqli->error);
          while($rs3 = $result3->fetch_object()){
            $r3[]=$rs3;
          }
          if($r3){
            foreach($r3 as $rv){
        ?>
          <li class="d-flex align-items-center justify-content-between">
            <p class="content-text-2"><?php echo $rv->content; ?></p>
            <span class="content-text-3"><?php echo $rv->username; ?></span>
          </li>
        <?php }
      } else { ?>
            <li class="d-flex align-items-center justify-content-between rv_empty">
            <p class="content-text-2">아직 등록된 수강평이 없네요!</p>
          </li>
      <?php } ?>
        </ul>
      </div>
      <div id="lec_list">
        <h2 class="title"><?php echo $r1 -> name; ?></h2>

        <ul>
        <?php
          $query2 = "SELECT * FROM lecture_class where lecid=".$lecid." order by c_idx asc";
          $result2 = $mysqli->query($query2);
          while($rs2=$result2->fetch_object()){
            $r2[]=$rs2;
          }
        ?>
        <?php
          foreach($r2 as $c){
        ?>
            
              <li id="lec_li" class="d-flex align-items-center">
                  <figure>
                    <a href="class_view_c.php?lecid=<?php echo $lecid; ?>&c_idx=<?php echo $c->c_idx; ?>" data-src="<?php echo $c->class_url; ?>" data-name="<?php echo $c->class_name; ?>"><img src="<?php echo $c->c_thumbnail; ?>" alt="<?php echo $c->class_name; ?>" data-idx="<?php echo $c_idx; ?>"></a>
                  </figure>
                <div class="lec_info_box d-flex align-items-center justify-content-between">
                  <div class="c_title d-flex align-items-start">
                    <a href="class_view_c.php?lecid=<?php echo $lecid; ?>&c_idx=<?php echo $c->c_idx; ?>" data-src="<?php echo $c->class_url; ?>" data-name="<?php echo $c->class_name; ?>" data-idx="<?php echo $c_idx; ?>">  
                      <h3 class="content-title"><?php echo $c->class_name; ?></h3>
                    </a>
                    <p class="c_desc"><?php echo $c->c_desc; ?></p>
                  </div>  
                  <span class="content-text-2"><?php echo $c->time; ?></span>
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
  <script src="../js/class_view.js"></script>
<?php
  include $_SERVER["DOCUMENT_ROOT"]."/inc/user/tail.php";
?>
