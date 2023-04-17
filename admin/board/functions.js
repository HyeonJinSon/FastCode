/* =============== 삭제하기 ================ */

function delAjax($idx, $url, $destination) {
  let data = {
    idx: $idx,
  };

  $.ajax({
    async: false,
    type: "post",
    url: $url,
    data: data,
    dataType: "json",
    error: function () {
      alert("error");
    },
    success: function (result) {
      if (result.result == true) {
        alert("삭제되었습니다.");
        location.href = $destination;
      }
    },
  });
}

/* ============= //0311 윤희 ============== */
