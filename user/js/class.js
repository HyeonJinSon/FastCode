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
