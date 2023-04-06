const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

/*
function check_pw() {
    let pw = document.getElementById("passwd").value;
    let pw2 = document.getElementById("passwd_ok").value;
    let check = document.getElementById("check");

    if (pw != "" && pw2 != "") {
        if (pw == pw2) {
            check.innerHTML = "비밀번호가 일치합니다.";
            check.style.color = "blue";
        } else {
            check.innerHTML = "비밀번호가 일치하지 않습니다.";
            check.style.color = "red";
        }
    }
}
*/
function check_ability(){
    let range_input = document.getElementById("ability_range").value;
    let range_val = document.getElementById("range");
    
    if(range_input == 0){
        range_val.innerHTML = "이 분야는 처음이예요!";
    }else if(range_input == 1){
        range_val.innerHTML = "코딩의 세계에 입문했습니다.";
    }else if(range_input == 2){
        range_val.innerHTML = "html과 css 정도는 기본이죠!";
    }else if(range_input == 3){
        range_val.innerHTML = "중급자입니다. 숙련도를 올리고 싶어요!";
    }else if(range_input == 4){
        range_val.innerHTML = "마스터가 되는 것이 목표입니다.";
    }else if(range_input == 5){
        range_val.innerHTML = "잘한다고 자랑할 수 있는 정도의 수준";
    }
}
    
$("#total-agree").click(function() {
    if ($("#total-agree").prop("checked")) {
    $(".autocheck").prop("checked", true)
    } else {
    $(".autocheck").prop("checked", false)
    }
})

$('#modal_use_agree').click(function(){
    $("#use_agree").prop("checked", true);
})
$('#modal_personalinfo_agree').click(function(){
    $("#personalinfo_agree").prop("checked", true);
})
$('#modal_marketing_agree').click(function(){
    $("#marketing_agree").prop("checked", true);
})

function noblank (){
    if($('input') !== ''){
        $('input').removeClass('warning');
    }
    let pw = document.getElementById("passwd").value;
    let pw2 = document.getElementById("passwd_ok").value;
    let pw2input = document.getElementById("passwd_ok");
    let check = document.getElementById("check");

    if (pw != "" && pw2 != "") {
        if (pw == pw2) {
            check.innerHTML = "비밀번호가 일치합니다.";
            check.style.color = "blue";
        } else {
            check.innerHTML = "비밀번호가 일치하지 않습니다.";
            check.style.color = "red";
            pw2input.classList.add('warning');
        }
    }
}

$('#signup').click(function(){
    let username = $('#username').val();
    let userid = $('#userid').val();
    let pw = $("#passwd").val();
    let pw2 = $("#passwd_ok").val();
    let use_agree = $('#use_agree').is(':checked');
    let personalinfo_agree = $('#personalinfo_agree').is(':checked');
// alert(use_agree.is(':checked'));
   
    // $('form').addClass('was-validated');

    if(username == ""){
        alert('이름을 입력해주세요.');
        $('#username').addClass('warning');
        $('html, body').animate({ scrollTop: 0 ,behavior:'smooth'}, 300);
    }else if(userid == ""){
        alert('아이디을 입력해주세요.');
        $('#userid').addClass('warning');
        $('html, body').animate({ scrollTop: 0 ,behavior:'smooth'}, 300);
    }else if(pw == ""){
        alert('비밀번호를 입력해주세요.');
        $("#passwd").addClass('warning');
        $('html, body').animate({ scrollTop: 0 ,behavior:'smooth'}, 300);
    }else if(pw2 == ""){
        alert('비밀번호를 한번 더 입력해주세요.');
        $("#passwd_ok").addClass('warning');
        $('html, body').animate({ scrollTop: 0 ,behavior:'smooth'}, 300);
    }else if(use_agree == false){
        alert('필수 이용약관에 동의해주세요.');
        $('#use_agree').addClass('warning');
    }else if(personalinfo_agree == false){
        alert('필수 이용약관에 동의해주세요.');
        $('#personalinfo_agree').addClass('warning');
    }else{

        var data={
            username : username,
            userid : userid
        }
        $.ajax({
            async:false,
            type:'post',
            url:'signup_check.php',
            data:data,
            dataType:'json',
            success : function(result){
                if(result.cnt>0){
                    alert('이미 가입된 회원입니다. 다시 확인해주세요.');
                } else{
                    $('form').submit();
                }
            }
        })
    }

});

// 타이포 효과
const $text = document.querySelector(".keyword");

const letters = [
  "빠르게",
  "쉽게", 
  "재밌게"
];

// 글자 입력 속도
const speed = 150;
let i = 0;

// 타이핑 효과
const typing = async () => {  
  const letter = letters[i].split("");
  while (letter.length) {
    await wait(speed);
    $text.innerHTML += letter.shift(); 
  }
  
  // 잠시 대기
  await wait(1500);
  // 지우는 효과
  remove();
}

// 글자 지우는 효과
const remove = async () => {
  const letter = letters[i].split("");
  while (letter.length) {
    await wait(speed);
    letter.pop();
    $text.innerHTML = letter.join(""); 
  }
  
  // 다음 순서의 글자로 지정, 타이핑 함수 다시 실행
  i = !letters[i+1] ? 0 : i + 1;
  typing();
}

// 딜레이 기능 ( 마이크로초 )
function wait(ms) {
  return new Promise(res => setTimeout(res, ms))
}

// 초기 실행
setTimeout(typing, 1800);