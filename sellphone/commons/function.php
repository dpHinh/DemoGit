<?php

// Kết nối CSDL qua PDO
function connectDB()
{
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}
function uploadFile($file, $folderUpload)
{
    $pathStrorage = $folderUpload . time() . $file['name'];
    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStrorage;

    if (move_uploaded_file($from, $to)) {
        return $pathStrorage;
    }
    return null;
}

function deleteFile($file)
{
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}
function deleteSessionError()
{
    if (isset($_SESSION['flash'])) {
        unset($_SESSION['flash']);
        session_unset();
        session_destroy();
    }
}

function uploadFileAlbum($file, $folderUpload, $key)
{
    $originalName  = basename($file['name'][$key]);
    $filename  = time() . '_' . $originalName;
    $folderUpload  = rtrim($folderUpload, '/') . '/';

    $relativePath = $folderUpload . $filename;

    $to = PATH_ROOT . '/' . $relativePath;

    if (!is_dir(PATH_ROOT . '/' . $folderUpload)) {
        mkdir(PATH_ROOT . '/' . $folderUpload, 0777, true);
    }
    if (move_uploaded_file($file['tmp_name'][$key], $to)) {
        return $relativePath;
    }
    return null;
}
function formatDate($date)
{
    return date('d-m-Y', strtotime($date));
}
function formatNumber($number)
{
    return number_format($number, 0, '.', '.');
}
function checkLoginAdmin()
{
    if (!isset($_SESSION['user_admin'])) {
        header("location:" . BASE_URL_ADMIN . '?act=login-admin');
        exit();
    }
}
