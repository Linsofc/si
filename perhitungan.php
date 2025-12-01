<?php
if (isset($_POST['perbandingan']) || isset($_POST['normalisasi']) || isset($_POST['evn'])) {

    $c1a = $_POST['c1a'] ?? "";
    $c1b = $_POST['c1b'] ?? "";
    $c1c = $_POST['c1c'] ?? "";

    $c2a = $_POST['c2a'] ?? "";
    $c2b = $_POST['c2b'] ?? "";
    $c2c = $_POST['c2c'] ?? "";

    $c3a = $_POST['c3a'] ?? "";
    $c3b = $_POST['c3b'] ?? "";
    $c3c = $_POST['c3c'] ?? "";

    $totalc1 = (float)$c1a + (float)$c2a + (float)$c3a;
    $totalc2 = (float)$c1b + (float)$c2b + (float)$c3b;
    $totalc3 = (float)$c1c + (float)$c2c + (float)$c3c;

    $totalc1 = $totalc1;
    $totalc2 = $totalc2;
    $totalc3 = $totalc3;
}

if (isset($_POST['normalisasi']) || isset($_POST['evn']) || isset($_POST['lanjutE'])) {
    $c1a = $_POST['c1a'] ?? "";
    $c1b = $_POST['c1b'] ?? "";
    $c1c = $_POST['c1c'] ?? "";

    $c2a = $_POST['c2a'] ?? "";
    $c2b = $_POST['c2b'] ?? "";
    $c2c = $_POST['c2c'] ?? "";

    $c3a = $_POST['c3a'] ?? "";
    $c3b = $_POST['c3b'] ?? "";
    $c3c = $_POST['c3c'] ?? "";

    $totalc1 = $_POST['total_c1'] ?? "";
    $totalc2 = $_POST['total_c2'] ?? "";
    $totalc3 = $_POST['total_c3'] ?? "";

    $nc1a = (float)$c1a / (float)$totalc1;
    $nc1b = (float)$c1b / (float)$totalc2;
    $nc1c = (float)$c1c / (float)$totalc3;

    $nc2a = (float)$c2a / (float)$totalc1;
    $nc2b = (float)$c2b / (float)$totalc2;
    $nc2c = (float)$c2c / (float)$totalc3;
    $nc3a = (float)$c3a / (float)$totalc1;
    $nc3b = (float)$c3b / (float)$totalc2;
    $nc3c = (float)$c3c / (float)$totalc3;

    $nc1a = round($nc1a, 3);
    $nc1b = round($nc1b, 3);
    $nc1c = round($nc1c, 3);

    $nc2a = round($nc2a, 3);
    $nc2b = round($nc2b, 3);
    $nc2c = round($nc2c, 3);
    
    $nc3a = round($nc3a, 3);
    $nc3b = round($nc3b, 3);
    $nc3c = round($nc3c, 3);
}

