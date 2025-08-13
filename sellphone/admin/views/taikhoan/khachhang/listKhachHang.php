<!-- <header> -->
<?php include_once('./views/layout/header.php'); ?>
<!-- </header> -->
<!-- Navbar -->
<?php include_once('./views/layout/navbar.php'); ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include_once('./views/layout/sidebar.php'); ?>


<div class="content-wrapper">
     <section class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1>Quản lý tài khoản khách hàng</h1>
                    </div>
               </div>
          </div>
     </section>

     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12">
                         <div class="card">

                              <div class="card-body">
                                   <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                             <tr>
                                                  <th>STT</th>
                                                  <th>Họ tên</th>
                                                  <th>Ảnh đại diện</th>
                                                  <th>Email</th>
                                                  <th>Số điện thoại</th>
                                                  <th>Trạng thái</th>
                                                  <th>Thao tác</th>
                                             </tr>
                                        </thead>

                                        <tbody>
                                             <?php foreach ($listKhachHang as $key => $khachHang): ?>
                                                  <tr>
                                                       <td><?= $key + 1 ?></td>
                                                       <td><?= $khachHang['hoten'] ?></td>
                                                       <td>
                                                            <img src="<?= BASE_URL . $khachHang['hinh'] ?>" style="width:100px" alt=""
                                                                 onerror="this.onerror=null; this.src='https://pluspng.com/img-png/user-png-icon-download-icons-logos-emojis-users-2240.png';">
                                                       </td>
                                                       <td><?= $khachHang['email'] ?></td>
                                                       <td><?= $khachHang['dienthoai'] ?></td>
                                                       <td><?= $khachHang['trang_thai'] == 1 ? 'Hoạt động' : 'không hoạt động' ?></td>
                                                       <td>
                                                            <div class="btn-group">
                                                                 <a href="<?= BASE_URL_ADMIN . '?act=chitietkhachhang&id_khachhang=' . $khachHang['id'] ?>">
                                                                      <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                                                                 </a>
                                                            </div>
                                                       </td>
                                                  </tr>
                                             <?php endforeach; ?>
                                        </tbody>

                                        <tfoot>
                                             <tr>
                                                  <th>STT</th>
                                                  <th>Họ tên</th>
                                                  <th>Ảnh đại diện</th>
                                                  <th>Email</th>
                                                  <th>Số điện thoại</th>
                                                  <th>Trạng thái</th>
                                                  <th>Thao tác</th>
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


<!-- Footer -->
<?php include_once './views/layout/footer.php'; ?>
<!-- End Footer -->

<!-- Page specific script -->
<script>
     $(function() {
          $(" #example1").DataTable({
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