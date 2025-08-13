<?php

class BinhLuan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_bl)
    {
        try {
            $sql = "INSERT INTO binhluan (san_pham_id, tai_khoan_id, noi_dung,ngay_bl) VALUES (:san_pham_id, :tai_khoan_id, :noi_dung,:ngay_bl)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':tai_khoan_id' => $tai_khoan_id,
                ':noi_dung' => $noi_dung,
                ':ngay_bl' => $ngay_bl,
            ]);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            error_log("lỗi khi thêm bình luận" . $e->getMessage());
            return false;
        }
    }
}
