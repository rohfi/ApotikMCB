<?php include '../koneksi.php' ?>
<?php include '../component.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'headeradmin.php' ?>
<br><h2><center>Tambah Produk Obat<center></h2><br><br>

<div class="container">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-grup">
		<label>Deskripsi</label>
		<select class="form-control" name="kategori">
			<option selected disabled>Pilih Kategori</option>
			<option value="1">Kepala</option>
			<option value="2">Kulit</option>
			<option value="3">Mata</option>
		</select>
	</div>
    <br>
	<div class="form-grup">
		<label class="foto"></label>
		<input type="file" name="foto" class="form-control">
	</div><br>
	<button class="btn btn-primary" name="save">Simpan</button><br>
</form>


<?php
if (isset($_POST['save'])) 
{
  $nama  = $_POST['nama'];
  $harga  = $_POST['harga'];
  $kategori  = $_POST['kategori'];
  $foto = $_FILES['foto']['name'];
  $lokasi = $_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasi, "../assets/obat/".$foto);
  $mysqli  = "INSERT INTO obat (nama,harga,foto,kategori) VALUES 
  							('$nama','$harga','$foto','$kategori')";
  $result  = mysqli_query($koneksi, $mysqli);
  if ($result) {
    echo "<div class='alert alert-info'>Penambahan Produk Berhasil</div>";
    echo "<meta http-equiv='refresh' content='1;url=view.php'>";
  } else {
    echo "<script>alert('Produk Gagal Di Tambah Ke Database Anda !');</script>";
  }
  mysqli_close($koneksi);
 }
?>
</div>
</body>
</html>