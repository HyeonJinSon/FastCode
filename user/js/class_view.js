let contH = $("#lec_list").innerHeight();
sliding(contH);

$(".lec_btn")
  .find("a")
  .filter(":first-of-type")
  .click((e) => {
    e.preventDefault();
    $("#lec_container").toggleClass("slide");
    let tg = $("#lec_review").innerHeight();
    sliding(tg + contH);
  });

function sliding(height) {
  $("#lec_container").css({ height: `${height}px` });
}

$(".review_ok").click(function () {
  let input = $("#lecReview").val();
  let lIdx = $(this).closest("form").attr("data-lecid");

  if (input == "") {
    alert("내용을 작성해주세요!");
  } else {
    let data = {
      input: input,
      lIdx: lIdx,
    };
    $.ajax({
      async: false,
      type: "post",
      data: data,
      dataType: "json",
      url: "review_ok.php",
      success: function (data) {
        if (data.result) {
          alert("수강평이 등록되었어요. 감사합니다!");
          location.href = `class_view.php?lecid=${lIdx}`;
        } else {
          alert("수강평 등록에 실패했어요. 관리자에게 문의해 주세요.");
          location.href = `class_view.php?lecid=${lIdx}`;
          $("#lec_container").addClass("slide");
        }
      },
    });
  }
});

$(".lec_li").filter(':first-of-type').addClass('playing');

$(".lec_li").click("a", function () {
  let src = $(this).closest("li").attr("data-src");
  let name = $(this).closest("li").attr("data-name");
  let idx = $(this).closest("li").attr("data-idx");

  $("#iframe").attr("src", src);
  let text = `${idx}강  ${name}`;
  $("#lec_desc").find("h2").text(text);
  $(this).closest("li").siblings().removeClass('playing');
  $(this).closest("li").addClass('playing');
});
