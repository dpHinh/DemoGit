<div class="banner">
    <div class="slider" id="slider">
        <div class="slide ">
            <img src="./LayoutClient/img/slider_1.png" alt="Slide 1">
        </div>
        <div class="slide ">
            <img src="./LayoutClient/img/slider_2.png" alt="Slide 2">
        </div>
        <div class="slide ">
            <img src="./LayoutClient/img/slider_3.png" alt="Slide 3">
        </div>
        <div class="slide ">
            <img src="./LayoutClient/img/slider_4.png" alt="Slide 3">
        </div>
        <div class="slide ">
            <img src="./LayoutClient/img/slider_5.png" alt="Slide 3">
        </div>
    </div>
    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>

    <div class="dots" id="dots">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</div>
<div class="container">
    <div class="categories">
        <h3> Sản phẩm</h3>
        <ul> <?php foreach ($listDanhMuc as $danhmuc): ?>
                <li><a href="<?= BASE_URL . '?act=sua-san-pham-theo-danh-muc&id=' . $danhmuc['id']; ?>">
                        <?= $danhmuc['ten_loai']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="product-list">
        <?php foreach ($listSanPham as $sanPham): ?>
            <div class="product">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_sanpham=' . $sanPham['id'] ?>">
                    <img src="<?= BASE_URL . $sanPham['hinh'] ?>" alt="<?= $sanPham['ten_sp']; ?>">
                    <h4><?= $sanPham['ten_sp']; ?></h4>
                </a>
                <p class="price">
                    <?php if ($sanPham['giam_gia'] > 0): ?>
                        <span class="giamgia"><?= number_format($sanPham['gia'] - $sanPham['giam_gia'], 0, ',', '.') . 'đ' ?></span>
                        <span class="gia"><?= number_format($sanPham['gia'], 0, ',', '.') . 'đ' ?></span>
                    <?php else : ?>
                        <?= number_format($sanPham['gia'], 0, ',', '.') . 'đ' ?>
                    <?php endif; ?>
                </p>
            </div>
            <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                <div class="quantity-cart-box d-flex align-items-center">
                    <h6 class="option-title">Số lượng:</h6>
                    <div class="quantity">
                        <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                        <div class="='pro-qty"><input type="text" value="1" name="so_luong"></div>
                    </div>
                    <div class="action_link">
                        <button class="btn-btn-cart2">Thêm giỏ hàng</button>
                    </div>

                </div>

            </form>
        <?php endforeach; ?>
    </div>
</div>
<script src=".LayoutClient/js/trangchu.js"></script>
<script src=".LayoutClient/js/productSanPham.js"></script>
