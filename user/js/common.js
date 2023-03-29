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
