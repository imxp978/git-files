function addcart(p_id) {
  let qty = $("#qty").val();
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
    data: { p_id: p_id, qty: qty },
    success: function (data) {
      if (data.c == true) {
        alert(data.m);
      }
    },
    error: function (data) {
      alert("後臺壞了");
    },
  });
}

$("input").change(function () {
  var qty = $(this).val();
  const cartid = $(this).attr("cartid");
  if (qty <= 0 || qty >= 50) {
    alert("數量需大於0 且小於50");
    return false;
  }
  $.ajax({
    url: "change_qty.php",
    type: "post",
    dataType: "json",
    data: {
      cartid: cartid,
      qty: qty,
    },
    success: function (data) {
      if (data.c == true) {
        // alert(data.m)
        window.location.reload();
      } else {
        alert(data.m);
      }
    },
    error: function (data) {
      alert("DB is down!");
    },
  });
});
