<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/navbar.php'); ?>
<?php include_once('./views/layout/sidebar.php'); ?>
<div class="content-wrapper">
    <section>
        <div class="container_fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý danh sách Đơn Hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb-float-sm-right">
                        <li class="breadcrumb-item">home</li>
                        <li class="breadcrumb-item"></li>
                    </ol>
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
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>trạng thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    usort($listDonHang, function ($a, $b) {
                                        return $b['id'] - $a['id'];
                                    });
                                    ?>
                                    <?php foreach ($listDonHang as $key => $donHang): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $donHang['ma_don_hang'] ?></td>
                                            <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                            <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                            <td><?= $donHang['ngay_dat'] ?></td>
                                            <td><?= $donHang['tong_tien'] ?></td>
                                            <td><?= $donHang['ten_trang_thai'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_donhang=' . $donHang['id'] ?>">
                                                        <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                    </a>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_donhang=' . $donHang['id'] ?>">
                                                        <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
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

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Code injected by live-server -->

</body>

</html>