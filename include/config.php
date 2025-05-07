<?php
$host = 'localhost';
$dbname = 'driving_test';
$username = 'root';
$password = ''; // Mặc định XAMPP để trống mật khẩu cho user root

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}
?>