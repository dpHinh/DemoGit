<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/navbar.php'); ?>
<?php include_once('./views/layout/sidebar.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">home</li>
                        <li class="breadcrumb-item"></li>
                    </ol>
                </div>
            </div>
        </div>

    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class=" col-12">

                    <div class="card card-solid">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">

                                    <div class="mb-3 text-center">
                                        <img style="width: 200px; height: 200px" src="<?= BASE_URL . $sanPham['hinh'] ?>" class="product-image" alt="product Image">
                                    </div>
                                    <div class="d-flex justify-content-start" style="overflow-x: auto;">
                                        <?php foreach ($listAnhSanPham as $key => $anhSP): ?>
                                            <div style="width: 200px; height: 200px" class="product-image-thumbs <?= $anhSP[$key] == 0 ? 'active' : '' ?>"><img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="product Image"></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">

                                    <h3 class="mt-3">Tên sản phẩm:<?= $sanPham['ten_sp'] ?></h3>
                                    <hr>
                                    <h4 class="mt-3">Giá tiền:<?= $sanPham['gia'] . 'đ' ?></h4>
                                    <h4 class="mt-3">Giá Khuyến mãi:<?= $sanPham['giam_gia'] . 'đ' ?></h4>
                                    <h4 class="mt-3">số lượng:<?= $sanPham['soluong'] ?></h4>
                                    <h4 class="mt-3">Lượt xem:<?= $sanPham['so_luot_xem'] ?></h4>
                                    <h4 class="mt-3">ngày nhập: <?= $sanPham['ngay_nhap'] ?></h4>
                                    <h4 class="mt-3">danh mục:<?= $sanPham['ten_loai'] ?></h4>
                                    <h4 class="mt-3">trạng thái:<?= $sanPham['trang_thai'] == 1 ? 'còn bán ' : 'hết hàng' ?></h4>
                                    <h4 class="mt-3">mô tả:<?= $sanPham['mo_ta'] ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <hr>
                <h1>Bình luận của sản phẩm</h1>
                <div>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Người bình luận</th>
                                <th>nội dung</th>
                                <th>ngày bình luận</th>
                                <th>trạng thái</th>
                                <th>thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td> <a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chitietkhachhang&id_khachhang=' . $binhLuan['tai_khoan_id'] ?>">
                                            <?= $binhLuan['hoten'] ?></a>
                                    </td>
                                    <td><?= $binhLuan['noi_dung'] ?></td>
                                    <td><?= $binhLuan['ngay_bl'] ?></td>
                                    <td><?= $binhLuan['trang_thai'] == 1 ? 'hiển thị ' : 'bị ẩn' ?></td>
                                    <td>
                                        <form action="<?= BASE_URL_ADMIN . '?act=updatetrangthaibinhluan&id_binhluan=' . $binhLuan['id'] ?>" method="POST">
                                            <input type="hidden" name="id_binhluan" value="<?= $binhLuan['id'] ?>">
                                            <input type="hidden" name="name_view" value="detail_sanpham">

                                            <button onclick="return confirm('bạn có chắc muốn ẩn bình luận này không ?')" class="btn btn-warning">
                                                <?= $binhLuan['trang_thai'] == 1 ? 'ẩn ' : 'bỏ ẩn' ?>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="col-sm-1">
        <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="btn btn-secondary">quay lại</a>
    </div>
</div>
<?php include_once('./views/layout/footer.php'); ?>