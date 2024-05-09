var name = 'Chun';
var seat = rand(1,30);
var age = rand(1,50);
var tall = 171.5;
var student = true;
var hobby = ["走一走", "做運動", "這類的"];
var want = "弄出一些前端作品";
var score = [70, 80, 90];
var mobile = {
    tel: "0987654321",
    os: "android",
    brand: "sony",
    size: "6.5inch",
}


function rand(min, max) {
    //Math.random() 產生0~1之間的隨機亂數
    //Math.floor() 無條件捨去後的整數 eq. 12.9 > 12
    //Math.ceil() 無條件進位後的整數 eq. 1.03 > 2

    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random( ) * (max - min + 1) + min);

}

const month = 27;
let y = Math.floor(month / 12)
let m = month % 12
if (m >= 6) {
    y += 1; 
    m -= 12;
} 

let current_age = age + y;
let current_month = 6 + m;

let arrangement = 10;

if (seat === 17) {
    // let seat_a = 4;
    // let seat_b = 8;

    const seat1 = 32;
    let seat_a = Math.ceil((seat1) / arrangement);
    let seat_b = (seat1) % arrangement;

} else {
    seat_a = Math.ceil((seat) / arrangement);
    seat_b = (seat) % arrangement;
}

if (seat_b == 0) {
    seat_b = arrangement;
}

function bg(seat) {
    let select = document.getElementById(seat);
    select.style.backgroundColor = 'orange';
    select.style.color = 'white';
    select.style.fontWeight = 'bolder';
    select.innerHTML = seat;
}

window.onload = function () {
    bg(seat);
}

