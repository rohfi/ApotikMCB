<?php include '../koneksi.php' ?>
<?php include '../component.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Metode Pembayaran</title>
</head>
<body>
<?php include 'headeradmin.php' ?>
<br><h2><center>Tambah Metode Pembayaran<center></h2><br>

<div class="container">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
    <br>
	<button class="btn btn-primary" name="save">Simpan</button><br>
</form>


<?php
if (isset($_POST['save'])) 
{
  $nama  = $_POST['nama'];
  $mysqli  = "INSERT INTO metode_pembayaran (nama) VALUES 
  							('$nama')";
  $result  = mysqli_query($koneksi, $mysqli);
  if ($result) {
    echo "<div class='alert alert-info'>Penambahan Metode Pembayaran Berhasil</div>";
    echo "<meta http-equiv='refresh' content='1;url=pembayaran.php'>";
  } else {
    echo "<script>alert('Metode Pembayaran Gagal Di Tambah Ke Database Anda !');</script>";
  }
  mysqli_close($koneksi);
 }
?>
</div>
</body>
</html>