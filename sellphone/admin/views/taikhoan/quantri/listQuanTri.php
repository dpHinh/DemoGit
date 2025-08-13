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
                         <h1>Quản lý tài khoản quản trị viên</h1>
                    </div>
               </div>
          </div>
     </section>

     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12">

                         <div class="card-header">
                              <a href="<?= BASE_URL_ADMIN . '?act=formthemquantri' ?> ">
                                   <button class="btn btn-success">Thêm tài khoản</button>
                              </a>
                         </div>

                         <div class="card">
                              <div class="card-header"></div>

                              <div class="card-body">
                                   <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                             <tr>
                                                  <th>STT</th>
                                                  <th>Họ tên</th>
                                                  <th>Email</th>
                                                  <th>SDT</th>
                                                  <th>Trạng thái</th>
                                                  <th>Thao tác</th>
                                             </tr>
                                        </thead>

                                        <tbody>
                                             <?php foreach ($listQuanTri as $key => $quantri): ?>
                                                  <tr>
                                                       <td><?= $key + 1 ?></td>
                                                       <td><?= $quantri['hoten'] ?></td>
                                                       <td><?= $quantri['email'] ?></td>
                                                       <td><?= $quantri['dienthoai'] ?></td>
                                                       <td><?= $quantri['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?></td>
                                                       <td>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=formsuaquantri&id_quantri=' . $quantri['id'] ?>">
                                                                 <button class="btn btn-warning">Sửa</button>
                                                            </a>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=xoapassword&id_quantri=' . $quantri['id'] ?>"
                                                                 onclick="return confirm('Bạn có chắc muốn xóa tài khoản này không? ')">
                                                                 <button class="btn btn-danger">Xóa</button>
                                                            </a>
                                                       </td>
                                                  </tr>
                                             <?php endforeach; ?>
                                        </tbody>

                                        <tfoot>
                                             <tr>
                                                  <th>STT</th>
                                                  <th>Họ tên</th>
                                                  <th>Email</th>
                                                  <th>SDT</th>
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
          <!-- /.container-fluid -->
     </section>
     <!-- /.content -->
</div>

<!-- Footer -->
<?php include_once './views/layout/footer.php'; ?>
<!-- End Footer -->

<!-- Page specific script -->
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