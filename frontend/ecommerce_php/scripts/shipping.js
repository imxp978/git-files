function addOrder() {
const checkout_btn = document.querySelector("#checkout_btn");
  checkout_btn.addEventListener("click", () => {
    let addressid = document.querySelector("input[name=gridRadios]:checked");
    let note = document.querySelector("#note");
    if (addressid) {
      fetch("controllers/addorder.php", {
        method: "post",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          addressid: addressid.value,
          note: note.value,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          notice(data.message);
          if (data.success) {
            setTimeout(() => {
              window.location.href = "./member.php";
            }, 1000);
          }
        })
        .catch((error) => {
          notice("Unexpected Error Occured, Please Try Again Later");
          console.log(error);
        });
    } else {
      notice("Please Select or Add an Address");
    }
  });
}

function changeAddress() {
  const inputgroup = document.querySelector("#radioInputGroup");
  inputgroup.addEventListener("change", (event) => {
    // console.log(event.target.value)
    if (event.target && event.target.nodeName == "INPUT") {
      let id = event.target.value;
      fetch("controllers/changeaddress.php", {
        method: "post",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          addressid: event.target.value,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          notice(data.message);
          window.location.reload();
        })
        .catch((error) => {
          notice("Unexpected Error Occured, Please Try Again Later");
          console.log(error);
        });
    }
  });
}

function addAddress() {
  const add_btn = document.querySelector("#add_btn");
  add_btn.addEventListener("click", () => {
    let name = document.querySelector("#name");
    let address = document.querySelector("#address");
    let phone = document.querySelector("#phone");
    let msg = document.querySelector("#msg");
    if (name.value && address.value && phone.value) {
      fetch("controllers/addaddress.php", {
        method: "post",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          name: name.value,
          phone: phone.value,
          address: address.value,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          notice(data.message);
          if (data.success) {
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          } else {
            console.log(data.message);
          }
        })
        .catch((error) => {
          notice("Unexpected Error Occured, Please Try Again Later");
          console.log(error);
        });
    } else {
      notice("Insert Name, Phone, and Address");
      msg.innerHTML = "Insert Name, Phone, and Address";
      msg.style.color = "red";
    }
  });
}

window.addEventListener('DOMContentLoaded', () => {
  const checkout_btn = document.querySelector("#checkout_btn");
  const inputgroup = document.querySelector("#radioInputGroup");
  const add_btn = document.querySelector("#add_btn");
  if (checkout_btn) {
    addOrder(); 
  }

  if (inputgroup) {
    changeAddress(); 
  }

  if (addAddress) {
    addAddress();
  }
});