if (isset($_POST['evn'])) {
    $nc1a = $_POST['nc1a'];
    $nc1b = $_POST['nc1b'];
    $nc1c = $_POST['nc1c'];

    $nc2a = $_POST['nc2a'];
    $nc2b = $_POST['nc2b'];
    $nc2c = $_POST['nc2c'];

    $nc3a = $_POST['nc3a'];
    $nc3b = $_POST['nc3b'];
    $nc3c = $_POST['nc3c'];

    $totalbc1 = (float)$nc1a + (float)$nc1b + (float)$nc1c;
    $totalbc2 = (float)$nc2a + (float)$nc2b + (float)$nc2c;
    $totalbc3 = (float)$nc3a + (float)$nc3b + (float)$nc3c;

    $totalbc1 = round($totalbc1, 3);
    $totalbc2 = round($totalbc2, 3);
    $totalbc3 = round($totalbc3, 3);

    $evnc1 = $totalbc1 / 3;
    $evnc2 = $totalbc2 / 3;
    $evnc3 = $totalbc3 / 3;

    $evnc1 = round($evnc1, 3);
    $evnc2 = round($evnc2, 3);
    $evnc3 = round($evnc3, 3);

    $totalevn = $evnc1 + $evnc2 + $evnc3;

    $bobotc1 = $evnc1 * 100;
    $bobotc2 = $evnc2 * 100;
    $bobotc3 = $evnc3 * 100;

    $totalbobot = $bobotc1 + $bobotc2 + $bobotc3;
    session_start();
    $_SESSION['bobotc1'] = $evnc1;
    $_SESSION['bobotc2'] = $evnc2;
    $_SESSION['bobotc3'] = $evnc3;
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
        <h2>Matriks Perbandingan</h2>
        <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
            <tr class="table-dark">
                <th>Kriteria</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
            </tr>
            <form action="perhitungan.php" method="post">
                <tr>
                    <th>C1</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c1a" class="form-control" value="<?= $c1a ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c1b" class="form-control" value="<?= $c1b ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c1c" class="form-control" value="<?= $c1c ?? "" ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>C2</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c2a" class="form-control" value="<?= $c2a ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c2b" class="form-control" value="<?= $c2b ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c2c" class="form-control" value="<?= $c2c ?? "" ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>C3</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c3a" class="form-control" value="<?= $c3a ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c3b" class="form-control" value="<?= $c3b ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c3c" class="form-control" value="<?= $c3c ?? "" ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="total_c1" class="form-control" value="<?= $totalc1 ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="total_c2" class="form-control" value="<?= $totalc2 ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="total_c3" class="form-control" value="<?= $totalc3 ?? "" ?>" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <button type="submit" name="perbandingan" class="btn btn-danger w-100">Jumlahkan</button>
                    </td>
                </tr>
            </form>
        </table>
    </div>
    <hr>
    <div class="container-sm">
        <h2>Normalisasi Matriks</h2>
        <form action="perhitungan.php" method="post">
            <input type="text" name="c1a" class="form-control" value="<?= $c1a ?? "" ?>" hidden>
            <input type="text" name="c2a" class="form-control" value="<?= $c2a ?? "" ?>" hidden>
            <input type="text" name="c3a" class="form-control" value="<?= $c3a ?? "" ?>" hidden>

            <input type="text" name="c1b" class="form-control" value="<?= $c1b ?? "" ?>" hidden>
            <input type="text" name="c2b" class="form-control" value="<?= $c2b ?? "" ?>" hidden>
            <input type="text" name="c3b" class="form-control" value="<?= $c3b ?? "" ?>" hidden>

            <input type="text" name="c1c" class="form-control" value="<?= $c1c ?? "" ?>" hidden>
            <input type="text" name="c2c" class="form-control" value="<?= $c2c ?? "" ?>" hidden>
            <input type="text" name="c3c" class="form-control" value="<?= $c3c ?? "" ?>" hidden>

            <input type="text" name="total_c1" class="form-control" value="<?= $totalc1 ?? "" ?>" hidden>
            <input type="text" name="total_c2" class="form-control" value="<?= $totalc2 ?? "" ?>" hidden>
            <input type="text" name="total_c3" class="form-control" value="<?= $totalc3 ?? "" ?>" hidden>

            <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
                <tr class="table-dark">
                    <th>Kriteria</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                </tr>
                <tr>
                    <th>C1</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="nc1a" class="form-control" value="<?= $nc1a ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="nc1b" class="form-control" value="<?= $nc1b ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="nc1c" class="form-control" value="<?= $nc1c ?? "" ?>" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>C2</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="nc2a" class="form-control" value="<?= $nc2a ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="nc2b" class="form-control" value="<?= $nc2b ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="nc2c" class="form-control" value="<?= $nc2c ?? "" ?>" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>C3</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="nc3a" class="form-control" value="<?= $nc3a ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="nc3b" class="form-control" value="<?= $nc3b ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="nc3c" class="form-control" value="<?= $nc3c ?? "" ?>" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <button type="submit" name="normalisasi" class="btn btn-danger w-100">Jumlahkan</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <hr>
    <div class="container-sm">
        <h2>Eigen Vektor Normalization</h2>
        <form action="perhitungan.php" method="post">

            <input type="text" name="c2a" class="form-control" value="<?= $c2a ?? "" ?>" hidden>
            <input type="text" name="c1a" class="form-control" value="<?= $c1a ?? "" ?>" hidden>
            <input type="text" name="c3a" class="form-control" value="<?= $c3a ?? "" ?>" hidden>

            <input type="text" name="c1b" class="form-control" value="<?= $c1b ?? "" ?>" hidden>
            <input type="text" name="c2b" class="form-control" value="<?= $c2b ?? "" ?>" hidden>
            <input type="text" name="c3b" class="form-control" value="<?= $c3b ?? "" ?>" hidden>

            <input type="text" name="c1c" class="form-control" value="<?= $c1c ?? "" ?>" hidden>
            <input type="text" name="c2c" class="form-control" value="<?= $c2c ?? "" ?>" hidden>
            <input type="text" name="c3c" class="form-control" value="<?= $c3c ?? "" ?>" hidden>

            <input type="text" name="total_c1" class="form-control" value="<?= $totalc1 ?? "" ?>" hidden>
            <input type="text" name="total_c2" class="form-control" value="<?= $totalc2 ?? "" ?>" hidden>
            <input type="text" name="total_c3" class="form-control" value="<?= $totalc3 ?? "" ?>" hidden>

            <input type="text" name="nc1a" class="form-control" value="<?= $nc1a ?? "" ?>" hidden>
            <input type="text" name="nc2a" class="form-control" value="<?= $nc2a ?? "" ?>" hidden>
            <input type="text" name="nc3a" class="form-control" value="<?= $nc3a ?? "" ?>" hidden>

            <input type="text" name="nc1b" class="form-control" value="<?= $nc1b ?? "" ?>" hidden>
            <input type="text" name="nc2b" class="form-control" value="<?= $nc2b ?? "" ?>" hidden>
            <input type="text" name="nc3b" class="form-control" value="<?= $nc3b ?? "" ?>" hidden>

            <input type="text" name="nc1c" class="form-control" value="<?= $nc1c ?? "" ?>" hidden>
            <input type="text" name="nc2c" class="form-control" value="<?= $nc2c ?? "" ?>" hidden>
            <input type="text" name="nc3c" class="form-control" value="<?= $nc3c ?? "" ?>" hidden>

            <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
                <tr class="table-dark">
                    <th>Kriteria</th>
                    <th>Jumlah</th>
                    <th>EVN(Bobot Prioritas)</th>
                    <th>Bobot Kriteria Akhir</th>
                </tr>
                <tr>
                    <th>C1</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="totalbc1" class="form-control" value="<?= $totalbc1 ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="evnc1" class="form-control" value="<?= $evnc1 ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="bobotc1" class="form-control" value="<?= $bobotc1 ?? "" ?>%">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>C2</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="totalbc2" class="form-control" value="<?= $totalbc2 ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="evnc2" class="form-control" value="<?= $evnc2  ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="bobotc2" class="form-control" value="<?= $bobotc2 ?? "" ?>%">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>C3</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="totalbc3" class="form-control" value="<?= $totalbc3 ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="evnc3" class="form-control" value="<?= $evnc3 ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="bobotc3" class="form-control" value="<?= $bobotc3 ?? "" ?>%">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        Total
                    </th>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="totalevn" class="form-control" value="<?= $totalevn ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="totalbobot" class="form-control" value="<?= $totalbobot ?? "" ?>%">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <button type="submit" name="evn" class="btn btn-danger w-100">Jumlahkan</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>