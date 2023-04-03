$(function () {
    $("#tabs").tabs();
});

var swiper = new Swiper(".mySwiper", {
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
});

var lecture_swiper = new Swiper(".lectureSwiper", {
    slidesPerView: 4,
    spaceBetween: 35,
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