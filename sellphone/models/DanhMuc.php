<?php

class DanhMuc
{
     public $conn;
     public function __construct()
     {
          $this->conn = connectDB();
     }
     public function getAllDanhMuc()
     {
          try {
               $sql = "SELECT * FROM danhmuc";
               $stmt = $this->conn->prepare($sql);
               $stmt->execute();
               return $stmt->fetchAll();
          } catch (PDOException $e) {
               echo "lỗi" . $e->getMessage();
               return false;
          }
     }
}
