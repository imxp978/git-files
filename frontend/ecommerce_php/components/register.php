<section id="register">
    <div class="container text-center">
        <h3 class="mt-5">SIGN UP</h3>
        <div class="row d-flex justify-content-center" name="reg">
            <div class="col-md-4 col-10">
                Email:
                <input class="form-control m-1" type="email" name="email" id="email" autofocus/>
                Password:
                <input class="form-control m-1" type="password" name="pw1" id="pw1" />
                Confirm Password:
                <input class="form-control m-1" type="password" name="pw2" id="pw2" />
                <span id="msg"></span><br>
                <div class="my-3"></div>
                <a href="member.php"><button class="btn btn-sm btn-outline-dark" id="login_btn">Log In</button></a>
                <button class="btn btn-sm btn-dark" id="signup_btn">Sign Up</button>
            </div>
        </div>
        <hr>
    </div>
</section>

<script>
    const email = document.querySelector('#email');
    const pw1 = document.querySelector('#pw1');
    const pw2 = document.querySelector('#pw2');
    const signup_btn = document.querySelector('#signup_btn');
    const msg = document.querySelector('#msg');
    signup_btn.addEventListener('click', () => {
        if (email.value && pw1.value && pw2.value) {
            if (pw2.value !== pw1.value) {
                msg.textContent = 'Passwords Dont Match'
                msg.style.color = 'red';
                notice(msg.textContent);
                return;
            }
            fetch('./signup.php', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: email.value,
                    password: pw1.value,
                })
            })
            .then(response=>response.json())
            .then(data=>{
                notice(data.message)
                if(data.success) {
                    msg.textContent = data.message;
                    msg.style.color = 'green';
                    
                    setTimeout(()=>{
                        window.location.href='index.php';
                    }, 1000)
                } else {
                    msg.textContent = data.message;
                    msg.style.color = 'red';
                }
            })
            .catch((error)=>{
                console.log(error);
            })
        }else {
            msg.textContent = 'Please Insert Email and Password';
            msg.style.color = 'red';
            notice(msg.textContent);
        }
    })
</script>