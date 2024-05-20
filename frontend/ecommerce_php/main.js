const movable = document.querySelector(".movable");

function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  return rect.bottom < 0 || rect.top + 200 >= window.innerHeight;
}

function addClassToVisibleElements() {
  const movable = document.querySelectorAll(".movable");
  movable.forEach(function (movable) {
    if (!isElementInViewport(movable)) movable.classList.add("ed");
    else movable.classList.remove("ed");
  });
}

document.addEventListener("scroll", addClassToVisibleElements);
addClassToVisibleElements();

function searchShow() {
  let searchbar = document.querySelector("#search");
  searchbar.classList.toggle("active");
}

function added() {
  const notice = document.querySelector("#cartnotice");
  setTimeout(() => addClass(notice), 200);
  setTimeout(() => removeClass(notice), 1000);
}

function notifyMe() {
  const notice = document.querySelector("#notifynotice");
  setTimeout(() => addClass(notice), 200);
  setTimeout(() => removeClass(notice), 1000);
}

function addClass(item) {
  item.classList.add('active');
}

function removeClass(item) {
  item.classList.remove('active');
}

function btn_confirmLink(message, url) {
  if (message == "" || url == "") {
    return false;
  }
  if (confirm(message)) {
    window.location = url;
  }
  return false;
}

function addcart(p_id) {
  let qty = $("#quantity").val();
  if (qty <= 0) {
    alert("數量不能為零或負數 懂嗎?");
    return false;
  }
  if (qty == undefined) {
    qty = 1;
  } else if (qty >= 50) {
    alert("數量限制50內");
    return false;
  }

  // 利用jquery $.ajax函數呼叫後台的addcart.php
  $.ajax({
    url: "addcart.php",
    type: "get",
    dataType: "json",
    data: {
      p_id: p_id,
      qty: qty
    },
    success: function(data) {
      if (data.c == true) {
        alert(data.m);
      }
    },
    error: function(data) {
      alert("後臺壞了");
    },
  });

  // prompt
  added();
}

const swiper = new Swiper('.swiper', {
  speed: 400,
  spaceBetween: 100,
});


