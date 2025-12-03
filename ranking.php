<?php
session_start();
if (!isset($_SESSION['totalskor'])) {
    echo "<script>alert('Anda belum melakukan perhitungan Pada data!!'); window.location='./hitungranking.php'</script>";
    exit;
}

$skorakhir = $_SESSION['totalskor'];
arsort($skorakhir);

$rank = 0; 
$row_number = 1;
$prevScore = null;
?>

<head>
    <link rel="stylesheet" href="./css/table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
                <?php
                if ($prevScore === null || $val < $prevScore) {
                    $rank = $row_number;
                }
                ?>
                
                <tr>
                    <td><?php echo $rank ?></td>
                    <td><?php echo $key ?></td> <td><?php echo $val ?></td> </tr>
                
                <?php 
                $prevScore = $val; 
                $row_number++; 
                ?>
            <?php endforeach ?>
        </table>
    </div>
</body>