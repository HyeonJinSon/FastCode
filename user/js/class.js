let num2 = 0;
$('.myLec').each(function(){
  let date = new Date();
  let year = date.getFullYear();
  let month = date.getMonth()+1;
  let day = date.getDate();
    if ((day+"").length < 2) {
        day = "0" + day;
    }
    if ((month+"").length < 2) {
      month = "0" + month;
    }
    let getToday = year+"-"+month+"-"+day; // 오늘 날짜 (2017-02-07)
    console.log(getToday);
    if($(this).attr('data-prg') == '100.00' || $(this).attr('data-date') < getToday){
      $(this).addClass('lec_disabled');
    }

    if($(this).hasClass('lec_disabled')){
      ++num2;
    }
  });
$('#bye').attr('data-rate',num2);

let num1 = $('#ing').attr('data-tg') - num2;
$('#ing').attr('data-rate',num1);


let span = $('.class_banner').find('div').find('span');
  span.each(function(){
    let targetNum = $(this).attr('data-rate');
    let num = 0;
    let animation = setInterval(()=>{
      $(this).text(++num);
      if(num == targetNum){
        clearInterval(animation);
      }
    },100);
  });
