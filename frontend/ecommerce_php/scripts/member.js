function login() {
  const email = document.querySelector("#inputEmail");
  const password = document.querySelector("#inputPassword");
  const login_btn = document.querySelector("#login_btn");
  const msg = document.querySelector("#msg");
  login_btn.addEventListener('click', () => {
    if (email.value && password.value) {
      fetch('controllers/login.php', {
        method: "post",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          email: email.value,
          password: password.value,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          notice(data.message);
          if (data.success) {
            msg.textContent = data.message;
            msg.style.color = "green";
            setTimeout(() => {
              window.location.href = "member.php";
            }, 1000);
          } else {
            msg.textContent = data.message;
            msg.style.color = "red";
          }
        })
        .catch((error) => {});
    } else {
      msg.textContent = "Please Insert Email and Password";
      msg.style.color = "red";
      notice(msg.textContent);
    }
  });
  console.log('login triggered');
}

function logout() {
  console.log('triggered2');
    const logout_btn = document.querySelector('#logout_btn');
    logout_btn.addEventListener('click', () => {
        notice('Logout Successful');
        setTimeout(() => {
            window.location.href = 'controllers/logout.php';
        }, 1000);
    })
}

window.addEventListener('DOMContentLoaded', () => {
  const login_btn = document.querySelector("#login_btn");
  if (login_btn) {
    login();
  }
  const logout_btn = document.querySelector('#logout_btn');
  if (logout_btn) {
    logout();
  }
});

