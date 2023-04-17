<?php
  session_start();
  
  if(!$_SESSION['AUID']){
    echo "<script>
    alert('접근 권한이 없습니다');
    history.back();
    </script>";
  };
  $book_mark = $_SESSION['ADBOOK'];

  include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";


//BookMark List
  $sql_bookmark = "SELECT * FROM bookmark WHERE pageCode IN ({$book_mark}) ORDER BY FIELD(pageCode,{$book_mark}) LIMIT 0 , 6";
  $result_bookmark = $mysqli -> query($sql_bookmark);

  while($rs_bookmark = $result_bookmark ->fetch_object()){
    $bmk[] = $rs_bookmark;
  }
 
  
//Chart
  $sql = "SELECT X.labels,  X.data
    FROM (SELECT D.name AS 'labels',
    COUNT(*) AS 'data',
      CASE WHEN D.name = '프론트엔드' THEN 1
          WHEN D.name = '백엔드' THEN 2
          WHEN D.name = 'UX/UI' THEN 3
          WHEN D.name = '일반 디자인' THEN 4
          WHEN D.name = '기타' THEN 5
          ELSE 100
      END AS 'orderNumber'
    FROM lectures L
    JOIN category D ON L.cate_mid = D.code
    GROUP by D.name 
) X
ORDER BY orderNumber ASC";

  $result = $mysqli -> query($sql);
  while($rs = $result ->fetch_object()) {
  $data_json[] = $rs;
  $labels[] = $rs->labels;
  $data[] = $rs->data;   
  }

//Chart2
  $sql_total = "SELECT C.name, COUNT(C.name) AS 'cnt',
                CASE WHEN C.name = '프론트엔드' THEN 1
                WHEN C.name = '백엔드' THEN 2
                WHEN C.name = 'UX/UI' THEN 3
                WHEN C.name = '일반 디자인' THEN 4
                WHEN C.name = '기타' THEN 5
                ELSE 100 END AS 'orderNumber'
                FROM lectures L
                INNER JOIN user_lectures UL ON UL.lecid = L.lecid
                INNER JOIN category C ON C.code = L.cate_mid
                GROUP BY C.name
                ORDER BY orderNumber ASC";

  $result_total = $mysqli -> query($sql_total);
  while($rs_total = $result_total ->fetch_object()) {
    $totalCnt[] = $rs_total->cnt;
  }

// 신규강의
  $sql2 = "SELECT * 
  FROM lectures 
  WHERE reg_date
  BETWEEN DATE_ADD(NOW(), INTERVAL -1 WEEK) 
  AND NOW() 
  ORDER BY lecid DESC
  LIMIT 0 , 4";
  $result2 = $mysqli -> query($sql2);

  while($rs2 = $result2 ->fetch_object()) {
  $lecture_id[]=$rs2;
}

?>
  <link rel="stylesheet" href="../css/dashboard.css" />
  <script src="caleandar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<?php 
  include $_SERVER['DOCUMENT_ROOT']."/inc/common.php";
?>
</div>
<!-- 로고 및 북마크 위치 끝 -->

<section id="bookmark-menu">
  <h2 class="popup-title"><i class="fa-solid fa-bookmark"></i>즐겨찾기 메뉴</h2>
  <div class="scroll_book">
  <ul class="bookmark-list d-flex">
    <?php 
    if($book_mark != 0) {
      foreach($bmk as $b) {?>
    <li>
      <a href="../<?php echo $b->pageUrl;?>" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="<?php echo $b->iconName;?>"></i>
        <span><?php echo $b->pageName;?></span>
      </a>
    </li>
    <?php } } else { ?>
      <li class="bookmark_empty">등록된 즐겨찾기가 없습니다.</li>
    <?php } ?>
  </ul>
