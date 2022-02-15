<?php 
include '../koneksi.php';
$ambil = $koneksi->query("SELECT * FROM pengiriman WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$koneksi->query("DELETE FROM pengiriman WHERE id='$_GET[id]'");
 ?>
<script>alert('Pengiriman Telah Terhapus Di Database Anda !');</script>
<script>location='pengiriman.php';</script>

