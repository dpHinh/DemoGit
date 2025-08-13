<head>
     <link rel="stylesheet" href="./LayoutClient/css/cart.css">
</head>

<?php require_once 'views/layout/header.php' ?>
<?php require_once 'views/layout/menu.php' ?>

<main>
     <div class="cart-container">
          <table class="cart-table table-responsive table table-bordered">
               <thead>
                    <tr>
                         <th>Mã đơn hàng</th>
                         <th>Ngày đặt</th>
                         <th>Tổng tiền</th>
                         <th>Phương thức thanh toán</th>
                         <th>Trạng thái đơn hàng</th>
                         <!-- <th>Tháo tác</th> -->
                    </tr>
               </thead>
               <tbody>
                    <?php foreach ($donHang as $donHang) : ?>
                         <tr>
                              <td class="text-center"><?= $donHang['ma_don_hang'] ?></>
                              <td class="text-center"><?= $donHang['ngay_dat'] ?></td>
                              <td class="text-center"><?= formatNumber($donHang['tong_tien']) ?> đ</td>
                              <td class="text-center"><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                              <td class="text-center"><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                         </tr>

                    <?php endforeach; ?>

               </tbody>
          </table>
     </div>
</main>
<script src="./LayoutClient/js/cart.js"></script>
<?php require_once 'views/layout/footer.php' ?>