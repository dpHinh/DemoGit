<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/navbar.php'); ?>
<?php include_once('./views/layout/sidebar.php'); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>sửa thông tin sản phẩm: <?= $sanPham['ten_sp'] ?></h1>
                </div>
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="btn btn-secondary">cancel</a>
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
                            <h3 class=" card-title">thông tin sản phẩm
                            </h3>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=suasanpham' ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                    <label for="">tên Sản phẩm</label>
                                    <input type="text" class="form-control" name="ten_sp" value="<?= $sanPham['ten_sp'] ?>" placeholder="nhập tên sản phẩm">
                                    <?php if (isset($error['ten_sp'])) { ?>
                                        <p class="text-danger"><?= $error['ten_sp'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">giá sản phẩm</label>
                                    <input type="text" class="form-control" name="gia" value="<?= $sanPham['gia'] ?>" placeholder="nhập giá sản phẩm">
                                    <?php if (isset($error['gia'])) { ?>
                                        <p class="text-danger"><?= $error['gia'] ?></p>
                                    <?php } ?>
                                </div>


                                <div class="form-group">
                                    <label for="">giá khuyến mãi</label>
                                    <input type="text" class="form-control" name="giam_gia" value="<?= $sanPham['giam_gia'] ?>" placeholder="nhập giá khuyến mãi">
                                    <?php if (isset($error['giam_gia'])) { ?>
                                        <p class="text-danger"><?= $error['giam_gia'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh" placeholder="chọn hình ảnh">
                                </div>
                                <div class="form-group">
                                    <label for="">số lượng </label>
                                    <input type="number" class="form-control" name="soluong" value="<?= $sanPham['soluong'] ?>" placeholder="nhập số lượng">
                                    <?php if (isset($error['soluong'])) { ?>
                                        <p class="text-danger"><?= $error['soluong'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">ngày nhập</label>
                                    <input type="date" class="form-control" name="ngay_nhap" value="<?= $sanPham['ngay_nhap'] ?>" placeholder="nhập ngày nhập sản phẩm">
                                    <?php if (isset($error['ngay_nhap'])) { ?>
                                        <p class="text-danger"><?= $error['ngay_nhap'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">danh mục</label>
                                    <section>
                                        <select class="form-control" name="danh_muc_id" id="danhmucSelect">
                                            <?php foreach ($listDanhMuc as $danhmuc): ?>
                                                <option <?= $danhmuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhmuc['id']; ?>"><?= $danhmuc['ten_loai'] ?></option>
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
                                        <select class="form-control" name="trang_thai" id="trang_thai">
                                            <option selected disabled>chọn trạng thái sản phẩm</option>
                                            <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">còn bán</option>
                                            <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">hết hàng</option>
                                        </select>
                                    </section>
                                </div>
                                <div class="form-group-12">
                                    <label for="">mô tả</label>
                                    <textarea class="form-control" name="mo_ta" rows="4" placeholder="nhập mô tả"><?= $sanPham['mo_ta'] ?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">sửa thông tin</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-info">
                        <div class="card-header">
                            <div class="card-title">
                                <h1>Album ảnh sản phẩm</h1>
                            </div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <form action="<?= BASE_URL_ADMIN . '?act=suaalbumanhsanpham' ?>" method="post" enctype="multipart/form-data">
                                <div class="table-responsive">
                                    <table id="faqs" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Ảnh</th>
                                                <th>file</th>
                                                <th class="text-center">
                                                    <button onclick="addfaqs();" type="button" class="badge badge-success">
                                                        <i class="fa fa-plus"></i> THÊM MỚI
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                                            <input type="hidden" id="img_delete" name="img_delete">
                                            <?php foreach ($listAnhSanPham as $key => $value): ?>
                                                <tr id="faqs-row-<?= $key ?>">
                                                    <input type="hidden" name="current_img_ids[]" value="<?= $value['id']; ?>">
                                                    <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" style="width: 50px; height: 50px" alt=""></td>
                                                    <td><input type="file" name="img_array[]" class="form-control"></td>
                                                    <td class="mt-10">
                                                        <button class="badge badge-danger" type="button" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">sửa thông tin</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
</section>
</div>
<?php include_once('./views/layout/footer.php'); ?>
</body>

<script>
    var faqs_row = <?= count($listAnhSanPham); ?>;

    function addfaqs() {
        var html = '<tr id="faqs-row' + faqs_row + '">';
        html += '<td><img src="https://th.bing.com/th/id/OIP.K_53vg76iyG2ZoqyQZkMXAHaI3?w=153&h=183&c=7&r=0&o=5&dpr=1.3&pid=1.7" style="width: 50px; height: 50px;" alt=""></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10">  <button class="badge badge-danger" type="button" onclick="removeRow(' + faqs_row + ', null)"><i class="fa fa-trash"></i> Delete</button></td>';
        html += '</tr>';
        $('#faqs tbody').append(html);
        faqs_row++;
    }

    function removeRow(rowId, imgId) {
        $('#faqs-row' + rowId).remove();
        if (imgId != null) {
            var imgDeleteInput = document.getElementById('img_delete');
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>

</html>