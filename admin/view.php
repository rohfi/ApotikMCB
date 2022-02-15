<?php 
session_start();
include '../koneksi.php';
if (!isset($_SESSION['user'])) 
{
  echo"<script>alert('anda harus login')</script>";
  echo"<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}
?>
<?php include '../koneksi.php' ?>
<?php include '../component.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Obat</title>
</head>
<body>
	<?php include 'headeradmin.php'?>
    <div class="container"><br>
    <h2><center>Kelola Obat<center></h2><br><br>
<a href="view.php" class="btn btn-info">Semua</a>
<a href="view.php?cari=1" class="btn btn-info">Obat Kepala</a>
<a href="view.php?cari=2" class="btn btn-info">Obat Kulit</a>
<a href="view.php?cari=3" class="btn btn-info">Obat Mata</a>

</form>
<br><br>	
<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Nama </th>
		<th>Harga</th>
		<th>Foto Produk</th>
		<th>Action</th>
	</tr>
	<?php $nomor=1; ?>
	<?php if (empty($_GET['cari'])) {
		$ambil = $koneksi->query("SELECT * FROM obat");
	} else {
		$ambil = $koneksi->query("SELECT * FROM obat WHERE kategori = '$_GET[cari]'");
	} ?>
	<?php while ($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp <?php echo number_format($pecah['harga']); ?></td>
			<td>
				<img src="../assets/obat/<?php echo $pecah['foto'] ?>" width="100" >
			</td>
			<td>
				<a href="delete.php?id=<?php echo $pecah['id'] ?>"  class="btn-danger btn">Hapus</a>
				<a href="edit.php?id=<?php echo $pecah['id'] ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
</table>
<a href="add.php" class="btn btn-primary">Tambah Produk</a>

    </div>
</body>
</html>