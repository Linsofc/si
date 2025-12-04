<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Perikanan Jawa Timur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/table.css">

    <style>
        .text-justify {
            text-align: justify;
        }
        .img-custom {
            height: 300px;
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>

<body class="bg-light">

    <?php
    require_once __DIR__ . "/include/navbar.php";
    ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-primary">Prioritas Pengembangan Kawasan Perikanan</h2>
                    <hr class="w-25 mx-auto text-primary" style="height: 3px; opacity: 1;">
                </div>

                <div class="card shadow-sm border-0 mb-5">
                    <div class="card-body p-4 p-md-5">
                        <p class="lead text-justify mb-4">
                            Pengembangan kawasan sentra perikanan di Jawa Timur seringkali menghadapi kendala keterbatasan anggaran dan infrastruktur, sehingga diperlukan strategi prioritas yang tepat sasaran. Penelitian ini mengembangkan <strong>Sistem Pendukung Keputusan (SPK)</strong> menggunakan metode <em>Analytic Hierarchy Process</em> (AHP) untuk menentukan wilayah yang paling layak dikembangkan berdasarkan data statistik terbaru.
                        </p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="./image/download.jpeg" class="card-img-top img-custom rounded" alt="Ilustrasi Hasil Tangkap">
                            <div class="card-footer bg-white border-0 text-center text-muted small">
                                Ilustrasi Hasil Tangkapan Nelayan
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="./image/perikanan.jpg" class="card-img-top img-custom rounded" alt="Ilustrasi Dermaga">
                            <div class="card-footer bg-white border-0 text-center text-muted small">
                                Kekayaan Sumber Daya Perikanan
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>