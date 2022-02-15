<?php 
include '../koneksi.php';
$ambil = $koneksi->query("SELECT * FROM user WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$koneksi->query("DELETE FROM user WHERE id='$_GET[id]'");
 ?>
<script>alert('User Telah Terhapus Di Database Anda !');</script>
<script>location='view.php';</script>

