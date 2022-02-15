<?php
include 'koneksi.php';
include 'component.php';
session_start();
$user=$_SESSION["user"]['id'];
$obat = $_GET ['id'];
// echo $obat;
$ambil=$koneksi->query("SELECT * FROM keranjang WHERE id_user='$user' AND id_obat='$obat'");
while($keranjang=$ambil->fetch_assoc()){
    echo "<pre>";
	// print_r($keranjang);
	echo "</pre>";
    $tambah= $keranjang["jumlah"]+1;
}
$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_user='$user' AND id_obat='$obat'"));
if ($cek > 0){
    
    $koneksi->query("UPDATE keranjang SET jumlah='$tambah'  WHERE id_user='$user' ANd id_obat='$obat' ");
    echo "<script>alert('Obat di masukkan ke keranjang');</script>";
    echo "<script>window.location=history.go(-1);</script>";

}else{
    $mysqli  = "INSERT INTO keranjang (id_user,id_obat,jumlah) VALUES ('$user','$obat','1')";
    $result  = mysqli_query($koneksi, $mysqli);
    if ($result) {
        echo "<script>alert('Obat di masukkan ke keranjang')</script>";
        echo "<script>window.location=history.go(-1);</script>";
    }
}
?>