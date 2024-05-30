<?php
$SQLstring = sprintf("SELECT *,city.Name AS ctName,town.Name AS toName From addbook,city,town WHERE emailid=%d AND setdefault='1'  AND addbook.myzip=town.Post AND town.AutoNo=city.AutoNo", $_SESSION['emailid']);
$addbook_rs = $link->query($SQLstring);
if ($addbook_rs && $addbook_rs->rowCount() != 0) {
    $data = $addbook_rs->fetch();
    $cname = $data['cname'];
    $mobile = $data['mobile'];
    $myzip = $data['myzip'];
    $address = $data['address'];
    $ctName = $data['ctName'];
    $toName = $data['toName'];
} else {
    $cname = '';
    $mobile = '';
    $myzip = '';
    $address = '';
    $ctName = '';
    $toName = '';
}
?>
<h3>電傷藥妝: 會員:<?php echo $_SESSION['cname']; ?>結帳作業</h3>
<div class="row">
    <div class="card col">
        <div class="card-header" style="color:#007bff"><i class="fas fa-truck fa-flip-horizontal me-1"></i>
            配送資訊
        </div>
        <div class="card-body">
            <h4 class="card-title">收件人資訊:</h4>
            <h5 class="card-title">姓名: <?php echo $cname; ?></h5>
            <p class="card-text">電話: <?php echo $mobile; ?></p>
            <p class="card-text">郵遞區號: <?php echo $myzip . $ctName . $toName; ?></p>
            <p class="card-text">地址: <?php echo $address; ?></p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">選擇其他收件人</button>
        </div>
    </div>


    <div class="card col ms-3">
        <div class="card-header" style="color:#000">
            <i class="fas fa-truck fa-credit-card me-1"></i>
            付款方式
            <div class="card-body pl-3 pt-2 pb-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" style="color:#007bff !important; font-size:14pt;">貨到付款</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" style="color:#007bff !important; font-size:14pt;">信用卡</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false" style="color:#007bff !important; font-size:14pt;">銀行轉帳</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="epayt-tab" data-bs-toggle="tab" data-bs-target="#epay-tab-pane" type="button" role="tab" aria-controls="epay-tab-pane" aria-selected="false" style="color:#007bff !important; font-size:14pt;">電子支付</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <h4 class="card-title pt-3">付款人資訊: </h4>
                        <h5>姓名: 李曉明</h5>
                        <p>電話: 0987654321</p>
                        <p>地址: 401台中市西屯區中正路1號</p>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <h4 class="card-title pt-3">選擇付款帳戶:</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col" width="25%">信用卡</th>
                                    <th scope="col" width="35%">發卡銀行</th>
                                    <th scope="col" width="35%">信用卡號</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><input type="radio" name="creditcard" id="creditCard[]" checked></th>
                                    <td><img src="images/visa_Inc._logo.svg" class="img-fluid" alt=""></td>
                                    <td>玉山銀行</td>
                                    <td>1234 ************</td>
                                </tr>
                                <tr>
                                    <th scope="row"><input type="radio" name="creditcard" id="creditCard[]"></th>
                                    <td><img src="images/MasterCard_Logo.svg" class="img-fluid" alt=""></td>
                                    <td>玉山銀行</td>
                                    <td>1234 ************</td>
                                </tr>
                                <tr>
                                    <th scope="row"><input type="radio" name="creditcard" id="creditCard[]"></th>
                                    <td><img src="images/UnionPay_logo.svg" class="img-fluid" alt=""></td>
                                    <td>玉山銀行</td>
                                    <td>1234 ************</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <h4 class="card-title pt-3">ATM換款資訊</h4>
                        <img src="images/Cathay-bk-rgb-db.svg" class="img-fluid" alt="">
                        <h5 class="card-title">匯款銀行:國泰世華銀行 銀行代碼:013</h5>
                        <h5 class="card-title">姓名:林曉強</h5>
                        <p class="card-text">匯款帳號:1234-5678-1234-5678</p>
                        <p class="card-text">備註: 匯款完成後須1 2個工作天，帶系統入帳後將以簡訊通知訂單完成付款。</p>
                    </div>
                    <div class="tab-pane fade" id="epay-tab-pane" role="tabpanel" aria-labelledby="epay-tab" tabindex="0">
                        <h4 class="card-title pt-3">選擇電子支付:</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col" width="25%">電子支付系統</th>
                                    <th scope="col" width="70%">電子支付公司</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><input type="radio" name="epay" id="epay[]" checked></th>
                                    <td><img src="images/Apple_Pay_logo.svg" class="img-fluid" alt=""></td>
                                    <td>Apple Pay</td>
                                </tr>
                                <tr>
                                    <th scope="row"><input type="radio" name="epay" id="epay[]"></th>
                                    <td><img src="images/Line_pay_Logo.svg" class="img-fluid" alt=""></td>
                                    <td>Line Pay</td>
                                </tr>
                                <tr>
                                    <th scope="row"><input type="radio" name="epay" id="epay[]"></th>
                                    <td><img src="images/JKOPAY_Logo.svg" class="img-fluid" alt=""></td>
                                    <td>JKOPAY</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    //建立結帳表格資料庫查詢
    $SQLstring = sprintf("SELECT * FROM cart,product,product_img WHERE ip=%d  AND orderid IS NULL AND cart.p_id=product_img.p_id AND cart.p_id = product.p_id AND product_img.sort=1 ORDER BY cartid DESC", $_SERVER['REMOTE_ADDR']);
    $cart_rs = $link->query($SQLstring);
    $pTotal = 0; //設定累加變數
    ?>
    <div class="table-responsive-md">
        <table class="table table-hover mt-3">
            <thead>
                <tr class="text-bg-primary">
                    <td width="10%">產品編號</td>
                    <td width="10%">圖片</td>
                    <td width="30%">名稱</td>
                    <td width="15%">價格</td>
                    <td width="15%">數量</td>
                    <td width="20%">小計</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($cart_data = $cart_rs->fetch()) { ?>
                    <tr>
                        <td>
                            <?php echo $cart_data['p_id'] ?>
                        </td>
                        <td>
                            <img src="product_img/<?php echo $cart_data['img_file']; ?>" class="img-fluid" alt="<?php echo $cart_data['p_name']; ?>">
                        </td>
                        <td>
                            <?php echo $cart_data['p_name'] ?>
                        </td>
                        <td>
                            <h4 class="color_e600a0 pt-1"><?php echo $cart_data['p_price']; ?></h4>
                        </td>
                        <td>
                            <?php echo $cart_data['qty']; ?>
                        </td>
                        <td>
                            <h4 class="color_e600a0 pt-1"><?php echo $cart_data['p_price'] * $cart_data['qty']; ?></h4>
                        </td>
                    </tr>
                <?php $pTotal += $cart_data['p_price'] * $cart_data['qty'];
                } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">累計: <?php echo $pTotal; ?></td>
                </tr>
                <tr>
                    <td colspan="7">運費: 100</td>
                </tr>
                <tr>
                    <td colspan="7">總計: <?php echo $pTotal + 100; ?></td>
                </tr>
                <tr>
                    <td colspan="7">
                        <button type="button" id="btn04" name="btn04" class="btn btn-danger mr-2">
                            <i class="fas fa-cart-arrow-down pr-2"></i>確認結帳
                        </button>

                        <button type="button" id="btn05" name="btn05" class="btn btn-warning mr-2" onclick="window.history.go(-1);">
                            <i class="fas fa-undo-alt pr-2"></i>
                            回上一頁
                        </button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
