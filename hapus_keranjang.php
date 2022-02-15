<?php 
session_start();
include 'koneksi.php';
include 'component.php';
$obat = $_GET["id"];
$user = $_SESSION["user"]['id'];
$koneksi->query("DELETE FROM keranjang WHERE id_user='$user' AND id_obat='$obat' ");

echo "<script>alert('produk dihapus');</script>";
echo "<script>location='keranjang.php'</script>";
 ?>
