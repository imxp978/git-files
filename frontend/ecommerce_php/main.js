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
  // let qty = document.querySelector('#quantity').value;
  let qty = document.querySelector('.quantity').value;
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
    method: 'GET',
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
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
  .catch(error => {
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
})

document.querySelectorAll(".quantity").forEach(input => {
  input.addEventListener("change", function() {
      var qty = this.value;
      const cartid = this.getAttribute("cartid");
      if (qty <= 0 || qty >= 50) {
          alert('數量需大於0 且小於50');
          return false;
      }

      fetch('change_qty.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: new URLSearchParams({
              'cartid': cartid,
              'qty': qty
          })
      })
      .then(response => response.json())
      .then(data => {
          if (data.c == true) {
              // alert(data.m)
              window.location.reload();
          } else {
              alert(data.m);
          }
      })
      .catch(error => {
          alert("DB is down!");
      });
  });
});


let qty = document.querySelector('.quantity');

function minus() {
  
  if (qty.value > 1) {
    qty.value--; 
    throw new error('hi, this is a error');
  } else {
    qty.value = 1;
    
  }};

function plus() {
  // console.log(qty);
  qty.value++;
}

// login 
// document.addEventListener('DOMContentLoaded', function() {
  document.querySelector('#login_btn').addEventListener('click', function(event) {
      // event.preventDefault(); // 防止表单默认提交

      const inputAccount = document.querySelector('#inputAccount').value;
      const inputPassword = document.querySelector('#inputPassword').value;
      // const loading = document.getElementById('loading');
      // loading.style.display = 'block';

      fetch('auth_user.php', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
              },
              body: new URLSearchParams({
                  inputAccount: inputAccount,
                  inputPassword: inputPassword
              })
          })
          .then(response => response.json())
          .then(data => {
              if (data.c === true) {
                  alert(data.m);
                  window.location.href = "<?php echo $sPath; ?>";
              } else {
                  alert(data.m);
                  if (data.c == 1) {
                    window.location.reload();
                  }
              }
          })
          .catch(error => {
            // console.log(error);
              alert('cant access, db is down');
          })
          // .finally(() => {
          //     loading.style.display = 'none';
          // });
  });
// });