<?php


 
class AdminTaikhoanController
{
     public $modelTaiKhoan;
     public $modelDonHang;
     public $modelSanPham;

     public function __construct()
     {
          $this->modelTaiKhoan = new AdminTaikhoan();
          $this->modelDonHang = new AdminDonHang();
          $this->modelSanPham = new AdminSanPham();
     }
   public function formLogin()
    {
        require_once './views/auth/formlogin.php';
        deleteSessionError();
        exit();
    }
     public function generateHash(){
          $hash = password_hash('123', PASSWORD_DEFAULT);
           echo "Hash của mật khẩu '123' là: <br>" . $hash;
             exit();
     }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            if ($user == $email) {
                $_SESSION['user_admin'] = $user;
                header("Location: " . BASE_URL_ADMIN);
                exit();
            } else {
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }
    public function logout()
    {
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header("location: " . BASE_URL_ADMIN . '?act=login-admin');
        }
    }
     public function danhSachQuanTri()
     {
          $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
          // var_dump($listQuanTri);
          // die();
          require_once './views/taikhoan/quantri/listQuanTri.php';
     }

     public function formAddQuanTri()
     {
          require_once './views/taikhoan/quantri/addQuanTri.php';
     }

     public function postAddQuanTri()
     {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $hoten = $_POST['hoten'];
               $email = $_POST['email'];

               $error = [];
               if (empty($hoten)) {
                    $error['hoten'] = 'Bạn phải nhập tên quản trị';
               }

               if (empty($email)) {
                    $error['email'] = 'Bạn phải nhập email quản trị';
               }

               $_SESSION['error'] = $error;

               if (empty($error)) {
                    $password = password_hash('123456', PASSWORD_BCRYPT);

                    $role = 1;

                    $this->modelTaiKhoan->insertTaiKhoan($hoten, $email, $password, $role);


                    header("Location: " . BASE_URL_ADMIN . "?act=listtaikhoanquantri");
                    exit();
               } else {
                    $_SESSION['flash'] = true;
                    header("Location: " . BASE_URL_ADMIN . "?act=formthemquantri");
                    exit();
               }
          }
     }

     public function formEditQuanTri()
     {
          $id_quantri = $_GET['id_quantri'];
          $quantri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quantri);
          // var_dump($quantri);
          // die();
          require_once './views/taikhoan/quantri/editQuantri.php';
     }

     public function postEditQuanTri()
     {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $quantri_id = $_POST['quantri_id'] ?? '';

               $hoten = $_POST['hoten'] ?? '';
               $email = $_POST['email'] ?? '';
               $dienthoai = $_POST['dienthoai'] ?? '';
               $trang_thai = $_POST['trang_thai'] ?? '';

               $error = [];

               if (empty($hoten)) {
                    $error['hoten'] = ' Bạn phải nhập tên quản trị';
               }
               if (empty($email)) {
                    $error['email'] = ' Bạn phải nhập email quản trị';
               }
               if (empty($dienthoai)) {
                    $error['dienthoai'] = ' Bạn phải nhập số điện thoại quản trị';
               }
               if (empty($trang_thai)) {
                    $error['trang_thai'] = ' Bạn phải nhập trạng thái quản trị';
               }

               $_SESSION['error'] = $error;
               // var_dump($error);
               // die();
               if (empty($error)) {
                    $this->modelTaiKhoan->updateTaiKhoan($quantri_id, $hoten, $email, $dienthoai, $trang_thai);

                    header("Loccation: " . BASE_URL_ADMIN . "?act=listtaikhoanquantri");
                    exit();
               } else {
                    $_SESSION['flash'] = true;
                    header("Location: " . BASE_URL_ADMIN . "?act=formsuaquantri&id_quantri=" . $quantri_id);
                    exit();
               }
          }
     }


     public function deletePassword()
     {
          $tai_khoan_id = $_GET['id_quantri'];
          $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
          $password = password_hash('123456', PASSWORD_BCRYPT);
          $status = $this->modelTaiKhoan->deletePassword($tai_khoan_id, $password);
          // var_dump($status);
          // die();
          if ($status && $tai_khoan['role'] ==  1) {
               header("Location: " . BASE_URL_ADMIN . '?act=listtaikhoanquantri');
               exit();
          } elseif ($status && $tai_khoan['role'] == 0) {
               header("Location: " . BASE_URL_ADMIN . '?act=listtaikhoankhachhang');
               exit();
          } else {
               var_dump('Lỗi không xóa được tài khoản');
               die();
          }
     }

     // khách hàng 

     public function danhSachKhachHang()
     {
          $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(0);
          // var_dump($listKhachHang);
          // die();
          require_once './views/taikhoan/khachhang/listKhachHang.php';
     }

     public function detailKhachHang()
     {
          $id_khachhang = $_GET['id_khachhang'];
          $khachHang  =  $this->modelTaiKhoan->getDetailTaiKhoan($id_khachhang);

          $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khachhang);

          $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khachhang);

          require_once './views/taikhoan/khachhang/detailKhachHang.php';
     }

}
