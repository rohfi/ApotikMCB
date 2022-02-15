<?php include '../koneksi.php' ?>
<?php include '../component.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>
</head>
<body>
<?php include 'headeradmin.php' ?>
<br><h2><center>Ubah Produk Obat<center></h2><br><br>
<?php 
$ambil=$koneksi->query("SELECT * FROM obat WHERE id='$_GET[id]' ");
$pecah=$ambil->fetch_assoc();  
?>
<div class="container">
    <form action="" method="post">
    <div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama']; ?>">
	</div>

	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number"class="form-control" name="harga" value="<?php echo $pecah['harga']; ?>">
	</div>
    <br>
    <button class="btn btn-primary" name="ubah">Edit</button><br>
    </form>
<?php 
if (isset($_POST['ubah'])) 
{
    $nama  = $_POST['nama'];
    $harga  = $_POST['harga'];
	$koneksi->query("UPDATE obat SET nama='$nama',harga='$harga' WHERE id='$_GET[id]'");

    echo "<div class='alert alert-info'>Produk Telah Diubah</div>";
    echo "<meta http-equiv='refresh' content='1;url=view.php'>";
}
 ?>
</div>
</body>
</html>