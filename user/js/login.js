// typo effect
let $text = document.querySelector(".keyword");
let letters = [ "빠르게", "쉽게", "재밌게" ];
// speed text
let speed = 150;
let i = 0;
// typing
let typing = async function(){  
  let letter = letters[i].split("");
  while (letter.length) {
    await wait(speed);
    $text.innerHTML += letter.shift(); 
  }
  await wait(1500);
  remove();
}
// remove text
let remove = async function(){  
  let letter = letters[i].split("");
  while (letter.length) {
    await wait(speed);
    letter.pop();
    $text.innerHTML = letter.join(""); 
  }
  i = !letters[i+1] ? 0 : i + 1;
  typing();
}
// delay
function wait(ms) {
  return new Promise(res => setTimeout(res, ms))
}
// typo effect 실행
setTimeout(typing, 1800);