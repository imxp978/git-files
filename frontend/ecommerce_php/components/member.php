<section id="member">
    <?php (!isset($_SESSION) ? session_start() : "");
    // if (isset($_GET['sPath'])) {
    //     $sPath = $_GET['sPath'] . ".php";
    // } else {
    //     //登入完成預設要進入首頁
    //     $sPath = "index.php";
    // }
    //檢查是否玩登入驗證
    // if (isset($_SESSION['login'])) {
    //     header(sprintf('location: %s', $sPath));
    // }

    // connection DB
    // $SQLstring = "SELECT * FROM member";
    // $members = $link->query($SQLstring);

    //login
    // if (!$_SESSION['login']) {
    //     $id = $link->lastInsertId();
    //     $email = $_POST['email'];
    //     $pw1 = md5($_POST['pw1']);
    // }

    //register
    // if (isset($_POST['formct1']) && $_POST['formct1'] == 'reg') {
    //     $email = $_POST['email'];
    //     $pw1 = md5($_POST['pw1']);
    //     // $insertsql = "INSERT INTO member (email,pw1,cname,tssn,birthday,imgname) VALUES('" . $email . "','" . $pw1 . "', '" . $cname . "','" . $tssn . "','" . $birthday . "','" . $imgname . "')";
    //     $SQLstring = sprintf("INSERT INTO member (email, pw1) VALUES ('%s', '%s')", $email, $pw1);
    //     $Result = $link->query($SQLstring);
    //     $id = $link->lastInsertId();
    //     if ($Result) {
    //         $_SESSION['login'] = true;
    //         $_SESSION['id'] = $id;
    //         $_SESSION['email'] = $email;
    //         echo "<script>alert('Thank You for Register!');location.href='index.php';</script>";
    //     }
    // }
    ?>
    <div class="container text-center">
        <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
            <h3 class="mt-5">Hi, <?php echo $_SESSION['email']; ?></h3>
            <hr>
            <a href="logout.php"><button type="submit" class="btn btn-sm btn-dark">Logout</button></a>

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
                    if (data.success) {
                        // console.log('login successful');
                        msg.textContent = data.message;
                        msg.style.color = 'green';
                        setTimeout(window.location.href = 'index.php', 10000);
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