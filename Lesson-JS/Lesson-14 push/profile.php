<?php require_once('connections/conn_db.php'); ?>
<?php (!isset($_SESSION) ? session_start() : ""); ?>
<?php require_once('php_lib.php'); ?>
<?php 
if (!isset($_SESSION['login'])) { 
    $sPath = 'login.php?sPath=profile';
    header(sprintf('location:%s', $sPath));
}
?>

<!doctype html>
<html lang="zh_TW">

<head>
    <?php require_once('headfile.php'); ?>
    <style>
        .input-group>.form-control {
            width: 100%;
        }

        span.error-tips,
        span.error-tips::before,
        span.error-tips::after {
            font-family: "Font Awesome 5 Free";
            color: red;
            font-weight: 900;
            content: " \f119 ";
        }

        span.valid-tips,
        span.valid-tips::after,
        span.valid-tips::before {
            font-family: "Font Awesome 5 Free";
            color: green;
            font-weight: 900;
            content: "\f118";
        }

        .text-white {
            color: white;
        }
    </style>
</head>

<body>
    <section id="header">
        <?php require_once('navbar.php'); ?>
    </section>
    <?php
    if (isset($_POST['formct1']) && $_POST['formct1'] == 'reg') {
        $email = $_POST['email'];
        $pw1 = md5($_POST['pw1']);
        $cname = $_POST['cname'];
        $tssn = $_POST['tssn'];
        $birthday = $_POST['birthday'];
        $mobile = $_POST['mobile'];
        $myZip = $_POST['myZip'] == '' ? NULL : $_POST['myZip'];
        $address = $_POST['address'] == '' ? NULL : $_POST['address'];
        $imgname = $_POST['uploadname'] == '' ? NULL : $_POST['uploadname'];
        $insertsql = "INSERT INTO member (email,pw1,cname,tssn,birthday,imgname) VALUES('" . $email . "','" . $pw1 . "', '" . $cname . "','" . $tssn . "','" . $birthday . "','" . $imgname . "')";
        $Result = $link->query($insertsql);
        $emailid = $link->lastInsertId();
        if ($Result) {
        $insertsql = "INSERT INTO addbook (emailid,setdefault,cname,mobile,myzip,address) VALUES ('" . $emailid . "', '1','" . $cname . "','" . $mobile . "','" . $myZip . "','" . $address . "')";
        $Result = $link->query($insertsql);
        $_SESSION['login'] = true;
        $_SESSION['emailid'] = $emailid;
        $_SESSION['email'] = $email;
        $_SESSION['cname'] = $cname;
        echo "<script>alert('謝謝您!會員資瞭已完成註冊');location.href='index.php';</script>";
        }
    }
    ?>

    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <?php require_once('sidebar.php'); ?>
                    <?php require_once('hot.php'); ?>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1>會員資料修改頁面</h1>
                            <p>請輸入相關資料，*為必須輸入欄位</p>
                        </div>
                    </div>
                    <div class="row" id="modify" name="modify">
                        <div class="row col-lg-8 offset-2 text-left">
                            <form action="" id="reg" name="reg" method="GET">
                                <div class="input-group mb-3">
                                    <input v-model="member.email" type="email" name="email" id="email" class="form-control" value="" placeholder="請輸入email" readonly>
                                </div>
                                <!-- <div class="input-group mb-3">
                                    <input v-model="member.cname" type="password" name="pw1" id="pw1" class="form-control" placeholder="請輸入密碼">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="pw2" id="pw2" class="form-control" placeholder="請再次輸入密碼">
                                </div> -->
                                <div class="input-group mb-3">
                                    <input v-model="member.name" type="text" name="cname" id="cname" class="form-control" placeholder="請輸入姓名" :readonly="readonly">
                                </div>
                                <div class="input-group mb-3">
                                    <input v-model="member.cssn" type="text" name="tssn" id="tssn" class="form-control" placeholder="請輸入身分證字號" :readonly="readonly">
                                </div>
                                <div class="input-group mb-3">
                                    <input v-model="member.birthday" type="text" name="birthday" id="birthday" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="請選擇生日" :readonly="readonly">
                                </div>
                                <!-- <div class="input-group mb-3">
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="請輸入手機號碼">
                                </div> 
                                <div class="input-group mb-3">
                                    <select name="myCity" id="myCity" class="form-control">
                                        <option value="">請選擇市區</option>
                                        <?php
                                        $city = "SELECT * FROM city WHERE State = 0";
                                        $city_rs = $link->query($city);
                                        while ($city_rows = $city_rs->fetch()) {
                                        ?>
                                            <option value="<?php echo $city_rows['AutoNo'] ?>"><?php echo $city_rows['Name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="myTown" id="myTown" class="form-control">
                                        <option value="">請選擇地區</option>
                                    </select>
                                </div>
                                <label for="address" class="form-label" id="zipcode" name="zipcode">郵遞區號:地址</label>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="myZip" id="myZip" value="">
                                    <input type="text" name="address" id="address" class="form-control" placeholder="請輸入後續地址">
                                </div> -->
                                <label for="fileToUpload" class="form-label">上傳照片:</label>
                                <div class="input-group mb-3" v-show="!readonly">
                                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" title="請上傳照片圖示" accept="image/x-png,image/jpeg,image/gif,image/jpg">
                                    <p>
                                        <button type="button" class="btn btn-danger" id="uploadForm" name="uploadForm">開始上傳
                                        </button>
                                    </p>
                                    <div id="progress-div01" class="progress" style="width: 100%;display:none;">
                                        <div id="progress-bar01" class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div>
                                    <input type="hidden" name="uploadname" id="uploadname" value="">
                                    <img id="showimg" name="showimg" src="" alt="photo" style="display: none;" class="img-fluid">
                                </div>
                                <div class="input-group mb-3" v-if="readonly">
                                    <img :src="uploads/${(member.imgname)?member.imgname:'avatar.svg'}" alt="photo" style="width:20%" :title="`檔名:${(member.imgname)?member.imgname:'avatar.svg'}`">
                                </div>
                                <div class="input-group mb-3" v-show="!readonly">
                                    <input v-model="captcha" type="hidden" name="captcha" id="captcha" value="">
                                    <a href="javascript:void(0);" title="按我更新認證碼" @click="getCaptcha()">
                                        <canvas id="can"></canvas>
                                    </a>
                                    <input type="text" name="recaptcha" id="recaptcha" class="form-control" placeholder="請輸入驗證碼">
                                </div>

                                <div class="input-group mb-3">
                                    <button class="btn btn-warning btn-lg me-2 text-white" type="button" @click="editMember" v-if="readonly">更新會員資料</button>
                                    <button class="btn btn-info btn-lg text-white" type="button" v-if="readonly" data-bs-toggle="modal" data-bs-target="#exampleModal">變更會員密碼</button>
                                    <button class="btn btn-primary btn-lg me-2 text-white" type="button" @click="saveMember" v-if="!readonly">儲存資料</button>
                                    <button class="btn btn-secondary btn-lg text-white" type="button" @click="readonly=true" v-if="!readonly">離開</button>
                                </div>


                                <input type="hidden" name="formct1" id="formct1" value="reg">
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-success btn-lg">送出</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>

    <section id="scontent">
        <?php require_once('scontent.php'); ?>
    </section>

    <section id="footer">
        <?php require_once('footer.php'); ?>
    </section>

    <?php require_once('jsfile.php'); ?>
    <script src="./commlib.js"></script>
    <script src="./jquery.validate.js"></script>

    <script>
        // 自訂身分證格式驗證
        jQuery.validator.addMethod("tssn", function(value, element, param) {
            let tssn = /^[a-zA-z]{1}[1-2]{1}[0-9]{8}$/;
            return this.optional(element) || (tssn.test(value));
        });
        //自訂手機格式驗證
        jQuery.validator.addMethod("checkphone", function(value, element, param) {
            let checkphone = /^[0]{1}[9]{1}[0-9]{8}$/;
            return this.optional(element) || (checkphone.test(value));
        });
        //郵遞區號驗證
        jQuery.validator.addMethod("checkMyTown", function(value, element, param) {
            return (value !== "");
        })

        // #reg表單驗證
        $('#reg').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: 'checkemail.php'
                },
                pw1: {
                    required: true,
                    maxlength: 20,
                    minlength: 4,
                },
                pw2: {
                    required: true,
                    equalTo: '#pw1'
                },
                cname: {
                    required: true,
                },
                tssn: {
                    required: true,
                    tssn: true,
                },
                birthday: {
                    required: true,
                },
                mobile: {
                    required: true,
                    checkphone: true,
                },
                address: {
                    required: true,
                },
                myTown: {
                    checkMyTown: true,
                },
                recaptcha: {
                    required: true,
                    equalTo: '#captcha',
                },
            }, 
                messages: {
                    email: {
                        required: 'email 不能空白',
                        email: 'email 格式不正確',
                        remote: 'email信箱已經註冊 '
                    },
                    pw1: {
                        required: '密碼不得為空白',
                        maxlength: '密碼最大長度為20位(4-20位英文字母與數字的組合)',
                        minlength: '密碼最小長度為4位(4-20位英文字母與數字的組合)',
                    },

                    pw2: {
                        required: '確認密碼不得為空白',
                        equalTo: '兩次輸入的密碼必須一致',
                    },
                    cname: {
                        required: '使用者名稱不得為空白',
                    },
                    tssn: {
                        required: '身份證ID不得為空白',
                        tssn: '身份證ID格式有誤 ',
                    },
                    birthday: {
                        required: '生日不得為空白 ',
                    },
                    mobile: {
                        required: '手機號碼不得為空白',
                        checkphone: '手機號碼格式有誤',
                    },
                    address: {
                        required: '地址不得為空白',
                    },
                    myTown: {
                        checkMyTown: '需選擇郵遞區號',
                    },
                    recaptcha: {
                        required: '驗證碼不得為空白',
                        equalTo: '驗證碼需相同',
                    },
                },
            
        });
    </script>

    <script>
        // 城市選擇
        $("#myCity").change(function() {
            let CNo = $("#myCity").val()
            if (CNo == "") {
                return false
            }
            $.ajax({
                url: 'Town_ajax.php',
                type: 'post',
                dataType: 'json',
                data: {
                    CNo
                },
                success: function(data) {
                    if (data.c == true) {
                        $("#myTown").html(data.m)
                        $("#myZip").val("")
                    } else {
                        alert(data.m)
                    }
                },
                error: function(data) {
                    alert("系統目前無法連接後台資料庫")
                }
            })
        })

        $("#myTown").change(function() {
            let AutoNo = $("#myTown").val()
            if (AutoNo == "") {
                return false
            }
            $.ajax({
                url: 'Zip_ajax.php',
                type: 'get',
                dataType: 'json',
                data: {
                    AutoNo
                },
                success: function(data) {
                    if (data.c == true) {
                        $("#myZip").val(data.Post)
                        $("#zipcode").html(data.Post + data.Cityname + data.Name)
                    } else {
                        alert(data.m)
                    }
                },
                error: function(data) {
                    alert("系統目前無法連接後台資料庫")
                }
            })
        })
        // 取得元素ID
        function getId(el) {
            return document.getElementById(el);
        }
    </script>

    <script>
        // 圖片上傳
        $('#uploadForm').click(function(e) {
            let fileName = $('#fileToUpload').val();
            let idxDot = fileName.lastIndexOf(".") + 1;
            let extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
            if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == "gif") {
                $('#progress-div01').css('display', 'flex');
                let file1 = getId("fileToUpload").files[0];
                let formdata = new FormData();
                formdata.append('file1', file1);
                let ajax = new XMLHttpRequest();
                ajax.upload.addEventListener('progress', progressHandler, false);
                ajax.addEventListener('load', completeHandler, false);
                ajax.addEventListener('error', errorHandler, false);
                ajax.addEventListener('abort', abortHandler, false);
                ajax.open('POST', 'file_upload_parser.php');
                ajax.send(formdata);
                return false
            } else {
                alert('目前只支援jpg, jpeg, png, gif檔案');
            }
        });
        //上船時顯示進度
        function progressHandler(event) {
            let percent = Math.round((event.loaded / event.total) * 100);
            $("#progress-bar01").css('width', percent + "%")
            $("#progress-bar01").html(percent + "%")
        }
        //上船完成處理顯示圖片
        function completeHandler(event) {
            let data = JSON.parse(event.target.responseText)
            if (data.success == 'true') {
                $("#uploadname").val(data.fileName)
                $("#showimg").attr({
                    'src': 'uploads/' + data.fileName,
                    'style': 'display:block;'
                })
                $('button.btn.btn-danger').attr({
                    'style': 'display:none;'
                })
            } else {
                alert(data.error)
            }
        }

        function errorHandler(event) {
            alert('upload failed:上傳發生錯誤');
        }

        function abortHandler(event) {
            alert('upload aborted:上傳取消');
        }
    </script>

    <script>
        //防機器人辨識碼
        function getCaptcha() {
            let inputTxt = document.getElementById('captcha');
            // can為canvas的ID名稱 150=width, 50=height, blue= BG, white=font color, 28=font size, 5=code length
            inputTxt.value = captchaCode('can', 150, 50, "purple", 'white', "28px", 5);
        }
        $(function() {
            getCaptcha();
        })
    </script>



    <script>
        const Vue3 = Vue.createApp({
            data() {
                return {
                    emailid: <?php echo $_SESSION['emailid'] ?>,
                    member: [],
                    captcha: '',
                    readonly: true,
                    PWOld: '',
                    PWNew1: '',
                    PWNew2: '',
                }
            },
            methods: {
                getMemberInfo() {
                    axios.get('memberinfo.php', {
                        params: {
                            emailid: this.emailid,
                        }
                    })
                    .then((res) => {
                        let data = res.data;
                        if(data.c ==true) {
                            this.member = data.d[0];
                        } else {
                            alert(data.m);
                        }
                    })
                    .catch(function(error) {
                        alert('DB down');
                    })
                },
                getCaptcha() {
                    this.captcha = captchaCode('can', 150, 50, 'blue', 'white', '28px', 5);
                },
                async savePW() {

                },
                async saveMember() {
                    let valid = $('#reg').valid();
                    if(valid) {
                        let imgfile = $('#uploadname').val();
                        if (imgfile != '') {
                            this.member.imgname = imgfile;
                        }
                        await axios.get('reqMember.php', {
                            params: {
                                birthday: this.member.birthday,
                                cname: this.member.cname,
                                emailid: this.member.emailid,
                                imgname: this.member.imgname,
                                tssn: this.member.tssn,
                            }
                        })
                        .then((res) => {
                            let data = res.data;
                            if(data.c==true) {
                                alert(data.m);
                                location.reload();
                            }
                        })
                        .catch(function(error) {
                            alert(error);
                        });
                    }
                },
                editMember() {

                },

            },
            mounted() {
                this.getCaptcha();
                this.getMemberInfo();
            }
        });
        Vue3.mount('#modify');
    </script>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>