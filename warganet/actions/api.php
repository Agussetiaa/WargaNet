<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config/database.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn->set_charset('utf8mb4');

function response_json($success, $data = null, $message = '') {
    http_response_code($success ? 200 : 400);
    echo json_encode(['success' => $success, 'data' => $data, 'message' => $message], JSON_UNESCAPED_UNICODE);
    exit;
}

function input_json() {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);
    return is_array($data) ? $data : $_POST;
}

function required($data, $key) {
    if (!isset($data[$key]) || trim((string)$data[$key]) === '') {
        throw new Exception("Field {$key} wajib diisi.");
    }
    return trim((string)$data[$key]);
}

function get_all_data($conn) {
    $result = [
        'warga' => [],
        'ronda' => [],
        'izin' => [],
        'kas' => [],
        'info' => []
    ];

    $q = $conn->query("SELECT id,nama_lengkap,nik,blok,no_rumah,jabatan,no_hp,status_hunian FROM warga ORDER BY nama_lengkap");
    while ($r = $q->fetch_assoc()) {
        unset($r['nip']);
        $result['warga'][] = [
            'id' => (string)$r['id'],
            'nama' => $r['nama_lengkap'],
            'nik' => $r['nik'] ?? '',
            'blok' => $r['blok'],
            'noRumah' => $r['no_rumah'],
            'jabatan' => $r['jabatan'],
            'hp' => $r['no_hp'],
            'statusTinggal' => $r['status_hunian']
        ];
    }

    $q = $conn->query("SELECT id,pekan,nama FROM ronda_kelompok ORDER BY pekan");
    while ($r = $q->fetch_assoc()) {
        $result['ronda'][$r['pekan']] = [
            'group' => (int)$r['pekan'],
            'name' => $r['nama'],
            'petugas' => []
        ];
    }
    $q = $conn->query("SELECT rp.kelompok_id, w.nama_lengkap
                       FROM ronda_petugas rp
                       JOIN warga w ON w.id=rp.warga_id
                       JOIN ronda_kelompok rk ON rk.id=rp.kelompok_id
                       ORDER BY rk.pekan, rp.id");
    while ($r = $q->fetch_assoc()) {
        $q2 = $conn->query("SELECT pekan FROM ronda_kelompok WHERE id=".(int)$r['kelompok_id']);
        $group = $q2->fetch_assoc();
        if ($group) {
            $result['ronda'][$group['pekan']]['petugas'][] = $r['nama_lengkap'];
        }
    }
    $result['ronda'] = array_values($result['ronda']);

    $q = $conn->query("SELECT i.id,w.nama_lengkap,w.blok,i.pekan,i.alasan,i.pengganti,i.tanggal_input
                       FROM izin_ronda i JOIN warga w ON w.id=i.warga_id
                       ORDER BY i.id DESC");
    while ($r = $q->fetch_assoc()) {
        $result['izin'][] = [
            'id'=>(string)$r['id'],
            'nama'=>$r['nama_lengkap'],
            'blok'=>$r['blok'],
            'pekan'=>(string)$r['pekan'],
            'alasan'=>$r['alasan'],
            'pengganti'=>$r['pengganti'],
            'tanggalInput'=>date('d/m/Y', strtotime($r['tanggal_input']))
        ];
    }

    $q = $conn->query("SELECT id,tanggal,blok,bendahara,keterangan,jenis,jumlah FROM kas ORDER BY tanggal DESC,id DESC");
    while ($r = $q->fetch_assoc()) {
        $result['kas'][] = [
            'id'=>(string)$r['id'],
            'tanggal'=>$r['tanggal'],
            'blok'=>$r['blok'],
            'bendahara'=>$r['bendahara'],
            'keterangan'=>$r['keterangan'],
            'jenis'=>$r['jenis'],
            'jumlah'=>(float)$r['jumlah']
        ];
    }

    $q = $conn->query("SELECT id,judul,tanggal,waktu,lokasi,keterangan FROM informasi ORDER BY tanggal DESC,id DESC");
    while ($r = $q->fetch_assoc()) {
        $result['info'][] = [
            'id'=>(string)$r['id'],
            'judul'=>$r['judul'],
            'tanggal'=>$r['tanggal'],
            'waktu'=>$r['waktu'],
            'lokasi'=>$r['lokasi'],
            'ket'=>$r['keterangan'] ?? ''
        ];
    }

    return $result;
}

try {
    $action = $_GET['action'] ?? $_POST['action'] ?? 'get_all';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $action === 'get_all') {
        response_json(true, get_all_data($conn));
    }

    $data = input_json();

    switch ($action) {
        case 'save_warga':
            $id = isset($data['id']) && $data['id'] !== '' ? (int)$data['id'] : 0;
            $nama = required($data, 'nama');
            $blok = required($data, 'blok');
            $noRumah = required($data, 'noRumah');
            $jabatan = required($data, 'jabatan');
            $hp = required($data, 'hp');
            $status = required($data, 'statusTinggal');
            $nik = trim((string)($data['nik'] ?? ''));

            if (!in_array($blok, ['A12','A12a'], true)) throw new Exception('Blok tidak valid.');
            if (!in_array($status, ['Tetap','Kontrak'], true)) throw new Exception('Status tinggal tidak valid.');

            $stmt = $conn->prepare("SELECT id FROM keluarga WHERE blok=? AND no_rumah=?");
            $stmt->bind_param('ss',$blok,$noRumah); $stmt->execute();
            $family = $stmt->get_result()->fetch_assoc();
            if ($family) $familyId=(int)$family['id'];
            else {
                $stmt=$conn->prepare("INSERT INTO keluarga (blok,no_rumah) VALUES (?,?)");
                $stmt->bind_param('ss',$blok,$noRumah); $stmt->execute();
                $familyId=$conn->insert_id;
            }

            if ($id) {
                $stmt=$conn->prepare("UPDATE warga SET keluarga_id=?,nama_lengkap=?,nik=?,blok=?,no_rumah=?,jabatan=?,no_hp=?,status_hunian=? WHERE id=?");
                $stmt->bind_param('isssssssi',$familyId,$nama,$nik,$blok,$noRumah,$jabatan,$hp,$status,$id);
            } else {
                $stmt=$conn->prepare("INSERT INTO warga (keluarga_id,nama_lengkap,nik,blok,no_rumah,jabatan,no_hp,status_hunian) VALUES (?,?,?,?,?,?,?,?)");
                $stmt->bind_param('isssssss',$familyId,$nama,$nik,$blok,$noRumah,$jabatan,$hp,$status);
            }
            $stmt->execute();
            response_json(true, null, 'Data warga berhasil disimpan.');
            break;

        case 'delete_warga':
            $id=(int)required($data,'id');
            $stmt=$conn->prepare("DELETE FROM warga WHERE id=?");
            $stmt->bind_param('i',$id); $stmt->execute();
            response_json(true,null,'Data warga berhasil dihapus.');
            break;

        case 'save_petugas':
            $pekan=(int)required($data,'pekan');
            $nama=required($data,'nama');
            $oldNama=trim((string)($data['oldNama'] ?? ''));
            if ($pekan < 1 || $pekan > 5) throw new Exception('Pekan ronda tidak valid.');

            $stmt=$conn->prepare("SELECT id FROM ronda_kelompok WHERE pekan=?");
            $stmt->bind_param('i',$pekan); $stmt->execute();
            $group=$stmt->get_result()->fetch_assoc();
            if (!$group) throw new Exception('Kelompok ronda tidak ditemukan.');

            $stmt=$conn->prepare("SELECT id FROM warga WHERE nama_lengkap=?");
            $stmt->bind_param('s',$nama); $stmt->execute();
            $w=$stmt->get_result()->fetch_assoc();
            if (!$w) throw new Exception('Warga tidak ditemukan di database.');

            if ($oldNama !== '') {
                $stmt=$conn->prepare("SELECT id FROM warga WHERE nama_lengkap=?");
                $stmt->bind_param('s',$oldNama); $stmt->execute();
                $old=$stmt->get_result()->fetch_assoc();
                if ($old) {
                    $stmt=$conn->prepare("UPDATE ronda_petugas SET warga_id=? WHERE kelompok_id=? AND warga_id=?");
                    $wid=(int)$w['id']; $gid=(int)$group['id']; $oldid=(int)$old['id'];
                    $stmt->bind_param('iii',$wid,$gid,$oldid); $stmt->execute();
                }
            } else {
                $wid=(int)$w['id']; $gid=(int)$group['id'];
                $stmt=$conn->prepare("INSERT IGNORE INTO ronda_petugas (kelompok_id,warga_id) VALUES (?,?)");
                $stmt->bind_param('ii',$gid,$wid); $stmt->execute();
            }
            response_json(true,null,'Petugas ronda berhasil disimpan.');
            break;

        case 'delete_petugas':
            $pekan=(int)required($data,'pekan');
            $nama=required($data,'nama');
            $stmt=$conn->prepare("DELETE rp FROM ronda_petugas rp JOIN ronda_kelompok rk ON rk.id=rp.kelompok_id JOIN warga w ON w.id=rp.warga_id WHERE rk.pekan=? AND w.nama_lengkap=?");
            $stmt->bind_param('is',$pekan,$nama); $stmt->execute();
            response_json(true,null,'Petugas ronda berhasil dihapus.');
            break;

        case 'save_izin':
            $nama=required($data,'nama'); $pekan=(int)required($data,'pekan');
            $alasan=required($data,'alasan'); $pengganti=trim((string)($data['pengganti'] ?? '-')) ?: '-';
            $stmt=$conn->prepare("SELECT id FROM warga WHERE nama_lengkap=?");
            $stmt->bind_param('s',$nama); $stmt->execute(); $w=$stmt->get_result()->fetch_assoc();
            if (!$w) throw new Exception('Warga tidak ditemukan.');
            $wid=(int)$w['id']; $today=date('Y-m-d');
            $stmt=$conn->prepare("INSERT INTO izin_ronda (warga_id,pekan,alasan,pengganti,tanggal_input) VALUES (?,?,?,?,?)");
            $stmt->bind_param('iisss',$wid,$pekan,$alasan,$pengganti,$today); $stmt->execute();
            response_json(true,null,'Pengajuan izin ronda berhasil disimpan.');
            break;

        case 'save_kas':
            $blok=required($data,'blok'); $bendahara=required($data,'bendahara'); $jenis=required($data,'jenis');
            $tanggal=required($data,'tanggal'); $jumlah=(float)required($data,'jumlah'); $ket=required($data,'keterangan');
            if (!in_array($blok,['A12','A12a'],true) || !in_array($jenis,['MASUK','KELUAR'],true) || $jumlah <= 0) throw new Exception('Data transaksi kas tidak valid.');
            $stmt=$conn->prepare("INSERT INTO kas (tanggal,blok,bendahara,keterangan,jenis,jumlah) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param('sssssd',$tanggal,$blok,$bendahara,$ket,$jenis,$jumlah); $stmt->execute();
            response_json(true,null,'Transaksi kas berhasil disimpan.');
            break;

        case 'delete_kas':
            $id=(int)required($data,'id');
            $stmt=$conn->prepare("DELETE FROM kas WHERE id=?"); $stmt->bind_param('i',$id); $stmt->execute();
            response_json(true,null,'Transaksi kas berhasil dihapus.');
            break;

        case 'save_info':
            $judul=required($data,'judul'); $tanggal=required($data,'tanggal'); $waktu=required($data,'waktu'); $lokasi=required($data,'lokasi');
            $ket=trim((string)($data['ket'] ?? ''));
            $stmt=$conn->prepare("INSERT INTO informasi (judul,tanggal,waktu,lokasi,keterangan) VALUES (?,?,?,?,?)");
            $stmt->bind_param('sssss',$judul,$tanggal,$waktu,$lokasi,$ket); $stmt->execute();
            response_json(true,null,'Informasi berhasil disimpan.');
            break;

        case 'delete_info':
            $id=(int)required($data,'id');
            $stmt=$conn->prepare("DELETE FROM informasi WHERE id=?"); $stmt->bind_param('i',$id); $stmt->execute();
            response_json(true,null,'Informasi berhasil dihapus.');
            break;

        default:
            response_json(false,null,'Aksi tidak dikenali.');
    }
} catch (Throwable $e) {
    response_json(false,null,$e->getMessage());
}
?>
