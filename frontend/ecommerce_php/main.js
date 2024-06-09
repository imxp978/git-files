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


const navbar = document.querySelector(".navbar");
const navContainer = document.querySelector('#nav-container')
window.addEventListener("scroll", () => {
  if (window.scrollY > 80 || document.documentElement.scrollTop > 80) {
    navbar.classList.add("mini");
    navContainer.classList.add('mini');
  } else {
    navbar.classList.remove("mini");
    navContainer.classList.remove('mini');
  }
});


function searchShow() {
  let searchbar = document.querySelector("#search");
  searchbar.classList.toggle("active");
}

function notice(message) {
  const notice = document.querySelector("#notice");
  const notice_p = document.querySelector('#notice-p')
  notice_p.textContent=message;
  notice.classList.add('active');
  setTimeout(() => notice.classList.remove('active'), 1000);
}

function notifyMe() {
  const notice = document.querySelector("#notifynotice");
  setTimeout(() => addClass(notice), 200);
  setTimeout(() => removeClass(notice), 1000);
}

function addClass(item) {
  item.classList.add("active");
}

function removeClass(item) {
  item.classList.remove("active");
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


function p_swiper() {
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
}

function r_swiper() {
  let reviewSwiper = new Swiper(".reviewSwiper", {
    lazy: true,
    slidesPerView: 2,
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
    breakpoints: {
      576: {
        slidesPerView: 2,
        spaceBetween: 50,
      },
      768: {
        slidesPerView: 5,
        spaceBetween: 50,
      },
    },
  });
}

window.addEventListener('DOMContentLoaded', () => {
  p_swiper();
  r_swiper();
})