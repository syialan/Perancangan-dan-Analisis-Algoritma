<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Pertemuan 2 - Tugas 1</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <!-- [start] Soal Nomor 1 -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-center">
                        <h5 class="text-white">Program Menghitung dan Mencetak Pukul Berapa tiba sampai Tujuan</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="berangkat">Waktu Berangkat</label>
                            <input type="time" name="berangkat" class="form-control mb-2" step="2" value="08:52:45">
                            <label for="detik">Jumlah Detik sampai ke Tujuan</label>
                            <input type="number" name="detik" class="form-control mb-2" min="1" value="5000" required>
                            <button type="submit" name="soal_1" class="btn btn-primary btn-sm">Hitung</button>
                        </form>
                    </div>
                </div>
                <!-- Logic Soal Nomor 1 -->
                <?php if (isset($_POST['soal_1'])) {
                    $berangkat       = $_POST['berangkat'];
                    $detikTujuan     = $_POST['detik'];

                    // Explode Waktu 
                    $expTime         = explode(':', $berangkat);
                    $jamBerangkat    = $expTime[0];
                    $menitBerangkat = $expTime[1];
                    $detikBerangkat  = $expTime[2];

                    // Convert Ke Detik
                    $jamToDetik     = $jamBerangkat * 3600;
                    $menitToDetik   = $menitBerangkat * 60;

                    // Total Detik Keberangkatan
                    $detikKeberangkatan = $jamToDetik + $menitToDetik + $detikBerangkat;

                    // Total Detik Keberangkatan dengan Detik Sampai Ketujuan
                    $detikTotal = $detikKeberangkatan + $detikTujuan;

                    // Convert Ke Waktu
                    $jam   = floor($detikTotal / 3600);
                    $menit = floor($detikTotal / 60 % 60);
                    $detik = floor($detikTotal % 60);

                    $waktu = sprintf('%02d:%02d:%02d', $jam, $menit, $detik);
                ?>
                    <div class="card mt-5">
                        <div class="card-header bg-primary text-center">
                            <h5 class="text-white">Hasil Perhitungan</h5>
                        </div>
                        <div class="card-body">
                            <p>Waktu Berangkat Anda Pukul : <?= $berangkat; ?></p>
                            <p>Jumlah Detik untuk sampai ke Tujuan : <?= $detikTujuan; ?> Detik</p>
                            <p class="text-primary">Maka Anda Tiba di Tempat Tujuan Pukul : <?= $waktu; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- [end] Soal Nomor 1 -->

            <!-- [start] Soal Nomor 2 -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header bg-success text-center">
                        <h5 class="text-white">Program Menghitung dan Mencetak waktu yang dihabiskan dalam Perjalanan</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="berangkat">Waktu Berangkat</label>
                            <input type="time" name="berangkat" class="form-control mb-2" step="2" value="08:52:45">
                            <label for="tujuan">Waktu sampai ke Tujuan</label>
                            <input type="time" name="tujuan" class="form-control mb-2" min="1" step="2" value="12:15:10">
                            <button type="submit" name="soal_2" class="btn btn-success btn-sm">Hitung</button>
                        </form>
                    </div>
                </div>
                <!-- Logic Soal Nomor 1 -->
                <?php if (isset($_POST['soal_2'])) {
                    $berangkat       = $_POST['berangkat'];
                    $tujuan          = $_POST['tujuan'];

                    // Explode Waktu Berangkat
                    $expTimeBerangkat   = explode(':', $berangkat);
                    $jamBerangkat       = $expTimeBerangkat[0];
                    $menitBerangkat     = $expTimeBerangkat[1];
                    $detikBerangkat     = $expTimeBerangkat[2];

                    // Explode Waktu Tujuan
                    $expTimeTujuan      = explode(':', $tujuan);
                    $jamTujuan          = $expTimeTujuan[0];
                    $menitTujuan        = $expTimeTujuan[1];
                    $detikTujuan        = $expTimeTujuan[2];

                    // Convert Waktu Berangkat Ke Detik 
                    $jamToDetikBerangkat     = $jamBerangkat * 3600;
                    $menitToDetikBerangkat   = $menitBerangkat * 60;

                    // Convert Waktu Tujuan Ke Detik 
                    $jamToDetikTujuan     = $jamTujuan * 3600;
                    $menitToDetikTujuan   = $menitTujuan * 60;

                    // Total Detik Keberangkatan
                    $detikKeberangkatan = $jamToDetikBerangkat + $menitToDetikBerangkat + $detikBerangkat;

                    // Total Detik Tujuan
                    $detikTujuan = $jamToDetikTujuan + $menitToDetikTujuan + $detikTujuan;

                    // Kurangi Waktu Tujuan dengan Waktu Keberangkatan
                    $detikTotal = $detikTujuan - $detikKeberangkatan;

                    // Convert Ke Waktu
                    $jam   = floor($detikTotal / 3600);
                    $menit = floor($detikTotal / 60 % 60);
                    $detik = floor($detikTotal % 60);

                    $waktu = sprintf('%02d:%02d:%02d', $jam, $menit, $detik);
                ?>
                    <div class="card mt-5">
                        <div class="card-header bg-success text-center">
                            <h5 class="text-white">Hasil Perhitungan</h5>
                        </div>
                        <div class="card-body">
                            <p>Waktu Berangkat Anda Pukul : <?= $berangkat; ?></p>
                            <p>Waktu sampai ke Tujuan : <?= $tujuan; ?></p>
                            <p class="text-success">Waktu Tempuh Anda untuk Sampai ke Tujuan : <?= $waktu; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- [end] Soal Nomor 2 -->
        </div>
    </div>
</body>

</html>
<!-- Coder By:Alawi -->