<?php
  session_start();
  if(!$_SESSION['AUID']){
    echo "<script>
            alert('접근 권한이 없습니다');
            history.back();
        </script>";
  };
  include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";
 
 //Chart
  $sql = "SELECT D.name AS 'labels',
  COUNT(*) AS 'data'
  FROM lectures L
  JOIN category D ON L.cate_mid = D.code
  GROUP by D.name ";
  $result = $mysqli -> query($sql);

  
  while($rs = $result ->fetch_object()) {
  $data_json[] = $rs;
  $labels[] = $rs->labels;
  $data[] = $rs->data;   

}


// 신규강의
  $sql2 = "SELECT * 
  FROM lectures 
  WHERE reg_date
  BETWEEN DATE_ADD(NOW(), INTERVAL -1 WEEK)
  AND NOW() 
  ORDER BY lecid 
  DESC limit 0 , 4";
  $result2 = $mysqli -> query($sql2);

  while($rs2 = $result2 ->fetch_object()) {
  $lecname[]=$rs2;
}

?>
  <link rel="stylesheet" href="../css/dashboard.css" />
  <script type="text/javascript" src="caleandar.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.3/dist/simplebar.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/simplebar@5.3.3/dist/simplebar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  
<?php 
  include $_SERVER['DOCUMENT_ROOT']."/inc/common.php";
?>
<body> 
<section id="bookmark-menu">
  <h2 class="popup-title"><i class="fa-solid fa-bookmark"></i>즐겨찾기 메뉴</h2>
  <ul class="bookmark-list d-flex flex-wrap">
    <li>
      <a href="../lecture/lecture_list.php" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fa-solid fa-school"></i>
        <span>강좌리스트</span>
      </a>
    </li>
    <li>
      <a href="../category/category_list.php" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fa-solid fa-list-check"></i>
        <span>카테고리 리스트</span>
      </a>
    </li>
    <li>
      <a href="../board/board_list.html" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fas fa-bullhorn"></i>
        <span>공지사항</span>
      </a>
    </li>
    <li>
      <a href="../coupon/coupon_llist.php" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fa-solid fa-ticket"></i>
        <span>쿠폰 리스트</span>
      </a>
    </li>
    <li>
      <a href="../category/category.php" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fa-solid fa-list-check category-add"></i>
        <span>카테고리 추가</span>
      </a>
    </li>
    <li>
      <a href="../lecture/lecture_up.php" class="bookmark-item d-flex flex-column justify-content-center">
        <i class="fa-solid fa-school lecture-add"></i>
        <span>강좌 추가</span>
      </a>
    </li>
  </ul>
</section>
<div class="dashboard-data d-flex flex-wrap">
  <section id="course-data">
    <h3 class="main-menu-ft">카테고리 별 강좌 비율</h3>
    <div class="doughnut-wrap">
      <div class="chart-div">
        <canvas id="DoughnutChart" width="300px" height="300px"></canvas>
        <div id='legend-div' class="legend-div"></div>
      </div>
    </div>
    <span><a href="#">더보기 &#43;</a></span>
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
    <?php foreach($lecname as $lid) {?>
      <li class="newcourse-item content-text-1"><?php echo  $lid->name;?></li>
    <?php } ?>
      <!-- <li class="newcourse-item content-text-1">PHP 개발 환경 구축하기</li>
      <li class="newcourse-item content-text-1">Figma 컴포넌트 활용하기</li>
      <li class="newcourse-item content-text-1">Javascript와 JQuery 응용</li> -->
    </ul>
    <span><a href="../lecture/lecture_list.php">더보기 &#43;</a></span>
  </section>
  <section id="calendar-data">
    <h3 class="main-menu-ft">일정</h3>
    <div id="calendar"></div>
    <span><a href="#">더보기 &#43;</a></span>
  </section>
</div>

<script>
  //달력 caleandar.js 
  // https://github.com/jackducasse/caleandar
  let element = caleandar(document.querySelector('#calendar'));
  // caleandar(element, events, settings);
  // 이벤트 넣을때 사용하면 될.. 함수?


  let jsonArray = <?php echo json_encode($data_json);?>;
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
  
//도넛차트
  window.onload = function () {
    doughnutChartDraw();
    document.getElementById("legend-div").innerHTML = window.doughnutChart.generateLegend();
  };

  let doughnutChartData = {
  labels: labelsArray,
  // labels: ["프론트엔드", "벡엔드", "소스제작", "UI/UX 디자인  ", "기타"],
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
              responsive: false,
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

  //막대차트
  const ctx2 = document.getElementById("myChart");
  // Chart.defaults.scales.linear.min = 0;
  new Chart(ctx2, {
    type: "bar",
    data: {
      labels: [
        "벡엔드",
        "프론트엔드",
        "소스제작",
        "UI/UX 디자인",
        "기타",
      ],
      datasets: [
        {
          data: [208, 284, 162, 347, 176],
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
              // max: 18,
              min: 0,
              stepSize: 100, //증가수
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
