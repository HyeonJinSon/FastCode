 // header
 let lastScrollTop = 0;
 let headerHeight = $("header").innerHeight();
	$(window).scroll(function () {
	let scrollTop = $(this).scrollTop();
	// Math.abs: 주어진 숫자의 절대값을 반환
	if (Math.abs(lastScrollTop - scrollTop) <= headerHeight) return;
	if (scrollTop > lastScrollTop && lastScrollTop > headerHeight) {
		$("header").css({ top: "-90px" });
	} else {
		$("header").css({ top: "0px" });
	}
	lastScrollTop = scrollTop;
}); 

 // top btn
 $(window).scroll(function () {
		if ($(this).scrollTop() > 250) {
			$('.top-btn').fadeIn(100);
		} else {
			$('.top-btn').fadeOut(400);
		}
	});

	$('.top-btn').click(function (e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: 0 ,behavior:'smooth'}, 300);
	});
