<?php require_once 'views/layout/header.php' ?>
<body>
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
        <div class="product-page">
            <div class="product-image">
                <div class="img-main">
                    <?php if (!empty($listAnhSanPham) && isset($listAnhSanPham[0]['link_hinh_anh'])): ?>
                        <img src="<?= BASE_URL . $listAnhSanPham[0]['link_hinh_anh'] ?>" alt="<?= $sanPham['ten_sp'] ?>">
                    <?php else: ?>
                        <img src="<?= BASE_URL . $sanPham['hinh'] ?>" alt="<?= $sanPham['ten_sp'] ?>">
                    <?php endif; ?>
                </div>
                <div class="thumbnail-gallery">
                    <?php if (!empty($listAnhSanPham)): ?>
                        <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                            <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" onclick="changeMainImage(this)" alt="<?= $sanPham['ten_sp'] ?> - Ảnh <?= $key + 1 ?>">
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Fallback: use main product image as thumbnail -->
                        <img src="<?= BASE_URL . $sanPham['hinh'] ?>" onclick="changeMainImage(this)" alt="<?= $sanPham['ten_sp'] ?>">
                    <?php endif; ?>
                </div>
            </div>

            <div class="product-details">
                <div class="manufacturer-name">
                    <a href="#"><?= $sanPham['ten_loai'] ?></a>
                </div>
                <h1><?= $sanPham['ten_sp'] ?></h1>
                <p class="series-info">
                    <?php $countComment = count($listBinhLuan); ?>
                    <span><?= $countComment . 'bình luận' ?></span>
                </p>
                <div class="availability">
                    <i class="fa fa-check-circle"></i>
                    <span><?= $sanPham['soluong'] > 0 ? $sanPham['soluong'] . 'còn hàng ' : 'hết hàng ' ?></span>
                </div>
                <ul class="promotion-details">
                    <?= $sanPham['mo_ta'] ?>
                    <div class="color-selection">
                        <div class="capacity-main">
                            <label for="capacity">dung lượng:</label>
                            <div class="capacity-options">
                                <button class="capacity" data-value="128GB">128GB</button>
                                <button class="capacity" data-value="256GB">256GB</button>
                                <button class="capacity" data-value="512GB">512GB</button>
                            </div>
                        </div>
                    </div>
                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="POST">
                        <div class="quantity-main">
                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                            <label for="product-quantity">số lượng:</label>
                            <div class="quantity">

                                <input type="number" id="product-quantity" value="1" min="1" name="so_luong">

                            </div>
                        </div>
                        <div id="error-message" style="color:red; display:none ;"></div>
                        <hr align="center">

                        <div class="price">
                            <div class="giamgia" id="discount-price"><?= formatNumber($sanPham['giam_gia']) ?>đ</div>
                            <div id="total-price" data-price="<?= $sanPham['gia']; ?>">
                                <?= formatNumber($sanPham['gia']) ?> đ
                            </div>
                        </div>

                        <div class="purchase-buttons">
                            <div class="buy-now">
                                <button class="buy-now">
                                    <i class="fa-solid fa-bag-shopping"></i>Đặt hàng
                                </button>
                            </div>
                            <button class="add-to-cart"> Thêm giỏ hàng </button>
                            <button class="installment">Mua trả góp</button>
                        </div>
                    </form>
                </ul>
                <div class="contact-message" style="display: none; color:red; margin-top:10px;">
                    Vui lòng liên hệ để biết thêm chi tiết
                </div>
            </div>
        </div>
    </div>

    <div class="product-details-reviews section-padding pb-0">
        <div class="">
            <div class="col-lg-12">
                <div class="product-review-info">
                    <ul class="nav review-tab">
                        <li> <a data-bs-toggle="tab" href="#tab_three">Bình luận (<?= $countComment ?>)</a></li>
                    </ul>
                    <div class="tab-content reviews-tab">
                        <div class="tab-pane fade show active" id="tab_three">
                            <?php foreach ($listBinhLuan as $binhLuan): ?>
                                <div class="total-reviews">
                                    <div class="rev-avatar">
                                        <img src="<?= $binhLuan['hinh'] ?>" alt="">
                                    </div>
                                    <div class="review-box">
                                        <div class="post-author">
                                            <p><span><?= $binhLuan['hoten'] ?> -</span><?= $binhLuan['ngay_bl'] ?></p>
                                        </div>
                                        <p><?= $binhLuan['noi_dung'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php
                            if (isset($_SESSION['user_client'])) {
                                $tai_khoan_id = $_SESSION['user_client'];

                            ?>
                                <form action="<?= BASE_URL . '?act=binh-luan&id_sanpham=' . $sanPham['id'] ?>" method="post" class="review-form">
                                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                                    <input type="hidden" name="tai_khoan_id" value="<?= $tai_khoan_id; ?>">
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-form-label" for=""><span class="text-danger">*</span>
                                                nội dung bình luận</label>
                                            <textarea class="form-control" required placeholder="nhập nội dung để bình luận sản phẩm" name="noi_dung" id=""></textarea>
                                        </div>
                                        <div class="buttons">
                                            <button class="btn btn-sqr" type="submit">bình luận</button>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            } else {
                                echo '<p class="alert alert-warning">Bạn cần đăng nhập thì mới có thể bình luận. <a href="' . BASE_URL . '?act=login">Đăng nhập tại đây</a></p>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./LayoutClient/js/trangchu.js"></script>
    <script src="./LayoutClient/js/details.js"></script>
    <?php require_once 'views/layout/footer.php' ?>

</body>