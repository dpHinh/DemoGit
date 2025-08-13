<!-- <header> -->
<?php include_once('./views/layout/header.php'); ?>
<!-- </header> -->
<!-- Navbar -->
<?php include_once('./views/layout/navbar.php'); ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include_once('./views/layout/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <section class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1>Quản lý tài khoản quản trị viên</h1>
                    </div>
               </div>
          </div>
     </section>

     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12">

                         <div class="card card-primary">
                              <div class="card-header">
                                   <h3 class="card-title">Sửa thong tin tài khoản quản trị viên: <?= $quantri['hoten'];  ?></h3>
                              </div>

                              <form action="" method="POST" enctype="multipart/form-data">
                                   <input type="hidden" name="quantri_id" value="<?= $quantri['id']; ?>">
                                   <div class="card-body">
                                        <div class="form-group">
                                             <label for="">Họ tên</label>
                                             <input type="text" class="form-control" name="hoten" value="<?= $quantri['hoten']; ?>" placeholder="Nhập họ tên quản trị viên">
                                        </div>

                                        <div class="form-group">
                                             <label for="">Email</label>
                                             <input type="email" class="from-control" name="email" value="<?= $quantri['email']; ?>" placeholder="Nhập email quản trị viên">
                                        </div>

                                        <div class="form-group">
                                             <label for="">Số điện thoại</label>
                                             <input type="text" class="form-control" name="dienthoai" value="<?= $quantri['dienthoai']; ?>" placeholder="Nhập SDT quản trị viên">
                                        </div>

                                        <div class="form-group">
                                             <label for="trang_thai">Trạng thái tài khoản</label>
                                             <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                                  <option <?= $quantri['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Hoạt động</option>
                                                  <option <?= $quantri['trang_thai'] !== 1 ? 'selected' : '' ?> value="1">Không hoạt động</option>
                                             </select>
                                        </div>
                                   </div>

                                   <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

</body>

</html>