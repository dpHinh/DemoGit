<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/navbar.php'); ?>
<?php include_once('./views/layout/sidebar.php'); ?>
<div class="content-wrapper">
    <section>
        <div class="container_fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb-float-sm-right">
                        <li class="breadcrumb-item"></li>
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
                            <a href="<?= BASE_URL_ADMIN . '?act=formthemdanhmuc' ?>">
                                <button class="btn btn-success">thêm danh mục</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Danh Mục</th>
                                        <th>Mô Tả</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listDanhMuc as $key => $danhmuc): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $danhmuc['ten_loai'] ?></td>
                                            <td><?= $danhmuc['mota'] ?></td>
                                            <td> <a href="<?= BASE_URL_ADMIN . '?act=formsuadanhmuc&id_danhmuc=' . $danhmuc['id'] ?>">
                                                <button class="btn btn-warning">sửa</button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoadanhmuc&id_danhmuc=' . $danhmuc['id'] . '&status=success' ?>"
                                                    onclick="return confirm('bạn có muốn xóa không ?')">
                                                    <button class="btn btn-danger">xóa</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Danh Mục</th>
                                        <th>Mô Tả</th>
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