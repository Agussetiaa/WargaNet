<?php
// Endpoint lama dipertahankan agar kompatibel dengan form eksternal.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_GET['action'] = 'save_warga';
    $_POST['noRumah'] = $_POST['no_rumah'] ?? '';
    $_POST['statusTinggal'] = $_POST['status_tinggal'] ?? 'Tetap';
    $_POST['nik'] = $_POST['nik'] ?? '';
    $_POST['jabatan'] = $_POST['jabatan'] ?? 'Warga';
    $_POST['hp'] = $_POST['hp'] ?? '-';
    require_once __DIR__ . '/api.php';
    exit;
}
header('Location: ../index.php');
exit;
?>