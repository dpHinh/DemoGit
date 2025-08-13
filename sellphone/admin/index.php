<?php

session_start();
require_once '../commons/env.php';
require_once '../commons/function.php';


// Khai báo các controller
require_once './controllers/AdminThongKeController.php';
require_once './controllers/AdminTaikhoanController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';

require_once './controllers/AdminDanhMucController.php';




// Khai báo các model
require_once './models/AdminTaikhoan.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';
require_once './models/AdminDonHang.php';

// route
$act = $_GET['act'] ?? '/';
    // if  ($act !== 'login-admin' && $act !== 'check-login-admin'&& $act!=='logout-admin'){
    //     checkLoginAdmin();
    // }

match ($act) {
      '/' => (new AdminThongKeController())->home(),

    // Tài khoản
    'listtaikhoanquantri' => (new AdminTaikhoanController())->danhSachQuanTri(),
    'formthemquantri' => (new AdminTaikhoanController())->formAddQuanTri(),
    'themquantri' => (new AdminTaikhoanController())->postAddQuanTri(),
    'formsuaquantri' => (new AdminTaikhoanController())->formEditQuanTri(),
    'suaquantri' => (new AdminTaikhoanController())->postEditQuanTri(),

    'xoapassword' => (new AdminTaikhoanController())->deletePassword(),

    'listtaikhoankhachhang' => (new AdminTaikhoanController())->danhSachKhachHang(),
    'chitietkhachhang' => (new AdminTaikhoanController())->detailKhachHang(),
    default => 'không tìm thấy trang này',

    // DANH MỤC
    'danhmuc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'formthemdanhmuc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'themdanhmuc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'formsuadanhmuc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'suadanhmuc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoadanhmuc' => (new AdminDanhMucController())->deleteDanhMuc(),

    // SẢN PHẨM
    'sanpham' => (new AdminSanPhamController())->danhSachSanPham(),
    'formthemsanpham' => (new AdminSanPhamController())->formAddSanPham(),
    'themsanpham' => (new AdminSanPhamController())->postAddSanPham(),
    'formsuasanpham' => (new AdminSanPhamController())->formEditSanPham(),
    'suasanpham' => (new AdminSanPhamController())->postEditSanPham(),
    'xoasanpham' => (new AdminSanPhamController())->deleteSanPham(),
    'chitietsanpham' => (new AdminSanPhamController())->detailSanPham(),
    'suaalbumanhsanpham' => (new AdminSanPhamController())->postEditAnhSanPham(),
    
    'updatetrangthaibinhluan' => (new AdminSanPhamController())->updateTrangThaiBinhLuan(),


    // ĐƠN HÀNG
    'don-hang' => (new AdminDonHangController())->danhSachDonHang(),
    'form-sua-don-hang' => (new AdminDonHangController())->formEditDonHang(),
    'sua-don-hang' => (new AdminDonHangController())->postEditDonHang(),
    'chi-tiet-don-hang' => (new AdminDonHangController())->detailDonHang(),

    // ĐĂNG NHẬP / ĐĂNG XUẤT
    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->login(),
    'logout-admin' => (new AdminTaiKhoanController())->logout(),
    'generate-hash' => (new AdminTaiKhoanController())->generateHash(),
};
