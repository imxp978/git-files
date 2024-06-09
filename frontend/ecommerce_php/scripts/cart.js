function minus() {
  let qty = document.querySelector(".quantity");
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
  let qty = document.querySelector(".quantity");
  const plus_btn = document.querySelector("#plus_btn");
  if (plus_btn) {
    plus_btn.addEventListener("click", function () {
      qty.value++;
    });
  }
}

function changeQty() {
  document.querySelectorAll(".quantity").forEach((input) => {
    input.addEventListener("change", function () {
      var qty = this.value;
      const cartid = this.getAttribute("cartid");
      if (qty <= 0 || qty >= 50) {
        alert("數量需大於0 且小於50");
        return false;
      }

      fetch("controllers/change_qty.php", {
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
}

window.addEventListener("DOMContentLoaded", () => {
  minus();
  plus();
  changeQty();
});
