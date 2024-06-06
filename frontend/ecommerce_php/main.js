console.log('main.js is loaded');

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
  // setTimeout(() => addClass(notice), 200);
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


function addcart(p_id) {
  // let qty = document.querySelector('#quantity').value;
  let qty = document.querySelector(".quantity").value;
  // let qty = parseInt(document.querySelector('#quantity2').textContent);
  // console.log('qty is: '+qty)

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
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Fetch success response:", data);
      if (data.c == true) {
        // added();
        // alert(data.m);
        // prompt
        added();
        setTimeout(() => {
          window.location.reload();
        }, 1000);
      }
    })
    .catch((error) => {
      console.log("Fetch error response:", error);
      alert("Failed to Add Product, Contact Customer Support!");
    });
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


document.querySelectorAll(".quantity").forEach((input) => {
  input.addEventListener("change", function () {
    var qty = this.value;
    const cartid = this.getAttribute("cartid");
    if (qty <= 0 || qty >= 50) {
      alert("數量需大於0 且小於50");
      return false;
    }

    fetch("change_qty.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: new URLSearchParams({
        cartid: cartid,
        qty: qty,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.c == true) {
          // alert(data.m)
          window.location.reload();
        } else {
          alert(data.m);
        }
      })
      .catch((error) => {
        alert("DB is down!");
      });
  });
});

let qty = document.querySelector(".quantity");

function minus() {
  const minus_btn = document.querySelector("#minus_btn");
  if (minus_btn) {
    minus_btn.addEventListener("click", function () {
      if (qty.value > 1) {
        qty.value--;
      } else {
        qty.value = 1;
      }
    });
  }
}

function plus() {
  // console.log(qty);
  const plus_btn = document.querySelector("#plus_btn");
  if (plus_btn) {
    plus_btn.addEventListener("click", function () {
      qty.value++;
    });
  }
}


// function login() {
//   // document.addEventListener('DOMContentLoaded', function() {
//   document.querySelector("#login_btn").addEventListener("click", function () {
//     // event.preventDefault(); // 防止表单默认提交

//     const inputAccount = document.querySelector("#inputAccount").value;
//     const inputPassword = document.querySelector("#inputPassword").value;
//     const loading = document.querySelector("#loading");
//     loading.style.display = "block";

//     fetch("auth_user.php", {
//       method: "POST",
//       headers: {
//         "Content-Type": "application/x-www-form-urlencoded",
//       },
//       body: new URLSearchParams({
//         inputAccount: inputAccount,
//         inputPassword: inputPassword,
//       }),
//     })
//       .then((response) => response.json())
//       .then((data) => {
//         if (data.c === true) {
//           // alert(data.m);
//           window.location.href = "<?php echo $sPath; ?>";
//         } else {
//           // alert(data.m);
//           if (data.c == 1) {
//             window.location.reload();
//           }
//         }
//       })
//       .catch((error) => {
//         // console.log(error);
//         alert("cant access, db is down");
//       })
//       .finally(() => {
//         loading.style.display = "none";
//       });
//   });
  // });
// }

function logout() {
  document.querySelector("#logout_btn").addEventListener("click", function () {
    console.log("this");
    window.location.href = "logout.php";
  });
}

 function checkpw2(){
  const pw1=document.querySelector('#pw1');
  const pw2=document.querySelector('#pw2');
  if (pw2.value != pw1.value) {
    alert('Passwords dont match');
    return false;
  }
 };


document.addEventListener("DOMContentLoaded", function () {
  console.log("DOMContentLoaded event fired");
  // login();
  // checkpw2();
  plus();
  minus();
});

console.log('main.js running');
