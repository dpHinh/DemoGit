<?php

class AdminTaiKhoan
{
     public $conn;
     public function __construct()
     {
          $this->conn = connectDB();
     }

     public function getAllTaiKhoan($role)
     {
          try {
               $sql = "SELECT * FROM tai_khoan WHERE role = :role";

               $stmt = $this->conn->prepare($sql);

               $stmt->execute([':role' => $role]);

               return $stmt->fetchAll();
          } catch (Exception $e) {
               echo "Loi " . $e->getMessage();
          }
     }

     public function insertTaiKhoan($hoten, $email, $password, $role)
     {
          try {
               $sql = "INSERT INTO tai_khoan (hoten, email, mat_khau, role)
               VALUES (:hoten, :email, :matkhau, :role)";
               $stmt = $this->conn->prepare($sql);
               // var_dump($stmt);
               // die();
               $stmt->execute([
                    ':hoten' => $hoten,
                    ':email' => $email,
                    ':matkhau' => $password,
                    ':role' => $role
               ]);
               return true;
          } catch (Exception $e) {
               echo "Loi " . $e->getMessage();
          }
     }

     public function getDetailTaiKhoan($id)
     {
          try {
               $sql = "SELECT * FROM tai_khoan WHERE id = :id";
               $stmt = $this->conn->prepare($sql);
               $stmt->execute([
                    ':id' => $id
               ]);
               return $stmt->fetch();
          } catch (Exception $e) {
               echo "Loi " . $e->getMessage();
          }
     }

     public function updateTaiKhoan($id, $hoten, $email, $dienthoai, $trang_thai)
     {
          try {
               $sql = "UPDATE tai_khoan SET
               hoten = :hoten, 
               email = :email,
               dienthoai = :dienthoai,
               trang_thai = :trang_thai
               WHERE id = :id";

               $stmt = $this->conn->prepare($sql);

               $stmt->execute([
                    ':hoten' => $hoten,
                    ':email' => $email,
                    ':dienthoai' => $dienthoai,
                    ':trang-thai' => $trang_thai,
                    ':id' => $id
               ]);

               return true;
          } catch (Exception $e) {
               echo "Loi " . $e->getMessage();
          }
     }

     public function deletePassword($id, $mat_khau)
     {
          try {
               $sql = "UPDATE tai_khoan 
               SET
               mat_khau = :mat_khau
               WHERE id = :id";

               $stmt = $this->conn->prepare($sql);
               // var_dump($stmt);
               // die();
               $stmt->execute([
                    ':mat_khau' => $mat_khau,
                    ':id' => $id
               ]);
               return true;
          } catch (Exception $e) {
               echo "Loi " . $e->getMessage();
          }
     }

     public function checkLogin($email, $mat_khau)
     {
          try {
               $sql = "SELECT * FROM tai_khoan WHERE email = :email";
               $stmt = $this->conn->prepare($sql);
               $stmt->execute([
                    ':email' => $email
               ]);
               $user = $stmt->fetch();
               if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                    if ($user['role'] == 1) {
                         if ($user['trang_thai'] == 1) {
                              return $user['email'];
                         } else {
                              return "tài khoản bị cấm !";
                         }
                    } else {
                         return " tài khoản không có quyền đăng nhập !";
                    }
               } else {
                    return "bạn nhập sai tài khoản hoặc mật khẩu ";
               }
          } catch (\Exception $e) {
               echo "lỗi " . $e->getMessage();
               return false;
          }
     }

}
