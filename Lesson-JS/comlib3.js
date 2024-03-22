var name = "Chun";
var seat = rand(1, 30);
var age = rand(1, 50);
var tall = 171.5;
var student = true;
var hobby = ["走一走", "做運動", "這類的"];
var want = "弄出一些前端作品";
var score = [rand(1, 100), rand(1, 100), rand(1, 100)];
var mobile = {
  tel: "0987654321",
  os: "android",
  brand: "sony",
  size: "6.5inch",
};

function rand(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1) + min);
}

score.splice(3, 0, rand(1, 100), rand(1, 100));

let sum = 0;
for (let i = 0; i < score.length; i++) {
  sum += score[i];
}

let td_avg = document.getElementById("avg");

let average = sum / score.length;

window.onload = function () {
  for (let i = 0; i < score.length; i++) {
    let td = document.getElementById("s" + i);
    td_avg.style.backgroundColor = "gray";
    if (score[i] < 60) {
      score[i] = '<span style="color: red">' + score[i] + "*</span>";
    } else if (score[i] >= 90) {
      td.style.color = "white";
      td.style.backgroundColor = "green";
    }
  }

  // 设置座位号的背景色
  bg(seat);
};

// 设置座位号的背景色函数
function bg(seat) {
  var select = document.getElementById("s" + seat);
  select.style.backgroundColor = "orange";
  select.style.color = "white";
  select.style.fontWeight = "bolder";
}

const month = 27;
let y = Math.floor(month / 12);
let m = month % 12;
if (m >= 6) {
  y += 1;
  m -= 12;
}

var current_age = age + y;
var current_month = 6 + m;

var seat_a;
var seat_b;

if (seat < 17) {
  seat_a = Math.ceil(seat / 8);
  seat_b = seat % 8;
} else {
  seat_a = Math.ceil((seat + 1) / 8);
  seat_b = (seat + 1) % 8;
}

if (seat_b == 0) {
  seat_b = 8;
}
