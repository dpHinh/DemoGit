<?php

class AdminDanhMucController
{
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc()
    {
        require_once './views/danhmuc/addDanhMuc.php';
    }
    public function postAddDanhMuc() {
        if($_SERVER['REQUEST_METHOD']== 'POST'){
             $ten_loai = $_POST['ten_loai'];
             $mota = $_POST['mota'];

             $error = [];
             if(empty($ten_loai)){
                  $error['ten_loai'] = 'bạn phải nhập tên danh mục';
             }
             if(empty($error)){
                $this->modelDanhMuc->insertDanhMuc($ten_loai, $mota);
                header("Location:". BASE_URL_ADMIN . "?act=danhmuc&status=add_success");
                exit();
            }else{
                require_once './views/danhmuc/addDanhMuc.php';
            }
            }

    }
    public function formEditDanhMuc()
    {
        $id = $_GET['id_danhmuc'];
        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        if ($danhmuc) {
            require_once './views/danhmuc/editDanhMuc.php';
        } else {
            header("Location:" . BASE_URL_ADMIN . "?act=danhmuc");
            exit();
        }
    }
    public function postEditDanhMuc() {
         if($_SERVER['REQUEST_METHOD']== 'POST'){
            $id = $_POST['id'];
             $ten_loai = $_POST['ten_loai'];
             $mota = $_POST['mota'];

             $error = [];
             if(empty($ten_loai)){
                  $error['ten_loai'] = 'bạn phải nhập tên danh mục';
             }
             if(empty($error)){
                $this->modelDanhMuc->updateDanhMuc($id, $ten_loai, $mota);
                header("Location:". BASE_URL_ADMIN . "?act=danhmuc&status=update_success");
                exit();
            }else{
                $danhmuc = [
                    'id'=> $id,
                    'ten_loai'=> $ten_loai,
                    'mota'=> $mota,
                ];
                require_once './views/danhmuc/editDanhMuc.php';
            }
            }

    }
    public function deleteDanhMuc() {
        $id = $_GET['id_danhmuc'];
        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if($danhmuc){
            $this->modelDanhMuc->destroyDanhMuc($id);

        }
      header("Location:". BASE_URL_ADMIN . "?act=danhmuc&status=success");
      exit();
    }
}
