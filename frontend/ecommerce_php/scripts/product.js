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

  function addToCart() {
    const url = new URL(window.location);
    const p_id = url.searchParams.get("productid");
    const quantity = document.querySelector("#quantity");
    const add_btn = document.querySelector("#add_btn");
    add_btn.addEventListener("click", () => {
      fetch("./controllers/addtocart.php", {
        method: "post",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          p_id: p_id,
          quantity: quantity.value,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          notice(data.message);
          if (data.success) {
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          }
        });
    });
  }

  window.addEventListener("DOMContentLoaded", () => {
    minus();
    plus();
    addToCart();
  });
  