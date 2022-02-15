<?php 
include '../koneksi.php';
$ambil = $koneksi->query("SELECT * FROM metode_pembayaran WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$koneksi->query("DELETE FROM metode_pembayaran WHERE id='$_GET[id]'");
 ?>
<script>alert('Metode Pembayaran Telah Terhapus Di Database Anda !');</script>
<script>location='pembayaran.php';</script>

