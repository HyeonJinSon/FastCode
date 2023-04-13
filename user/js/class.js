
let numCount = $('.count_container').find('.count');

numCount.each(function(){
  let target = $(this).find('span');
  let targetNum = target.attr('data-rate');
  if(targetNum != 0){
    let num = 0;
    let timer = setInterval(function(){
      ++num;
      target.text(num);
      if(num == targetNum){
        clearInterval(timer);
      }
    },130);
  }
});

function liSort(tg, dataNm){
  tg.html(
    tg.find('li').sort(function(a,b){
      return $(b).attr(dataNm) - $(a).attr(dataNm);
    })
  );
}
liSort($('.myLec_container'), 'data-sort');


