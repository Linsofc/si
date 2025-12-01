<?php
session_start();
if (!isset($_SESSION['totalskor'])) {
    echo "<script>alert('Anda belum melakukan perhitungan Pada data!!'); window.location='./hitungranking.php'</script>";
}
$skorakhir = $_SESSION['totalskor'];
$rank = 1;


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
        <h2>Ranking</h2>
        <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
            <tr class="table-dark">
                <th>Ranking</th>
                <th>Nama</th>
                <th>Skor</th>
            </tr>
            <?php foreach ($skorakhir as $key => $val): ?>
                <tr>
                   <td><?php echo $rank ?></td>
                   <td><?php echo $key ?></td>
                   <td><?php echo $val ?></td>
                </tr>
                <?php $rank++ ?>
            <?php endforeach ?>
        </table>
    </div>