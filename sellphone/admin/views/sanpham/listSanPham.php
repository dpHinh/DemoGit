<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/navbar.php'); ?>
<?php include_once('./views/layout/sidebar.php'); ?>
<div class="content-wrapper">
    <section>
        <div class="container_fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb-float-sm-right">
                        <li class="breadcrumb-item">home</li>
                        <li class="breadcrumb-item"></li>
                    </ol> -->
                </div>
            </div>
        </div>

    </section>


    <section>
        <div class="container_fluid">
            <div class="row">
                <div class=" col-12">

                    <div class="card">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN . '?act=formthemsanpham' ?>">
                                <button class="btn btn-success">thêm điện thoại mới</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>số lượng</th>
                                        <th>danh mục</th>
                                        <th>trạng thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $sanPham['ten_sp'] ?></td>
                                            <td><?= $sanPham['gia'] ?></td>
                                            <td> <img src="<?= BASE_URL . $sanPham['hinh'] ?>" style="width: 100px;"alt=""
                                                    onerror="this.onerror=null; this.src='https://th.bing.com/th/id/OIP.K_53vg76iyG2ZoqyQZkMXAHaI3?w=153&h=183&c=7&r=0&o=5&dpr=1.3&pid=1.7';"></td>
                                            <td><?= $sanPham['soluong'] ?></td>
                                            <td><?= $sanPham['ten_loai'] ?></td>
                                            <td><?= $sanPham['trang_thai'] == 1?'còn bán':'hết hàng' ?></td>
                                            <td> <a href="<?= BASE_URL_ADMIN . '?act=chitietsanpham&id_sanpham=' . $sanPham['id'] ?>">
                                                <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=formsuasanpham&id_sanpham=' . $sanPham['id'] ?>">
                                                <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoasanpham&id_sanpham=' . $sanPham['id'] . '&status=success' ?>"
                                                    onclick="return confirm('bạn có muốn xóa không ?')">
                                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                      <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>số lượng</th>
                                        <th>danh mục</th>
                                        <th>trạng thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once('./views/layout/footer.php'); ?>