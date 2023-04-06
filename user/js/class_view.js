
let contH = $('#lec_list').innerHeight();
sliding(contH);

$('.lec_btn').find('a').filter(':first-of-type').click((e)=>{
  e.preventDefault();
  $('#lec_container').toggleClass('slide'); 
  let tg = $('#lec_review').innerHeight();
  sliding(tg+contH);
})


function sliding(height){
  $('#lec_container').css({height:`${height}px`});
}

$('#lec_li').find('a').click(()=>{
  $(this).parent('#lec_li').siblings().removeClass('playing');
  $(this).parent('#lec_li').addClass('playing');
  // location.href() = 'http://fastcode.dothome.co.kr/user/class/class_view.php?lecid=25&c_idx=5';
});