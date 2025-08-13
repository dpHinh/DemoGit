<head>
    <link rel="stylesheet" href="./LayoutClient/css/payment.css">
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
</head>

<?php require_once 'views/layout/header.php' ?>


<?php require_once 'views/layout/menu.php' ?>

<div class="checkout-container">
    <main class="checkout-main">
        <div class="checkout-form">
            <h2>Thông tin nhận hàng</h2>
            <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="post">

                <div class="single-input-item">
                    <label for="ten_nguoi_nhan" class="required">Tên người nhận: </label>
                    <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= isset($user['hoten']) ? htmlspecialchars($user['hoten']) : '' ?>" placeholder="Tên người nhận" required>
                </div>

                <div class="single-input-item">
                    <label for="email_nguoi_nhan" class="required">Email người nhận: </label>
                    <input type="text" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= isset($user['email']) ? htmlspecialchars($user['email']) : '' ?>" placeholder="Email người nhận" required>
                </div>

                <div class="single-input-item">
                    <label for="sdt_nguoi_nhan" class="required">Số điện thoại người nhận: </label>
                    <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= isset($user['dienthoai']) ? htmlspecialchars($user['dienthoai']) : '' ?>" placeholder="SĐT người nhận" required>
                </div>

                <div class="single-input-item">
                    <label for="dia_chi_nguoi_nhan" class="required">Địa chỉ người nhận: </label>
                    <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?= isset($user['diachi']) ? htmlspecialchars($user['diachi']) : '' ?>" placeholder="Địa chỉ người nhận" required>
                </div>
                <div class="single-input-item">
                    <label for="ghi-chu" class="required">Ghi chú: </label>
                    <textarea name="ghi_chu" id="ghi_chu" placeholder="Ghi chú đơn hàng của bạn"></textarea>
                </div>

        </div>

        <div class="shipping-payment">
            <h2>Vận chuyển</h2>
            <p class="info-message">Vui lòng nhập thông tin giao hàng</p>

            <h2>Thanh toán: </h2>
            <div class="payment-method">
                <label>
                    <input type="radio" name="phuong_thuc_thanh_toan_id" value="1" checked>
                    Thanh toán khi nhận hàng (COD)
                </label>
                <!-- <label>
                    <input type="radio" name="phuong_thuc_thanh_toan_id" value="2">
                    Thanh toán qua ngân hàng (ATM)
                </label> -->
            </div>

            <!-- <div id="atm-qr-code" style="display: none;">
                <h3>Thanh toán quan ngân hàng</h3>
                <div id="qr-code">
                    <img src="./LayoutClient/img/maqr.jpg" alt="">
                </div>
                <p>Ngân hàng: MBbank</p>
                <p>Chủ tài khoản: Nguyễn Đình Cảnh</p>
                <p>Số tài khoản: 0399439520</p>
            </div> -->
        </div>

        <div class="checkout-sidebar">
            <h2>Thông tin sản phẩm</h2>

            <div class="order-summary">
                <?php
                $tongGioHang = 0;
                foreach ($chiTietGioHang as $key => $sanPham): ?>
                    <div class="item">
                        <img src="<?= BASE_URL  . $sanPham['hinh'] ?>" alt="">
                        <div>
                            <p><?= $sanPham['ten_sp'] ?><strong> x <?= $sanPham['so_luong'] ?></strong></p>
                            <span>
                                <?php
                                $tongTien = 0;
                                if ($sanPham['gia']) {
                                    $tongTien = $sanPham['gia'] * $sanPham['so_luong'];
                                } else {
                                    $tongTien = $sanPham['gia'] * $sanPham['so_luong'];
                                }
                                $tongGioHang += $tongTien;
                                echo formatNumber($tongTien) . ' đ';
                                ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
                <hr>
                <!-- <div class="voucher">
                    <input type="text" placeholder="Nhập mã giảm giá">
                    <button>Áp dụng</button>
                </div> -->
                <!-- <hr> -->
            </div>

            <div class="price-summary">
                <h3>Tổng đơn hàng</h3>
                <div class="summary-item">
                    <span>Tổng tiền sản phẩm</span>
                    <span><?= formatNumber($tongGioHang) . ' đ' ?></span>
                </div>

                <div class="summary-item">
                    <span>Vận chuyển</span>
                    <span>10.000 đ</span>
                </div>

                <div class="summary-item">
                    <span>Tổng thanh toán</span>
                    <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 10000 ?>">
                    <span class="total"><?= formatNumber($tongGioHang + 10000) . ' đ' ?></span>
                </div>

                <button type="submit" class="checkout-btn">Tiến hành đặt hàng</button>
            </div>
            </form>
        </div>
    </main>
</div>


<script src="./LayoutClient/js/cart.js"></script>



<?php require_once 'views/layout/footer.php' ?>