</div>
</section>
<div class="dashboard-data d-flex flex-wrap">
  <section id="course-data">
    <h3 class="main-menu-ft">카테고리 별 강좌 비율</h3>
    <div class="doughnut-wrap">
      <div class="chart-div">
        <!-- <canvas id="DoughnutChart" width="250px" height="250px"></canvas> -->
        <canvas id="DoughnutChart"></canvas>
        <div id='legend-div' class="legend-div"></div>
      </div>
    </div>
    <span><a href="../category/category_list.php">더보기 &#43;</a></span>
  </section>
  <section id="click-data">
    <h3 class="main-menu-ft">카테고리 별 판매량</h3>
    <div  class="chart-div2">
      <canvas id="myChart"></canvas>
    </div>
    <span><a href="#">더보기 &#43;</a></span>
  </section>
  <section id="newcourse">
    <h3 class="main-menu-ft">신규 강좌</h3>
    <ul>
    <?php 
    if(isset($lecture_id)) {
      foreach($lecture_id as $lid) {?>
      <li class="newcourse-item content-text-1">
        <a href="../lecture/lecture_view.php?lecid=<?php echo $lid->lecid; ?>"><?php echo  $lid->name;?></a>
    </li>
    <?php } } else { ?>
      <li class="newcourse-item content-text-1 lecture_empty">업데이트 된 강의가 없습니다.</li>
    <?php }?>
    </ul>
    <span><a href="../lecture/lecture_list.php">더보기 &#43;</a></span>
  </section>
  <section id="calendar-data">
    <h3 class="main-menu-ft">일정</h3>
    <div id="calendar"></div>
    <span><a href="#">더보기 &#43;</a></span>
  </section>
</div>
    
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>

<script>
  let bookmark = String(<?php echo json_encode($book_mark);?>);
  let element = caleandar(document.querySelector('#calendar'));
  let jsonArray = <?php echo json_encode($data_json);?>;
  let totalCnt = <?php echo json_encode($totalCnt);?>;
  let labelsArray = new Array();
  let dataArray = new Array();

  let i = 0;
    while(i < jsonArray.length) {
       labelsArray[i] = jsonArray[i].labels;
        i++;
    }

  let j = 0;
  while(j < jsonArray.length) {
      dataArray[j] = jsonArray[j].data;
      j++;
  }

 
//Doughnut chart.js
  window.onload = function () {
    doughnutChartDraw();
    document.getElementById("legend-div").innerHTML = window.doughnutChart.generateLegend();
  };

  let doughnutChartData = {
  labels: labelsArray,
  datasets: [{
      data: dataArray,
      backgroundColor: ["#A8DADB", "#457B9D", "#1D3557", "#E53945", "#F0FAEF"]
      }]
  };

  let doughnutChartDraw = function () {
  let ctx1 = document.getElementById("DoughnutChart").getContext("2d");

      window.doughnutChart = new Chart(ctx1, {
          type: "doughnut", 
          data: doughnutChartData,
          options: {
              responsive: true,
              legend: {
                  display: false
              },
              cutoutPercentage: 35,
              legendCallback: customLegend
          }
      });
  };

  let customLegend = function (chart) {
      let ul = document.createElement("ul");
      let color = chart.data.datasets[0].backgroundColor;

      chart.data.labels.forEach(function (label, index) {
          ul.innerHTML += `<li><span style="background-color: ${color[index]}"></span>${label}</li>`;
      });

      return ul.outerHTML;
  };

  let setLegendOnClick = function () {
  let liList = document.querySelectorAll("#legend-div ul li");

  for (let element of liList) {
      element.onclick = function () {
      updateChart(event, this.dataset.index, "doughnutChart");

      if (this.style.textDecoration.indexOf("line-through") < 0) {
          this.style.textDecoration = "line-through";
      } else {
          this.style.textDecoration = "";
      }
      }
    }
  };

  //Bar chart.js
  const ctx2 = document.getElementById("myChart");
  new Chart(ctx2, {
    type: "bar",
    data: {
      labels: labelsArray,
      datasets: [
        {
          data: totalCnt,
          backgroundColor: [
            "#FFDD67",
            "#A8DADB",
            "#EF8EB1",
            "#75B9EB",
            "#9F75E2",
          ],
          borderWidth: 1,
          barThickness: 55,
        },
      ],
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [
          {
            display: true,
            ticks: {
              beginAtZero: true,
              min: 0,
              //stepSize: 100, 증가수
              fontColor: "#161616",
              fontSize: 20
            }
          }
        ],
        xAxes: [
          {
            ticks: {
              fontColor: "#161616",
              fontSize: 20
            }
          }
        ]
      }
    }
  });


</script>
<?php
  include $_SERVER['DOCUMENT_ROOT']."/inc/foot.php";
?>