// typo effect
let $text = document.querySelector(".keyword");
let letters = [ "빠르게", "쉽게", "재밌게" ];
// speed text
let speed = 150;
let i = 0;
// typing
let typing = async () => {  
  let letter = letters[i].split("");
  while (letter.length) {
    await wait(speed);
    $text.innerHTML += letter.shift(); 
  }
  // 잠시 대기, 지우기 함수 실행
  await wait(1500);
  remove();
}
// remove text
let remove = async () => {
  let letter = letters[i].split("");
  while (letter.length) {
    await wait(speed);
    letter.pop();
    $text.innerHTML = letter.join(""); 
  }
  // 다음 글자, 타이핑 함수 실행
  i = !letters[i+1] ? 0 : i + 1;
  typing();
}
// 딜레이
function wait(ms) {
  return new Promise(res => setTimeout(res, ms))
}
// typo effect 실행
setTimeout(typing, 1800);