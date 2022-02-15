<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user']))
{
  echo"<script>alert('anda harus login')</script>";
  echo"<script>location='login.php';</script>";
  header('location:login.php');
  exit();
} 
$id=$_SESSION["user"]['id']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Produk</title>
	<?php include 'koneksi.php' ?>
    <?php include 'component.php' ?>
</head>
<body>
    <?php include 'header.php'?>
    <div class="container">
    <br><h1><center>Riwayat Pesanan</center></h1><br>
</form>
<br>
<table class="table table-bordered">
	<tr>
		<th>Nomor</th>
		<th>Total Harga</th>
		<th>Waktu Transaksi</th>
		<th>Alamat Pengiriman</th>
		<th>Action</th>
	</tr>
	<?php $nomor=1; ?>
	<?php if (empty($_GET['cari'])) {
		$ambil = $koneksi->query("SELECT * FROM pembelian join detail_pembelian on pembelian.id=detail_pembelian.id_pembelian
                    join user on pembelian.id_user=user.id join obat on detail_pembelian.id_obat=obat.id where id_user='$id' group by detail_pembelian.id_pembelian");
	}?>
	<?php while ($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td>Rp. <?php echo number_format($pecah['subtotal']); ?></td>
            <td><?php echo $pecah["tanggal"]?></td>
            <td><?php echo $pecah["alamat"]?></td>
            <td>
				<a href="detail.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-info">Detail</a>
				<a href="deleteriwayat.php?id=<?php echo $pecah['id_pembelian'] ?>"  class="btn-danger btn">Hapus</a>	
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
</table>
<br>
    </div>
</body>
<?php include 'footer.php'?>
</html>