<?php
session_start();
if (!isset($_SESSION['CI'])) {
    echo "<script>alert('Anda belum melakukan perhitungan CI!!'); window.location='./hitungCI.php'</script>";
}

$data = [
    1 => 0,
    2 => 0,
    3 => 0.58,
    4 => 0.9,
    5 => 1.12,
    6 => 1.24,
    7 => 1.32,
    8 => 1.41,
    9 => 1.45,
    10 => 1.49,
];

if (isset($_POST['CR'])) {
    $ci = $_SESSION['CI'] ?? "";
    $perhitungan = "$ci / " . $data[3];
    $hasil = (float)$ci / (float)$data[3];
    $hasil = round($hasil, 3);

    if ($hasil < 0.1) {
        $kesimpulan = "Konsisten";
    } else {
        $kesimpulan = "Tidak konsisten";
    }
    $_SESSION['kesimpulan'] = $kesimpulan;
}
?>

<head>
    <link rel="stylesheet" href="./css/table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/navbar.css">

</head>

<body>
    <?php
    require_once __DIR__ . "/include/navbar.php";
    ?>
    <div class="container-sm">
        <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
            <tr class="table-dark">
                <th colspan="2">Hitung Consistency Ratio (CR) - Kriteria</th>
            </tr>
            <tr>
                <th>IR</th>
                <th>Nilai</th>
            </tr>
            <?php foreach ($data as $key => $val): ?>
                <tr>
                    <td><?php echo $key ?></td>
                    <td><?php echo $val ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <hr>
    <div class="container-sm">
        <form action="hitungCR.php" method="post">
            <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
                <tr class="table-dark">
                    <th colspan="4">Hitung Consistency Ratio (CR) - Kriteria</th>
                </tr>
                <tr>
                    <th>Perhitungan</th>
                    <th>Hasil</th>
                    <th>Kesimpulan</th>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="perhitungan" class="form-control" value="<?= $perhitungan ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="hasil" class="form-control" value="<?= $hasil ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="kesimpulan" class="form-control" value="<?= $kesimpulan ?? "" ?>" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="submit" name="CR" class="btn btn-danger w-100">Jumlahkan</button>
                    </td>
                </tr>
        </form>
        </table>
    </div>
</body>