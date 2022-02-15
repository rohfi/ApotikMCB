<?php include '../koneksi.php' ?>
<?php include '../component.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengiriman</title>
</head>
<body>
<?php include 'headeradmin.php' ?>
<br><h2><center>Ubah Pengiriman<center></h2><br><br>
<?php 
$ambil=$koneksi->query("SELECT * FROM pengiriman WHERE id='$_GET[id]'");
$pecah=$ambil->fetch_assoc();  
?>
<div class="container">
    <form action="" method="post">
    <div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama']; ?>">
	</div>
    <br>
    <button class="btn btn-primary" name="ubah">Edit</button><br>
    </form>
<?php 
if (isset($_POST['ubah'])) 
{
    $nama  = $_POST['nama'];
	$koneksi->query("UPDATE pengiriman SET nama='$nama' WHERE id='$_GET[id]'");

    echo "<div class='alert alert-info'>Metode Pembayaran Telah Diubah</div>";
    echo "<meta http-equiv='refresh' content='1;url=pengiriman.php'>";
}
 ?>
</div>
</body>
</html>