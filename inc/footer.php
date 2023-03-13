</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
let menu = $('.accordion-item'); //메인메뉴
let menus = $('.accordion-body li a'); //메인메뉴
let currentUrl = location.href; //현재 주소확인
let currentUrl2 = currentUrl.split('/');//주소 배열 나눠줌

//서브메뉴 마다할일
  menus.each(function(){
    let submenuUrl = $(this).attr('href'); //주소 확인
    let targetUrl = submenuUrl.replace('../','');
    let targetUrl2 = targetUrl.split('/'); //주소 배열 나눠줌
      if(currentUrl2[4]===targetUrl2[0]){ //배열중 폴더명이 같은 것 찾아줌
      //모든 메인메뉴 접는다.
        menu.find('.accordion-button').attr('aria-expanded', 'false');
        menu.find('.accordion-button').addClass('collapsed');
      //서브메뉴의 가까운 메뉴를 연다
      $(this).closest('.accordion-item').find('.accordion-button').attr('aria-expanded', 'true');
      $(this).closest('.accordion-item').find('.accordion-button').removeClass('collapsed');
      $(this).closest('.accordion-collapse').addClass('show');
      $(this).css('color','#e53945');
    };
  // }
  });

</script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      new SimpleBar(document.querySelector("[data-simplebar]"));
    });
  </script>