<?php 
include '../koneksi.php';
$ambil = $koneksi->query("SELECT * FROM obat WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk =$pecah['foto'];
if (file_exists("../assets/obat$fotoproduk"))
{
	unlink("../assets/obat/$foto");
}
$koneksi->query("DELETE FROM obat WHERE id='$_GET[id]'");

;
 ?>
<script>alert('Produk Telah Terhapus Di Database Anda !');</script>
<script>location='datauser.php';</script>

