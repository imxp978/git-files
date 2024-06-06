
function btn_confirmLink(message, url) {
    if (message == "" || url == "") {
        return false;
    }
    if (confirm(message)) {
        window.location = url;
    }
    return false;
};


function addcart(p_id) {
    let qty = $("#qty").val();
    if(qty<=0) {
        alert("數量不能為零或負數 懂嗎?");
        return(false);
    } 
    if(qty==undefined) {
        qty=1;
    } else if (qty >= 50) {
        alert("數量限制50內");
        return(false);
    }
    // 利用jquery $.ajax函數呼叫後台的addcart.php

    $.ajax({
        url: 'addcart.php',
        type:'get',
        dataType: 'json',
        data: {p_id: p_id, qty: qty,},
        success: function (data) {
            if (data.c == true) {
                alert(data.m);
            }
        }, 
        error: function (data) {
            alert('後臺壞了')
        }
    });
};


// JS vanilla
// function addcart(p_id) {
//     let qty = document.getElementById('qty').value;
//     if (qty <= 0) {
//         alert("數量不能為零或負數 懂嗎?");
//         return false;
//     }
//     if (qty == undefined) {
//         qty = 1;
//     } else if (qty >= 50) {
//         alert("數量限制50內");
//         return false;
//     }

//     // 使用 Fetch API 发送 AJAX 请求
//        fetch(`addcart.php?p_id=${p_id}&qty=${qty}`)
//     fetch('addcart.php?p_id=' + p_id + '&qty=' + qty)
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('後臺壞了');
//             }
//             return response.json();
//         })
//         .then(data => {
//             if (data.c) {
//                 alert(data.m);
//             }
//         })
//         .catch(error => {
//             alert(error.message);
//         });
// }



