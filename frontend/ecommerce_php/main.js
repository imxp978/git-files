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
  // setTimeout(() => addClass(notice), 200);
  addClass(notice);
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
  let qty = document.querySelector('#quantity').value;
  // let qty = parseInt(document.querySelector('#quantity2').textContent);
  
  console.log('qty is: '+qty)

  if (qty <= 0) {
    alert("數量不能為零或負數 懂嗎?");
    return false;
  } else if (qty === undefined || qty === "") {
    qty = 1;
  } else if (qty >= 50) {
    alert("數量限制50內");
    return false;
  } 

  // 利用 fetch 函數呼叫後台的 addcart.php
  fetch(`addcart.php?p_id=${p_id}&qty=${qty}`, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    console.log("Fetch success response:", data);  
    if (data.c == true) {
      added();
      // alert(data.m);
    }
  })
  .catch(error => {
    console.log("Fetch error response:", error);  
    alert("Failed to Add Product, Contact Customer Support!");
  });

  // prompt
  added();
}

let productSwiper = new Swiper(".productSwiper", {
  lazy: true,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

let reviewSwiper = new Swiper(".reviewSwiper", {
  lazy: true, 
  slidesPerView: 5,
  spaceBetween: 50,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
})
