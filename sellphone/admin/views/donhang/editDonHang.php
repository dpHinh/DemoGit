<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/navbar.php'); ?>
<?php include_once('./views/layout/sidebar.php'); ?>
<?php include_once('./views/layout/footer.php'); ?>
<div class="content-wrapper">
   <section  class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý thông tin đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"></li>
                    <li class="breadcrumb-item"></li></ol>
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
                    <h3 class=" card-title">Chỉnh sửa thông tin đơn hàng: <?= $donHang['ma_don_hang']; ?></h3>
                </div>
                <form action="<?= BASE_URL_ADMIN .'?act=sua-don-hang'?>" method="POST">
    <input type="hidden" name="don_hang_id" value="<?= $donHang['id']?>">

    <div class="card-body">
        <div class="form-group">
            <label for="inputStatus">Trạng thái đơn hàng</label>                                    
            <select id="inputStatus" name="trang_thai_id" class="form-control">
                <?php foreach ($listTrangThaiDonHang as $trangThai): ?>
                    <option 
                        <?php
                            if($donHang['trang_thai_id'] > $trangThai['id']
                            || $donHang['trang_thai_id'] == 9
                            || $donHang['trang_thai_id'] == 10
                            || $donHang['trang_thai_id'] == 11)
                            {
                                echo'disabled';
                            }
                        ?> 
                        <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?> 
                        value="<?= $trangThai['id']; ?>">
                        <?= $trangThai['ten_trang_thai']; ?>
                    </option>
                <?php endforeach ?>
            </select>                                   
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
</form>

            </div>
            </div>
        </div>
     </div>
</section>
</div>
