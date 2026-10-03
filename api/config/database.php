<?php
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: '';
$db   = getenv('DB_NAME') ?: 'warganet_db';
$port = (int)(getenv('DB_PORT') ?: 3306);

mysqli_report(MYSQLI_REPORT_OFF);
$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
    http_response_code(500);
    die('Koneksi database gagal. Periksa DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, dan DB_PORT di environment variables.');
}
$conn->set_charset('utf8mb4');
?>
