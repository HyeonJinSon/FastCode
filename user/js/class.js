
let contH = $('#lec_list').outerHeight();
sliding(contH);

$('.lec_btn').find('a').filter(':first-of-type').click((e)=>{
  e.preventDefault();
  $('#lec_container').toggleClass('slide'); 
  let tg = $('#lec_review').innerHeight() - 50;
  sliding(tg+contH);
});


function sliding(height){
  $('#lec_container').css({height:`${height}px`});
}

