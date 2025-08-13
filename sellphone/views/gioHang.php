<head>
     <link rel="stylesheet" href="./LayoutClient/css/cart.css">
</head>

<?php require_once 'views/layout/header.php' ?>
<?php require_once 'views/layout/menu.php' ?>

<main>
     <div class="cart-container">
          <table class="cart-table">
               <thead>
                    <tr>
                         <th>Tên sản phẩm</th>
                         <th>Giá tiền</th>
                         <th>Số lượng</th>
                         <th>Tổng tiền</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    $tongGioHang = 0;
                    foreach ($chiTietGioHang as $key => $sanPham): ?>
                         <tr>
                              <td class="product-info">
                                   <input type="checkbox" name="" id="">
                                   <img src="<?= BASE_URL . $sanPham['hinh'] ?>" alt="Asgaard sofa">
                                   <span><?= $sanPham['ten_sp'] ?></span>
                              </td>
                              <td>
                                   <span>
                                        <?php if ($sanPham['giam_gia']) { ?>
                                             <?= formatNumber($sanPham['giam_gia']) . 'đ' ?>
                                        <?php } else { ?>
                                             <?= formatNumber($sanPham['giam_gia']) . 'đ' ?>
                                        <?php } ?>
                                   </span>
                              </td>
                              <td class="product-quantity">
                                   <div class="pro-qty">
                                        <button class="qty-btn decrement">-</button>
                                        <input type="text" style="width: 25px" value="<?= $sanPham['so_luong'] ?>" class="qty-input">
                                        <button class="qty-btn increment">+</button>
                                   </div>
                              </td>
                              <td>
                                   <?php
                                   $tongTien = 0;
                                   if ($sanPham['gia']) {
                                        $tongTien = $sanPham['gia'] * $sanPham['so_luong'];
                                   } else {
                                        $tongTien = $sanPham['gia'] * $sanPham['so_luong'];
                                   }
                                   $tongGioHang += $tongTien;
                                   echo formatNumber($tongTien) . ' đ';
                                   ?>
                              </td>
                              <!-- <td>
                                   <a href="?act=gio-hang&action=delete&product_id=<?= $sanPham['san_pham_id'] ?>" onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này?')">
                                        <i class="fas fa-trash" style="color: #D3D3D3;"></i>
                                   </a>


                              </td> -->
                         </tr>
                    <?php endforeach; ?>
               </tbody>
          </table>

          <div class="cart-summary">
               <h3>Tổng đơn hàng</h3>
               <div class="summary-item">
                    <span>Tổng tiền sản phẩm</span>
                    <span><?= formatNumber($tongGioHang) . ' đ' ?></span>
               </div>
               <div class="summary-item">
                    <span>Vận chuyển</span>
                    <span>10.000 đ</span>
               </div>
               <div class="summary-item">
                    <span>Tổng thanh toán</span>
                    <span class="total"><?= formatNumber($tongGioHang + 10000) . ' đ' ?></span>
               </div>
               <button class="checkout-btn"> Tiến hành đặt hàng</button>
          </div>
     </div>
</main>

<script src="./LayoutClient/js/cart.js"></script>

<?php require_once 'views/layout/footer.php' ?>