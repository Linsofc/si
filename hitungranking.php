<?php
session_start();

if (!isset($_SESSION['bobotc1']) && !isset($_SESSION['bobotc2']) && !isset($_SESSION['bobotc3'])) {
    echo "<script>alert('Anda belum melakukan perhitungan bobot!!'); window.location='./perhitungan.php'</script>";
    exit;
} elseif ($_SESSION['kesimpulan'] != 'Konsisten') {
    echo "<script>alert('Data vote tidak konsisten, lakukan perhitungan lagi dengan data yang konsiten!!'); window.location='./perhitungan.php'</script>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "ahp_perikanan");
$query = "SELECT * FROM data_perikanan";
$result = mysqli_query($conn, $query);
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $pk = $row['id']; 
    $data[$pk] = $row;
}

$totalc1 = 0;
$totalc2 = 0;
$totalc3 = 0;

foreach ($data as $d) {
    $totalc1 += $d['c1_produksi'];
    $totalc2 += $d['c2_rtp'];
    $totalc3 += $d['c3_kapal'];
}

$kalkulasi_norm = [];
$kalkulasi_skor = [];

foreach ($data as $id => $d) {

    $norm_c1 = round((float)$d['c1_produksi'] / (float)$totalc1, 3);
    $norm_c2 = round((float)$d['c2_rtp'] / (float)$totalc2, 3);
    $norm_c3 = round((float)$d['c3_kapal'] / (float)$totalc3, 3);

    $kalkulasi_norm[$id] = [
        'c1' => $norm_c1,
        'c2' => $norm_c2,
        'c3' => $norm_c3
    ];
}

if (isset($_POST['skor'])) {
 
    $bobot1 = (float)$_SESSION['bobotc1'];
    $bobot2 = (float)$_SESSION['bobotc2'];
    $bobot3 = (float)$_SESSION['bobotc3'];

    $data_ranking_akhir = []; 

    foreach ($kalkulasi_norm as $id => $norm) {

        $skor_c1 = round($norm['c1'] * $bobot1, 3);
        $skor_c2 = round($norm['c2'] * $bobot2, 3);
        $skor_c3 = round($norm['c3'] * $bobot3, 3);

        $total_skor = round($skor_c1 + $skor_c2 + $skor_c3, 3);

        $kalkulasi_skor[$id] = [
            'sc1' => $skor_c1,
            'sc2' => $skor_c2,
            'sc3' => $skor_c3,
            'total' => $total_skor
        ];

        $nama_lokasi = $data[$id]['lokasi'];
        $data_ranking_akhir[$nama_lokasi] = $total_skor;
    }

    arsort($data_ranking_akhir);
    
    $_SESSION['totalskor'] = $data_ranking_akhir;
}
?>

<head>
    <link rel="stylesheet" href="./css/table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/navbar.css">
</head>

<body>
    <?php require_once __DIR__ . "/include/navbar.php"; ?>

    <div class="container-sm">
        <h2>Data Mentah</h2>
        <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
            <tr class="table-dark">
                <th>No</th>
                <th>Nama Lokasi</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
            </tr>
            <?php 
            $nomor = 1;
            foreach ($data as $d): ?>
                <tr>
                    <td><?= $nomor++ ?></td>
                    <td><?= $d['lokasi'] ?></td>
                    <td><?= $d['c1_produksi'] ?></td>
                    <td><?= $d['c2_rtp'] ?></td>
                    <td><?= $d['c3_kapal'] ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <th colspan="2">Total</th>
                <td><?= $totalc1 ?></td>
                <td><?= $totalc2 ?></td>
                <td><?= $totalc3 ?></td>
            </tr>
        </table>
    </div>

    <div class="container-sm">
        <h2>Bobot Akhir Kriteria</h2>
        <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
            <tr class="table-dark">
                <th>Kriteria</th>
                <th>Bobot</th>
            </tr>
            <tr>
                <th>Produksi Perikanan Tangkap (Ton) (C1)</th>
                <td><?= $_SESSION['bobotc1'] ?></td>
            </tr>
            <tr>
                <th>RTP Perikanan Tangkap (Unit) (C2)</th>
                <td><?= $_SESSION['bobotc2'] ?></td>
            </tr>
            <tr>
                <th>Kapal / Perahu (Unit) (C3)</th>
                <td><?= $_SESSION['bobotc3'] ?></td>
            </tr>
        </table>
    </div>

    <h2>Normalisasi</h2>
    <div class="container-sm">
        <form action="hitungranking.php" method="post">
            <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
                <tr class="table-dark">
                    <th>Nama</th>
                    <th>C1 (Normalisasi)</th>
                    <th>C2 (Normalisasi)</th>
                    <th>C3 (Normalisasi)</th>
                </tr>
                <?php foreach ($data as $id => $d): 
                    $val_c1 = $kalkulasi_norm[$id]['c1'] ?? "";
                    $val_c2 = $kalkulasi_norm[$id]['c2'] ?? "";
                    $val_c3 = $kalkulasi_norm[$id]['c3'] ?? "";
                ?>
                <tr>
                    <th><?= $d['lokasi'] ?></th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c1_norm[<?= $id ?>]" class="form-control" value="<?= $val_c1 ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c2_norm[<?= $id ?>]" class="form-control" value="<?= $val_c2 ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c3_norm[<?= $id ?>]" class="form-control" value="<?= $val_c3 ?>" readonly>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </form>
    </div>

    <h2>Skor Perankingan</h2>
    <div class="container-sm">
        <form action="hitungranking.php" method="post">
            
            <?php foreach ($data as $id => $d): 
                $val_c1 = $kalkulasi_norm[$id]['c1'] ?? "";
                $val_c2 = $kalkulasi_norm[$id]['c2'] ?? "";
                $val_c3 = $kalkulasi_norm[$id]['c3'] ?? "";
            ?>
                <input type="hidden" name="c1_norm[<?= $id ?>]" value="<?= $val_c1 ?>">
                <input type="hidden" name="c2_norm[<?= $id ?>]" value="<?= $val_c2 ?>">
                <input type="hidden" name="c3_norm[<?= $id ?>]" value="<?= $val_c3 ?>">
            <?php endforeach; ?>

            <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
                <tr class="table-dark">
                    <th>Nama</th>
                    <th>Skor C1</th>
                    <th>Skor C2</th>
                    <th>Skor C3</th>
                    <th>Total Skor</th>
                </tr>
                <?php foreach ($data as $id => $d): 
                    $sc1 = $kalkulasi_skor[$id]['sc1'] ?? "";
                    $sc2 = $kalkulasi_skor[$id]['sc2'] ?? "";
                    $sc3 = $kalkulasi_skor[$id]['sc3'] ?? "";
                    $tot = $kalkulasi_skor[$id]['total'] ?? "";
                ?>
                <tr>
                    <th><?= $d['lokasi'] ?></th>
                    <td>
                        <div class="mb-3">
                            <input type="text" class="form-control" value="<?= $sc1 ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" class="form-control" value="<?= $sc2 ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" class="form-control" value="<?= $sc3 ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" class="form-control" value="<?= $tot ?>" readonly>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5">
                        <button type="submit" name="skor" class="btn btn-danger w-100">Hitung Ranking</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>