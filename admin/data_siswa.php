<?php
include_once "../src/koneksi.php";
?>
<h1><b>DATA SISWA</b></h1>
<h4><a href="?open=tambah_siswa">+ Tambah Data</a></h4>
<table cellspacing="1" cellpadding="3" border="1" width="100%">
    <tr>
        <td width="3%" bgcolor="#CCCCCC"><b>No</b></td>
        <td width="10%" bgcolor="#CCCCCC"><b>NISN</b></td>
        <td width="10%" bgcolor="#CCCCCC"><b>NIS</b></td>
        <td width="20%" bgcolor="#CCCCCC"><b>Nama Siswa</b></td>
        <td width="12%" bgcolor="#CCCCCC"><b>Kelas</b></td>
        <td width="20%" bgcolor="#CCCCCC"><b>Alamat</b></td>
        <td width="12%" bgcolor="#CCCCCC"><b>No. Telepon</b></td>
        <td width="13%" bgcolor="#CCCCCC"><b>Nominal SPP</b></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><b>Tools</b></td>
    </tr>
<?php
// Query gabungan (JOIN) untuk mengambil data siswa, kelas, dan SPP
$query = "SELECT siswa.*, kelas.nama_kelas, spp.nominal 
          FROM siswa 
          LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas 
          LEFT JOIN spp ON siswa.id_spp = spp.id_spp 
          ORDER BY siswa.nisn ASC";

$sql = mysqli_query($koneksi, $query);
$nomor = 0;
while ($data = mysqli_fetch_array($sql)) {
    $nomor++;
?>
    <tr>
        <td align="center"><?php echo $nomor; ?></td>
        <td><?php echo $data['nisn']; ?></td>
        <td><?php echo $data['nis']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['nama_kelas']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php echo $data['no_telp']; ?></td>
        <td>Rp. <?php echo number_format($data['nominal'], 0, ',', '.'); ?></td>
        <td width="5%" align="center">
            <a href="?open=edit_siswa&nisn=<?php echo $data['nisn']; ?>" target="_self">Edit</a>
        </td>
        <td width="5%" align="center">
            <a href="?open=hapus_siswa&nisn=<?php echo $data['nisn']; ?>" target="_self" onclick="return confirm('YAKIN INGIN MENGHAPUS DATA SISWA INI ... ?')">Delete</a>
        </td>
    </tr>
<?php } ?>
</table>