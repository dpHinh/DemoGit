<?php
// session_start();
class HomeController
{

    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;
    public $modelBinhLuan;
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
        $this->modelBinhLuan = new BinhLuan();
        $this->modelDanhMuc = new DanhMuc();
    }

    public function home()
    {
        $listSanPhamHot = $this->modelSanPham->getSanPhamHot();

        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    public function SanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/productSanPham.php';
        return $listSanPham;
    }

    public function gioiThieu()
    {
        include_once './views/gioiThieu.php';
    }

    public function lienHe()
    {
        include_once './views/lienHe.php';
    }


    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        exit();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if ($user == $email) {
                $_SESSION['user_client'] = $user;
                header('Location:' . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;

                $_SESSION['flash'] = true;
                header('Location:' . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            unset($_SESSION['tai_khoan_id']);
            header('Location:' . BASE_URL . '?act=trangchu');
        }
    }

    public function formSignup()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }

    public function postSignup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $result = $this->modelTaiKhoan->getDangKyTaiKhoan($username, $email, $password);

            if ($result === true) {
                $_SESSION['success'] = "Đăng ký thành công";
                header("Location: " . BASE_URL . "?act=login");
                exit();
            } else {
                $_SESSION['error'] = $result;
                $_SESSION['flash'] =  true;
                header("Location: " . BASE_URL . '?act=form-signup');
                exit();
            }
        }
    }

    public function SanPhamTheoDanhMuc()
    {
        $idDanhMuc = isset($_GET['id']) ? $_GET['id'] : 0;
        $listSanPham = $this->modelSanPham->getSanPhamTheoDanhMuc($idDanhMuc);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/productSanPham.php';
    }

    public function trangchu()
    {
        $listSanPhamHot = $this->modelSanPham->getSanPhamHot();
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }


    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_SESSION['user_client']) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }

                header("Location: " . BASE_URL . '?act=gio-hang');
            } else {
                var_dump('chưa đăng nhập');
                die();
            }
        }
    }

    public function gioHang()
    {
        if ($_SESSION['user_client']) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/gioHang.php';
        } else {
            header("location:" . BASE_URL . '?act=login');
        }
    }

    public function thanhToan()
    {
        if ($_SESSION['user_client']) {
            // post dữ liệu từ giỏ hàng nếu có 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['chon_san_pham'])) {
                $_SESSION['gio_hang_chon'] == $_POST['chon_san_pham'];
                header("Location:" . BASE_URL . "?act=thanh-toan");
                exit();
            }

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            $chiTietGioHang = [];

            if ($gioHang) {
                $tatCaSanPham = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                if (isset($_SESSION['gio_hang_chon'])) {
                    foreach ($tatCaSanPham as $sp) {
                        if (in_array($sp['san_pham_id'], $_SESSION['gio_hang_chon'])) {
                            $chiTietGioHang[] = $sp;
                        }
                    }
                } else {
                    $chiTietGioHang = $tatCaSanPham;
                }
            }
            require_once './views/thanhToan.php';
        } else {
            var_dump('Bạn chưa đăng nhập');
            die();
        }
    }
    public function getSanPhamHot()
    {
        $listSanPhamHot = $this->modelSanPham->getSanPhamHot();
        return $listSanPhamHot;
    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;

            if ($phuong_thuc_thanh_toan_id == 2) {
                $trang_thai_id = 2;
            }

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];
            $ma_don_hang = 'DH-' . rand(1000, 9999);

            $donHang = $this->modelDonHang->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );
            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
            if ($donHang) {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['giam_gia'] ?? $item['gia'];
                    $this->modelDonHang->addChiTietDonHang(
                        $donHang,
                        $item['san_pham_id'],
                        $donGia,
                        $item['so_luong'],
                        $donGia * $item['so_luong']
                    );
                    $this->modelGioHang->clearDetailGioHang($gioHang['id']);
                }


                $this->modelGioHang->clearGioHang($tai_khoan_id);

                header("Location: " . BASE_URL . '?act=thanh-toan-thanh-cong');
                exit();
            } else {
                var_dump('Thêm đơn hàng thất bại');
                die();
            }
        }
    }

    public function ChiTietSanPham()
    {

        $id = $_GET['id_sanpham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else if ($listSanPhamCungDanhMuc) {
            require_once './views/productSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function binhLuan()
    {
        if (isset($_POST['san_pham_id']) && isset($_POST['noi_dung']) && isset($_POST['tai_khoan_id'])) {
            $san_pham_id = $_POST['san_pham_id'];
            $noi_dung = $_POST['noi_dung'];
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $ngay_bl = date('Y-m-d H:i:s');
            $tai_khoan_id = $_SESSION['tai_khoan_id']  ?? null;

            if ($san_pham_id && $noi_dung && $tai_khoan_id) {
                $binhLuan1 = $this->modelBinhLuan->addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung,  $ngay_bl);
                header("Location: " . BASE_URL . "?act=chi-tiet-san-pham&id_sanpham=" . $san_pham_id);
                exit();
            } else {
                echo " vui lòng đăng nhập để điền đầy đủ thông tin";
            }
        } else {
            echo "dữ liệu không hợp lệ";
        }
    }

    public function thanhToanThanhCong()
    {
        require_once "./views/thanhToanThanhCong.php";
    }

    public function huyDonHang()
    {
        if (isset($_GET['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $donHangId = $_GET['id'];
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền hủy đơn này";
                exit();
            }

            if ($donHang['trang_thai_id'] != 1) {
                echo "Chỉ đơn hàng ở trạng thái 'Chưa xác nhận' mới có thể hủy";
                exit();
            }
        } else {
            var_dump("Bạn chưa đăng nhập");
            exit();
        }
    }

    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            //lấy ra thông tin tài khoản đăng nhập
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            //lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            //lấy ra danh sách trạng thái thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            //lấy ra danh sách tất cả đơn hàng của tài khoản
            $donHang = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            require_once "./views/lichSuMuaHang.php";
        } else {
            var_dump('Bạn chưa đăng nhập');
            die;
        }
    }
};
