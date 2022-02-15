<?php 
include 'koneksi.php';
$patokan = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian join detail_pembelian 
        on pembelian.id=detail_pembelian.id_pembelian WHERE pembelian.id=$patokan");
$pecah = $ambil->fetch_assoc();
$koneksi->query("DELETE FROM pembelian WHERE id=$patokan");
$koneksi->query("DELETE FROM detail_pembelian WHERE id_pembelian=$patokan");
 ?>
<script>alert('Riwayat Pesanan Telah Terhapus Di Database Anda !');</script>
<script>location='note.php';</script>