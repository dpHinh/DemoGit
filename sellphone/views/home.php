<?php require_once 'views/layout/header.php' ?>

<body>
    <?php require_once 'views/layout/menu.php' ?>
    <div class="banner">
        <div class="slider" id="slider">
            <div class="slide active">
                <img src="./LayoutClient/img/slider_1.png" alt="Slide 1">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_2.png" alt="Slide 1">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_3.png" alt="Slide 1">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_4.png" alt="Slide 1">
            </div>
            <div class="slide active">
                <img src="./LayoutClient/img/slider_5.png" alt="Slide 1">
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
        <div class="section-header">
            <h2>Sản phẩm mới</h2>
            <p>Khám phá những sản phẩm mới nhất từ Apple</p>
            <button class="btn2">
                <i class="fa-solid fa-arrow-right"></i>
                Xem tất cả
            </button>
        </div>
        <div class="product-container">
            <button class="prev-btn"><</button>
            <div class="product-wrapper">
                <?php foreach ($listSanPham as $key => $sanPham): ?>
                    <div class="pro-item hidden">
                        <div class="product-image">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_sanpham=' . $sanPham['id'] ?>">
                                <img src="<?= BASE_URL . $sanPham['hinh'] ?>" alt="<?= $sanPham['ten_sp'] ?>">
                            </a>
                            <?php
                            if (!empty($sanPham['ngay_nhap']) && strtotime($sanPham['ngay_nhap'])) {
                                try {
                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                    $ngayHienTai = new DateTime();
                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                    if ($tinhNgay->invert == 0 && $tinhNgay->days <= 7) {
                            ?>
                                        <div class="product-badge new">
                                            <span>NEW</span>
                                        </div>
                            <?php
                                    }
                                } catch (Exception $e) {
                                    error_log("lỗi định dạng ngày nhập " . $e->getMessage());
                                }
                            } else {
                                error_log("ngày nhập sản phẩm không hợp lệ hoặc trống.");
                            }
                            ?>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?= $sanPham['ten_sp'] ?></h3>
                            <div class="product-price">
                                <span class="discount-price"><?= formatNumber($sanPham['giam_gia']) ?>₫</span>
                                <span class="original-price"><?= formatNumber($sanPham['gia']) ?>₫</span>
                            </div>
                            <div class="product-actions">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_sanpham=' . $sanPham['id'] ?>" class="btn-view">
                                    <i class="fa-solid fa-eye"></i>
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="next-btn">></button>
        </div>
    </div>
    <div class="container">
        <div class="section-header hot-section">
            <h2>Sản phẩm Hot</h2>
            <p>Những sản phẩm được yêu thích nhất</p>
            <button class="btn2">
                <i class="fa-solid fa-fire"></i>
                Xem tất cả
            </button>
        </div>
        <div class="product-container-hot">
            <button class="prev-btn-hot"><</button>
            <div class="product-wrapper-hot">
                <?php foreach ($listSanPhamHot as $key => $sanPham): ?>
                    <div class="pro-item hot hidden">
                        <div class="product-image">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_sanpham=' . $sanPham['id']; ?>">
                                <img src="<?= BASE_URL . $sanPham['hinh'] ?>" alt="<?= $sanPham['ten_sp'] ?>">
                            </a>
                            <div class="product-badge hot">
                                <span><i class="fa-solid fa-fire"></i> HOT</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?= $sanPham['ten_sp'] ?></h3>
                            <div class="product-price">
                                <span class="discount-price"><?= formatNumber($sanPham['giam_gia']) ?>₫</span>
                                <span class="original-price"><?= formatNumber($sanPham['gia']) ?>₫</span>
                            </div>
                            <div class="product-actions">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_sanpham=' . $sanPham['id']; ?>" class="btn-view">
                                    <i class="fa-solid fa-eye"></i>
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="next-btn-hot">></button>
        </div>
    </div>
    <div class="banner hidden">
        <img src="./LayoutClient/img/section_banner.webp" alt="">
    </div>
    <div class="container">
        <div class="section-header news-section">
            <h2>Tin tức công nghệ</h2>
            <p>Cập nhật những tin tức mới nhất về công nghệ</p>
            <button class="btn2">
                <i class="fa-solid fa-newspaper"></i>
                Xem tất cả
            </button>
        </div>
        <div class="news-grid hidden">
            <div class="news-card">
                <div class="news-image">
                    <img src="./LayoutClient/img/news1.png" alt="Giá iPhone tháng 11">
                    <div class="news-date">
                        <i class="fa-solid fa-calendar"></i>
                        <span>11/11/2024</span>
                    </div>
                </div>
                <div class="news-content">
                    <h3>Giá iPhone tháng 11</h3>
                    <p>Cập nhật giá mới nhất các dòng iPhone trong tháng 11</p>
                    <a href="" class="news-link">
                        Xem chi tiết
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="news-card">
                <div class="news-image">
                    <img src="./LayoutClient/img/news5.png" alt="Samsung giá chính hãng">
                    <div class="news-date">
                        <i class="fa-solid fa-calendar"></i>
                        <span>11/11/2024</span>
                    </div>
                </div>
                <div class="news-content">
                    <h3>Samsung giá chính hãng</h3>
                    <p>Khám phá các sản phẩm Samsung với giá tốt nhất</p>
                    <a href="" class="news-link">
                        Xem chi tiết
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="news-card">
                <div class="news-image">
                    <img src="./LayoutClient/img/news3.png" alt="Sản phẩm giảm giá">
                    <div class="news-date">
                        <i class="fa-solid fa-calendar"></i>
                        <span>11/11/2024</span>
                    </div>
                </div>
                <div class="news-content">
                    <h3>Sản phẩm giảm giá</h3>
                    <p>Những sản phẩm đang được giảm giá hấp dẫn</p>
                    <a href="" class="news-link">
                        Xem chi tiết
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="news-card">
                <div class="news-image">
                    <img src="./LayoutClient/img/news4.png" alt="iPad giá chính hãng">
                    <div class="news-date">
                        <i class="fa-solid fa-calendar"></i>
                        <span>11/11/2024</span>
                    </div>
                </div>
                <div class="news-content">
                    <h3>iPad giá chính hãng</h3>
                    <p>Bộ sưu tập iPad với giá tốt nhất thị trường</p>
                    <a href="" class="news-link">
                        Xem chi tiết
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="./LayoutClient/js/trangchu.js"></script>
    <?php require_once 'views/layout/footer.php' ?>
    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide')
        const dots = document.querySelectorAll('.dot')
        const prev = document.querySelector('.prev')
        const next = document.querySelector('.next')

        function showSlide(index) {
            if (index >= slides.length) slideIndex = 0;
            if (index < 0) slideIndex = slides.length - 1;

            slides.forEach((slide, i) => {
                slide.style.display = i === slideIndex ? 'block' : 'none';
                dots[i].classList.toggle('active', i === slideIndex);
            });
        }

        function nextSlide() {
            slideIndex++;
            showSlide(slideIndex);
        }

        function prevSlide() {
            slideIndex--;
            showSlide(slideIndex);
        }
        showSlide(slideIndex);

        prev.addEventListener('click', prevSlide);
        next.addEventListener('click', nextSlide);
    </script>

</body>