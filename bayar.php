<!DOCTYPE html>
<html>
<head>
    <title>SPP ONLINE</title>
    <link rel="stylesheet" type="text/css" href="src/style.css">
</head>
<body>
    <br/>
    <br/>
    <header>
        <h1 class="judul">PEMBAYARAN SPP ONLINE SMK NEGERI 3 BANJARBARU</h1>
    </header>
    
    <div class="wrap">
        <div class="blog">
            <div class="conteudo">

                <h3>Transaksi Pembayaran SPP</h3>
                <form method="get" action="">
                    nisn: <input type="text" name="nisn" value="<?php echo isset($_GET['nisn']) ? $_GET['nisn'] : ''; ?>" />
                    <input type="hidden" id="open" name="open" value="data_pembayaran" />
                    <input type="submit" name="cari" value="Cari Siswa" />
                </form>

                <?php
                include_once "src/koneksi.php";

                if (isset($_GET['nisn']) && $_GET['nisn'] != '') {
                    $nisn_cari = mysqli_real_escape_string($koneksi, $_GET['nisn']);

                    $sqlSiswa = mysqli_query($koneksi, "SELECT * FROM siswa 
                                LEFT JOIN kelas ON kelas.id_kelas = siswa.id_kelas 
                                LEFT JOIN spp ON siswa.id_spp = spp.id_spp 
                                WHERE siswa.nisn='$nisn_cari'");

                    if (mysqli_num_rows($sqlSiswa) > 0) {
                        $data = mysqli_fetch_array($sqlSiswa);
                        $nisn = $data['nisn'];
                ?>

                        <h3>Biodata Siswa</h3>
                        <table>
                            <tr>
                                <td>nisn</td>
                                <td>:</td>
                                <td><?php echo $data['nisn']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Siswa</td>
                                <td>:</td>
                                <td><?php echo $data['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><?php echo isset($data['nama_kelas']) ? $data['nama_kelas'] : '-'; ?></td>
                            </tr>
                        </table>

                        <h3>Tagihan SPP Siswa</h3>
                        <table border="1" cellpadding="5" cellspacing="0">
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>No. Bayar</th>
                                <th>Tgl. Bayar</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                            </tr>

                            <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM pembayaran 
                                    LEFT JOIN spp ON pembayaran.id_spp = spp.id_spp 
                                    WHERE pembayaran.nisn='$nisn'");
                            $no = 1;
                            while ($row = mysqli_fetch_array($sql)) {
                                echo "<tr>
                                        <td>$no</td>
                                        <td>$row[bulan_tagihan]</td>
                                        <td>$row[tahun_tagihan]</td>
                                        <td>$row[no_bayar]</td>
                                        <td>$row[tgl_pembayaran]</td>
                                        <td>$row[nominal]</td>
                                        <td>$row[keterangan]</td>
                                    </tr>";
                                $no++;
                            }
                            ?>
                        </table>
                <?php 
                    } else {
                        echo "<p><font color='red'><b>Data Siswa tidak ditemukan!</b></font></p>";
                    }
                } 
                ?>

            </div>
        </div>
    </div>
</body>
</html>