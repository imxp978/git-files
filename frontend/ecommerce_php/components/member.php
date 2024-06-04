<section id="member">

    <?php if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } ?>
    <div class="container text-center">
        <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
            <h3 class="mt-5">Hi, <?php echo $_SESSION['email']; ?></h3>
            <a href="logout.php"><button type="submit" class="btn btn-sm btn-dark">Logout</button></a>
            <hr>

        <?php } else { ?>

            <div id="login" name="login">
                <h3 class="mt-5">Login</h3>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 col-10">
                        Email:
                        <input class="form-control m-1 input-sm" type="email" value="" id="inputEmail" required autofocus />
                        Password:
                        <input class="form-control m-1 input-sm" type="password" value="" id="inputPassword" required />
                        <span id="msg"></span><br>
                        <div class="my-3"></div>
                        <a href="register.php"><button class="btn btn-sm btn-light">Sign Up</button></a>
                        <button class="btn btn-sm btn-dark" id="login_btn">Login</button>
                    </div>
                </div>
            </div>
            <hr>
        <?php } ?>
        <script>
            const email = document.querySelector('#inputEmail');
            const password = document.querySelector('#inputPassword');
            const login_btn = document.querySelector('#login_btn');
            const msg = document.querySelector('#msg');
            login_btn.addEventListener('click', () => {
                // console.log('login_btn clicked');
                msg.textContent = 'start';
                if (email.value && password.value) {
                    // console.log('email & password')
                    fetch('./login.php', {
                            method: 'post',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                email: email.value,
                                password: password.value
                            })
                        })
                        // .then((response) => {
                        //     return response.json()
                        //     console.log('response received');
                        // })
                        .then(response => response.json())
                        .then(data => {
                            // console.log(data);
                            // console.log('json converted');
                            notice(data.message);
                            if (data.success) {
                                // console.log('login successful');
                                msg.textContent = data.message;
                                msg.style.color = 'green';
                                setTimeout(window.location.href = 'index.php', 1000);
                            } else {
                                msg.textContent = data.message;
                                msg.style.color = 'red';

                            }
                        })
                        .catch((error) => {

                        })
                } else {
                    msg.textContent = 'Please Insert Account and Password'
                    msg.style.color = 'red';

                }
            })
        </script>
</section>