<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/navbar.php'); ?>
<?php include_once('./views/layout/sidebar.php'); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"></li>
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

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class=" card-title"> thêm điện thoại mới
                            </h3>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=themsanpham' ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">tên Sản phẩm</label>
                                    <input type="text" class="form-control" name="ten_sp" placeholder="nhập tên sản phẩm">
                                    <?php if (isset($error['ten_sp'])) { ?>
                                        <p class="text-danger"><?= $error['ten_sp'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">giá sản phẩm</label>
                                    <input type="text" class="form-control" name="gia" placeholder="nhập giá sản phẩm">
                                    <?php if (isset($error['gia'])) { ?>
                                        <p class="text-danger"><?= $error['gia'] ?></p>
                                    <?php } ?>
                                </div>


                                <div class="form-group">
                                    <label for="">giá khuyến mãi</label>
                                    <input type="text" class="form-control" name="giam_gia" placeholder="nhập giá khuyến mãi">
                                    <?php if (isset($error['giam_gia'])) { ?>
                                        <p class="text-danger"><?= $error['giam_gia'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh" placeholder="chọn hình ảnh">
                                    <?php if (isset($error['hinh'])) { ?>
                                        <p class="text-danger"><?= $error['hinh'] ?></p>
                                    <?php } ?>
                                </div>
                                <div>
                                    <label for="">album ảnh</label>
                                    <input type="file" class="form-control" name="img_array[]" multiple>
                                </div>
                                <div class="form-group">
                                    <label for="">số lượng </label>
                                    <input type="number" class="form-control" name="soluong" placeholder="nhập số lượng">
                                    <?php if (isset($error['soluong'])) { ?>
                                        <p class="text-danger"><?= $error['soluong'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">ngày nhập</label>
                                    <input type="date" class="form-control" name="ngay_nhap" placeholder="nhập ngày nhập sản phẩm">
                                    <?php if (isset($error['ngay_nhap'])) { ?>
                                        <p class="text-danger"><?= $error['ngay_nhap'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">danh mục</label>
                                    <section>
                                        <select class="form-control" name="danh_muc_id" id="danhmucSelect">
                                            <?php foreach ($listDanhMuc as $danhmuc): ?>
                                                <option value="<?= $danhmuc['id'] ?>"><?= $danhmuc['ten_loai'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </section>
                                    <?php if (isset($_SESSION['error']['danh_muc_id'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">trạng thái</label>
                                    <section>
                                            <select class="form-control" name="trang_thai" id="trangthaiSelect">
                                                <option selected disabled>chọn trạng thái sản phẩm</option>
                                                <option value="1">còn hàng</option>
                                                <option value="2">hết hàng</option>
                                            </select>
                                    </section>
                                    <?php if (isset($_SESSION['error']['trang_thai'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group-12">
                                    <label for="">mô tả</label>
                                    <textarea class="form-control" name="mo_ta" placeholder="nhập mô tả"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once('./views/layout/footer.php'); ?>