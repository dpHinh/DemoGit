     <?php

        class AdminDonHangController
        {
            public $modelDonHang;

            public function __construct()
            {
                $this->modelDonHang = new AdminDonHang();
            }
            public function danhSachDonHang()
            {
                $listDonHang = $this->modelDonHang->getAllDonHang();
                require_once './views/donhang/listDonHang.php';
            }


            public function detailDonHang()
            {
                $don_hang_id = $_GET['id_donhang'];

                //lấy thông tin đơn hàng ở bảng don_hang
                $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

                //lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hang
                $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);

                $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

                require_once './views/donhang/detailDonHang.php';
            }


            public function formEditDonHang()
            {
                $id = $_GET['id_donhang'];
                $donHang = $this->modelDonHang->getDetailDonHang($id);
                $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
                if ($donHang) {
                    require_once './views/donhang/editDonHang.php';
                    deleteSessionError();
                } else {
                    header("Location:" . BASE_URL_ADMIN . "?act=don-hang");
                    exit();
                }
            }
            public function postEditDonHang()
            {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $don_hang_id = $_POST['don_hang_id'] ?? '';
                    $trang_thai_id = $_POST['trang_thai_id'] ?? '';

                    $error = [];
                    if (empty($trang_thai_id)) {
                        $error['trang_thai_id'] = 'Trạng thái đơn hàng không được để trống';
                    }

                    $_SESSION['error'] = $error;

                    if (empty($error)) {
                        $this->modelDonHang->updateDonHang(
                            $don_hang_id,
                            $trang_thai_id
                        );
                        header("Location:" . BASE_URL_ADMIN . "?act=don-hang");
                        exit();
                    } else {
                        $_SESSION['flash'] = true;
                        header("Location:" . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_donhang=' . $don_hang_id);
                        exit();
                    }
                }
            }
        }
