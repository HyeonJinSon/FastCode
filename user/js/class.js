
let numCount = $('.class_banner .count');

numCount.each(function(){
  if(targetNum != 0){
    let target = $(this).find('span');
    let targetNum = target.attr('data-rate');
    let num = 0;
    let timer = setInterval(function(){
      ++num;
      target.text(num);
      if(num == targetNum){
        clearInterval(timer);
      }
    },120);
  }
});


if($('.myLec').hasClass('lec_disabled')){
      $(this).attr('data-sort', 1);
}
function liSort(tg, dataNm){
  tg.html(
    tg.find('li').sort(function(a,b){
      return $(a).attr(dataNm) - $(b).attr(dataNm);
    })
  );
}
liSort($('.myLec_container'), 'data-sort');


