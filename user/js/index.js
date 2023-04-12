$('.no_link').click(function(e) {
	e.preventDefault();		
});
$('.cate_search').click(function(e) {
	e.preventDefault();	

    let searchCate = $(this).attr('data-cate');
    console.log(searchCate);

    $('#search_cate').val(searchCate);
    $('#cate_search').submit();

});

$("#tabs").tabs();


function bannerPlugin({ swiper, extendParams, on }) {
    on('slideChange', () => {
        if (!swiper.params.debugger) return;
        $('.swiper-slide').eq(swiper.previousIndex).find('img').removeClass('active');
        $('.swiper-slide').eq(swiper.activeIndex).find('img').addClass('active');
        $('.swiper-slide').eq(swiper.previousIndex).find('.banner_text').removeClass('active');
        $('.swiper-slide').eq(swiper.activeIndex).find('.banner_text').addClass('active');
      });
}

var swiper = new Swiper(".bannerSwiper", {
    modules: [bannerPlugin],
    slidesPerView: 1,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".banner-next",
        prevEl: ".banner-prev",
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },
    debugger: true,
});



var lecture_swiper = new Swiper(".lectureSwiper", {
    slidesPerView: 4,
    spaceBetween: 0,
    navigation: {
        nextEl: ".lecture-next",
        prevEl: ".lecture-prev",
    },
    autoplay: {
        delay: 4500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },
});