</div>
</div>
</div>

</div>

<?php
$SQLstring = sprintf("SELECT *,city.Name AS ctName,town.Name AS toName FROM addbook,city,town WHERE emailid = %d AND addbook.myzip=town.Post AND town.AutoNo=city.AutoNo", $_SESSION['emailid']);
$addbook_rs = $link->query($SQLstring);
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">收件人資訊</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="cname" id="cname" class="form-control" placeholder="收件者姓名">
                        </div>
                        <div class="col">
                            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="收件者電話">
                        </div>
                        <div class="col">
                            <select name="myCity" id="myCity" class="form-control">
                                <option value="">請選擇市區</option>
                                <?php
                                $city = "SELECT * FROM city WHERE State = 0";
                                $city_rs = $link->query($city);
                                while ($city_rows = $city_rs->fetch()) { ?>
                                    <option value="<?php echo $city_rows['AutoNo'] ?>"><?php echo $city_rows['Name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <select name="myTown" id="myTown" class="form-control">
                                <option value="">請選擇地區</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" id="myzip" name="myzip" value="">
                            <label for="address" id="add_label" name="add_label"></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="地址">
                        </div>
                    </div>
                    <div class="row mt-4 justify-content-center">
                        <div class="col-auto">
                            <button type="button" class="btn btn-success" id="recipient" name="recipient">新增收件人</button>
                        </div>
                    </div>
                </form>
                <hr>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">收件人姓名</th>
                            <th scope="col">電話</th>
                            <th scope="col">地址</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = $addbook_rs->fetch()) { ?>
                            <tr>
                                <th scope="row"><input type="radio" name="gridRadios" id="gridRadios[]" value="<?php echo $data['addressid'] ?>" <?php echo ($data['setdefault']) ? 'checked' : ''; ?>></th>
                                <td><?php echo $data['cname']; ?></td>
                                <td><?php echo $data['mobile']; ?></td>
                                <td><?php echo $data['myzip'] . $data['ctName'] . $data['toName'] . $data['address']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>