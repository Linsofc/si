<?php
session_start();

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
    <div class="container">
        <h2>Perikanan</h2>
        <p>
            Sektor kelautan dan perikanan merupakan salah satu pilar utama perekonomian di Provinsi Jawa Timur, mengingat wilayah ini memiliki potensi sumber daya laut yang sangat besar. Berdasarkan data statistik perikanan tahun 2023, terdapat disparitas potensi yang signifikan antar wilayah, di mana Kabupaten Lamongan mendominasi dalam volume produksi tangkap mencapai 145.521 ton, sementara Kabupaten Banyuwangi dan Sumenep unggul dalam jumlah aset armada dan rumah tangga perikanan. Besarnya potensi ini menuntut adanya pengelolaan yang strategis dan tepat sasaran. Namun, pemerintah daerah seringkali menghadapi kendala dalam menentukan prioritas pengembangan
            kawasan sentra perikanan karena keterbatasan anggaran dan sumber daya. Pengambilan keputusan yang hanya didasarkan pada satu indikator, misalnya hanya melihat produksi tanpa mempertimbangkan aspek sosial (RTP) dan aset (Kapal), berpotensi menghasilkan kebijakan yang bias dan tidak berkelanjutan.
        </p>
        <p>
            Oleh karena itu, diperlukan sebuah sistem pendukung keputusan yang mampu mengolah data multikriteria secara objektif untuk menentukan prioritas pengembangan wilayah. Metode Analytic Hierarchy Process (AHP) dipilih dalam penelitian ini karena kemampuannya memecahkan masalah multikriteria yang kompleks dengan struktur hierarki yang logis, mulai dari level tujuan, kriteria, hingga alternatif. Penelitian ini memiliki letak keaslian (novelty) pada integrasi kriteria spesifik yaitu Produksi Perikanan Tangkap, RTP Perikanan Tangkap, dan Jumlah Kapal/Perahu berdasarkan data terbaru tahun 2023, yang kemudian diimplementasikan ke dalam sebuah sistem berbasis website. Berbeda dengan penelitian terdahulu yang umumnya masih melakukan perhitungan manual atau menggunakan software desktop statis, penelitian ini menawarkan solusi digitalisasi yang memungkinkan pemangku kepentingan melakukan simulasi perangkingan secara real-time dan transparan, sehingga strategi pengembangan infrastruktur maupun pemberdayaan nelayan dapat dilakukan secara lebih presisi.
        </p>
    </div>
    <div class="container">
        <img src="./image/download.jpeg" class="rounded float-start m-5" alt="..." style="width: 30rem;">
        <img src="./image/perikanan.jpg" class="rounded float-end m-5" alt="..." style="width: 30rem;">
    </div>
</body>