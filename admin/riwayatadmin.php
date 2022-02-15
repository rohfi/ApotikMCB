<?php
session_start();
include '../koneksi.php';
if (!isset($_SESSION['user']))
{
  echo"<script>alert('anda harus login')</script>";
  echo"<script>location='../login.php';</script>";
  header('location:../login.php');
  exit();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <?php include '../koneksi.php' ?>
    <?php include '../component.php' ?>
</head>
<body>
<?php include 'headeradmin.php' ?>
<div class="container">
    <br><h1><center>Riwayat Pembelian</center></h1><br>
    <table class="table table-bordered">
	<thead>
    <tr> 
		<th>No</th>
		<th>Username</th>
        <th>Waktu Transaksi</th>
		<th>Alamat Pengiriman</th>
		<th>Total Harga</th>
        <th>Action</th>
	</tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
    <?php $ambil = $koneksi->query("SELECT * FROM pembelian join detail_pembelian on pembelian.id=detail_pembelian.id_pembelian
                    join user on pembelian.id_user=user.id join obat on detail_pembelian.id_obat=obat.id group by detail_pembelian.id_pembelian"); ?>
	<?php while ($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
        <td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['username']; ?></td>
            <td><?php echo $pecah['tanggal']; ?></td>
            <td><?php echo $pecah['alamat']; ?></td>
            <?php $obatobat=""; ?>
            <?php $idnya=$pecah['id_pembelian']; ?>
            <td><?php echo $pecah['subtotal']; ?></td>
            <td>
                <a href="detailriwayatadmin.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-info">Detail</a>
				<a href="deleteriwayatadmin.php?id=<?php echo $pecah['id_pembelian'] ?>"  class="btn-danger btn">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
    </tbody>
	
</table>
</div>
</body>
</html>