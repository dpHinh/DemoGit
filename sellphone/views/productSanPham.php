<?php require_once 'views/layout/header.php' ?>
<?php require_once 'views/layout/menu.php' ?>
<div class="banner">
    <div class="slider" id="slider">
        <div class="slide active">
            <img src="./LayoutClient/img/slider_1.png" alt="Slide 1">
        </div>
        <div class="slide active">
            <img src="./LayoutClient/img/slider_2.png" alt="Slide 2">
        </div>
        <div class="slide active">
            <img src="./LayoutClient/img/slider_3.png" alt="Slide 3">
        </div>
        <div class="slide active">
            <img src="./LayoutClient/img/slider_4.png" alt="Slide 3">
        </div>
        <div class="slide active">
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
        <h3> sản phẩm</h3>
        <ul> <?php foreach ($listDanhMuc as $danhmuc): ?>
                <li><a href="<?= BASE_URL . '?act=san-pham-theo-danh-muc&id=' . $danhmuc['id']; ?>">
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
                 <?php if($sanPham['giam_gia']> 0): ?>
                    <span class="giamgia"><?= number_format( $sanPham['giam_gia'],0,',','.').'đ' ?></span>
                    <span class="gia"><?= number_format($sanPham['gia'],0,',','.').'đ' ?></span>
                    <?php else :?>
                        <?= number_format($sanPham['gia'],0,',','.').'đ' ?>
                        <?php endif;?>
               </p>
               <button class="btn1" onclick="location.href= '<?= BASE_URL . '?act=chi-tiet-san-pham&id_sanpham=' . $sanPham['id'] ?>'">xem chi tiết</button>
                </div>
            <?php endforeach; ?>
    </div>
</div>
<script src="./LayoutClient/js/trangchu.js"></script>
<script src="./LayoutClient/js/productSanPham.js"></script>
<?php require_once 'views/layout/footer.php' ?>