function register() {
  signup_btn.addEventListener("click", () => {
    if (email.value && pw1.value && pw2.value) {
      if (pw2.value !== pw1.value) {
        msg.textContent = "Passwords Dont Match";
        msg.style.color = "red";
        notice(msg.textContent);
        return;
      }
      fetch("controllers/signup.php", {
        method: "post",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          email: email.value,
          password: pw1.value,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          notice(data.message);
          if (data.success) {
            msg.textContent = data.message;
            msg.style.color = "green";

            setTimeout(() => {
              window.location.href = "index.php";
            }, 1000);
          } else {
            msg.textContent = data.message;
            msg.style.color = "red";
          }
        })
        .catch((error) => {
          console.log(error);
        });
    } else {
      msg.textContent = "Please Insert Email and Password";
      msg.style.color = "red";
      notice(msg.textContent);
    }
  });
}
window.addEventListener("DOMContentLoaded", () => {
  const email = document.querySelector("#email");
  const pw1 = document.querySelector("#pw1");
  const pw2 = document.querySelector("#pw2");
  const signup_btn = document.querySelector("#signup_btn");
  const msg = document.querySelector("#msg");
  if (signup_btn) {
    register();
  }
});
